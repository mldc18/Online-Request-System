<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;

class ProfileController extends Controller
{
    public function index($id)
    {
        $requests = Requests::where('student_id', $id)->get();
        return view('profile', ['title' => 'Profile', 'requests'=>$requests]);
    }
}
