<?php

namespace App\Http\Controllers\CompanyLivereur\Auth;

use App\Models\Wilaya\Wilaya;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use App\Models\Super_Admin\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\CompanyLivereur\CompanyLivereur;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new company_livereurs as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::COMPANYLIVEREURHOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('company_livereur');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $template='defaulte';
        $wilayas=Wilaya::all();
        return view('auth.company_livereur.register',compact('template','wilayas'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //create seller folder
        Storage::makeDirectory('public/company-livereurs/'.$data['company_name']);
         //infrorm admins about this register
         $note=new Notification;
         $note->title= 'شاحن جديد';
         $note->description= 'لقد قام '.$data['name'].' بالتسجيل في الموقع كشركة شحن';
         $note->link=route('super-admin.company-livereur',$data['email']);
         $note->type='register';
         $note->save();
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:company_livereurs'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'regex:/^(0)(5|6|7)[0-9]{8}$/', 'unique:company_livereurs'],
            'company_name' => ['required', 'string', 'unique:company_livereurs'],
            'g-recaptcha-response' => 'required|captcha',
            'terms' =>'accepted',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //create seller folder
        Storage::makeDirectory('public/company-livereurs/'.$data['company_name']);
         //infrorm admins about this register
         $note=new Notification;
         $note->title= 'شركة شحن جديدة';
         $note->description= 'لقد قام '.$data['name'].' بالتسجيل في الموقع كشركة شحن';
         $note->link=route('super-admin.company-livereur',$data['email']);
         $note->type='register';
         $note->save();
        return CompanyLivereur::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'company_name' => $data['company_name'],
            'wilaya_id' => $data['wilaya'],
            'password' => Hash::make($data['password']),
        ]);
    }
}