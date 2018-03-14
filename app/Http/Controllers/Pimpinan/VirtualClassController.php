<?php

namespace App\Http\Controllers\Pimpinan;

use App\Models\AngkatanDiklat;
use App\Models\KelasVirtual;
use App\Models\KelasPost;
use App\Models\KelasComment;
use App\Models\AngkatanPeserta;
use App\Models\TugasPost;

use Auth;
use Session;
use Pusher\Pusher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VirtualClassController extends Controller
{
    public function getAngkatanList()
    {
    	$listAngkatan = AngkatanDiklat::all();

    	return vieW('pimpinan.virtualclass.angkatan', [
    		'listAngkatan' => $listAngkatan
    	]);
    }

    public function getListKelas($id)
    {
    	$listKelas = KelasVirtual::where('angkatan_diklat_id', $id)->get();

    	return view('pimpinan.virtualclass.kelas', [
    		'listKelas' => $listKelas
    	]);
    }

    public function getKelas($id)
    {
        $user_id = Auth::user()->id;
        $kelas = KelasVirtual::find($id);
        $posting = KelasPost::where('kelas_virtual_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        $anggota = AngkatanPeserta::where('angkatan_diklat_id', $kelas->angkatan_diklat_id)->get(); 
        $tugas = TugasPost::where('kelas_virtual_id', $id)->orderBy('created_at', 'desc')->get();

        return view('pimpinan.virtualclass.main', [
            'kelas' => $kelas,
            'posting' => $posting, 
            'anggota' => $anggota, 
            'tugas' => $tugas
        ]);
    }
}
