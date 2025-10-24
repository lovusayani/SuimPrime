<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PaymentGateway extends Model
{
    protected $fillable = [
        'name',
        'display_name',
        'is_active',
        'is_sandbox',
        'credentials',
        'config',
        'webhook_url'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_sandbox' => 'boolean',
        'credentials' => 'array',
        'config' => 'array',
    ];

    // Scope for active gateways
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for production gateways
    public function scopeProduction($query)
    {
        return $query->where('is_sandbox', false);
    }

    // Scope for sandbox gateways
    public function scopeSandbox($query)
    {
        return $query->where('is_sandbox', true);
    }
}
