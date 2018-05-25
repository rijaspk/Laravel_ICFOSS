<?php

namespace App\Http\Controllers;
Use Auth;
use Illuminate\Http\Request;

class userRoleContoller extends Controller
{
    public function overview(){
        if(Auth::user()->role == 'Admin'){
            return redirect('/dash');
        }else {
            return redirect('/DepartmentHead');
        }
    }
}
