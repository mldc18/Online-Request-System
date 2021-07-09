<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClerkController extends Controller
{
    public function index()
    {
        return view('rcvdrequest', ['title'=>'List of Requests']);
    }
}
