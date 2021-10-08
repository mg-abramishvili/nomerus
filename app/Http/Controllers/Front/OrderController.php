<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use App\Models\OrderItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function order_store(Request $request)
    {
        $rules = [
            'tel' => 'required',
            'email' => 'required',
            'price' => 'required|numeric',
        ];

        $this->validate($request, $rules);

        $data = request()->all();
        $order = new Order();
        $order->tel = $data['tel'];
        $order->email = $data['email'];
        $order->price = $data['price'];
        $order->uid = time() . Str::random(9) . rand(1, 100000) . Str::random(9) . rand(1, 100000);
        $order->save();

        $orderItems = $request->input('orderItems', []);
        
        for ($orderItem=0; $orderItem < count($orderItems); $orderItem++) {
            $orderItemID = OrderItem::where('uid', $orderItems[$orderItem])->first();
            $order->orderItems()->attach($orderItemID->id, ['order_id' => $order->id]);
        }
    }
}
