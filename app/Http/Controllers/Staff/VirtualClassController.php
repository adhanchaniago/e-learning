<?php

namespace App\Http\Controllers\Staff;

use App\Models\KelasVirtual;
use App\Models\AngkatanDiklat;
use App\Models\MataPelajaran;
use App\Models\UserAccount;
use App\Models\UserProfil;

use Auth;
use Session;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VirtualClassController extends Controller
{
   	public function getVirtualClassPage()
   	{
   		return view('staff.virtualclass.main');
   	}

   	public function getDataVirtualClass()
   	{
   		return Datatables::of(KelasVirtual::query())
    		->addColumn('action', function ($angkatan) {
                return '
                    <div class="text-center">
                        <a href="virtualclass/ubah/'.$angkatan->id.'" class="btn btn-sm btn-green btn-icon btn-icon-mini btn-round"><i class="fa fa-edit"></i></a>
                        <a href="virtualclass/hapus/'.$angkatan->id.'" class="btn btn-sm btn-danger btn-icon btn-icon-mini btn-round"><i class="fa fa-trash"></i></a>
                    </div>
                ';
            })
            ->editColumn('angkatan_diklat_id', function ($kelas){
    			return $kelas->angkatan_diklat->nama_diklat;
    		})
    		->editColumn('mata_pelajaran_id', function ($kelas){
    			return $kelas->mata_pelajaran->nama_pelajaran;
    		})
    		->editColumn('users_account_id', function ($kelas){
    			return $kelas->users_account->user_profil->nama;
    		})
    		->make(true);
   	}

   	public function getAddVirtualClassPage()
   	{
   		$angkatandiklat = AngkatanDiklat::all();
   		$matapelajaran = MataPelajaran::all();
   		$instruktur = UserAccount::where('hak_akses_id', '3')->get();

   		return view('staff.virtualclass.add', [
   			'angkatandiklat' => $angkatandiklat, 
   			'matapelajaran' => $matapelajaran, 
   			'instruktur' => $instruktur
   		]);
   	}

   	public function postAddVirtualClass(Request $request)
   	{
   		$this->validate($request, [
   			'nama_kelas' => 'required',
   			'angkatan_diklat_id' => 'required',
   			'mata_pelajaran_id' => 'required',
   			'instruktur_id' => 'required'
   		],[
   			'nama_kelas.required' => 'Nama Kelas tidak boleh kosong.',
   			'angkatan_diklat_id.required' => 'Angkatan Diklat tidak boleh kosong.',
   			'mata_pelajaran_id.required' => 'Mata Pelajaran tidak boleh kosong.',
   			'instruktur_id.required' => 'Instruktur tidak boleh kosong.'
   		]);

   		$kelas = new KelasVirtual([
   			'nama_kelas' => $request->nama_kelas,
   			'angkatan_diklat_id' => $request->angkatan_diklat_id,
   			'mata_pelajaran_id' => $request->mata_pelajaran_id,
   			'users_account_id' => $request->instruktur_id
   		]);
   		$kelas->save();

   		Session::flash('success', 'Kelas Virtual berhasil ditambahkan.');
    	return redirect()->route('getVirtualClassPage');
   	}

   	public function getUbahVitualClassPage($id)
   	{

   	}
}
