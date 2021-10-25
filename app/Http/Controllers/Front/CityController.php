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
        $ipAddress = $request->ip();
        //return session('city');
        if(session('city')) {
            $city = City::find(session('city'));
            return response()->json([
                'city' => $city,
                'session' => '1',
            ]);
        } else {
            $ch = curl_init('http://ip-api.com/json/' . $ipAddress . '?lang=ru');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $res = curl_exec($ch);
            curl_close($ch);
            
            $res = json_decode($res);
            if(City::where('name', $res->city)->count() > 0) {
                $city = City::where('name', $res->city)->first();
            } else {
                $city = City::where('name', 'Уфа')->first();
            }
            
            return response()->json([
                'city' => $city,
                'session' => '0',
            ]);
        }
        
    }
}
