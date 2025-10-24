<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSubscription extends Model
{
    protected $fillable = [
        'user_id',
        'plan_id',
        'transaction_id',
        'status',
        'starts_at',
        'ends_at',
        'cancelled_at',
        'features'
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'features' => 'array',
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(PaymentTransaction::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active')
                    ->where('ends_at', '>', now());
    }

    public function scopeExpired($query)
    {
        return $query->where('ends_at', '<=', now());
    }

    // Helper methods
    public function isActive(): bool
    {
        return $this->status === 'active' && $this->ends_at > now();
    }

    public function isExpired(): bool
    {
        return $this->ends_at <= now();
    }

    public function daysRemaining(): int
    {
        return max(0, now()->diffInDays($this->ends_at, false));
    }
}
