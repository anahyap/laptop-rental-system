<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class laptop extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'serial_number',
        'daily_rate',
        'is_available'
    ];
}