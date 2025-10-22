<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    public function edit()
    {
        $data = [
            'site_name' => Setting::get('site_name', 'SuimPrime'),
            'logo_normal' => Setting::get('logo_normal', '/assets/logo.png'),
            'logo_dark' => Setting::get('logo_dark', '/assets/logo-dark.png'),
            'logo_mini' => Setting::get('logo_mini', '/assets/logo-mini.png'),
        ];

        return view('admin.settings.edit', $data);
    }

    public function module()
    {
        $data = [
            'movie' => Setting::get('movie', 0),
            'tvshow' => Setting::get('tvshow', 0),
            'livetv' => Setting::get('livetv', 0),
            'video' => Setting::get('video', 0),
            'enable_tmdb_api' => Setting::get('enable_tmdb_api', 0),
            'tmdb_api_key' => Setting::get('tmdb_api_key', ''),
        ];

        return view('admin.settings.module', $data);
    }

    public function misc()
    {
        $data = [
            'google_analytics' => Setting::get('google_analytics', ''),
            'default_language' => Setting::get('default_language', 'en'),
            'default_time_zone' => Setting::get('default_time_zone', 'UTC'),
        ];

        return view('admin.settings.misc', $data);
    }

    public function mail()
    {
        $data = [
            'email' => Setting::get('email', ''),
            'mail_driver' => Setting::get('mail_driver', env('MAIL_MAILER', 'smtp')),
            'mail_host' => Setting::get('mail_host', env('MAIL_HOST', 'smtp.gmail.com')),
            'mail_port' => Setting::get('mail_port', env('MAIL_PORT', 587)),
            'mail_encryption' => Setting::get('mail_encryption', env('MAIL_ENCRYPTION', 'tls')),
            'mail_username' => Setting::get('mail_username', env('MAIL_USERNAME', '')),
            'mail_password' => Setting::get('mail_password', env('MAIL_PASSWORD', '')),
            'mail_from' => Setting::get('mail_from', env('MAIL_FROM_ADDRESS', '')),
            'from_name' => Setting::get('from_name', env('MAIL_FROM_NAME', '')),
        ];

        return view('admin.settings.mail', $data);
    }

    public function notification()
    {
        // In this basic implementation we don't need to pass preloaded template data.
        // If you have notification templates in DB, load them here and pass to the view.
        return view('admin.settings.notification');
    }

    public function update(Request $request)
    {
        // handle simple text inputs
        $request->validate([
            'site_name' => 'nullable|string|max:255',
        ]);

        if ($request->filled('site_name')) {
            Setting::set('site_name', $request->input('site_name'));
        }

        // handle optional file uploads for logos
        foreach (['logo_normal', 'logo_dark', 'logo_mini'] as $key) {
            if ($request->hasFile($key) && $request->file($key)->isValid()) {
                $file = $request->file($key);
                $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('uploads/logos', $filename, 'public');
                Setting::set($key, '/storage/' . $path);
            }
        }

        // Save module-related toggles if present
        if ($request->hasAny(['movie', 'tvshow', 'livetv', 'video', 'enable_tmdb_api', 'tmdb_api_key'])) {
            Setting::set('movie', $request->has('movie') ? 1 : 0);
            Setting::set('tvshow', $request->has('tvshow') ? 1 : 0);
            Setting::set('livetv', $request->has('livetv') ? 1 : 0);
            Setting::set('video', $request->has('video') ? 1 : 0);
            Setting::set('enable_tmdb_api', $request->has('enable_tmdb_api') ? 1 : 0);
            if ($request->filled('tmdb_api_key')) {
                Setting::set('tmdb_api_key', $request->input('tmdb_api_key'));
            }
        }

        // Save misc settings if present
        if ($request->hasAny(['google_analytics', 'default_language', 'default_time_zone'])) {
            Setting::set('google_analytics', $request->input('google_analytics', ''));
            Setting::set('default_language', $request->input('default_language', 'en'));
            Setting::set('default_time_zone', $request->input('default_time_zone', 'UTC'));
        }

        // Save mail settings if present
        if ($request->hasAny(['email', 'mail_driver', 'mail_host', 'mail_port', 'mail_encryption', 'mail_username', 'mail_password', 'mail_from', 'from_name'])) {
            Setting::set('email', $request->input('email', ''));
            Setting::set('mail_driver', $request->input('mail_driver', env('MAIL_MAILER', 'smtp')));
            Setting::set('mail_host', $request->input('mail_host', env('MAIL_HOST', 'smtp.gmail.com')));
            Setting::set('mail_port', $request->input('mail_port', env('MAIL_PORT', 587)));
            Setting::set('mail_encryption', $request->input('mail_encryption', env('MAIL_ENCRYPTION', 'tls')));
            Setting::set('mail_username', $request->input('mail_username', ''));
            Setting::set('mail_password', $request->input('mail_password', ''));
            Setting::set('mail_from', $request->input('mail_from', env('MAIL_FROM_ADDRESS', '')));
            Setting::set('from_name', $request->input('from_name', env('MAIL_FROM_NAME', '')));
        }

        return redirect()->route('admin.settings.logo')->with('success', 'Settings updated.');
    }
}