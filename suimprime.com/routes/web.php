<?php

use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DirectorController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VastAdController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

// ----------------------
// Public Pages
// ----------------------
Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/adminlogin', function () {
    return redirect()->route('admin.login'); // redirect to admin login for now
})->name('adminlogin'); */

// ----------------------
// Admin Login Routes (Public – no auth middleware)
// ----------------------
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'loginSubmit'])->name('admin.login.submit');

});

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Users
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('/users/details/{user}', [UserController::class, 'details'])->name('admin.users.details');
    Route::get('/users/changepassword/{user}', [UserController::class, 'changePassword'])->name('admin.users.change-password');
    Route::put('/users/changepassword/{user}', [UserController::class, 'updatePassword'])->name('admin.users.update-password');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::patch('/users/update-status/{user}', [UserController::class, 'updateStatus'])->name('admin.users.update-status');
    Route::post('/users/bulk-action', [UserController::class, 'bulkAction'])->name('admin.users.bulk-action');
    Route::patch('/users/{id}/toggle', [UserController::class, 'toggleSubscription'])->name('admin.users.toggle');
    
    Route::resource('/content', ContentController::class, ['as' => 'admin']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// Add other admin routes here, all protected by 'auth' and 'is_admin' middleware

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('media-library', [MediaController::class, 'index'])->name('media.index');
    Route::get('/getMediaStore', [MediaController::class, 'getMedia'])->name('media.library.store');
    Route::get('/get-media', [MediaController::class, 'getMedia'])->name('media.library');
    Route::post('media-library/upload', [MediaController::class, 'upload'])->name('media-library.upload');
    Route::post('media-library/store', [MediaController::class, 'store'])->name('media-library.store');
    Route::get('/media-library/list', [MediaController::class, 'list'])->name('media.list');
    Route::delete('media-library/{media}', [MediaController::class, 'destroy'])->name('media.destroy');
    Route::get('genres', [GenreController::class, 'index'])->name('genres.index');
    // admin.genres.create
    Route::get('genres/create', [GenreController::class, 'create'])->name('genres.create');
    // admin.genres.edit
    Route::get('genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit');
    // admin.genres.destroy
    Route::delete('genres/{genre}', [GenreController::class, 'destroy'])->name('genres.destroy');
    // admin.genres.store
    Route::post('genres', [GenreController::class, 'store'])->name('genres.store');
    // admin.genres.update
    Route::put('genres/{genre}', [GenreController::class, 'update'])->name('genres.update');
    // admin.genres.bulkAction
    Route::post('genres/bulk-action', [GenreController::class, 'bulkAction'])->name('genres.bulkAction');
    Route::patch('genres/update-status/{genre}', [GenreController::class, 'updateStatus'])->name('genres.updateStatus');
    // Movies Sections
    Route::get('movies', [MovieController::class, 'index'])->name('movies.index');
    // admin.movies.create
    Route::get('movies/create', [MovieController::class, 'create'])->name('movies.create');
    // admin.movie.edit
    Route::get('movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    // Update Restiricted
    Route::put('movies/{movie}/restricted', [MovieController::class, 'updateRestricted'])->name('movies.updateRestricted');
    // admin.movie.destroy
    Route::delete('movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
    // admin.movie.store
    Route::post('movies', [MovieController::class, 'store'])->name('movies.store');
    // admin.movie.update
    Route::put('movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
    // admin.movie.bulkAction
    Route::post('movies/bulk-action', [GenreController::class, 'bulkAction'])->name('movies.bulkAction');
    Route::patch('movies/update-status/{movie}', [GenreController::class, 'updateStatus'])->name('movies.updateStatus');

    // Plans
    Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('plans/{plan}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::put('plans/{plan}', [PlanController::class, 'update'])->name('plans.update');
    Route::patch('plans/update-status/{plan}', [PlanController::class, 'updateStatus'])->name('plans.updateStatus');
    Route::delete('plans/{plan}', [PlanController::class, 'destroy'])->name('plans.destroy');

    // Plan Limitation
    Route::get('planlimitation', [\App\Http\Controllers\Admin\PlanLimitationController::class, 'index'])->name('planlimitation.index');
    Route::post('planlimitation/bulk-action', [\App\Http\Controllers\Admin\PlanLimitationController::class, 'bulkAction'])->name('planlimitation.bulkAction');
    Route::patch('planlimitation/update-status/{planlimitation}', [\App\Http\Controllers\Admin\PlanLimitationController::class, 'updateStatus'])->name('planlimitation.updateStatus');
    Route::get('planlimitation/{planlimitation}/edit', [\App\Http\Controllers\Admin\PlanLimitationController::class, 'edit'])->name('planlimitation.edit');
    Route::put('planlimitation/{planlimitation}', [\App\Http\Controllers\Admin\PlanLimitationController::class, 'update'])->name('planlimitation.update');
    Route::delete('planlimitation/{planlimitation}', [\App\Http\Controllers\Admin\PlanLimitationController::class, 'destroy'])->name('planlimitation.destroy');

    // Pay Per View History
    Route::get('pay-per-view-history', [\App\Http\Controllers\Admin\PayPerViewHistoryController::class, 'index'])->name('payperview.index');

    // Coupons
    Route::get('coupon', [\App\Http\Controllers\Admin\CouponController::class, 'index'])->name('coupon.index');
    Route::get('coupon/create', [\App\Http\Controllers\Admin\CouponController::class, 'create'])->name('coupon.create');
    Route::post('coupon/store', [\App\Http\Controllers\Admin\CouponController::class, 'store'])->name('coupon.store');
    Route::get('coupon/{coupon}/edit', [\App\Http\Controllers\Admin\CouponController::class, 'edit'])->name('coupon.edit');
    Route::put('coupon/{coupon}', [\App\Http\Controllers\Admin\CouponController::class, 'update'])->name('coupon.update');
    Route::delete('coupon/{coupon}', [\App\Http\Controllers\Admin\CouponController::class, 'destroy'])->name('coupon.destroy');
    Route::patch('coupon/update-status/{coupon}', [\App\Http\Controllers\Admin\CouponController::class, 'updateStatus'])->name('coupon.updateStatus');
    Route::post('coupon/bulk-action', [\App\Http\Controllers\Admin\CouponController::class, 'bulkAction'])->name('coupon.bulkAction');

    // Actor
    Route::get('actors', [ActorController::class, 'index'])->name('actors.index');
    // admin.actors.create
    Route::get('actors/create', [ActorController::class, 'create'])->name('actors.create');
    // store actor
    Route::post('actors', [ActorController::class, 'store'])->name('actors.store');
    // admin.genres.edit
    Route::get('actors/{actor}/edit', [ActorController::class, 'edit'])->name('actors.edit');
    // admin.genres.destroy
    Route::delete('actors/{actor}', [ActorController::class, 'destroy'])->name('actors.destroy');
    // admin.genres.update
    Route::put('actors/{actor}', [ActorController::class, 'update'])->name('actors.update');
    // Drector
    Route::get('directors', [DirectorController::class, 'index'])->name('directors.index');
    Route::get('directors/create', [DirectorController::class, 'create'])->name('directors.create');
    Route::post('directors', [DirectorController::class, 'store'])->name('directors.store');
    Route::get('directors/{director}/edit', [DirectorController::class, 'edit'])->name('directors.edit');
    Route::put('directors/{director}', [DirectorController::class, 'update'])->name('directors.update');
    Route::delete('directors/{director}', [DirectorController::class, 'destroy'])->name('directors.destroy');

    // VAST Ads
    Route::get('vastads', [\App\Http\Controllers\Admin\VastAdController::class, 'index'])->name('vastads.index');
    Route::get('vastads/get-targets', [\App\Http\Controllers\Admin\VastAdController::class, 'getTargets'])->name('vastads.getTargets');
    Route::get('vastads/create', [\App\Http\Controllers\Admin\VastAdController::class, 'create'])->name('vastads.create');
    Route::post('vastads', [\App\Http\Controllers\Admin\VastAdController::class, 'store'])->name('vastads.store');
    Route::get('vastads/{vastAd}/edit', [\App\Http\Controllers\Admin\VastAdController::class, 'edit'])->name('vastads.edit');
    Route::put('vastads/{vastAd}', [\App\Http\Controllers\Admin\VastAdController::class, 'update'])->name('vastads.update');
    Route::delete('vastads/{vastAd}', [\App\Http\Controllers\Admin\VastAdController::class, 'destroy'])->name('vastads.destroy');
    Route::post('vastads/bulk-action', [\App\Http\Controllers\Admin\VastAdController::class, 'bulkAction'])->name('vastads.bulkAction');
    Route::patch('vastads/update-status/{vastAd}', [\App\Http\Controllers\Admin\VastAdController::class, 'updateStatus'])->name('vastads.updateStatus');
});

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/settings/logo', [SettingsController::class, 'edit'])->name('admin.settings.logo');
    Route::post('/settings/logo', [SettingsController::class, 'update'])->name('admin.settings.logo.update');
    Route::get('/settings/module', [SettingsController::class, 'module'])->name('admin.settings.module');
    Route::get('/settings/misc', [SettingsController::class, 'misc'])->name('admin.settings.misc');
    Route::get('/settings/mail', [SettingsController::class, 'mail'])->name('admin.settings.mail');
    Route::get('/settings/notification', [SettingsController::class, 'notification'])->name('admin.settings.notification');
    Route::get('/settings/payment-method', [SettingsController::class, 'paymentMethod'])->name('admin.settings.paymentMethod');
    Route::post('/settings/payment-method', [SettingsController::class, 'updatePaymentMethod'])->name('admin.settings.payment.update');
    Route::get('/settings/language-settings', [SettingsController::class, 'languageSettings'])->name('admin.settings.languageSettings');
    Route::post('/settings/language-settings', [SettingsController::class, 'updateLanguageSettings'])->name('admin.settings.language.update');
    Route::get('/settings/language-load', [SettingsController::class, 'loadLanguageKeys'])->name('admin.settings.language.load');
    Route::get('/settings/notification-configuration', [SettingsController::class, 'notificationConfiguration'])->name('admin.settings.notificationConfiguration');
    Route::post('/settings/notification-configuration', [SettingsController::class, 'updateNotificationConfiguration'])->name('admin.settings.notificationConfig.update');
    Route::get('/settings/currency-settings', [SettingsController::class, 'currencySettings'])->name('admin.settings.currencySettings');
    Route::post('/settings/currency-settings', [SettingsController::class, 'storeCurrency'])->name('admin.settings.currency.store');
    Route::get('/settings/currency-settings/{id}/edit', [SettingsController::class, 'editCurrency'])->name('admin.settings.currency.edit');
    Route::put('/settings/currency-settings/{id}', [SettingsController::class, 'updateCurrency'])->name('admin.settings.currency.update');
    Route::delete('/settings/currency-settings/{id}', [SettingsController::class, 'destroyCurrency'])->name('admin.settings.currency.destroy');
    Route::get('/settings/storage-settings', [SettingsController::class, 'storageSettings'])->name('admin.settings.storageSettings');
    Route::post('/settings/storage-settings', [SettingsController::class, 'updateStorageSettings'])->name('admin.settings.storage.update');
    Route::get('/settings/seo-settings', [SettingsController::class, 'seoSettings'])->name('admin.settings.seoSettings');
    Route::post('/settings/seo-settings', [SettingsController::class, 'updateSeoSettings'])->name('admin.settings.seo.update');
    Route::get('/settings/admin-settings', [SettingsController::class, 'admSettings'])->name('admin.settings.admSettings');
    Route::post('/settings/admin-settings', [SettingsController::class, 'updateAdmSettings'])->name('admin.settings.adm.update');
    Route::get('/settings/content-settings', [SettingsController::class, 'contentSettings'])->name('admin.settings.contentSettings');
    Route::post('/settings/content-settings', [SettingsController::class, 'updateContentSettings'])->name('admin.settings.content.update');
    Route::get('/settings/database-settings', [SettingsController::class, 'databaseSettings'])->name('admin.settings.databaseSettings');
    Route::post('/settings/database-settings', [SettingsController::class, 'updateDatabaseSettings'])->name('admin.settings.database.update');
    
    // Database Management Routes
    Route::get('/database/count/{type}', [SettingsController::class, 'getCount'])->name('admin.database.count');
    Route::delete('/database/delete-all/{type}', [SettingsController::class, 'deleteAll'])->name('admin.database.deleteAll');

    // TMDB Routes
    Route::get('/tmdb', [\App\Http\Controllers\Admin\TmdbController::class, 'index'])->name('admin.tmdb.index');
    Route::post('/tmdb/search', [\App\Http\Controllers\Admin\TmdbController::class, 'search'])->name('admin.tmdb.search');
    Route::post('/tmdb/fetch', [\App\Http\Controllers\Admin\TmdbController::class, 'fetch'])->name('admin.tmdb.fetch');
    Route::delete('/tmdb/{id}', [\App\Http\Controllers\Admin\TmdbController::class, 'destroy'])->name('admin.tmdb.destroy');
    Route::post('/tmdb/filter', [\App\Http\Controllers\Admin\TmdbController::class, 'filter'])->name('admin.tmdb.filter');
});

Route::post('/clear-cache-config', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');

    return response()->json(['message' => 'Cache and config cleared successfully']);
})->name('clear.cache.config');

// Public Frontend
Route::get('/', function () {
    return view('frontend.app');
})->name('frontend.home');

// routes/web.php
Route::get('/{any}', function () {
    return view('frontend.app'); // Blade view with <div id="frontend-app">
})->where('any', '.*');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// protected routes
Route::middleware('sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/sanctum/csrf-cookie', fn () => response()->noContent());
//Route::post('/login', [LoginController::class, 'login'])->middleware('web');