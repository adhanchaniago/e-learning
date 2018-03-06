<?php

namespace App\Http\Controllers\Pimpinan;

use App\Models\UserAccount;
use App\Models\AngkatanDiklat;
use App\Models\AngkatanPeserta;
use App\Models\KelasVirtual;

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
    	])->setPaper('a4', 'landscape')->save(storage_path('app/public/pdf/instruktur/laporan-instruktur.pdf'));

        return $pdf->stream('pdf/instruktur/laporan-instruktur.pdf')->header('Content-Type','application/pdf');
    }

    public function getListAngkatanDiklatPage()
    {
    	$angkatanDiklat = AngkatanDiklat::all();

    	return view('pimpinan.list-angkatan', [
    		'angkatanDiklat' => $angkatanDiklat
    	]);
    }

    public function getDataPesertaPage($id)
    {
    	return view('pimpinan.data-peserta.main', [
    		'angkatanID' => $id
    	]);
    }

    public function	getDataPeserta($id)
    {
    	$dataPeserta = AngkatanPeserta::where('angkatan_diklat_id', $id)->get();

    	return Datatables::of($dataPeserta)
    		->addColumn('nik', function($data) {
	    		return $data->user_account->user_profil->nik;
	    	})
	    	->addColumn('nama', function($data) {
	    		return $data->user_account->user_profil->nama;
	    	})
	    	->addColumn('ttl', function($data) {
	    		return $data->user_account->user_profil->tempat_lahir.', '.Carbon::parse($data->user_account->user_profil->tanggal_lahir)->format('d M Y');
	    	})
	    	->addColumn('jekel', function($data) {
	    		return $data->user_account->user_profil->jenis_kelamin;
	    	})
	    	->addColumn('agama', function($data) {
	    		return $data->user_account->user_profil->agama;
	    	})
	    	->addColumn('alamat', function($data) {
	    		return $data->user_account->user_profil->alamat;
	    	})
	    	->addColumn('telepon', function($data) {
	    		return $data->user_account->user_profil->telepon;
	    	})
	    	->addColumn('cabang', function($data) {
	    		return $data->user_account->user_profil->kantor_cabang->nama;
	    	})
    		->make(true);
    }

    public function getPDFPeserta($id)
    {
    	$dataPeserta = AngkatanPeserta::with([
    		'user_account' => function($q) {
    			$q->orderBy('username');
    		}
    	])->where('angkatan_diklat_id', $id)->get();

    	$diklat = AngkatanDiklat::find($id);

    	$pdf = PDF::loadView('pimpinan.data-peserta.pdf', [
    		'dataPeserta' => $dataPeserta,
    		'diklat' => $diklat
    	])->setPaper('a4', 'landscape')->save(storage_path('app/public/pdf/peserta/laporan-peserta.pdf'));

        return $pdf->stream('pdf/peserta/laporan-peserta.pdf')->header('Content-Type','application/pdf');
    }

    public function getDataNilaiPage($id)
    {
    	$listNilai = $this->nilaiProses($id);
    	$mataPelajaran = KelasVirtual::where('angkatan_diklat_id', $id)->get();
    	return view('pimpinan.data-nilai.main', [
    		'angkatanID' => $id,
    		'mataPelajaran' => $mataPelajaran, 
    		'nilaiArray' => $listNilai
    	]);
    }

    public function getPDFNilai($id)
    {
    	$listNilai = $this->nilaiProses($id);
    	$mataPelajaran = KelasVirtual::where('angkatan_diklat_id', $id)->get();
    	$diklat = AngkatanDiklat::find($id);

    	$pdf = PDF::loadView('pimpinan.data-nilai.pdf', [
    		'mataPelajaran' => $mataPelajaran, 
    		'nilaiArray' => $listNilai,
    		'diklat' => $diklat
    	])->setPaper('a4', 'landscape')->save(storage_path('app/public/pdf/nilai/laporan-nilai.pdf'));

        return $pdf->stream('pdf/nilai/laporan-nilai.pdf')->header('Content-Type','application/pdf');
    }

    private function nilaiProses($angkatan_id)
    {
    	$nilaiArray = [];

    	$listKelas = KelasVirtual::where('angkatan_diklat_id', $angkatan_id)->get();
    	$listPeserta = AngkatanPeserta::where('angkatan_diklat_id', $angkatan_id)->get();

    	foreach ($listPeserta as $key => $value) {
    		$nilaiArray[$key]['users_id'] = $value->user_account->id;
    		$nilaiArray[$key]['users_nik'] = $value->user_account->user_profil->nik;
    		$nilaiArray[$key]['users_nama'] = $value->user_account->user_profil->nama;
    		$nilaiArray[$key]['users_cabang'] = $value->user_account->user_profil->kantor_cabang->nama;
    		$userID = $value->user_account->id;
    		$total = 0;
    		foreach ($listKelas as $key2 => $value2) {
    			$countTugas = count($value2->tugas_post);
    			$akmNilai = 0;
    			foreach ($value2->tugas_post as $value3) {
    				$jawaban = $value3->tugas_jawaban->where('users_account_id', $userID)->first();
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
    			$nilaiArray[$key][$value2->mata_pelajaran->slug] = $rataNilai;
    			$total = $total + $rataNilai;
    		}
    		$nilaiArray[$key]['total'] = $total;
    		$nilaiArray[$key]['rata'] = round($total/count($listKelas), 2);
    	}
    	return $nilaiArray;
    }

}
