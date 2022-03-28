<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
