<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    
protected $fillable = [
    'user_id',
    'laptop_id',
    'start_date',
    'end_date',
    'status'
];

public function user()
{
    return $this->belongsTo(User::class);
}

public function laptop()
{
    return $this->belongsTo(Laptop::class);
}

}
