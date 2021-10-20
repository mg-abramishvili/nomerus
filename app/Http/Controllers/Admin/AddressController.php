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

    public function address_item($id, Request $request)
    {
        return Address::with('cities')->find($id);
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

    public function address_update($id, Request $request) {
        $data = request()->all();
        $address = Address::find($id);

        $address->name = $data['name'];
        $address->tel = $data['tel'];
        $address->coordinates = $data['coordinates'];
        $address->cities()->detach();
        $address->cities()->attach($request->city, ['address_id' => $address->id]);

        $address->save();
    }

    public function address_item_delete($id, Request $request) {
        $address = Address::find($id);
        $address->cities()->detach();
        $address->delete();
    }
}
