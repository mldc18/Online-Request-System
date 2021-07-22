<?php

use App\Http\Controllers\FaqsController;
use App\Http\Controllers\ListOfRequestController;
use App\Http\Controllers\ClerkController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'processLogin']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/openrequest', function () {
    return view('openrequest', ['title' => 'Request Details']);
});

Route::get('/profile/{id}', [ProfileController::class, 'index']);

Route::get('/request', [RequestController::class, 'index']);
Route::post('/academicform-upload', [ FileUploadController::class, 'academicform']);
Route::get('/faqs', [FaqsController::class, 'index']);

Route::view('/academic', 'listofreq.academic');
Route::view('/athletic', 'listofreq.athletic');
Route::view('/absence', 'listofreq.absence');
Route::view('/tor', 'listofreq.tor');

Route::view('/newpage' ,'newpage');

// LIST OF REQUEST FORMS 1
Route::get('/academicform', [ListOfRequestController::class, 'openAcademicForm']);
Route::post('/submitAcademicForm', [ListOfRequestController::class, 'submitAcademicForm']);


// LIST OF REQUEST FORMS 2


Route::view('/test', 'test');


// CLERK ROUTES
Route::get('/clerk', [ClerkController::class, 'index'])->name('clerk');
Route::post('/edit-request-status/{id}', [ClerkController::class, 'editRequestStatus']);
