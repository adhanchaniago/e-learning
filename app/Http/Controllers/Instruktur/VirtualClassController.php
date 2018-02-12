<?php

namespace App\Http\Controllers\Instruktur;

use App\Models\KelasVirtual;

use Auth;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VirtualClassController extends Controller
{
    public function getVirtualClassListPage()
    {
    	return view('instruktur.virtualclass.list');
    }

    public function getDataVirtualClassList()
    {
    	$user_id = Auth::user()->id;
    	$listKelas = KelasVirtual::where('users_account_id', $user_id)->whereHas('angkatan_diklat', function ($query) {
    		$query->where('status', '1');
    	})->get();

    	return Datatables::of($listKelas)
            ->addColumn('action', function ($kelas) {
                return '
                    <a href="virtualclass/download/'.$kelas->id.'" class="btn btn-sm btn-success btn-icon btn-icon-mini btn-round"><i class="fa fa-download"></i></a>
                    <a href="virtualclass/hapus/'.$kelas->id.'" class="btn btn-sm btn-danger btn-icon btn-icon-mini btn-round"><i class="fa fa-trash"></i></a>
                ';
            })
            ->editColumn('angkatan_diklat_id', function($kelas) {
            	return $kelas->angkatan_diklat->nama_diklat;
            })
            ->editColumn('mata_pelajaran_id', function($kelas) {
            	return $kelas->mata_pelajaran->nama_pelajaran;
            })
            ->editColumn('status', function ($kelas) {
            	if ($kelas->status == '0') {
            		return 'Offline';
            	} elseif ($kelas->status == '1') {
            		return 'Online';
            	}
            })
            ->make(true);
    }
}
