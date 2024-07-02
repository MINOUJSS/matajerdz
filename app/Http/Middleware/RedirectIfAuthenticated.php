<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if($guard=='super_admin')
            {
                return redirect()->route('super-admin.dashboard');
            }elseif($guard=='supplier')
            {
                return redirect()->route('supplier.dashboard');
            }elseif($guard=='seller')
            {
                return redirect()->route('seller.dashboard');
            }elseif($guard=='dropshiper')
            {
                return redirect()->route('dropshiper.dashboard');
            }elseif($guard=='local_livereur')
            {
                return redirect()->route('local-livereur.dashboard');
            }
            elseif($guard=='company_livereur')
            {
                return redirect()->route('company-livereur.dashboard');
            }else
            {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
