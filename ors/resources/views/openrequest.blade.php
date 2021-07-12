@extends('layouts.app')

@section('content')

    <center class="my-5">
        <div class="containeer text-left">
            <h5><span class="font-weight-bold">Student ID</span>   :   1812903</h5>
            <h5><span class="font-weight-bold">Name of Request</span>   :   Academic Scholarship Grant</h5>
            <h5><span class="font-weight-bold">Status of Request</span>   :  
                <select class="form-select" id="status" aria-label="Default select example">
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                    <option value="Denied">Denied</option>
                </select>
            </h5>
            <h5><span class="font-weight-bold">Date Requested</span>   :   July 5, 2021</h5>
            <h5><span class="font-weight-bold">Deadline of Request</span>   :    July 14, 2021</h5>
            <h5><span class="font-weight-bold">Request ID</span>    :   SCH-REQ-00111</h5>
            <h5><span class="font-weight-bold">Student Requirements</span> : <button class='btn btn-info btn-sm'>Download</button></h5>
            <div class="requestmessage">

            </div>
        </div>
    
    </center>

@endsection
