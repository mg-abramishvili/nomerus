<?php

namespace App\Http\Controllers\Front;

use App\Models\Text;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function index()
    {
        return Text::first();
    }
}
