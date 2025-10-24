<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\PaymentTransaction;
use App\Services\Payment\CashfreeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private $cashfreeService;

    public function __construct(CashfreeService $cashfreeService)
    {
        $this->cashfreeService = $cashfreeService;
    }

    /**
     * Create payment order
     */
    public function createOrder(Request $request)
    {
        try {
            $request->validate([
                'plan_id' => 'required|exists:plans,id',
                'payment_gateway' => 'required|in:cashfree,razorpay,stripe,paypal',
            ]);

            $user = Auth::user();
            $plan = Plan::findOrFail($request->plan_id);

            // Calculate tax and total
            $amount = $plan->price;
            $taxAmount = round($amount * 0.18, 2); // 18% GST
            $discountAmount = $plan->discount ?? 0;
            $totalAmount = $amount + $taxAmount - $discountAmount;

            $paymentData = [
                'tax_amount' => $taxAmount,
                'discount_amount' => $discountAmount,
            ];

            switch ($request->payment_gateway) {
                case 'cashfree':
                    $result = $this->cashfreeService->createOrder($user, $plan, $paymentData);
                    break;
                
                case 'razorpay':
                    // TODO: Implement Razorpay
                    return response()->json(['error' => 'Razorpay not implemented yet'], 501);
                
                case 'stripe':
                    // TODO: Implement Stripe
                    return response()->json(['error' => 'Stripe not implemented yet'], 501);
                
                case 'paypal':
                    // TODO: Implement PayPal
                    return response()->json(['error' => 'PayPal not implemented yet'], 501);
                
                default:
                    return response()->json(['error' => 'Invalid payment gateway'], 400);
            }

            return response()->json([
                'success' => true,
                'message' => 'Payment order created successfully',
                'data' => $result
            ]);

        } catch (\Exception $e) {
            Log::error('Payment order creation failed', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to create payment order',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Verify payment status
     */
    public function verifyPayment(Request $request)
    {
        try {
            $request->validate([
                'order_id' => 'required|string',
                'payment_gateway' => 'required|in:cashfree,razorpay,stripe,paypal',
            ]);

            switch ($request->payment_gateway) {
                case 'cashfree':
                    $result = $this->cashfreeService->verifyPayment($request->order_id);
                    break;
                
                default:
                    return response()->json(['error' => 'Payment gateway not supported for verification'], 400);
            }

            // Update local transaction status
            $transaction = PaymentTransaction::with('plan')->where('order_id', $request->order_id)->first();
            
            if ($transaction && isset($result['order_status'])) {
                if ($result['order_status'] === 'PAID' && $transaction->status !== 'success') {
                    $transaction->update([
                        'status' => 'success',
                        'paid_at' => now()
                    ]);
                    
                    // Create user subscription for successful payment
                    switch ($request->payment_gateway) {
                        case 'cashfree':
                            $this->cashfreeService->createUserSubscriptionFromTransaction($transaction);
                            break;
                    }
                } elseif (in_array($result['order_status'], ['FAILED', 'CANCELLED'])) {
                    $transaction->update(['status' => 'failed']);
                }
            }

            return response()->json([
                'success' => true,
                'data' => $result,
                'transaction' => $transaction
            ]);

        } catch (\Exception $e) {
            Log::error('Payment verification failed', [
                'order_id' => $request->order_id,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Payment verification failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get user's payment history
     */
    public function getPaymentHistory(Request $request)
    {
        try {
            $user = Auth::user();
            
            $transactions = PaymentTransaction::where('user_id', $user->id)
                ->with(['plan'])
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return response()->json([
                'success' => true,
                'data' => $transactions
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get payment history',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get user subscription history
     */
    public function getUserSubscriptions(Request $request)
    {
        try {
            $user = Auth::user();
            
            // Get all user subscriptions with plan and transaction data
            $subscriptions = \App\Models\UserSubscription::with(['plan', 'transaction'])
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get();

            // Get active subscription
            $activeSubscription = \App\Models\UserSubscription::with(['plan', 'transaction'])
                ->where('user_id', $user->id)
                ->where('status', 'active')
                ->where('ends_at', '>', now())
                ->first();

            return response()->json([
                'success' => true,
                'subscriptions' => $subscriptions,
                'active_subscription' => $activeSubscription
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to fetch user subscriptions', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch subscription history',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Cashfree webhook handler
     */
    public function cashfreeWebhook(Request $request)
    {
        try {
            $webhookData = $request->all();
            
            Log::info('Cashfree webhook received', $webhookData);

            $transaction = $this->cashfreeService->handleWebhook($webhookData);

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            Log::error('Cashfree webhook handling failed', [
                'webhook_data' => $request->all(),
                'error' => $e->getMessage()
            ]);

            return response()->json(['error' => 'Webhook handling failed'], 500);
        }
    }
}