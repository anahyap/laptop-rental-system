<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    
protected $fillable = [
    'brand',
    'model',
    'serial_number',
    'daily_rate',
    'is_available'
];

public function rentals()
{
    return $this->hasMany(Rental::class);
}

}
