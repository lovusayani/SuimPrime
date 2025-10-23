<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'duration', 'duration_type', 'duration_value', 
        'level', 'discount', 'discount_percentage', 'status', 'description',
        'plan_limits', 'download_options', 'supported_device_types',
        'device_limit_value', 'profile_limit_value'
    ];

    protected $casts = [
        'status' => 'boolean',
        'price' => 'decimal:2',
        'discount' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'plan_limits' => 'array',
        'download_options' => 'array',
        'supported_device_types' => 'array',
    ];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    /**
     * Calculate total price after discount
     */
    public function getTotalPriceAttribute()
    {
        if ($this->discount_percentage > 0) {
            return max(0, $this->price - ($this->price * $this->discount_percentage / 100));
        }
        return max(0, $this->price - $this->discount);
    }

    /**
     * Get formatted duration
     */
    public function getFormattedDurationAttribute()
    {
        if ($this->duration_type && $this->duration_value) {
            return $this->duration_value . ' ' . $this->duration_type . ($this->duration_value > 1 ? 's' : '');
        }
        return $this->duration ?? '-';
    }
}