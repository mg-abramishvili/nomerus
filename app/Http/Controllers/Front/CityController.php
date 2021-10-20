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

    public function city_detect($ip, Request $request)
    {
        //return session('city');
        if(session('city')) {
            $city = City::find(session('city'));
            return $city;
        } else {
            if($ip == 0) {
                $city = City::where('name', 'Уфа')->first();
                return $city;
            } else {
                $ch = curl_init('http://ip-api.com/json/' . $ip . '?lang=ru');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HEADER, false);
                $res = curl_exec($ch);
                curl_close($ch);
                
                $res = json_decode($res);
                $city = City::where('name', $res->city)->first();
                return $city;
            }
        }
        
    }
}
