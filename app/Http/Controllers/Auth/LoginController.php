<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
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
    //select to login with name or phone or email
    public function username()
    {
        $value=request()->input('userlogin');
        if(filter_var($value, FILTER_VALIDATE_EMAIL))
        {
            //inset key email in request data
            request()->merge(['email' => $value]);
            return 'email';
        }elseif(preg_match("/^[^\W\d_](?:\.|[^\W\d_]*)(?:[-\s][^\W\d_](?:\.|[^\W\d_]*))*[.-]?$/",$value))
        {
           //inset key name in request data
           request()->merge(['name' => $value]);
           return 'name'; 
        }elseif(preg_match("/^(0)(5|6|7)[0-9]{8}$/",$value))
        {
           //inset key phone in request data
           request()->merge(['phone' => $value]);
           return 'phone'; 
        }else
        {
            request()->merge(['name' => $value]);
            return 'name'; 
        }
    }
    //
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'userlogin' => 'required|string',
            'password' => 'required|string',
        ]);
    }
    //
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'userligin' => [trans('auth.failed')],
        ]);
    }
}
