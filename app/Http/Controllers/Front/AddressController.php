<?php

namespace App\Http\Controllers\Front;

use App\Models\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return Address::with('city')->get();
    }
}
