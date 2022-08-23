<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()&&Auth::user()->user_type=='siteadmin')
        {
            return $next($request);
        }else{
            return redirect('/'); //Redirect user to welcome.blade.php
        }

    }
}
