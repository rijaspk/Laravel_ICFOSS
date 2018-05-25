<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;
use Redirect;
use Illuminate\Support\Facades\Auth;
class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next )
    {
        //$role =Auth::user()->role;

        if (Auth::user()->role == 'Admin')
    {
        return redirect('/dash');
    }
    else
    {
        return redirect('/DepartmentHead');
    }
    }
}
