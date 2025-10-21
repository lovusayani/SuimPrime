<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
   protected $fillable = [
        'title',
        'description',
        'type',     // movie, series, episode
        'status',   // published, draft
        'thumbnail',
        'video_url',
        'release_date',
    ];
}