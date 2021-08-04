<?php

use App\Http\Controllers\FaqsController;
use App\Http\Controllers\ListOfRequestController;
use App\Http\Controllers\ClerkController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', ['title' => 'HOME']);
});

Route::get('/listofrequest', [ListOfRequestController::class, 'index']);
Route::get('/logout',  [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Auth::routes();

Route::get('/sign-in/google', [App\Http\Controllers\Auth\LoginController::class, 'google'])->middleware('guest');
Route::get('/sign-in/google/redirect', [App\Http\Controllers\Auth\LoginController::class, 'googleRedirect'])->middleware('guest');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/openrequest', function () {
    return view('openrequest', ['title' => 'Request Details']);
});

Route::get('/profile/{id}', [ProfileController::class, 'index']);

Route::get('/request', [RequestController::class, 'index']);
Route::post('/academicform-upload', [ FileUploadController::class, 'academicform']);
Route::get('/faqs', [FaqsController::class, 'index']);

Route::get('/academic', [ListOfRequestController::class, 'openAcademicPage']);
Route::get('/athletic', [ListOfRequestController::class, 'openAthleticPage']);
Route::get('/absence', [ListOfRequestController::class, 'openAbsencePage']);
Route::get('/tor', [ListOfRequestController::class, 'openTorPage']);
Route::get('/goodmoral', [ListOfRequestController::class, 'openGoodMoralPage']);
Route::get('/returnstudent', [ListOfRequestController::class, 'openReturnStudentPage']);

Route::view('/newpage' ,'newpage');

// LIST OF REQUEST FORMS 1
Route::post('/editForm', [ListOfRequestController::class, 'editForm']);
Route::get('/academicform', [ListOfRequestController::class, 'openAcademicForm']);
Route::post('/submitAcademicForm', [ListOfRequestController::class, 'submitAcademicForm']);
Route::get('/athleticform', [ListOfRequestController::class, 'openAthleticForm']);
Route::post('/submitAthleticForm', [ListOfRequestController::class, 'submitAthleticForm']);
Route::get('/torform', [ListOfRequestController::class, 'openTorForm']);
Route::post('/submitTorForm', [ListOfRequestController::class, 'submitTorForm']);
Route::post('/editTorForm', [ListOfRequestController::class, 'editTorForm']);
Route::get('/goodmoralform', [ListOfRequestController::class, 'openGoodMoralForm']);
Route::post('/submitGoodMoralForm', [ListOfRequestController::class, 'submitGoodMoralForm']);

Route::get('/openStudentRequest/{id}', [ListOfRequestController::class, 'openStudentRequest']);
Route::get('/getOverduedRequests', [ListOfRequestController::class, 'getOverduedRequests']);
// LIST OF REQUEST FORMS 2


Route::view('/test', 'test');

// CLERK ROUTES
Route::get('/clerk/{department}', [ClerkController::class, 'index'])->name('clerk');
Route::post('/edit-request-status/{id}', [ClerkController::class, 'editRequestStatus']);

Route::post('send-mail', function (Request $request) {
   
    $details = [
        'title' => request('subject-faqs'),
        'body' => request('content-faqs'),
    ];
   
    \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    return response($details);
    dd("Email is Sent.");
});