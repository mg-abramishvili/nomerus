<?php

namespace App\Http\Controllers\Front;

use App\Models\Certificate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        return Certificate::all();
    }
}
