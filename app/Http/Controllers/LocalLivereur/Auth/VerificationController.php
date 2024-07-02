<?php

namespace App\Http\Controllers\LocalLivereur\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Access\AuthorizationException;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the local_livereur didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('auth:local_livereur');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
    //
    public function show(Request $request)
    {
        $template='defaulte';
        return $request->user()->hasVerifiedEmail()
                        ? redirect($this->redirectPath())
                        : view('auth.local_livereur.verify',compact('template'));
    }
    //
    public function verify(Request $request)
    {
        Auth::guard('local_livereur')->loginUsingId($request->route('id'));

        if ($request->user('local_livereur')->hasVerifiedEmail()) {
            return redirect('/local-livereur')->with('status', 'Your email is already verified.');
        }

        if ($request->user('local_livereur')->markEmailAsVerified()) {
            event(new Verified($request->user('local_livereur')));
        }

        return redirect('/local-livereur')->with('status', 'Your email has been verified.');
    }

    //
    public function resend(Request $request)
    {
        if (Auth::guard('local_livereur')->user()->hasVerifiedEmail()) {
            return $request->wantsJson()
                        ? new JsonResponse([], 204)
                        : redirect($this->redirectPath());
        }

        Auth::guard('local_livereur')->user()->sendEmailVerificationNotification();

        return $request->wantsJson()
                    ? new JsonResponse([], 202)
                    : back()->with('resent', true);
    }
}