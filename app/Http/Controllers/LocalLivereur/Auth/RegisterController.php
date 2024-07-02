<?php

namespace App\Http\Controllers\LocalLivereur\Auth;

use App\Models\Wilaya\Wilaya;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use App\Models\Super_Admin\Notification;
use Illuminate\Support\Facades\Validator;
use App\Models\LocalLivereur\LocalLivereur;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new local_livereurs as well as their
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
    protected $redirectTo = RouteServiceProvider::LOCALLIVEREURHOME;

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
        return Auth::guard('local_livereur');
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
        return view('auth.local_livereur.register',compact('template','wilayas'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:local_livereurs'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'regex:/^(0)(5|6|7)[0-9]{8}$/', 'unique:local_livereurs'],
            'company_name' => ['required', 'string', 'unique:local_livereurs'],
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
        Storage::makeDirectory('public/local-livereurs/'.$data['company_name']);
         //infrorm admins about this register
         $note=new Notification;
         $note->title= 'شاحن جديد';
         $note->description= 'لقد قام '.$data['name'].' بالتسجيل في الموقع كشاحن';
         $note->link=route('super-admin.local-livereur',$data['email']);
         $note->type='register';
         $note->save();
        return LocalLivereur::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'company_name' => $data['company_name'],
            'wilaya_id' => $data['wilaya'],
            'password' => Hash::make($data['password']),
        ]);
    }
}