<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders_index()
    {
        return Order::with('orderItems', 'city')->orderBy('created_at', 'desc')->get();
    }
    
}
