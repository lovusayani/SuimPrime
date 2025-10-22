<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
        'currency_name',
        'currency_symbol',
        'currency_code',
        'is_primary',
        'currency_position',
        'thousand_separator',
        'decimal_separator',
        'no_of_decimal',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
        'no_of_decimal' => 'integer',
    ];
}
