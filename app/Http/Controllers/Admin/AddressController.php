<?php

namespace App\Http\Controllers\Admin;

use App\Models\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return Address::with('city')->get();
    }

    public function address_item($id, Request $request)
    {
        return Address::with('city')->find($id);
    }

    public function store(Request $request)
    {
        $data = request()->all();
        
        $address = new Address([
            'city_id' => $data['city'],
            'name' => $data['name'],
            'tel' => $data['tel'],
            'coordinates' => $data['coordinates'],
        ]);

        $address->save();
    }

    public function address_update($id, Request $request) {
        $data = request()->all();
        $address = Address::find($id);

        $address->city_id = $data['city'];
        $address->name = $data['name'];
        $address->tel = $data['tel'];
        $address->coordinates = $data['coordinates'];

        $address->save();
    }

    public function address_item_delete($id, Request $request) {
        $address = Address::find($id);
        $address->delete();
    }
}
