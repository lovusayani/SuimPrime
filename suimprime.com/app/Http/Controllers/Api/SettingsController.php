<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    public function index()
    {
        $normalize = function ($value, $defaultPath) {
            if (!$value) {
                return asset($defaultPath);
            }
            // If already absolute, return as-is
            if (preg_match('/^https?:\/\//i', $value)) {
                return $value;
            }
            // Strip leading 'public/' if present because public is the web root
            if (Str::startsWith($value, 'public/')) {
                $value = substr($value, 7);
            }
            return asset($value);
        };

        $settings = [
            'app_name' => Setting::get('app_name', 'SuimPrime'),
            'user_app_name' => Setting::get('user_app_name', 'SuimPrime User'),
            'helpline_number' => Setting::get('helpline_number', ''),
            'inquriy_email' => Setting::get('inquriy_email', ''),
            'short_description' => Setting::get('short_description', ''),
            'mini_logo' => $normalize(Setting::get('mini_logo'), 'img/logo/mini_logo.png'),
            'dark_logo' => $normalize(Setting::get('dark_logo'), 'assets/logo/dark_logo.png'),
            'favicon' => $normalize(Setting::get('favicon'), 'img/logo/favicon.png'),
            'playstore_url' => Setting::get('playstore_url', ''),
            'appstore_url' => Setting::get('appstore_url', ''),
        ];

        return response()->json($settings);
    }
}