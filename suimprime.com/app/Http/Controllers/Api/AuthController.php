<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        // Create token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Registration successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (! Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            // If a bearer token was used, delete the current access token
            try {
                if ($request->bearerToken()) {
                    $user->currentAccessToken()?->delete();
                }
            } catch (\Throwable $e) {
                // ignore
            }

            // Also delete all tokens for the user to be safe
            try {
                $user->tokens()->delete();
            } catch (\Throwable $e) {
                // ignore
            }
        }

        // If using session/cookie based auth, also logout and invalidate the session
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        } catch (\Throwable $e) {
            // ignore
        }

        $response = response()->json([
            'message' => 'Logged out successfully',
        ]);

        // Clear session and XSRF cookies on client. Use the same domain/path attributes
        // so the browser will remove the cookies that were previously set.
        try {
            $sessionCookie = config('session.cookie');
            $domain = config('session.domain') ?: $request->getHost();
            $path = config('session.path', '/');
            $sameSite = config('session.same_site', 'lax');
            $secure = config('session.secure', false);

            // Expire session cookie
            Cookie::queue(Cookie::make($sessionCookie, '', -2628000, $path, $domain, $secure, true, false, $sameSite));

            // Expire XSRF cookie (not httponly)
            Cookie::queue(Cookie::make('XSRF-TOKEN', '', -2628000, $path, $domain, $secure, false, false, $sameSite));
        } catch (\Throwable $e) {
            // ignore
        }

        return $response;
    }

    // Get authenticated user
    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}