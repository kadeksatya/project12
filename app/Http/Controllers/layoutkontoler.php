<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class layoutkontoler extends Controller
{
    public function index()
    {
        return view('parts.layout');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    
}
