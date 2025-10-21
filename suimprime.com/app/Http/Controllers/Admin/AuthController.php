<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() {
        return view('admin.login');
    }

    public function loginSubmit(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('error', 'Invalid credentials or not admin.');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}