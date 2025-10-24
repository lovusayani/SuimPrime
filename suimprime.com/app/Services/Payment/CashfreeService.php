<?php

namespace App\Services\Payment;

use App\Models\PaymentGateway;
use App\Models\PaymentTransaction;
use App\Models\UserSubscription;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CashfreeService
{
    private $gateway;
    private $baseUrl;
    private $appId;
    private $secretKey;

    public function __construct()
    {
        $this->gateway = PaymentGateway::where('name', 'cashfree')->first();
        
        if (!$this->gateway) {
            throw new \Exception('Cashfree gateway not configured');
        }

        $credentials = $this->gateway->credentials;
        $this->appId = $credentials['app_id'];
        $this->secretKey = $credentials['secret_key'];
        $this->baseUrl = $this->gateway->is_sandbox 
            ? $credentials['sandbox_url'] 
            : $credentials['production_url'];
    }

    /**
     * Create payment order
     */
    public function createOrder(User $user, Plan $plan, array $paymentData = [])
    {
        try {
            // Generate unique order ID
            $orderId = 'ORDER_' . time() . '_' . Str::random(8);
            
            // Calculate amounts
            $amount = $plan->price;
            $taxAmount = $paymentData['tax_amount'] ?? round($amount * 0.18, 2);
            $discountAmount = $paymentData['discount_amount'] ?? 0;
            $totalAmount = $amount + $taxAmount - $discountAmount;

            // Create payment transaction record
            $transaction = PaymentTransaction::create([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'order_id' => $orderId,
                'payment_gateway' => 'cashfree',
                'amount' => $amount,
                'tax_amount' => $taxAmount,
                'discount_amount' => $discountAmount,
                'total_amount' => $totalAmount,
                'currency' => 'INR',
                'status' => 'pending',
                'expires_at' => now()->addHours(2), // Order expires in 2 hours
            ]);

            // Prepare Cashfree order data
            $orderData = [
                'order_id' => $orderId,
                'order_amount' => $totalAmount,
                'order_currency' => 'INR',
                'customer_details' => [
                    'customer_id' => (string) $user->id,
                    'customer_name' => $user->name,
                    'customer_email' => $user->email,
                    'customer_phone' => $user->phone ?? '9999999999'
                ],
                'order_meta' => [
                    'return_url' => url('/subscription/payment/success?order_id=' . $orderId),
                    'notify_url' => url('/api/webhooks/cashfree'),
                    'payment_methods' => 'cc,dc,nb,upi,paypal,app'
                ],
                'order_note' => "Payment for {$plan->name} subscription"
            ];

            // Make API call to Cashfree
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'x-client-id' => $this->appId,
                'x-client-secret' => $this->secretKey,
                'x-api-version' => '2023-08-01'
            ])->post($this->baseUrl . '/orders', $orderData);

            if ($response->successful()) {
                $responseData = $response->json();
                
                // Update transaction with gateway response
                $transaction->update([
                    'gateway_response' => $responseData,
                    'metadata' => [
                        'order_data' => $orderData,
                        'created_at' => now()->toISOString()
                    ]
                ]);

                return [
                    'success' => true,
                    'transaction' => $transaction,
                    'payment_session_id' => $responseData['payment_session_id'] ?? null,
                    'order_id' => $orderId,
                    'checkout_type' => 'js_sdk', // Indicate this requires JS SDK
                    'sandbox_mode' => $this->gateway->is_sandbox,
                ];
            } else {
                // Update transaction status to failed
                $transaction->update([
                    'status' => 'failed',
                    'gateway_response' => $response->json(),
                ]);

                throw new \Exception('Failed to create Cashfree order: ' . $response->body());
            }

        } catch (\Exception $e) {
            Log::error('Cashfree order creation failed', [
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'error' => $e->getMessage()
            ]);

            throw $e;
        }
    }

    /**
     * Verify payment status
     */
    public function verifyPayment($orderId)
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'x-client-id' => $this->appId,
                'x-client-secret' => $this->secretKey,
                'x-api-version' => '2023-08-01'
            ])->get($this->baseUrl . '/orders/' . $orderId);

            if ($response->successful()) {
                return $response->json();
            }

            throw new \Exception('Failed to verify payment: ' . $response->body());

        } catch (\Exception $e) {
            Log::error('Cashfree payment verification failed', [
                'order_id' => $orderId,
                'error' => $e->getMessage()
            ]);

            throw $e;
        }
    }

    /**
     * Handle webhook notification
     */
    public function handleWebhook(array $webhookData)
    {
        try {
            // Verify webhook signature if needed
            $orderId = $webhookData['order_id'] ?? null;
            $paymentStatus = $webhookData['order_status'] ?? null;

            if (!$orderId) {
                throw new \Exception('Order ID not found in webhook data');
            }

            // Find transaction
            $transaction = PaymentTransaction::where('order_id', $orderId)->first();
            
            if (!$transaction) {
                throw new \Exception('Transaction not found for order: ' . $orderId);
            }

            // Update transaction based on payment status
            switch ($paymentStatus) {
                case 'PAID':
                    $transaction->update([
                        'status' => 'success',
                        'transaction_id' => $webhookData['cf_payment_id'] ?? '',
                        'paid_at' => now(),
                        'gateway_response' => $webhookData
                    ]);
                    
                    // Create user subscription
                    $this->createUserSubscription($transaction);
                    break;

                case 'FAILED':
                case 'CANCELLED':
                    $transaction->update([
                        'status' => 'failed',
                        'gateway_response' => $webhookData
                    ]);
                    break;

                default:
                    $transaction->update([
                        'gateway_response' => $webhookData
                    ]);
            }

            return $transaction;

        } catch (\Exception $e) {
            Log::error('Cashfree webhook handling failed', [
                'webhook_data' => $webhookData,
                'error' => $e->getMessage()
            ]);

            throw $e;
        }
    }

    /**
     * Create user subscription after successful payment
     */
    private function createUserSubscription(PaymentTransaction $transaction)
    {
        $plan = $transaction->plan;
        $user = $transaction->user;

        // Calculate subscription dates
        $startsAt = now();
        $endsAt = $this->calculateSubscriptionEndDate($plan, $startsAt);

        // Create subscription
        $subscription = UserSubscription::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'transaction_id' => $transaction->id,
            'status' => 'active',
            'starts_at' => $startsAt,
            'ends_at' => $endsAt,
            'features' => $plan->features
        ]);

        return $subscription;
    }

    /**
     * Public method to create user subscription from transaction
     */
    public function createUserSubscriptionFromTransaction(PaymentTransaction $transaction)
    {
        // Check if subscription already exists for this transaction
        $existingSubscription = UserSubscription::where('transaction_id', $transaction->id)->first();
        
        if ($existingSubscription) {
            return $existingSubscription;
        }

        return $this->createUserSubscription($transaction);
    }

    /**
     * Calculate subscription end date based on plan duration
     */
    private function calculateSubscriptionEndDate(Plan $plan, $startDate)
    {
        switch ($plan->duration) {
            case 'week':
                return $startDate->addWeek();
            case 'month':
                return $startDate->addMonth();
            case '3months':
                return $startDate->addMonths(3);
            case 'year':
                return $startDate->addYear();
            default:
                return $startDate->addMonth(); // Default to 1 month
        }
    }
}