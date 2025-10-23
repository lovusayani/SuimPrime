<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class BusinessSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'app_name' => 'SuimPrime',
            'user_app_name' => 'SuimPrime User',
            'helpline_number' => '+1-234-567-8900',
            'inquriy_email' => 'support@suimprime.com',
            'short_description' => 'Your premium streaming entertainment platform',
            'mini_logo' => 'img/logo/mini_logo.png',
            'dark_logo' => 'img/logo/dark_logo.png',
            'favicon' => 'img/logo/favicon.png',
        ];

        foreach ($settings as $key => $value) {
            // Only create if it doesn't exist
            if (!Setting::where('key', $key)->exists()) {
                Setting::create([
                    'key' => $key,
                    'value' => $value,
                ]);
            }
        }

        // Module settings
        $moduleSettings = [
            'movie' => '1',
            'tvshow' => '1',
            'livetv' => '0',
            'video' => '1',
            'enable_tmdb_api' => '0',
            'tmdb_api_key' => '',
        ];

        foreach ($moduleSettings as $key => $value) {
            if (!Setting::where('key', $key)->exists()) {
                Setting::create([
                    'key' => $key,
                    'value' => $value,
                ]);
            }
        }
    }
}
