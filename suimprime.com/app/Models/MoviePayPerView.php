<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoviePayPerView extends Model
{
    use HasFactory;

    protected $table = 'movie_pay_per_view';

    protected $fillable = [
        'movie_id',
        'price',
        'purchase_type',
        'access_duration',
        'discount',
        'total_amount',
        'available_for',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'status' => 'boolean',
    ];

    /**
     * Relationship with Movie
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    /**
     * Calculate total amount after discount
     */
    public function calculateTotalAmount()
    {
        $discountAmount = ($this->price * $this->discount) / 100;
        return $this->price - $discountAmount;
    }

    /**
     * Validate that Available For is greater than Access Duration
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if ($model->purchase_type === 'rental' && $model->access_duration && $model->available_for <= $model->access_duration) {
                throw new \Exception('Available For must be greater than Access Duration.');
            }
        });
    }
}