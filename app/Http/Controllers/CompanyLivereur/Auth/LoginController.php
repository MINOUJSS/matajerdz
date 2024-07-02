<?php

namespace App\Http\Controllers\CompanyLivereur\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::COMPANYLIVEREURHOME;

    public function __construct()
    {
        $this->middleware('guest:company_livereur')->except('logout');
    }
    //
    public function showloginform()
    {
        $template="defaulte";
        return view('auth.company_livereur.login',compact('template'));
    }
    //login
    public function login(Request $request)
    {
        //validate form
        $request->validate([
            'email' =>["required","string"],
            'password' =>["required","string"],
            'g-recaptcha-response' => 'required|captcha',
        ]);
        //check if is super admin
        if(Auth::guard('company_livereur')->attempt($request->only('email','password'),$request->filled('remember'))){
        //redirecte to dashboard
        return redirect()->intended($this->redirectTo);
        }else{
        //or redirect to back
        return redirect()->back()
        ->withinput(['email'=>$request->input('email')])
        ->with('ErrorResponse','بيانات الاعتماد هذه لا تتطابق مع سجلاتنا.');
        }
    }
    //logout
    public function logout(Request $request)
    {
        Auth::guard('company_livereur')->logout();
        //
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }
        //redirect to super_admin login page
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/company-livereur/login');
        
    }
}