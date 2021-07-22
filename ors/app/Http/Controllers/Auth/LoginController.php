<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login', ['title'=>'LOGIN']);
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');

        $user = User::where('email',$request->email)->first();
        if (Auth::attempt($credentials)) {
            if($user->user_type == 'student'){
                return redirect()->route('home');
            }else if($user->user_type == 'clerk'){
                return redirect()->route('clerk');
            }
        }else{
            dd('WTF');
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
      }
}
