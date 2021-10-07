<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use App\Models\Type;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function transports_index()
    {
        return Transport::all();
    }

    public function transport_types($id, Request $request)
    {
        $transport = Transport::find($id);

        return Type::with('komplekt')->whereRelation('transports', 'transport_id', $id)->get();
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
