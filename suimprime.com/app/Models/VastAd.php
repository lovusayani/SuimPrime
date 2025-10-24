<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VastAd extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'url',
        'target_type',
        'target_selection',
        'start_date',
        'end_date',
        'status'
    ];

    protected $casts = [
        'target_selection' => 'array',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'status' => 'boolean',
    ];

    public function getTargetSelectionNamesAttribute()
    {
        if (empty($this->target_selection)) {
            return '';
        }

        // This would need to be adapted based on your actual target types
        // For now, returning the IDs
        return implode(', ', $this->target_selection);
    }
}
