<?php

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Illuminate\Http\Middleware\HandleCors;



return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
          $middleware->append(HandleCors::class);
          $middleware->append(\App\Http\Middleware\CustomCors::class);
        $middleware->alias([
            'auth' => Authenticate::class,
            'is_admin' => IsAdmin::class,
            'sanctum' => EnsureFrontendRequestsAreStateful::class,
        ]);
        $middleware->group('web', [
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,          // ✅ Enables CSRF protection
            SubstituteBindings::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

// add Sanctum configuration
/*
// 👇 Define the 'web' middleware group manually
    $middleware->group('web', [
        EncryptCookies::class,
        AddQueuedCookiesToResponse::class,
        StartSession::class,
        ShareErrorsFromSession::class,
        VerifyCsrfToken::class,          // ✅ Enables CSRF protection
        SubstituteBindings::class,
    ]);
    $middleware->alias([
        'auth' => Authenticate::class,
        'is_admin' => IsAdmin::class,
        // add Sanctum middleware`
        'sanctum' => EnsureFrontendRequestsAreStateful::class,  
    ]);

    */