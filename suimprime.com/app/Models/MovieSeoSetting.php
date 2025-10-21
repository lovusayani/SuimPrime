<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieSeoSetting extends Model
{
    protected $fillable = ['movie_id','seo_image','meta_title','google_site_verification','meta_keywords','canonical_url','short_description'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}