<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Currency;
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

    public function paymentMethod()
    {
        // If you store payment settings in DB, load them here and pass to the view.
        return view('admin.settings.payment-method');
    }

    public function updatePaymentMethod(Request $request)
    {
        // Payment methods toggles and credentials
        $paymentMethods = [
            'razor_payment_method', 'razorpay_secretkey', 'razorpay_publickey',
            'str_payment_method', 'stripe_secretkey', 'stripe_publickey',
            'paystack_payment_method', 'paystack_secretkey', 'paystack_publickey',
            'paypal_payment_method', 'paypal_secretkey', 'paypal_clientid',
            'flutterwave_payment_method', 'flutterwave_secretkey', 'flutterwave_publickey',
            'cinet_payment_method', 'cinet_siteid', 'cinet_api_key', 'cinet_Secret_key',
            'sadad_payment_method', 'sadad_Sadadkey', 'sadad_id_key', 'sadad_Domain',
            'airtel_payment_method', 'airtel_money_secretkey', 'airtel_money_client_id',
            'phonepe_payment_method', 'phonepe_App_id', 'phonepe_Merchant_id', 'phonepe_salt_key', 'phonepe_salt_index',
            'midtrans_payment_method', 'midtrans_client_id', 'midtrans_server_key',
            'iap_payment_method', 'entertainment_id', 'apple_api_key', 'google_api_key',
        ];

        foreach ($paymentMethods as $key) {
            // For toggle fields (checkboxes)
            if (str_ends_with($key, '_payment_method')) {
                Setting::set($key, $request->has($key) ? '1' : '0');
            } else {
                // For text fields
                Setting::set($key, $request->input($key, ''));
            }
        }

        return redirect()->route('admin.settings.paymentMethod')->with('success', 'Payment methods updated successfully.');
    }

    public function languageSettings()
    {
        return view('admin.settings.language-settings');
    }

    public function loadLanguageKeys(Request $request)
    {
        $languageId = $request->input('language_id');
        $fileId = $request->input('file_id');

        if (!$languageId || !$fileId) {
            return response()->json(['success' => false, 'message' => 'Invalid parameters']);
        }

        // Path to the language file
        $langPath = resource_path("lang/{$languageId}/{$fileId}.php");

        if (!file_exists($langPath)) {
            return response()->json(['success' => false, 'message' => 'Language file not found', 'data' => []]);
        }

        // Load the translation keys
        $translations = include $langPath;

        return response()->json(['success' => true, 'data' => $translations]);
    }

    public function updateLanguageSettings(Request $request)
    {
        $request->validate([
            'language_id' => 'required|string',
            'file_id' => 'required|string',
            'lang_data' => 'required|array',
        ]);

        $languageId = $request->input('language_id');
        $fileId = $request->input('file_id');
        $langData = $request->input('lang_data');

        // Create language directory if it doesn't exist
        $langDir = resource_path("lang/{$languageId}");
        if (!file_exists($langDir)) {
            mkdir($langDir, 0755, true);
        }

        // Path to the language file
        $langPath = resource_path("lang/{$languageId}/{$fileId}.php");

        // Prepare the content
        $content = "<?php\n\nreturn [\n";
        foreach ($langData as $key => $value) {
            $key = addslashes($key);
            $value = addslashes($value);
            $content .= "    '{$key}' => '{$value}',\n";
        }
        $content .= "];\n";

        // Write to file
        file_put_contents($langPath, $content);

        return redirect()->route('admin.settings.languageSettings')->with('success', 'Language translations updated successfully.');
    }

    public function notificationConfiguration()
    {
        return view('admin.settings.notification-configuration');
    }

    public function updateNotificationConfiguration(Request $request)
    {
        $request->validate([
            'expiry_plan' => 'required|numeric|min:0',
            'upcoming' => 'required|numeric|min:0',
            'continue_watch' => 'required|numeric|min:0',
            // Additional notification settings validation
            'admin_notification_email' => 'nullable|email',
            'email_notifications_enabled' => 'nullable|boolean',
            'push_notifications_enabled' => 'nullable|boolean',
            'sms_notifications_enabled' => 'nullable|boolean',
            'notification_frequency' => 'nullable|string|in:realtime,hourly,daily,weekly',
            'maintenance_notification_message' => 'nullable|string|max:500',
        ]);

        // Save existing notification configuration settings
        Setting::set('expiry_plan', $request->input('expiry_plan'));
        Setting::set('upcoming', $request->input('upcoming'));
        Setting::set('continue_watch', $request->input('continue_watch'));

        // Save additional notification & communication settings if provided
        if ($request->filled('admin_notification_email')) {
            Setting::set('admin_notification_email', $request->input('admin_notification_email'));
        }
        
        Setting::set('email_notifications_enabled', $request->has('email_notifications_enabled') ? '1' : '0');
        Setting::set('push_notifications_enabled', $request->has('push_notifications_enabled') ? '1' : '0');
        Setting::set('sms_notifications_enabled', $request->has('sms_notifications_enabled') ? '1' : '0');
        
        if ($request->filled('notification_frequency')) {
            Setting::set('notification_frequency', $request->input('notification_frequency'));
        }
        
        if ($request->filled('maintenance_notification_message')) {
            Setting::set('maintenance_notification_message', $request->input('maintenance_notification_message'));
        }

        return redirect()->route('admin.settings.notificationConfiguration')->with('success', 'Notification configuration updated successfully.');
    }

    public function currencySettings()
    {
        $currencies = Currency::orderBy('is_primary', 'desc')->orderBy('id', 'asc')->get();
        return view('admin.settings.currency-settings', compact('currencies'));
    }

    public function storeCurrency(Request $request)
    {
        $request->validate([
            'currency_name' => 'required|string|max:255',
            'currency_symbol' => 'required|string|max:10',
            'currency_code' => 'required|string|max:10',
            'currency_position' => 'required|string',
            'thousand_separator' => 'required|string|max:5',
            'decimal_separator' => 'required|string|max:5',
            'no_of_decimal' => 'required|integer|min:0',
        ]);

        // If this currency is set as primary, unset all other primary currencies
        if ($request->has('is_primary')) {
            Currency::where('is_primary', true)->update(['is_primary' => false]);
        }

        Currency::create([
            'currency_name' => $request->currency_name,
            'currency_symbol' => $request->currency_symbol,
            'currency_code' => $request->currency_code,
            'is_primary' => $request->has('is_primary'),
            'currency_position' => $request->currency_position,
            'thousand_separator' => $request->thousand_separator,
            'decimal_separator' => $request->decimal_separator,
            'no_of_decimal' => $request->no_of_decimal,
        ]);

        return redirect()->route('admin.settings.currencySettings')->with('success', 'Currency added successfully.');
    }

    public function editCurrency($id)
    {
        $currency = Currency::findOrFail($id);
        return response()->json($currency);
    }

    public function updateCurrency(Request $request, $id)
    {
        $currency = Currency::findOrFail($id);

        $request->validate([
            'currency_name' => 'required|string|max:255',
            'currency_symbol' => 'required|string|max:10',
            'currency_code' => 'required|string|max:10',
            'currency_position' => 'required|string',
            'thousand_separator' => 'required|string|max:5',
            'decimal_separator' => 'required|string|max:5',
            'no_of_decimal' => 'required|integer|min:0',
        ]);

        // If this currency is set as primary, unset all other primary currencies
        if ($request->has('is_primary')) {
            Currency::where('id', '!=', $id)->where('is_primary', true)->update(['is_primary' => false]);
        }

        $currency->update([
            'currency_name' => $request->currency_name,
            'currency_symbol' => $request->currency_symbol,
            'currency_code' => $request->currency_code,
            'is_primary' => $request->has('is_primary'),
            'currency_position' => $request->currency_position,
            'thousand_separator' => $request->thousand_separator,
            'decimal_separator' => $request->decimal_separator,
            'no_of_decimal' => $request->no_of_decimal,
        ]);

        return redirect()->route('admin.settings.currencySettings')->with('success', 'Currency updated successfully.');
    }

    public function destroyCurrency($id)
    {
        $currency = Currency::findOrFail($id);
        
        // Don't allow deletion of primary currency
        if ($currency->is_primary) {
            return redirect()->route('admin.settings.currencySettings')->with('error', 'Cannot delete primary currency.');
        }

        $currency->delete();

        return redirect()->route('admin.settings.currencySettings')->with('success', 'Currency deleted successfully.');
    }

    public function storageSettings()
    {
        return view('admin.settings.storage-settings');
    }

    public function updateStorageSettings(Request $request)
    {
        // Validate S3 fields if S3 is enabled
        if ($request->has('s3') && $request->input('s3') == '1') {
            $request->validate([
                'aws_access_key' => 'required|string',
                'aws_secret_key' => 'required|string',
                'aws_region' => 'required|string',
                'aws_bucket' => 'required|string',
                'aws_path_style' => 'required|string',
            ]);
        }

        // Save storage settings
        Setting::set('local', $request->has('local') ? '1' : '0');
        Setting::set('s3', $request->has('s3') ? '1' : '0');

        // Save AWS S3 settings if S3 is enabled
        if ($request->has('s3') && $request->input('s3') == '1') {
            Setting::set('aws_access_key', $request->input('aws_access_key', ''));
            Setting::set('aws_secret_key', $request->input('aws_secret_key', ''));
            Setting::set('aws_region', $request->input('aws_region', ''));
            Setting::set('aws_bucket', $request->input('aws_bucket', ''));
            Setting::set('aws_path_style', $request->input('aws_path_style', 'false'));
        }

        return redirect()->route('admin.settings.storageSettings')->with('success', 'Storage settings updated successfully.');
    }

    public function seoSettings()
    {
        return view('admin.settings.seo-settings');
    }

    public function updateSeoSettings(Request $request)
    {
        $request->validate([
            'meta_title' => 'required|string|max:100',
            'google_site_verification' => 'required|string',
            'meta_keywords' => 'required|string',
            'canonical_url' => 'required|url',
            'short_description' => 'required|string|max:200',
            'seo_image_file' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        // Handle SEO image upload
        if ($request->hasFile('seo_image_file')) {
            $file = $request->file('seo_image_file');
            $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/seo', $filename, 'public');
            Setting::set('seo_image', '/storage/' . $path);
        }

        // Save SEO settings
        Setting::set('meta_title', $request->input('meta_title'));
        Setting::set('google_site_verification', $request->input('google_site_verification'));
        Setting::set('meta_keywords', $request->input('meta_keywords'));
        Setting::set('canonical_url', $request->input('canonical_url'));
        Setting::set('short_description', $request->input('short_description'));

        return redirect()->route('admin.settings.seoSettings')->with('success', 'SEO settings updated successfully.');
    }

    public function update(Request $request)
    {
        // Validate Business Settings
        $request->validate([
            'app_name' => 'nullable|string|max:255',
            'user_app_name' => 'nullable|string|max:255',
            'helpline_number' => 'nullable|string|max:50',
            'inquriy_email' => 'nullable|email|max:255',
            'short_description' => 'nullable|string|max:500',
            'mini_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'dark_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,jpg,png,gif,ico|max:1024',
        ]);

        // Save Business Settings text fields
        if ($request->filled('app_name')) {
            Setting::set('app_name', $request->input('app_name'));
        }
        if ($request->filled('user_app_name')) {
            Setting::set('user_app_name', $request->input('user_app_name'));
        }
        if ($request->filled('helpline_number')) {
            Setting::set('helpline_number', $request->input('helpline_number'));
        }
        if ($request->filled('inquriy_email')) {
            Setting::set('inquriy_email', $request->input('inquriy_email'));
        }
        if ($request->filled('short_description')) {
            Setting::set('short_description', $request->input('short_description'));
        }

        // Handle logo uploads
        if ($request->hasFile('mini_logo') && $request->file('mini_logo')->isValid()) {
            $file = $request->file('mini_logo');
            $filename = 'mini-logo-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/logos', $filename, 'public');
            Setting::set('mini_logo', 'storage/' . $path);
        }

        if ($request->hasFile('dark_logo') && $request->file('dark_logo')->isValid()) {
            $file = $request->file('dark_logo');
            $filename = 'dark-logo-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/logos', $filename, 'public');
            Setting::set('dark_logo', 'storage/' . $path);
        }

        if ($request->hasFile('favicon') && $request->file('favicon')->isValid()) {
            $file = $request->file('favicon');
            $filename = 'favicon-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/logos', $filename, 'public');
            Setting::set('favicon', 'storage/' . $path);
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

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    public function admSettings()
    {
        return view('admin.settings.admsettings');
    }

    public function updateAdmSettings(Request $request)
    {
        // Validate admin settings
        $request->validate([
            'max_users_allowed' => 'nullable|integer|min:1',
            'user_registration_enabled' => 'nullable|boolean',
            'email_verification_required' => 'nullable|boolean',
            'default_user_role' => 'nullable|string|in:user,premium,admin',
            'login_rate_limit' => 'nullable|integer|min:1|max:100',
            'session_timeout_minutes' => 'nullable|integer|min:5|max:1440',
            'enable_2fa' => 'nullable|boolean',
            'cache_timeout_hours' => 'nullable|integer|min:1|max:168',
            'maintenance_mode' => 'nullable|boolean',
        ]);

        // Save User Management Settings
        if ($request->has('max_users_allowed')) {
            Setting::set('max_users_allowed', $request->input('max_users_allowed', '1000'));
        }
        Setting::set('user_registration_enabled', $request->has('user_registration_enabled') ? '1' : '0');
        Setting::set('email_verification_required', $request->has('email_verification_required') ? '1' : '0');
        if ($request->filled('default_user_role')) {
            Setting::set('default_user_role', $request->input('default_user_role', 'user'));
        }

        // Save Security & Performance Settings
        if ($request->has('login_rate_limit')) {
            Setting::set('login_rate_limit', $request->input('login_rate_limit', '5'));
        }
        if ($request->has('session_timeout_minutes')) {
            Setting::set('session_timeout_minutes', $request->input('session_timeout_minutes', '120'));
        }
        Setting::set('enable_2fa', $request->has('enable_2fa') ? '1' : '0');
        if ($request->has('cache_timeout_hours')) {
            Setting::set('cache_timeout_hours', $request->input('cache_timeout_hours', '24'));
        }
        Setting::set('maintenance_mode', $request->has('maintenance_mode') ? '1' : '0');

        return redirect()->route('admin.settings.admSettings')->with('success', 'Admin settings updated successfully.');
    }

    public function contentSettings()
    {
        return view('admin.settings.content-settings');
    }

    public function updateContentSettings(Request $request)
    {
        // Validate content settings
        $request->validate([
            'auto_approve_content' => 'nullable|boolean',
            'max_file_size_mb' => 'nullable|integer|min:1|max:2048',
            'allowed_video_formats' => 'nullable|string',
            'content_moderation_enabled' => 'nullable|boolean',
            'default_video_quality' => 'nullable|string|in:480p,720p,1080p,4k',
            'enable_content_comments' => 'nullable|boolean',
            'enable_content_ratings' => 'nullable|boolean',
            'content_per_page' => 'nullable|integer|min:1|max:100',
            'allowed_image_formats' => 'nullable|string',
            'enable_content_watermark' => 'nullable|boolean',
            'auto_generate_thumbnails' => 'nullable|boolean',
        ]);

        // Save Content Management Settings
        Setting::set('auto_approve_content', $request->has('auto_approve_content') ? '1' : '0');
        if ($request->has('max_file_size_mb')) {
            Setting::set('max_file_size_mb', $request->input('max_file_size_mb', '500'));
        }
        if ($request->filled('allowed_video_formats')) {
            Setting::set('allowed_video_formats', $request->input('allowed_video_formats', 'mp4,mkv,avi,mov'));
        }
        Setting::set('content_moderation_enabled', $request->has('content_moderation_enabled') ? '1' : '0');

        // Save Additional Content Settings
        if ($request->filled('default_video_quality')) {
            Setting::set('default_video_quality', $request->input('default_video_quality', '720p'));
        }
        Setting::set('enable_content_comments', $request->has('enable_content_comments') ? '1' : '0');
        Setting::set('enable_content_ratings', $request->has('enable_content_ratings') ? '1' : '0');
        if ($request->has('content_per_page')) {
            Setting::set('content_per_page', $request->input('content_per_page', '12'));
        }
        if ($request->filled('allowed_image_formats')) {
            Setting::set('allowed_image_formats', $request->input('allowed_image_formats', 'jpg,jpeg,png,webp,gif'));
        }
        Setting::set('enable_content_watermark', $request->has('enable_content_watermark') ? '1' : '0');
        Setting::set('auto_generate_thumbnails', $request->has('auto_generate_thumbnails') ? '1' : '0');

        return redirect()->route('admin.settings.contentSettings')->with('success', 'Content settings updated successfully.');
    }

    public function databaseSettings()
    {
        return view('admin.settings.database-settings');
    }

    public function updateDatabaseSettings(Request $request)
    {
        // This method is placeholder for future database settings functionality
        // Validation and processing will be added when specific database settings are implemented
        
        return redirect()->route('admin.settings.databaseSettings')->with('success', 'Database settings updated successfully.');
    }
}