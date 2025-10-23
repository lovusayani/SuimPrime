<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = [
            'app_name' => Setting::get('app_name', 'SuimPrime'),
            'user_app_name' => Setting::get('user_app_name', 'SuimPrime User'),
            'helpline_number' => Setting::get('helpline_number', ''),
            'inquriy_email' => Setting::get('inquriy_email', ''),
            'short_description' => Setting::get('short_description', ''),
            'mini_logo' => Setting::get('mini_logo') ? asset(Setting::get('mini_logo')) : asset('img/logo/mini_logo.png'),
            'dark_logo' => Setting::get('dark_logo') ? asset(Setting::get('dark_logo')) : asset('public/assets/logo/dark_logo.png'),
            'favicon' => Setting::get('favicon') ? asset(Setting::get('favicon')) : asset('img/logo/favicon.png'),
        ];

        return response()->json($settings);
    }
}