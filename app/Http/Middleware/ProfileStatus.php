<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class ProfileStatus
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
            if ($request->path() == "profile") 
            {
                return redirect('profile');
            }
            else
            {
                if (Auth::user()->profile_status == 0 ) 
                {
                    return redirect('profile');
                }
            }
        }
        else
        {
            return $next($request);
        }
        
    }
}
