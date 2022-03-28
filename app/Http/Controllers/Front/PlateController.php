<?php

namespace App\Http\Controllers\Front;

use App\Models\Plate;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    public function index($transport, $city_id)
    {
        return Plate::where('transport', $transport)->whereHas('prices', function($q) use($city_id) {
            $q->where('city_id', '=', $city_id);
        })->with('prices')->get();
    }
}
