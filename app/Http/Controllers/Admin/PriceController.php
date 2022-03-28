<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transport;
use App\Models\Price;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index($city, Request $request)
    {
        $city = City::where('namecode', $city)->first();

        return Price::where('city_id', $city->id)->with('plate')->get();
    }

    public function price($id)
    {
        return Price::with('city')->find($id);
    }

    public function update($id, Request $request)
    {
        $price = Price::find($id);

        $price->odin = $request->odin;
        $price->komplekt = $request->komplekt;
        $price->zhirniy = $request->zhirniy;
        $price->zhirniy_komplekt = $request->zhirniy_komplekt;
        $price->bez_otverstiy = $request->bez_otverstiy;
        $price->bez_otverstiy_komplekt = $request->bez_otverstiy_komplekt;

        $price->save();
    }
}
