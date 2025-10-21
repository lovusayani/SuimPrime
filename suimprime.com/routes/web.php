<?php

use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DirectorController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
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
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::patch('/users/{id}/toggle', [UserController::class, 'toggleSubscription'])->name('admin.users.toggle');
    Route::resource('/content', ContentController::class, ['as' => 'admin']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// Add other admin routes here, all protected by 'auth' and 'is_admin' middleware

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('media-library', [MediaController::class, 'index'])->name('media.index');
    Route::get('/getMediaStore', [MediaController::class, 'getMedia'])->name('media.library');
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
    Route::get('movies/{movies}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    // Update Restiricted
    Route::put('movies/{movie}/restricted', [MovieController::class, 'updateRestricted'])->name('movies.updateRestricted');
    // admin.movie.destroy
    Route::delete('movies/{movies}', [MovieController::class, 'destroy'])->name('movies.destroy');
    // admin.movie.store
    Route::post('movies', [MovieController::class, 'store'])->name('movies.store');
    // admin.movie.update
    Route::put('movies/{movies}', [MovieController::class, 'update'])->name('movies.update');
    // admin.movie.bulkAction
    Route::post('movies/bulk-action', [GenreController::class, 'bulkAction'])->name('movies.bulkAction');
    Route::patch('movies/update-status/{movies}', [GenreController::class, 'updateStatus'])->name('movies.updateStatus');
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
});

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/settings/logo', [SettingsController::class, 'edit'])->name('admin.settings.logo');
    Route::post('/settings/logo', [SettingsController::class, 'update'])->name('admin.settings.logo.update');
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