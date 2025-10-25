<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserWatchlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'movie_id',
    ];

    /**
     * Get the user that owns the watchlist item
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the movie for this watchlist item
     */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}