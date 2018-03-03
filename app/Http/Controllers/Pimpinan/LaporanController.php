<?php

namespace App\Http\Controllers\Pimpinan;

use App\Models\UserAccount;

use PDF;
use Session;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function getDataInstrukturPage()
    {
    	return view('pimpinan.data-instruktur.main');
    }

    public function getDataInstruktur()
    {
    	$dataInstruktur = UserAccount::whereHas('hak_akses', function($q) {
    		$q->where('slug', 'instruktur');
    	})->get();

    	return Datatables::of($dataInstruktur)
	    	->addColumn('nik', function($data) {
	    		return $data->user_profil->nik;
	    	})
	    	->addColumn('nama', function($data) {
	    		return $data->user_profil->nama;
	    	})
	    	->addColumn('ttl', function($data) {
	    		return $data->user_profil->tempat_lahir.', '.Carbon::parse($data->user_profil->tanggal_lahir)->format('d M Y');
	    	})
	    	->addColumn('jekel', function($data) {
	    		return $data->user_profil->jenis_kelamin;
	    	})
	    	->addColumn('agama', function($data) {
	    		return $data->user_profil->agama;
	    	})
	    	->addColumn('alamat', function($data) {
	    		return $data->user_profil->alamat;
	    	})
	    	->addColumn('telepon', function($data) {
	    		return $data->user_profil->telepon;
	    	})
	    	->addColumn('cabang', function($data) {
	    		return $data->user_profil->kantor_cabang->nama;
	    	})
    		->make(true);
    }

    public function getPDFInstruktur()
    {
    	$dataInstruktur = UserAccount::whereHas('hak_akses', function($q) {
    		$q->where('slug', 'instruktur');
    	})->orderBy('username')->get();

    	$pdf = PDF::loadView('pimpinan.data-instruktur.pdf', [
    		'dataInstruktur' => $dataInstruktur
    	])->setPaper('a4', 'landscape')->save(storage_path('app/public/pdf/instruktur/xxx.pdf'));

        return $pdf->stream('pdf/instruktur/xxx.pdf')->header('Content-Type','application/pdf');
    }

    public function getListAngkatanDiklatPage()
    {
    	
    }

    public function getDataPesertaPage()
    {

    }
}
