<?php

namespace App\Http\Middleware;

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
    public function handle($request, Closure $next)
    {
        if (Auth::guard('users')->check()&&!Auth::guard('admin')-check()) {
            return redirect('/');
        }
        if(Auth::guard('admin')->check()&&Auth::guard('users')->check())
        {
            return redirect()->route('admin.home');
        }

        return $next($request);
    }
}
