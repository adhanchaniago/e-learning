<?php

namespace App\Http\Controllers\Peserta;

use App\Models\AngkatanPeserta;
use App\Models\KelasVirtual;
use App\Models\PreTest;
use App\Models\PretestSoal;
use App\Models\PretestJawaban;
use App\Models\TestCounter;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PretestController extends Controller
{
    public function getPreTestList()
    {
    	$userID = Auth::user()->id;
    	$angkatanID = AngkatanPeserta::where('users_account_id', $userID)->first()->angkatan_diklat->id;
    	$kelasVirtual = KelasVirtual::where('angkatan_diklat_id', $angkatanID)->get();
    	
    	return view('peserta.pretest.list', [
    		'kelasVirtual' => $kelasVirtual
    	]);
    }

    public function getPretestSoal($id)
    {
    	$kelasID = $id;
    	$preTest = PreTest::where('kelas_virtual_id', $kelasID)->first();
    	$kelas = KelasVirtual::find($kelasID);
    	$listSoal = PretestSoal::where('pre_test_id', $preTest->id)->get();

    	return view('peserta.pretest.soal', [
    		'listSoal' => $listSoal, 
    		'kelas' => $kelas
    	]);
    }

    public function postPretestSoal($id, Request $request)
    {
    	$userID = Auth::user()->id;
    	$countSoal = count($request->soal_id);
    	
    	for ($i=0; $i < $countSoal; $i++) { 
    		$input = new PretestJawaban([
    			'users_account_id' => $userID,
    			'pretest_soal_id' => $request->soal_id[$i],
    			'nilai' => 0,
    			'jawaban' => $request->{'jawaban_'.$i}
    		]);
    		$input->save();
    	}

    	$testCounter = TestCounter::where('users_account_id', $userID)->first();

    	$update = TestCounter::find($testCounter->id);
    	$update->pre_test_count = $testCounter->pre_test_count + 1;
    	$update->save();

    	Session::flash('success', 'Jawaban Pre-Test berhasil ditambahkan.');
    	return redirect()->route('getPesertaHomePage');
    }
}
