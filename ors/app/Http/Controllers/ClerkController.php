<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClerkController extends Controller
{
    public function index(Request $request)
    {
        return view('rcvdrequest', ['title'=>'HOME']);
    }
}
