<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/settings', [SettingsController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/me', [AuthController::class, 'me']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// Subscription routes
Route::get('/plans', [SubscriptionController::class, 'getPlans']);
Route::middleware('auth:sanctum')->post('/select-plan', [SubscriptionController::class, 'selectPlan']);

// Payment routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/payment/create-order', [PaymentController::class, 'createOrder']);
    Route::post('/payment/verify', [PaymentController::class, 'verifyPayment']);
    Route::get('/payment/history', [PaymentController::class, 'getPaymentHistory']);
    Route::get('/user/subscriptions', [PaymentController::class, 'getUserSubscriptions']);
});

// Webhook routes (no auth required)
Route::post('/webhooks/cashfree', [PaymentController::class, 'cashfreeWebhook']);

// Route::prefix('admin')->group(function () {
//     Route::get('videos', [VideoController::class, 'index']);
//     Route::get('videos/{id}', [VideoController::class, 'show']);
// });