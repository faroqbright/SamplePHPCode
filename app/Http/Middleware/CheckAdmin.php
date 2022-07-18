<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // echo Auth::user()->user_type;die;
        if(Auth::user()->user_type=="Admin")
        {
         return $next($request);
        } else{
            abort(403,'Unathorized Action');
        }
    }
}
