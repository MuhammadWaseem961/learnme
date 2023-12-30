<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->type;
            switch ($role) {
                case 'seller':
                    return redirect('/specialist/dashboard');
                    break;
                case 'buyer':
                    return redirect('/client');
                    break;
                default:
                    return redirect('login');
                    break;
            }
        }

        // return $next($request);
        // if (Auth::guard($guard)->check()) {
        //     return redirect()->route('admin.dashboard');
        // }

        return $next($request);
    }
}
