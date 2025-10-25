<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    // Get setting by key with caching
    public static function get($key, $default = null)
    {
        return cache()->remember("setting_{$key}", 3600, function () use ($key, $default) {
            $setting = self::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    // Save or update setting and clear cache
    public static function set($key, $value)
    {
        cache()->forget("setting_{$key}");
        return self::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}