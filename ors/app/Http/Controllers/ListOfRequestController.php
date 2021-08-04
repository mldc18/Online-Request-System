<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;
use App\Models\RequestDetail;
use App\Models\User;
use Carbon\Carbon;
use \stdClass;
use Illuminate\Support\Facades\Auth;
class ListOfRequestController extends Controller
{
    public function index()
    {
        return view('listofrequest', ['title'=>'List of Requests']);
    }

    public function openStudentRequest($request_id){
        $request = Requests::where('request_id', $request_id)->first();
        return response($request);
    }

    public function getOverduedRequests(){
        $overdued = array();
        foreach(Requests::all() as $request){
            if(Carbon::now()->diffInDays($request->due_date) <= 3){
                array_push($overdued, $request);
            }
        }
        return response(json_encode($overdued));
    }
    // LIST OF REQUEST FORMS

    public function editForm(Request $request){
        $requirements = request('requirements') ?? [];
        $qualifications = request('qualifications') ?? [];
        $filtered_requirements = array_filter($requirements, function($k){
            return $k != '';
        });
       
        $filtered_qualifications = array_filter($qualifications, function($k){
            return $k != '';
        });
        $requestDetail = RequestDetail::where('name', request('name'))->update(
            [
                'requirements'=>$filtered_requirements ?? '[]', 
                'qualifications'=>$filtered_qualifications ?? '[]'
            ]);
        $requestDetail = RequestDetail::where('name', request('name'))->first();
        return response($requestDetail);
    }

    public function openAcademicForm(){
        $user = Auth::user();
        if($user->user_type == 'clerk'){
            $requestDetail = RequestDetail::where('name', 'ACADEMIC SCHOLARSHIP GRANT')->first();
            return view('listofreq.academic', ['title'=>'EDIT REQUEST DETAILS', 'request_detail'=>$requestDetail]);
        }else{
            return view('listrequestform_1.academicrequestform', ['title'=>'ACADEMIC FORM']);
        }
    }

    public function editAcademicDocuments(Request $request){
        $request->validate([
            'gwa' => 'required|mimes:jpeg,png,pdf',
            'registration' => 'required|mimes:jpeg,png,pdf',
            'id' => 'required|mimes:jpeg,png,pdf',
        ]);


    }

    public function submitAcademicForm(Request $request){
        $request->validate([
            'gwa' => 'mimes:jpeg,png,pdf',
            'registration' => 'mimes:jpeg,png,pdf',
            'id' => 'mimes:jpeg,png,pdf',
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
            $student = User::where('id', request('student_id'))->first();
            $exists = Requests::where('request_id', request('request_id'))->first();

            $obj = new stdClass(); 
            $obj->gwa = $gwa ?? null;
            $obj->registration = $registration ?? null;
            $obj->id = $id ?? null;
            
            if($exists){
                $new_obj = new stdClass(); 
           
                $request_attachments = json_decode($exists->attachments, true); 

                if($obj->gwa != null){
                    $new_obj->gwa = strval($obj->gwa);
                }else{
                    $new_obj->gwa = strval($request_attachments['gwa']);
                }
                if($obj->registration != null){
                    $new_obj->registration = strval($obj->registration);
                }else{
                    $new_obj->registration = strval($request_attachments['registration']);
                }
                if($obj->id != null){
                    $new_obj->id = strval($obj->id);
                }else{
                    $new_obj->id = strval($request_attachments['id']);
                }
        
                Requests::where('student_id', $student->id)->update(['attachments'=>json_encode($new_obj)]);
                return response(json_encode($new_obj));
            }else{
                $data = new Requests();
                $data->request_name = 'Academic Scholarship Grant';
                $data->student_id = request('student_id');
                $data->department = $student->department;
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
                return response('amazing');
            }
        }catch (Exception $e) {
            dd('HUH');
        }
    }

    public function openAthleticForm(){
        return view('listrequestform_1.athleticrequestform', ['title'=>'ATHLETIC FORM']);
    }

    public function submitAthleticForm(Request $request){
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

            $student = User::where('id', request('student_id'))->first();
        
            $data = new Requests();
            $data->request_name = 'Athletic Scholarship Grant';
            $data->student_id = request('student_id');
            $data->department = $student->department;
            $data->campus = request('campus');
            $data->request_status = 'Pending';
            $data->request_date  = Carbon::today();
            $data->due_date = Carbon::today()->addDays(7);
            $data->request_id = 'REQ';
            $data->attachments = json_encode($obj);
            $data->save();
            $req = "REQ-ATH-".Carbon::now()->year."-".str_pad($data->id, 5, '0', STR_PAD_LEFT);
            $data->request_id = $req;
            $data->save();
            return response(json_encode($obj));
            
        }catch (Exception $e) {
            dd('HUH');
        }
    }

    public function openTorForm(){
        return view('listrequestform_1.torrequestform', ['title'=>'TOR FORM']);
    }

    public function submitTorForm(Request $request){
        $request->validate([
            'idcard' => 'required|mimes:jpeg,png,pdf',
            'request' => 'required|mimes:jpeg,png,pdf',
            'id' => 'required|mimes:jpeg,png,pdf',
        ]);

        try {
            /* Insert Material Record to env_raw_materials table */
            if($request->hasfile('idcard')){ 
                $file = $request->file('idcard');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $idcard =time().'.'.$extension;
                $file->move('uploads/idcard/', $idcard);
            }
            if($request->hasfile('request')){ 
                $file = $request->file('request');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $requestlet =time().'.'.$extension;
                $file->move('uploads/request/', $requestlet);
            }
            if($request->hasfile('id')){ 
                $file = $request->file('id');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $id =time().'.'.$extension;
                $file->move('uploads/id/', $id);
            }

            $obj = new stdClass(); 
            $obj->idcard = $idcard;
            $obj->request = $requestlet;
            $obj->id = $id;

            $student = User::where('id', request('student_id'))->first();

            $data = new Requests();
            $data->request_name = 'Transcript of Records';
            $data->student_id = request('student_id');
            $data->department = $student->department;
            $data->campus = request('campus');
            $data->request_status = 'Pending';
            $data->request_date  = Carbon::today();
            $data->due_date = Carbon::today()->addDays(7);
            $data->request_id = 'REQ';
            $data->attachments = json_encode($obj);
            $data->save();
            $req = "REQ-TOR-".Carbon::now()->year."-".str_pad($data->id, 5, '0', STR_PAD_LEFT);
            $data->request_id = $req;
            $data->save();
            return response(json_encode($obj));
        }catch (Exception $e) {
            dd('HUH');
        }
    }

    public function openGoodMoralForm(){
        return view('listrequestform_1.goodmoralrequestform', ['title'=>'GOOD MORAL FORM']);
    }

    public function submitGoodMoralForm(Request $request){
        $request->validate([
            'goodmoralform' => 'required|mimes:jpeg,png,pdf',
            'request' => 'required|mimes:jpeg,png,pdf',
            'id' => 'required|mimes:jpeg,png,pdf',
        ]);

        try {
            /* Insert Material Record to env_raw_materials table */
            if($request->hasfile('goodmoralform')){ 
                $file = $request->file('goodmoralform');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $goodmoralform =time().'.'.$extension;
                $file->move('uploads/goodmoralform/', $goodmoralform);
            }
            if($request->hasfile('request')){ 
                $file = $request->file('request');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $requestlet =time().'.'.$extension;
                $file->move('uploads/request/', $requestlet);
            }
            if($request->hasfile('id')){ 
                $file = $request->file('id');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $id =time().'.'.$extension;
                $file->move('uploads/id/', $id);
            }

            $obj = new stdClass(); 
            $obj->goodmoralform = $goodmoralform;
            $obj->request = $requestlet;
            $obj->id = $id;

            $student = User::where('id', request('student_id'))->first();

            $data = new Requests();
            $data->request_name = 'Good Moral Certificate';
            $data->student_id = request('student_id');
            $data->department = $student->department;
            $data->campus = request('campus');
            $data->request_status = 'Pending';
            $data->request_date  = Carbon::today();
            $data->due_date = Carbon::today()->addDays(7);
            $data->request_id = 'REQ';
            $data->attachments = json_encode($obj);
            $data->save();
            $req = "REQ-GMC-".Carbon::now()->year."-".str_pad($data->id, 5, '0', STR_PAD_LEFT);
            $data->request_id = $req;
            $data->save();
            return response(json_encode($obj));
        }catch (Exception $e) {
            dd('HUH');
        }
    }

    // LIST OF REQUEST PAGES FUNCTIONS

    public function openAcademicPage(){
        $requestDetail = RequestDetail::where('name', 'ACADEMIC SCHOLARSHIP GRANT')->first();
        return view('listofreq.academic', ['title'=>'REQUEST DETAILS', 'request_detail'=>$requestDetail]);
    }
    public function openAthleticPage(){
        $requestDetail = RequestDetail::where('name', 'ATHLETIC SCHOLARSHIP GRANT')->first();
        return view('listofreq.athletic', ['title'=>'REQUEST DETAILS', 'request_detail'=>$requestDetail]);
    }
    public function openAbsencePage(){
        $requestDetail = RequestDetail::where('name', 'LEAVE OF ABSENCE')->first();
        return view('listofreq.absence', ['title'=>'REQUEST DETAILS', 'request_detail'=>$requestDetail]);
    }
    public function openTorPage(){
        $requestDetail = RequestDetail::where('name', 'TRANSCRIPT OF RECORDS')->first();
        return view('listofreq.tor', ['title'=>'REQUEST DETAILS', 'request_detail'=>$requestDetail]);
    }
    public function openGoodMoralPage(){
        $requestDetail = RequestDetail::where('name', 'CERTIFICATE OF GOOD MORAL')->first();
        return view('listofreq.goodmoral', ['title'=>'REQUEST DETAILS', 'request_detail'=>$requestDetail]);
    }
    public function openReturnStudentPage(){
        $requestDetail = RequestDetail::where('name', 'RETURNING STUDENT ADMISSION')->first();
        return view('listofreq.returnstudent', ['title'=>'REQUEST DETAILS','request_detail'=>$requestDetail]);
    }
}