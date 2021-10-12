<?php

namespace App\Http\Controllers\Admin;

use App\Models\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return Address::with('cities')->get();
    }

    public function store(Request $request)
    {
        $data = request()->all();
        
        $address = new Address([
            'name' => $data['name'],
            'tel' => $data['tel'],
            'coordinates' => $data['coordinates'],
        ]);

        $address->save();

        $address->cities()->attach($request->city, ['address_id' => $address->id]);
    }
}
