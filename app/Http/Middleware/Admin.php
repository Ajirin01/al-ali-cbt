<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::check()){
            if(Auth::user()->role == "admin" || Auth::user()->role == "teacher"){
                return $next($request);
            }else{
                Auth::logout();
                return redirect(route('admin-login'));
            }
    
        }else{
            return redirect(route('admin-login'));
        }

        
    }
}
