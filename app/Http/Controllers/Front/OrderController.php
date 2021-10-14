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
        $client_type = $request->input('client_type');

        $fz_rules = [
            'tel' => 'required',
            'price' => 'required|numeric',
            'name' => 'required',
        ];
        $ur_rules = [
            'tel' => 'required',
            'email' => 'required',
            'price' => 'required|numeric',
            'company' => 'required',
        ];

        if($client_type == 'fz') {
            $this->validate($request, $fz_rules);
        }
        if($client_type == 'ur') {
            $this->validate($request, $ur_rules);
        }
        
        $data = request()->all();
        $order = new Order();
        $order->client_type = $client_type;

        if($client_type == 'fz') {
            $order->name = $data['name'];
        }
        if($client_type == 'ur') {
            $order->email = $data['email'];
            $order->company = $data['company'];
        }

        $order->tel = $data['tel'];
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
