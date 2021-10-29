<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'uid',
        'client_type',
        'name',
        'tel',
        'email',
        'company',
    ];

    public function orderItems()
    {
        return $this->belongsToMany('App\Models\OrderItem');
    }

    public function cities()
    {
        return $this->belongsToMany('App\Models\City');
    }
}
