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
}
