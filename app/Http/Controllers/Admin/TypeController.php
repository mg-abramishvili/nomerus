<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transport;
use App\Models\Type;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index($city, Request $request)
    {
        $types = Type::with(
            [
            'cities' => function ($query) use ($city) {
                $query->where('namecode', $city);
            }
        ])
        ->whereRelation('cities', 'namecode', $city)
        ->get();

        return $types;
    }

    public function type_item($type_id, $city_id, Request $request)
    {
        $types = Type::with(
            [
            'cities' => function ($query) use ($city_id) {
                $query->where('city_id', $city_id);
            }
        ])
        ->where('id', $type_id)
        ->get();

        return $types;
    }

    public function type_item_update($type_id, $city_id, Request $request)
    {
        $data = request()->all();
        $type = Type::find($type_id);
        $type->cities()->sync(
            [$city_id => [
                'type_id'=>$type->id,
                'min_price'=>$data['min_price'],
                'price'=>$data['price'],
                'max_price'=>$data['max_price']
            ]
        ]);
    }
}
