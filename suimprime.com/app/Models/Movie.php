<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'release_date', 'video_upload_type', 'video_url',
        'video_file', 'embed_code', 'enable_quality', 'enable_subtitle',
        'plan_id', 'status',
    ];

    protected $casts = [
        'release_date' => 'date',
        'enable_quality' => 'boolean',
        'enable_subtitle' => 'boolean',
        'status' => 'boolean',
    ];

    public function posterTvDetails()
    {
        return $this->hasOne(MoviePosterTv::class, 'movie_id');
    }

    public function getThumbnailAttribute()
    {
        return $this->posterTvDetails->thumbnail ?? asset('assets/images/no-thumb.jpg');
    }

    // 🔹 Qualities (480p, 720p, etc.)
    public function qualities()
    {
        return $this->hasMany(MovieQuality::class);
    }

    // 🔹 Subtitles
    public function subtitles()
    {
        return $this->hasMany(MovieSubtitle::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable'); // optional if you want polymorphic
    }

    // 🔹 SEO
    public function seo()
    {
        return $this->hasOne(MovieSeoSetting::class);
    }

    // 🔹 Genres (many-to-many)
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_movie');
    }

    // 🔹 Actors (users with actor role)
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_movie', 'movie_id', 'actor_id');
    }

    // 🔹 Directors (users with director role)
    public function directors()
    {
        return $this->belongsToMany(Director::class, 'director_movie', 'movie_id', 'director_id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    // Accessor to get poster/thumbnail URL from video_url or default
    public function getPosterUrlAttribute()
    {
        if ($this->video_upload_type === 'YouTube' && $this->video_url) {
            // Extract YouTube video ID and get thumbnail
            $videoId = $this->extractYouTubeId($this->video_url);
            if ($videoId) {
                return "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg";
            }
        }
        // Fallback to existing thumbnail logic or placeholder
        return $this->thumbnail ?? 'https://via.placeholder.com/300x450/333/fff?text=No+Poster';
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->video_upload_type === 'YouTube' && $this->video_url) {
            // Extract YouTube video ID and get thumbnail
            $videoId = $this->extractYouTubeId($this->video_url);
            if ($videoId) {
                return "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
            }
        }
        // Fallback to existing thumbnail logic or placeholder
        return $this->thumbnail ?? 'https://via.placeholder.com/400x225/333/fff?text=No+Thumbnail';
    }

    private function extractYouTubeId($url)
    {
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/';
        preg_match($pattern, $url, $match);
        return isset($match[1]) ? $match[1] : null;
    }
}