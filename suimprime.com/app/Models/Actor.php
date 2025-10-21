<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'dob',
        'designation',
        'birth_place',
        'thumbnail',
        'bio',
        'status',
    ];

    // 👇 Add this line
    protected $casts = [
        'dob' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($actor) {
            $actor->slug = Str::slug($actor->name);
        });
    }

    // If you have Movie relation
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
