<?php

namespace App\Http\Controllers\General;

use Auth;
use Session;

use App\Models\KantorCabang;
use App\Models\UserProfil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilController extends Controller
{
    public function getChangeProfilPage()
    {
    	$dataProfil = Auth::user()->user_profil;
    	$dataKantor = KantorCabang::all();

    	return view('global.ubahprofil', [
    		'profil' => $dataProfil,
    		'cabang' => $dataKantor
    	]);
    }

    public function putChangeProfil(Request $request)
    {
    	$this->validate($request, [
    		'id' => 'required',
    		'nik' => 'required',
    		'nama' => 'required',
    		'email' => 'required|email',
    		'kantor_cabang_id' => 'required'
    	],[
    		'id.required' => 'ID tidak boleh kosong.',
    		'nik.required' => 'NIK tidak boleh kosong.',
    		'nama.required' => 'Nama tidak boleh kosong.',
    		'email.required' => 'Email tidak boleh kosong.',
    		'email.email' => 'Format Email tidak valid.',
    		'kantor_cabang_id.required' => 'Kontor Cabang tidak boleh kosong.'
    	]);

    	$profil = UserProfil::find($request->id);
    	$profil->nama = $request->nama;
    	$profil->email = $request->email;
    	$profil->tempat_lahir = $request->tempat_lahir;
    	$profil->tanggal_lahir = $request->tanggal_lahir;
    	$profil->jenis_kelamin = $request->jenis_kelamin;
    	$profil->agama = $request->agama;
    	$profil->alamat = $request->alamat;
    	$profil->telepon = $request->telepon;
    	$profil->kantor_cabang_id = $request->kantor_cabang_id;
    	$profil->save();

    	Session::flash('success', 'Profil berhasil diubah.');
    	return redirect()->back();

    }
}
