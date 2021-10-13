<?php

namespace App\Http\Controllers\Front;

use App\Models\Lead;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'tel' => 'required',
            'name' => 'required',
            'city' => 'required'
        ];
        $this->validate($request, $rules);

        $data = request()->all();
        $lead = new Lead();
        $lead->name = $data['name'];
        $lead->tel = $data['tel'];
        $lead->city = $data['city'];
        $lead->save();
    }
}
