<?php

namespace App\Http\Middleware;

use App\Models\AngkatanPeserta;

use Auth;
use Session;
use Closure;

class Peserta
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
            if (Auth::user()->hak_akses->slug != 'peserta') {
                return redirect()->route('getLoginPage');
            } else {
                if (Auth::user()->status == '0') {
                    return redirect()->route('getLogout');
                } else {
                    $pretestStatus = Auth::user()->test_counter->first()->pre_test_count;
                    $countKelas = count(AngkatanPeserta::where('users_account_id', Auth::user()->id)->first()->angkatan_diklat->kelas_virtual);
                    if ($pretestStatus == 0 || $pretestStatus != $countKelas) {
                        Session::flash('info', 'Untuk mengaktifkan full feature, silahkan mengerjakan pre-test terlebih dahulu.');
                        return redirect()->route('getPreTestList');
                    }
                    return $next($request);
                }
            }
        } else {
            return redirect()->route('getLoginPage');
        }
    }
}
