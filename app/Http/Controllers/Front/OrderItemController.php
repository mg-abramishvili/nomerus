<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use App\Models\OrderItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderItemController extends Controller
{
    public function orderItem($uid, Request $request)
    {
        $orderItem = OrderItem::where('uid', $uid)->first();
        return $orderItem;
    }

    public function orderItem_store(Request $request)
    {
        $rules = [
            'transport' => 'required',
            'plate' => 'required',
            'zhirniy' => 'required',
            'bez_otverstiy' => 'required',
            'number' => 'required',
            'price' => 'required|numeric',
        ];

        $this->validate($request, $rules);
        
        $orderItem = new OrderItem();

        $orderItem->transport = $request->transport;

        $orderItem->plate = $request->plate;
        $orderItem->zhirniy = $request->zhirniy;
        $orderItem->bez_otverstiy = $request->bez_otverstiy;
        $orderItem->komplekt = $request->komplekt;
        $orderItem->number = $request->number;
        $orderItem->price = $request->price;
        $orderItem->uid = time() . Str::random(9) . rand(1, 100000) . Str::random(9) . rand(1, 100000);
        $orderItem->save();

        return response()->json([
            'uid' => $orderItem->uid,
            'number' => $orderItem->number,
            'price' => $orderItem->price
        ]);
    }

    public function orderItem_delete($uid, Request $request)
    {
        $orderItem = OrderItem::where('uid', $uid)->first();
        $orderItem->delete();
    }
}
