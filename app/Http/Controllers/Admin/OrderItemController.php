<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrderItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function orderItems_index()
    {
        return OrderItem::all();
    }
}
