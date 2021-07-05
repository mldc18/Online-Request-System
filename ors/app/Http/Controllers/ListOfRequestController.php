<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListOfRequestController extends Controller
{
    public function index()
    {
        return view('listofrequest');
    }
}
