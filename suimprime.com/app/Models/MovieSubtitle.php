<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieSubtitle extends Model
{
    protected $fillable = ['movie_id','language','subtitle_file','is_default'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}