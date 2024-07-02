<?php

namespace App\Http\Controllers\Dropshiper\Auth;

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
    | be re-sent if the dropshiper didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DROPSHIPERHOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:dropshiper');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
    //
    public function show(Request $request)
    {
        $template='defaulte';
        return $request->user()->hasVerifiedEmail()
                        ? redirect($this->redirectPath())
                        : view('auth.dropshiper.verify',compact('template'));
    }
    //
    public function verify(Request $request)
    {
        Auth::guard('dropshiper')->loginUsingId($request->route('id'));

        if ($request->user('dropshiper')->hasVerifiedEmail()) {
            return redirect('/dropshiper')->with('status', 'Your email is already verified.');
        }

        if ($request->user('dropshiper')->markEmailAsVerified()) {
            event(new Verified($request->user('dropshiper')));
        }

        return redirect('/dropshiper')->with('status', 'Your email has been verified.');
    }

    //
    public function resend(Request $request)
    {
        if (Auth::guard('dropshiper')->user()->hasVerifiedEmail()) {
            return $request->wantsJson()
                        ? new JsonResponse([], 204)
                        : redirect($this->redirectPath());
        }

        Auth::guard('dropshiper')->user()->sendEmailVerificationNotification();

        return $request->wantsJson()
                    ? new JsonResponse([], 202)
                    : back()->with('resent', true);
    }
}