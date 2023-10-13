<?php

namespace App\Http\Controllers\cake;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class signaturecake extends Controller
{
    public function index()
    {
        return view('cake.signaturecake');
    }
}
