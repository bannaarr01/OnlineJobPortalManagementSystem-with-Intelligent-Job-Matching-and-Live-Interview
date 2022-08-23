<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Seeker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {    //pass d request if this....else do d below
        if(Auth::check()&&Auth::user()->user_type=='seeker')
        {
            return $next($request);

        }else{
                return redirect('/'); //Redirect user to welcome.blade.php
            }
        
    }
}
