<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['transport', 'number', 'price'];

    public function orderItems()
    {
        return $this->belongsToMany('App\Models\OrderItem');
    }
}
