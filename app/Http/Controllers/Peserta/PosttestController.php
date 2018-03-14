<?php

namespace App\Http\Controllers\Peserta;

use App\Models\AngkatanPeserta;
use App\Models\KelasVirtual;
use App\Models\PostTest;
use App\Models\PosttestSoal;
use App\Models\PosttestJawaban;
use App\Models\TestCounter;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PosttestController extends Controller
{
    public function getPostTestList()
    {
    	$userID = Auth::user()->id;
    	$angkatanID = AngkatanPeserta::where('users_account_id', $userID)->first()->angkatan_diklat->id;
    	$kelasVirtual = KelasVirtual::where('angkatan_diklat_id', $angkatanID)->get();
    	
    	return view('peserta.posttest.list', [
    		'kelasVirtual' => $kelasVirtual
    	]);
    }

    public function getPosttestSoal($id)
    {
    	$kelasID = $id;
    	$postTest = PostTest::where('kelas_virtual_id', $kelasID)->first();
    	$kelas = KelasVirtual::find($kelasID);
    	$listSoal = PosttestSoal::where('post_test_id', $postTest->id)->get();

    	return view('peserta.posttest.soal', [
    		'listSoal' => $listSoal, 
    		'kelas' => $kelas
    	]);
    }

    public function postPosttestSoal($id, Request $request)
    {
    	$userID = Auth::user()->id;
    	$countSoal = count($request->soal_id);
    	
    	for ($i=0; $i < $countSoal; $i++) { 
    		$input = new PosttestJawaban([
    			'users_account_id' => $userID,
    			'posttest_soal_id' => $request->soal_id[$i],
    			'nilai' => 0,
    			'jawaban' => $request->{'jawaban_'.$i}
    		]);
    		$input->save();
    	}

    	$testCounter = TestCounter::where('users_account_id', $userID)->first();

    	$update = TestCounter::find($testCounter->id);
    	$update->pos_test_count = $testCounter->pos_test_count + 1;
    	$update->save();

    	Session::flash('success', 'Jawaban Post-Test berhasil ditambahkan.');
    	return redirect()->route('getPostTestList');
    }
}
