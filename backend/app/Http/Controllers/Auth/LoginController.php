<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
   
    public function login(Request $request)
    {
    
        $detail=$request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user=User::where('email',$request->email)->first();
        if(!isset($user)){
            return redirect()->route('/login')->with('error', '');
        }
        if($user->user_role == 0){
            
            $email = $user->email;
            return view("auth.verify",compact('email'));
        }
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            //return redirect()->intended('/home');
            $role = Auth::user()->user_role; 
           
            switch ($role) {
               
                case '1':
                   
                    redirect("/home");
                    break; 
                case '2':
                    return redirect()->intended('/admin');
                    break; 
                default:

                   redirect("/login");
                    break;
            }
        }
       
        return redirect()->back()
            ->withErrors([
                ['email' => 'These credentials do not match our records.'],
                //['password' => 'This password does not exist.']
                ]
            )
            ->withInput($request->only('email'));
    }
    public function redirectTo(){

        // User role
       
        $role = \Auth::user()->user_role; 
       
        // Check user role

        switch ($role) {
            case '0':
                return "/verify";
                redirect("/verify");
                break;
            case '1':
                redirect("/home");
                break; 
            case '2':
                    return '/admin';
                break; 
            default:
               redirect("/login");
                break;
        }
    }
}
