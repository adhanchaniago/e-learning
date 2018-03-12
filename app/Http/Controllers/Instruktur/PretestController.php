<?php

namespace App\Http\Controllers\Instruktur;

use App\Models\PreTest;
use App\Models\PretestSoal;
use App\Models\PretestJawaban;
use App\Models\AngkatanPeserta;
use App\Models\UserAccount;
use App\Models\KelasVirtual;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PretestController extends Controller
{
    public function getTambahPretestPage($id)
    {
    	$kelasID = $id;
    	$listSoal = PreTest::where('kelas_virtual_id', $kelasID)->first()->soal;
    	
    	return view('instruktur.pretest.tambah', [ 
    		'kelasID' => $kelasID,
    		'listSoal' => $listSoal
    	]);
    }

    public function postTambahPretest(Request $request, $id)
    {
    	$this->validate($request, [
    		'kelas_virtual_id' => 'required',
    		'soal' => 'required',
    		'jns_soal' => 'required'
    	]);
    	
    	$pretestID = PreTest::where('kelas_virtual_id', $request->kelas_virtual_id)->first()->id;
    	$jenis = $request->jns_soal;

    	if ($jenis == 'essay') {
    		$input = new PretestSoal([
    			'pre_test_id' => $pretestID,
    			'jenis_soal' => $jenis,
    			'soal' => $request->soal
    		]);		
    		$input->save();
    	} elseif ($jenis == 'objektif') {
    		$input = new PretestSoal([
    			'pre_test_id' => $pretestID,
    			'jenis_soal' => $jenis,
    			'soal' => $request->soal,
    			'opsi_a' => $request->opsi_a,
    			'opsi_b' => $request->opsi_b,
    			'opsi_c' => $request->opsi_c,
    			'opsi_d' => $request->opsi_d,
    		]);		
    		$input->save();
    	}
    	
    	Session::flash('success', 'Soal PreTest berhasil ditambahkan.');
    	return redirect()->back();
    }

    public function getListJawabanPretest($id)
    {
        $kelasID = $id;
        $angkatanID = PreTest::where('kelas_virtual_id', $id)->first()->kelas->angkatan_diklat->id;
        $listPeserta = AngkatanPeserta::where('angkatan_diklat_id', $angkatanID)->get();

        return view('instruktur.pretest.list_jawaban',[
            'listPeserta' => $listPeserta, 
            'kelasID' => $kelasID
        ]);
    }

    public function getDetailJawabanPretest($kelas, $user)
    {
        $user = UserAccount::find($user);
        $kelasV = KelasVirtual::find($kelas);
        $preTestID = PreTest::where('kelas_virtual_id', $kelas)->first()->id;
        $listSoal = PretestSoal::where('pre_test_id', $preTestID)->get();
        // dd($user);
        return view('instruktur.pretest.detail',[
            'user' => $user,
            'listSoal' => $listSoal, 
            'kelas' => $kelasV
        ]);
    }

    public function postNilaiPretest(Request $request)
    {
        $userID = $request->user_id;
        $countSoal = count($request->soal_id);

        for ($i=0; $i < $countSoal; $i++) { 
            $update = PretestJawaban::where('users_account_id', $userID)->where('pretest_soal_id', $request->soal_id[$i])->first();
            $update->nilai = $request->{'nilai_'.$i};
            $update->save();
        }
        
        return redirect()->back();
    }
}
