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

    // Accessors to handle relative paths properly
    public function getThumbnailAttribute($value)
    {
        if (!$value) return null;
        
        // If it's already a full URL, extract the path part to make it environment-agnostic
        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            $parsedUrl = parse_url($value);
            $path = $parsedUrl['path'] ?? '';
            
            // If it's a storage path, use current domain
            if (str_starts_with($path, '/storage/')) {
                return url($path);
            }
        }
        
        // If it starts with /storage, prepend the current domain
        if (str_starts_with($value, '/storage/')) {
            return url($value);
        }
        
        // If it's just a filename, assume it's in storage/media
        return url('/storage/media/' . $value);
    }

    public function getPosterAttribute($value)
    {
        if (!$value) return null;
        
        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            $parsedUrl = parse_url($value);
            $path = $parsedUrl['path'] ?? '';
            
            if (str_starts_with($path, '/storage/')) {
                return url($path);
            }
        }
        
        if (str_starts_with($value, '/storage/')) {
            return url($value);
        }
        
        return url('/storage/media/' . $value);
    }

    public function getPosterTvAttribute($value)
    {
        if (!$value) return null;
        
        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            $parsedUrl = parse_url($value);
            $path = $parsedUrl['path'] ?? '';
            
            if (str_starts_with($path, '/storage/')) {
                return url($path);
            }
        }
        
        if (str_starts_with($value, '/storage/')) {
            return url($value);
        }
        
        return url('/storage/media/' . $value);
    }
}