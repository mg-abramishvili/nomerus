<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\City;
use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        
        $order = new Order();
        $order->client_type = $client_type;

        if($client_type == 'fz') {
            $order->name = $request->name;
        }
        if($client_type == 'ur') {
            $order->email = $request->email;
            $order->company = $request->company;
        }

        $order->tel = $request->tel;
        $order->price = $request->price;

        $city = City::find($request->city);
        $order->city_id = $city->id;
        
        $order->uid = time() . Str::random(9) . rand(1, 100000) . Str::random(9) . rand(1, 100000);
        $order->save();

        $orderItems = $request->input('orderItems', []);

        foreach($orderItems as $orderItem) {
            $orderItem = OrderItem::where('uid', $orderItem)->first();
            $orderItem->order_id = $order->id;
            $orderItem->save();
        }

        // $order = Order::with('orderItems', 'cities')->find($order->id);
        // Mail::to('nomerus.rf@mail.ru')->send(new OrderMail($order));
    }
}
