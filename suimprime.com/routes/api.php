<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/settings', [SettingsController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/me', [AuthController::class, 'me']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// Home routes
Route::get('/home', [HomeController::class, 'getHomeData']); // Can be accessed without auth but provides more data when authenticated
Route::get('/movies/section/{section}', [HomeController::class, 'getMoviesBySection']);

// Movie routes
Route::get('/movies/top-movies', [HomeController::class, 'getTopMovies']); // Get top movies for Top Ten section
Route::get('/movies/recommended', [HomeController::class, 'getRecommendedMovies']); // Get recommended movies for Recommended section
Route::get('/movies/by-genres', [MovieController::class, 'getByGenres']); // Get movies filtered by genres
Route::middleware('auth:sanctum')->get('/movies/{id}/actors', [MovieController::class, 'getActors']); // Get actors of a movie (requires auth)
Route::middleware('auth:sanctum')->get('/movies/{id}/directors', [MovieController::class, 'getDirectors']); // Get directors of a movie (requires auth)
Route::middleware('auth:sanctum')->get('/movies/{id}', [MovieController::class, 'show']); // Get individual movie details (requires auth)

Route::middleware('auth:sanctum')->group(function () {
    // Watchlist routes
    Route::post('/watchlist/add', [HomeController::class, 'addToWatchlist']);
    Route::post('/watchlist/remove', [HomeController::class, 'removeFromWatchlist']);
    
    // Viewing progress
    Route::post('/viewing/progress', [HomeController::class, 'updateViewingProgress']);
});

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