<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieQuality extends Model
{
    protected $fillable = ['movie_id','video_upload_type','quality','video_url','video_file','embed_code'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}