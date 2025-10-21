<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoviePosterTv extends Model
{
    use HasFactory;

    protected $table = 'movie_posters_tv'; // 👈 Fix here

    protected $fillable = [
        'movie_id',
        'thumbnail',
        'poster',
        'poster_tv',
        'trailer_url_type',
        'trailer_url',
        'trailer_file',
        'embed_code',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
