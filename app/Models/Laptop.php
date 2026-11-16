<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    protected $table = 'laptops';

    protected $fillable = [
        'brand',
        'model',
        'serial_number',
        'daily_rate',
        'is_available',
    ];
}
