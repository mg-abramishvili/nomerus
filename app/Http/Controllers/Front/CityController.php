<?php

namespace App\Http\Controllers\Front;

use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function cities_index()
    {
        return City::all();
    }
}
