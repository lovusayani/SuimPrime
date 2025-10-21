<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomCors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Determine allowed origin dynamically to support local dev (vite) and production
        $origin = $request->headers->get('Origin');

        // Default allowed origins (production)
        $allowed = [
            'https://suimprime.com',
            'http://127.0.0.1:8000',
            'http://127.0.0.1:5173',
            'http://localhost:5173',
            'http://localhost:8000',
        ];

        $allowOrigin = in_array($origin, $allowed, true) ? $origin : (env('APP_ENV') === 'local' && $origin ? $origin : 'https://suimprime.com');

        // Handle preflight quickly
        if ($request->getMethod() === 'OPTIONS') {
            $response = response('', 204);
            $response->headers->set('Access-Control-Allow-Origin', $allowOrigin);
            $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization, X-CSRF-TOKEN');
            $response->headers->set('Access-Control-Allow-Credentials', 'true');
            return $response;
        }

        $response = $next($request);
        $response->headers->set('Access-Control-Allow-Origin', $allowOrigin);
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization, X-CSRF-TOKEN');
        $response->headers->set('Access-Control-Allow-Credentials', 'true');

        return $response;
    }
}