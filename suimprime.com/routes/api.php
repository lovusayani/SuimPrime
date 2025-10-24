<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/settings', [SettingsController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/me', [AuthController::class, 'me']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// Subscription routes
Route::get('/plans', [SubscriptionController::class, 'getPlans']);
Route::middleware('auth:sanctum')->post('/select-plan', [SubscriptionController::class, 'selectPlan']);

// Route::prefix('admin')->group(function () {
//     Route::get('videos', [VideoController::class, 'index']);
//     Route::get('videos/{id}', [VideoController::class, 'show']);
// });