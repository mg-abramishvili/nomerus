<?php

namespace App\Http\Controllers\Front;

use App\Models\Lead;
use App\Http\Controllers\Controller;
use App\Mail\LeadMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $lead = Lead::find($lead->id);
        Mail::to('mg@abramishvili.net')->send(new LeadMail($lead));
    }
}
