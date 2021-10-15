<?php

namespace App\Http\Controllers\Admin;

use App\Models\Text;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function index()
    {
        return Text::first();
    }

    public function update(Request $request) {
        $data = request()->all();
        $text = Text::find(1);

        $text->company_text = $data['company_text'];
        $text->privacy_policy = $data['privacy_policy'];

        $text->save();
    }
}
