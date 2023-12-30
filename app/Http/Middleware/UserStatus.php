<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class UserStatus
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
        if(Auth::check())
        {
            if(Auth::user()->type=='seller' && Auth::user()->approve=='0')
            {
                Auth::logout();
                $message = 'Profile submitted successfully. We will contact you via email (ASAP) when approved.';
                return redirect()->route('login')->withMessage($message);
            }

            return $next($request);

        }
        else{
            return redirect()->route('login');
        }
        
    }
}
