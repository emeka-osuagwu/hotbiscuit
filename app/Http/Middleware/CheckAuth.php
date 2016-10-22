<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckAuth
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
        if ( Auth::check()) 
        {
            return $next($request);
        }
        else
        {

            if ($request->path() == "login" || $request->path() == "register") {
                return $next($request);
            }
            return redirect('login');
        }
        
    }
}
