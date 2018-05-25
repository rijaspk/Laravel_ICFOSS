<?php

namespace App\Http\Middleware;
use redirect;
     use AuthenticatesUsers;
use Closure;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth\Auth;

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
            if (Auth::user()->role == 'Admin')
        {
            return redirect('/dash');
        }
        else
        {
            return redirect('/DepartmentHead');
        }
     }
       return $next($request);

}

}
