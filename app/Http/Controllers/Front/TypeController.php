<?php

namespace App\Http\Controllers\Front;

use App\Models\Transport;
use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function transport_types($city_id, $transport_id, Request $request)
    {
        $types = Type::with(
        [
            'komplekt.cities'=> function ($query) use ($city_id) {
                $query->where('city_id', $city_id);
            },
            'cities' => function ($query) use ($city_id) {
                $query->where('city_id', $city_id);
            }
        ])
        ->whereRelation('transports', 'transport_id', $transport_id)
        ->get();
        
        return $types;
    }
}
