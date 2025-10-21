<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'video_upload_type', 'video_url',
        'video_file', 'embed_code', 'enable_quality', 'enable_subtitle',
        'plan_id', 'status',
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
}
