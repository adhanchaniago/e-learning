<?php

namespace App\Http\Middleware;

use Config;
use Auth;
use Closure;

class FileBrowser
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
        if(Auth::check()) {
            // config(['elfinder.roots' => [
            //     [
            //         'driver' => 'LocalFileSystem',
            //         'path' => storage_path('app/public/kelas/'.Auth::user()->id),
            //         'URL' => 'http://e-learning.test/storage/kelas/x/'.Auth::user()->id,
            //         'alias' => Auth::user()->username,
            //     ]
            // ]]);

                // \Config::set(['elfinder.roots.0.path' => 'asdasd']);
                // \Config::set('elfinder.roots.0.alias', Auth::user()->username);
                // $y = \Config::get('elfinder.roots.0.path');
                // $y = config('elfinder.roots');
                // dd($y);
        }
        return $next($request);
    }
}
