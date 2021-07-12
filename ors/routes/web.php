<?php

use App\Http\Controllers\FaqsController;
use App\Http\Controllers\ListOfRequestController;
use App\Http\Controllers\RequestController;
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

    // Route::get('/login', function () {
    //     return view('auth.login', ['title' => 'LOGIN']);
    // });
    // Auth::routes();
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/rcvdrequest', function () {
    return view('rcvdrequest', ['title' => 'HOME']);
});

Route::get('/academicform', function () {
    return view('listrequestform.academicform');
});

Route::get('/openrequest', function () {
    return view('openrequest', ['title' => 'Request Details']);
});

Route::get('/profile', function () {
    return view('profile', ['title' => 'Profile']);
});

Route::get('/request', [RequestController::class, 'index']);

Route::get('/faqs', [FaqsController::class, 'index']);

Route::view('/academic', 'sublistofrequest.academic');
Route::view('/athletic', 'sublistofrequest.athletic');
Route::view('/absence', 'sublistofrequest.absence');
Route::view('/tor', 'sublistofrequest.tor');

Route::view('/newpage' ,'newpage');

