<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function transports_index()
    {
        return Transport::all();
    }
}
