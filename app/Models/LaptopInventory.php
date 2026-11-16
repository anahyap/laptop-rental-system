<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaptopInventory extends Model
{
    protected $table = 'laptops';

    protected $fillable = [
        'brand',
        'model',
        'serial_number',
        'daily_rate',
        'is_available',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'daily_rate' => 'decimal:2',
    ];
}
