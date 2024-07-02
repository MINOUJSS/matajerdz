<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // taping super-admin or super-admin/* in url
        if($request->is('super-admin') ||$request->is('super-admin/*'))
        {
            if (! $request->expectsJson()) {
                return route('super-admin.login');
            }
        }elseif($request->is('supplier') ||$request->is('supplier/*'))
        {
            if (! $request->expectsJson()) {
                return route('supplier.login');
            }
        }elseif($request->is('seller') ||$request->is('seller/*'))
        {
            if (! $request->expectsJson()) {
                return route('seller.login');
            }
        }elseif($request->is('dropshiper') ||$request->is('dropshiper/*'))
        {
            if (! $request->expectsJson()) {
                return route('dropshiper.login');
            }
        }elseif($request->is('local-livereur') ||$request->is('local-livereur/*'))
        {
            if (! $request->expectsJson()) {
                return route('local-livereur.login');
            }
        }elseif($request->is('company-livereur') ||$request->is('company-livereur/*'))
        {
            if (! $request->expectsJson()) {
                return route('company-livereur.login');
            }
        }else
        {
            if (! $request->expectsJson()) {
                return route('login');
            }
        }
        
    }
}
