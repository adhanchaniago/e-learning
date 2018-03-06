<?php

namespace App\Http\Controllers\Peserta;

use App\Models\AngkatanDiklat;
use App\Models\AngkatanPeserta;
use App\Models\KelasVirtual;
use App\Models\UserProfil;

use Auth;
use PDF;
use Session;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NilaiController extends Controller
{
    public function getNilaiPage()
    {
    	$user = Auth::user()->user_profil;
    	$angkatanID = AngkatanPeserta::where('users_account_id', $user->user_account->id)->first()->angkatan_diklat_id;
    	$angkatan = AngkatanDiklat::find($angkatanID);
    	$listNilai = $this->getNilaiData($angkatanID, $user->user_account->id);
    	$pimpinan = UserProfil::where('nik', 'P84567')->first();

    	return view('peserta.nilai.main', [
    		'user' => $user, 
    		'angkatan' => $angkatan,
    		'listNilai' => $listNilai['data'], 
    		'extra' => $listNilai['main'], 
    		'pimpinan' => $pimpinan
    	]);
    }

    public function getPDFNilai()
    {
    	$user = Auth::user()->user_profil;
    	$angkatanID = AngkatanPeserta::where('users_account_id', $user->user_account->id)->first()->angkatan_diklat_id;
    	$angkatan = AngkatanDiklat::find($angkatanID);
    	$listNilai = $this->getNilaiData($angkatanID, $user->user_account->id);
    	$pimpinan = UserProfil::where('nik', 'P84567')->first();

    	$pdf = PDF::loadView('peserta.nilai.pdf', [
    		'user' => $user, 
    		'angkatan' => $angkatan,
    		'listNilai' => $listNilai['data'], 
    		'extra' => $listNilai['main'], 
    		'pimpinan' => $pimpinan
    	])->setPaper('a4', 'portrait')->save(storage_path('app/public/pdf/nilai/laporan-nilai-individu.pdf'));

        return $pdf->stream('pdf/nilai/laporan-nilai-individu.pdf')->header('Content-Type','application/pdf');
    }

    public function getNilaiData($angkatan, $user)
    {
    	$listNilai = [];

    	$listKelas = KelasVirtual::where('angkatan_diklat_id', $angkatan)->get();
    	$countKelas = count($listKelas);
    	$total = 0;
    	foreach ($listKelas as $key => $value) {
    		$listNilai['data'][$key]['slug'] = $value->mata_pelajaran->slug;
    		$listNilai['data'][$key]['pelajaran'] = $value->mata_pelajaran->nama_pelajaran;
    		$countTugas = count($value->tugas_post);
    		$akmNilai = 0;
    		foreach ($value->tugas_post as $key2 => $value2) {
    			$jawaban = $value2->tugas_jawaban->where('users_account_id', $user)->first();
    			if ($jawaban == NULL) {
    				$akmNilai = $akmNilai + 0;
    			} else {
    				$xNilai = $jawaban->tugas_nilai->first();
    				if ($xNilai == NULL) {
    					$akmNilai = $akmNilai + 0;
    				} else {
    					$akmNilai = $akmNilai + $xNilai->nilai;
    				}
    			}
    		}
    		if ($akmNilai == 0) {
    			$rataNilai = 0;
    		} else {
    			$rataNilai = round($akmNilai / $countTugas, 2);
    		}
    		$listNilai['data'][$key]['nilai'] = $rataNilai;
    		$total = $total + $rataNilai;
    		$listNilai['main']['total'] = $total;
    		$listNilai['main']['rata'] = $total / $countKelas;
    	}
    	
    	return $listNilai;
    }

}
