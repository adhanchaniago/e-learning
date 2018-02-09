<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Instruktur
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
        if (Auth::check()) {
            if (Auth::user()->hak_akses->slug != 'instruktur') {
                return redirect()->route('getLoginPage');
            } else {
                if (Auth::user()->status == '0') {
                    return redirect()->route('getLogout');
                }
                return $next($request);
            }
        } else {
            return redirect()->route('getLoginPage');
        }
    }
}
