<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Authenticate
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
        if (!Auth::check()) {
            if ($request->ajax()) {
                return response('Unauthorized', 401);
            } else {
                return redirect()->route('getLoginPage');
            }
        }
        return $next($request);
    }
}
