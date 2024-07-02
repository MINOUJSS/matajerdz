<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class MultiAuthEnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        
        $guards = array_keys(config('auth.guards'));
        
    foreach($guards as $guard) {

        if ($guard == 'supplier') {

            if (Auth::guard($guard)->check()) {

                if (! Auth::guard($guard)->user() ||
                    (Auth::guard($guard)->user() instanceof MustVerifyEmail &&
                    ! Auth::guard($guard)->user()->hasVerifiedEmail())) {
                    return $request->expectsJson()
                            ? abort(403, 'Your email address is not verified.')
                            : Redirect::route('supplier.verification.notice');
                }  

            }

        }

        elseif ($guard == 'seller') {
            
            if (Auth::guard($guard)->check()) {

                if (! Auth::guard($guard)->user() ||
                    (Auth::guard($guard)->user() instanceof MustVerifyEmail &&
                    ! Auth::guard($guard)->user()->hasVerifiedEmail())) {
                    return $request->expectsJson()
                            ? abort(403, 'Your email address is not verified.')
                            : Redirect::route('seller.verification.notice');
                }  

            }

        }

        elseif ($guard == 'local_livereur') {
            
            if (Auth::guard($guard)->check()) {

                if (! Auth::guard($guard)->user() ||
                    (Auth::guard($guard)->user() instanceof MustVerifyEmail &&
                    ! Auth::guard($guard)->user()->hasVerifiedEmail())) {
                    return $request->expectsJson()
                            ? abort(403, 'Your email address is not verified.')
                            : Redirect::route('local-livereur.verification.notice');
                }  

            }

        }

        elseif ($guard == 'company_livereur') {
            
            if (Auth::guard($guard)->check()) {

                if (! Auth::guard($guard)->user() ||
                    (Auth::guard($guard)->user() instanceof MustVerifyEmail &&
                    ! Auth::guard($guard)->user()->hasVerifiedEmail())) {
                    return $request->expectsJson()
                            ? abort(403, 'Your email address is not verified.')
                            : Redirect::route('company-livereur.verification.notice');
                }  

            }

        }

        elseif ($guard == 'dropshiper') {
            
            if (Auth::guard($guard)->check()) {

                if (! Auth::guard($guard)->user() ||
                    (Auth::guard($guard)->user() instanceof MustVerifyEmail &&
                    ! Auth::guard($guard)->user()->hasVerifiedEmail())) {
                    return $request->expectsJson()
                            ? abort(403, 'Your email address is not verified.')
                            : Redirect::route('dropshiper.verification.notice');
                }  

            }

        }

        elseif ($guard == 'web') {

            if (Auth::guard($guard)->check()) {

                if (! Auth::guard($guard)->user() ||
                    (Auth::guard($guard)->user() instanceof MustVerifyEmail &&
                    ! Auth::guard($guard)->user()->hasVerifiedEmail())) {
                    return $request->expectsJson()
                            ? abort(403, 'Your email address is not verified.')
                            : Redirect::route('verification.notice');
                    }  

                }
            }

        }
        // if (! $request->user() ||
        //     ($request->user() instanceof MustVerifyEmail &&
        //     ! $request->user()->hasVerifiedEmail())) {
        //     return $request->expectsJson()
        //             ? abort(403, 'Your email address is not verified.')
        //             : Redirect::route($redirectToRoute ?: 'verification.notice');
        // }

        return $next($request);
    }
}
