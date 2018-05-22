<?php

namespace App\Http\Middleware;

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
            return redirect('/dash');
        }
        return $next($request);
    }
    // public function redirectTo()
    // {
    //     $user=Auth::user();
    //     if($user=="member"){
    //         return '/DepartmentHead';
    //     }else {
    //         return '/dash';
    //     }
    // }


    // public function redirectTo()
    // {
    //     return '/path';
    // }
}
