<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Hash;
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
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $guard = 'web';
        $user = User::where('email',$req->email)->first();
        if(!$user){
            $user = Admin::where('email',$req->email)->first();
            $guard = 'admin';
        }
        if($user){
            if($user->status == 1){
                if(Hash::check($req->password,$user->password)){
                    auth()->guard($guard)->login($user);
                    return redirect()->intended('/home');
                }else{
                    $errors['password'] = 'you have entered wrong password';
                }
            }else{
                $errors['email'] = 'this account has been blocked';
            }
        }
        else{
            $errors['email'] = 'this email is not register with us';
        }
        return back()->withErrors($errors)->withInput($req->all());
    }
}
