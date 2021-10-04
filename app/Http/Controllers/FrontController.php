<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use App\Models\Type;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function transports_index()
    {
        return Transport::all();
    }

    public function transport_types($id, Request $request)
    {
        $transport = Transport::find($id);

        return Type::whereRelation('transports', 'transport_id', $id)->get();
    }
}
