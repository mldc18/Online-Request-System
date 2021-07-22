<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;
use Carbon\Carbon;
use \stdClass;
class ListOfRequestController extends Controller
{
    public function index()
    {
        return view('listofrequest', ['title'=>'List of Requests']);
    }

    public function openAcademicForm(){
        return view('listrequestform_1.academicrequestform', ['title'=>'ACADEMIC FORM']);
    }

    public function submitAcademicForm(Request $request){
        $request->validate([
            'gwa' => 'required|mimes:jpeg,png,pdf',
            'registration' => 'required|mimes:jpeg,png,pdf',
            'id' => 'required|mimes:jpeg,png,pdf',
        ]);

        try {
            /* Insert Material Record to env_raw_materials table */
            if($request->hasfile('gwa')){ 
                $file = $request->file('gwa');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $gwa =time().'.'.$extension;
                $file->move('uploads/gwa/', $gwa);
            }
            if($request->hasfile('registration')){ 
                $file = $request->file('registration');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $registration =time().'.'.$extension;
                $file->move('uploads/registration/', $registration);
            }
            if($request->hasfile('id')){ 
                $file = $request->file('id');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $id =time().'.'.$extension;
                $file->move('uploads/id/', $id);
            }

            $obj = new stdClass(); 
            $obj->gwa = $gwa;
            $obj->registration = $registration;
            $obj->id = $id;

            $data = new Requests();
            $data->request_name = 'Academic Scholarship Grant';
            $data->student_id = request('student_id');
            $data->campus = request('campus');
            $data->request_status = 'Pending';
            $data->request_date  = Carbon::today();
            $data->due_date = Carbon::today()->addDays(7);
            $data->request_id = 'REQ';
            $data->attachments = json_encode($obj);
            $data->save();
            $req = "REQ-ACAD-".Carbon::now()->year."-".str_pad($data->id, 5, '0', STR_PAD_LEFT);
            $data->request_id = $req;
            $data->save();
            return response(json_encode($obj));
        }catch (Exception $e) {
            dd('HUH');
        }
    }
}