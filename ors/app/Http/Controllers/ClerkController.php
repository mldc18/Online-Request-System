<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;

class ClerkController extends Controller
{
    public function index()
    {
        $requests = Requests::get();
        return view('rcvdrequest', ['title'=>'HOME', 'requests'=>$requests]);
    }

    public function editRequestStatus(Request $request, $request_id){
        $request = Requests::where('request_id', $request_id)->update([
            'request_status' => request('status'),
            'add_info' => request('reason'),
        ]);
        // $work_order = WorkOrder::where('work_order_no', $work_order_no)->update([
        //     $planned_date => $date,
        // ]);
        return response(request('status'));
    }
}
