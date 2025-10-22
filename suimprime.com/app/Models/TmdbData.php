<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TmdbData extends Model
{
    protected $table = 'tmdb_data';

    protected $fillable = [
        'tmdb_id',
        'title',
        'overview',
        'poster_path',
        'backdrop_path',
        'release_date',
        'original_language',
        'vote_average',
        'vote_count',
        'runtime',
        'genres',
        'production_countries',
        'status',
        'budget',
        'revenue',
        'imdb_id',
        'tagline',
        'popularity',
        'adult',
    ];

    protected $casts = [
        'genres' => 'array',
        'production_countries' => 'array',
        'release_date' => 'date',
        'adult' => 'boolean',
    ];
}
