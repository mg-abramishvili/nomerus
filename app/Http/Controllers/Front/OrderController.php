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
            'email' => 'required',
            'price' => 'required|numeric',
            'name' => 'required',
            'passport' => 'required'
        ];
        $ur_rules = [
            'tel' => 'required',
            'email' => 'required',
            'price' => 'required|numeric',
            'company' => 'required',
            'inn' => 'required',
            'kpp' => 'required',
            'ogrn' => 'required',
            'uraddress' => 'required',
            'faktaddress' => 'required',
            'ras_schet' => 'required',
            'bank' => 'required',
            'bik' => 'required',
            'korr' => 'required',
            'director' => 'required'
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
            $order->passport = $data['passport'];
        }
        if($client_type == 'ur') {
            $order->company = $data['company'];
            $order->inn = $data['inn'];
            $order->kpp = $data['kpp'];
            $order->ogrn = $data['ogrn'];
            $order->uraddress = $data['uraddress'];
            $order->faktaddress = $data['faktaddress'];
            $order->ras_schet = $data['ras_schet'];
            $order->bank = $data['bank'];
            $order->bik = $data['bik'];
            $order->korr = $data['korr'];
            $order->director = $data['director'];
        }

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
