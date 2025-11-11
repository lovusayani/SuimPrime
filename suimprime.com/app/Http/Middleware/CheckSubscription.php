<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login to access this content',
                'redirect' => '/login'
            ], 401);
        }

        $user = Auth::user();
        
        // Check if user has an active subscription
        // You can modify this logic based on your subscription model
        if (!$user->hasActiveSubscription()) {
            return response()->json([
                'success' => false,
                'message' => 'This content requires an active subscription',
                'redirect' => '/subscription-plan'
            ], 403);
        }

        return $next($request);
    }
}