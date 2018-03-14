<?php

namespace App\Http\Controllers\Instruktur;

use App\Models\PreTest;
use App\Models\PretestSoal;
use App\Models\PretestJawaban;
use App\Models\PostTest;
use App\Models\PosttestSoal;
use App\Models\PosttestJawaban;
use App\Models\AngkatanPeserta;
use App\Models\UserAccount;
use App\Models\KelasVirtual;

use Session;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function getInstrukturHomePage()
    {
    	$profil = UserAccount::find(Auth::user()->id);
    	return view('instruktur.home', [
    		'profil' => $profil
    	]);
    }

    public function getLaporanTest($id)
    {

    	$dataNilai = [];
        $kelasID = $id;
        $angkatanID = KelasVirtual::find($id)->angkatan_diklat->id;
        $peserta = AngkatanPeserta::where('angkatan_diklat_id', $angkatanID)->get();
        $preTest = PreTest::where('kelas_virtual_id', $id)->first();
        $postTest = PostTest::where('kelas_virtual_id', $id)->first();
        $countSoalPre = count($preTest->soal);
        $countSoalPost = count($postTest->soal);

        foreach ($peserta as $key => $value) {

            $dataNilai[$key]['id'] = $value->user_account->id;
            $dataNilai[$key]['nik'] = $value->user_account->user_profil->nik;
            $dataNilai[$key]['nama'] = $value->user_account->user_profil->nama;
            
            $preTotNilai = 0;
            $postTotNilai = 0;

            foreach ($preTest->soal as $key2 => $value2) {

                $nilai = @$value2->jawaban->where('users_account_id', $value->user_account->id)->first()->nilai;
                $preTotNilai = $preTotNilai + $nilai;

            }

            foreach ($postTest->soal as $key2 => $value2) {

                $nilai = @$value2->jawaban->where('users_account_id', $value->user_account->id)->first()->nilai;
                $postTotNilai = $postTotNilai + $nilai;

            }

            $dataNilai[$key]['pre-test'] = round($preRata = $preTotNilai / $countSoalPre, 2);
            $dataNilai[$key]['post-test'] = round($postRata = $postTotNilai / $countSoalPost, 2);

            if ($preRata < $postRata) {
            	$dataNilai[$key]['keterangan'] = 'Meningkat';
            } elseif ($preRata > $postRata) {
            	$dataNilai[$key]['keterangan'] = 'Menurun';
            }

        }

    	return view('instruktur.laporan.test', [
    		'dataNilai' => $dataNilai,
    		'kelasID' => $kelasID
    	]);
    }
    
    public function getLaporanTestData($id)
    {
    	$dataNilai = [];

    	$angkatanID = KelasVirtual::find($id)->angkatan_diklat->id;
        $peserta = AngkatanPeserta::where('angkatan_diklat_id', $angkatanID)->get();
        $preTest = PreTest::where('kelas_virtual_id', $id)->first();
        $postTest = PostTest::where('kelas_virtual_id', $id)->first();
        $countSoalPre = count($preTest->soal);
        $countSoalPost = count($postTest->soal);

        foreach ($peserta as $key => $value) {

            $dataNilai['peserta'][] = $value->user_account->user_profil->nama;

            $preTotNilai = 0;
            $postTotNilai = 0;

            foreach ($preTest->soal as $key2 => $value2) {

                $nilai = @$value2->jawaban->where('users_account_id', $value->user_account->id)->first()->nilai;
                $preTotNilai = $preTotNilai + $nilai;

            }

            foreach ($postTest->soal as $key2 => $value2) {

                $nilai = @$value2->jawaban->where('users_account_id', $value->user_account->id)->first()->nilai;
                $postTotNilai = $postTotNilai + $nilai;

            }

            $dataNilai['pre-test'][] = round($preRata = $preTotNilai / $countSoalPre, 2);
            $dataNilai['post-test'][] = round($postRata = $postTotNilai / $countSoalPost, 2);

        }
        
        return response()->json([
            'success' => true,
            'data' => $dataNilai,
        ]);
    }
}
