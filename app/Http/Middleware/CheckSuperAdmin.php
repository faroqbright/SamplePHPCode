<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckSuperAdmin
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
        if(Auth::user()->user_type=="Super Admin")
        {
         return $next($request);
        } else{
            abort(403,'Unathorized Action');
        }
    }
}
