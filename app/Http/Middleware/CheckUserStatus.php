<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
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
        if (Auth::user()->active_status === '0' || Auth::user()->active_status === '2') {
            Auth::logout();
            return redirect()->route('login')->with('LoginStatusError', 'An error has occurred please try again later.');
        }

        return $next($request);
    }
}
