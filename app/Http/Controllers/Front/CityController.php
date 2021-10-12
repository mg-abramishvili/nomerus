<?php

namespace App\Http\Controllers\Front;

use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function cities_index()
    {
        return City::with('addresses')->get();
    }

    public function city_select($city, Request $request)
    {
        session()->put('city', $city);
    }

    public function city_detect(Request $request)
    {
        //return session('city');
        if(session('city')) {
            $city = City::find(session('city'));
            return $city;
        } else {
            $city = City::find(1);
            return $city;
        }
        
    }
}
