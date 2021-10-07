<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use App\Models\Type;
use App\Models\Order;
use App\Models\City;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function cities_index()
    {
        return City::all();
    }

    public function transports_index()
    {
        return Transport::all();
    }

    public function transport_types($city_id, $transport_id, Request $request)
    {
        $types = Type::with(
        [
            'komplekt.cities'=> function ($query) use ($city_id) {
                $query->where('city_id', $city_id);
            },
            'cities' => function ($query) use ($city_id) {
                $query->where('city_id', $city_id);
            }
        ])
        ->whereRelation('transports', 'transport_id', $transport_id)
        ->get();
        
        return $types;
    }

    public function order_item($uid, Request $request)
    {
        $order = Order::where('uid', $uid)->first();
        return $order;
    }

    public function order_save(Request $request)
    {
        $rules = [
            'transport' => 'required',
            'number' => 'required',
            'price' => 'required|numeric',
        ];

        $this->validate($request, $rules);

        $data = request()->all();
        $order = new Order();
        $order->transport = $data['transport'];
        $order->number = $data['number'];
        $order->price = $data['price'];
        $order->uid = time() . Str::random(9) . rand(1, 100000) . Str::random(9) . rand(1, 100000);
        $order->save();

        return response()->json([
            'uid' => $order->uid,
            'number' => $order->number
        ]);
    }
}
