<?php

namespace App\Http\Controllers\Staff;

use App\Models\UserAccount;
use App\Models\UserProfil;
use App\Models\KantorCabang;
use App\Models\AngkatanDiklat;

use Auth;
use Session;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAkunController extends Controller
{
    public function getUserAkunPage()
    {
    	return view('staff.userakun.main');
    }

    public function getDataUserAkun()
    {
    	return Datatables::of(UserProfil::query())
    		->addColumn('ttl', function ($user) {
                return $user->tempat_lahir.', '.Carbon::parse($user->tanggal_lahir)->format('d M Y');
            })
            ->addColumn('action', function ($angkatan) {
                return '
                    <a href="angkatandiklat/ubah/'.$angkatan->id.'" class="btn btn-sm btn-green btn-icon btn-icon-mini btn-round"><i class="fa fa-edit"></i></a>
                    <a href="angkatandiklat/hapus/'.$angkatan->id.'" class="btn btn-sm btn-danger btn-icon btn-icon-mini btn-round"><i class="fa fa-trash"></i></a>
                ';
            })
            ->editColumn('kantor_cabang_id', function($user){
            	return $user->kantor_cabang->nama;
            })
    		->make(true);
    }

    public function getAddUserAkunPage()
    {
    	$cabang = KantorCabang::all();
    	return view('staff.userakun.add', [
    		'cabang' => $cabang
    	]);
    }

    public function postAddUserAkun(Request $request)
    {
    	dd($request->all());
    }
}
