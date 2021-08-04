<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Socialite;
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

    public function google(){
        return Socialite::driver('google')->redirect();
    }   

    public function googleRedirect(){
        try {
            $user = Socialite::driver('google')->user();    
        } catch (\Exception $e) {
            return redirect('/login');
        }
        $existingUser = User::where('email', $user->email)->first();
        
        if($existingUser){
            $user = User::where('email', $existingUser->email)->first();

            if($user->user_type == 'student'){
                Auth::login($user);
                return redirect('/home');
            }else if($user->user_type == 'clerk'){

                Auth::login($user);
                return redirect('/clerk/'.$user->department);
            }
            
        }
        return redirect()->to('/');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
      }
}
