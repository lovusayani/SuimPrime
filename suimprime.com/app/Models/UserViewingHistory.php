<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserViewingHistory extends Model
{
    use HasFactory;

    protected $table = 'user_viewing_history';

    protected $fillable = [
        'user_id',
        'movie_id',
        'watch_time',
        'total_duration',
        'progress_percentage',
        'last_watched_at',
        'completed',
    ];

    protected $casts = [
        'last_watched_at' => 'datetime',
        'completed' => 'boolean',
        'progress_percentage' => 'decimal:2',
    ];

    /**
     * Get the user that owns the viewing history
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the movie for this viewing history
     */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    /**
     * Scope to get continue watching (not completed movies)
     */
    public function scopeContinueWatching($query)
    {
        return $query->where('completed', false)
                    ->where('watch_time', '>', 0)
                    ->orderBy('last_watched_at', 'desc');
    }

    /**
     * Scope to get recently watched
     */
    public function scopeRecentlyWatched($query)
    {
        return $query->orderBy('last_watched_at', 'desc');
    }
}