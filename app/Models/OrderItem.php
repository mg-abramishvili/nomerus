<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'transport',
        'type',
        'number',
        'price',
        'uid',
        'bold',
        'noholes',
        'komplekt_type',
    ];

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }
}
