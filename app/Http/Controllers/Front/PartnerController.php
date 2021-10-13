<?php

namespace App\Http\Controllers\Front;

use App\Models\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        return Partner::all();
    }
}
