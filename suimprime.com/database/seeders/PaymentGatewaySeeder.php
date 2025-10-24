<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentGateway;

class PaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gateways = [
            [
                'name' => 'cashfree',
                'display_name' => 'Cashfree',
                'is_active' => true,
                'is_sandbox' => true,
                'credentials' => [
                    'app_id' => '38289c37a0ded9cbdd58db25598283',
                    'secret_key' => 'd01a712fa6f28794ae8c0b21aada7723dc3a8fd3',
                    'sandbox_url' => 'https://sandbox.cashfree.com/pg',
                    'production_url' => 'https://api.cashfree.com/pg'
                ],
                'config' => [
                    'currency' => 'INR',
                    'supported_methods' => ['card', 'netbanking', 'upi', 'wallet'],
                ],
                'webhook_url' => env('APP_URL') . '/api/webhooks/cashfree'
            ],
            [
                'name' => 'razorpay',
                'display_name' => 'Razorpay',
                'is_active' => false,
                'is_sandbox' => true,
                'credentials' => [
                    'key_id' => '',
                    'key_secret' => '',
                    'webhook_secret' => ''
                ],
                'config' => [
                    'currency' => 'INR',
                    'supported_methods' => ['card', 'netbanking', 'upi', 'wallet'],
                ],
                'webhook_url' => env('APP_URL') . '/api/webhooks/razorpay'
            ],
            [
                'name' => 'stripe',
                'display_name' => 'Stripe',
                'is_active' => false,
                'is_sandbox' => true,
                'credentials' => [
                    'public_key' => '',
                    'secret_key' => '',
                    'webhook_secret' => ''
                ],
                'config' => [
                    'currency' => 'USD',
                    'supported_methods' => ['card'],
                ],
                'webhook_url' => env('APP_URL') . '/api/webhooks/stripe'
            ],
            [
                'name' => 'paypal',
                'display_name' => 'PayPal',
                'is_active' => false,
                'is_sandbox' => true,
                'credentials' => [
                    'client_id' => '',
                    'client_secret' => '',
                    'sandbox_url' => 'https://api.sandbox.paypal.com',
                    'production_url' => 'https://api.paypal.com'
                ],
                'config' => [
                    'currency' => 'USD',
                    'supported_methods' => ['paypal'],
                ],
                'webhook_url' => env('APP_URL') . '/api/webhooks/paypal'
            ]
        ];

        foreach ($gateways as $gateway) {
            PaymentGateway::updateOrCreate(
                ['name' => $gateway['name']],
                $gateway
            );
        }
    }
}
