<?php

namespace App\Http\Controllers\Staff;

use App\Models\AngkatanDiklat;

use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AngkatanDiklatController extends Controller
{
    public function getAngkatanDiklatPage()
    {
    	return view('staff.angkatandiklat.main');
    }

    public function getDataAngkatanDiklat()
    {
    	$angkatanDiklat = AngkatanDiklat::select(['id', 'nama_diklat', 'tanggal_mulai', 'tanggal_selesai', 'keterangan']);
    	return Datatables::of($angkatanDiklat)
    		->addColumn('action', function ($user) {
                return '<a href="#edit-'.$user->id.'" class="btn btn-sm btn-success btn-icon  btn-icon-mini btn-round"><i class="fa fa-edit"></i></a>';
            })
    		->editColumn('tanggal_mulai', function ($angkatan){
    			return Carbon::parse($angkatan->tanggal_mulai)->format('d-M-Y');
    		})
    		->editColumn('tanggal_selesai', function ($angkatan){
    			return Carbon::parse($angkatan->tanggal_selesai)->format('d-M-Y');
    		})
    		->make(true);
    }

    public function getAddAngkatanDiklatPage()
    {
    	dd('masuk halaman tambah angkatan diklat');
    }
}
