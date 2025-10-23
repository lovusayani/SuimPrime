<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'description',
        'discount_type',
        'discount',
        'start_date',
        'expire_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'expire_date' => 'date',
        'status' => 'boolean',
        'discount' => 'decimal:2',
    ];

    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class, 'coupon_plan');
    }
}
