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
                    <a href="virtualclass/ubah/'.$angkatan->id.'" class="btn btn-sm btn-green btn-icon btn-icon-mini btn-round"><i class="fa fa-edit"></i></a>
                    <a href="virtualclass/hapus/'.$angkatan->id.'" class="btn btn-sm btn-danger btn-icon btn-icon-mini btn-round"><i class="fa fa-trash"></i></a>
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
            ->editColumn('status', function ($kelas){
                if ($kelas->status == '0') {
                    return 'Offline';
                }
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
            'keterangan' => $request->keterangan,
            'status' => '0',
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
   		$angkatandiklat = AngkatanDiklat::all();
   		$matapelajaran = MataPelajaran::all();
   		$instruktur = UserAccount::where('hak_akses_id', '3')->get();

   		$virtual = KelasVirtual::find($id);

   		return view('staff.virtualclass.edit', [
   			'angkatandiklat' => $angkatandiklat, 
   			'matapelajaran' => $matapelajaran, 
   			'instruktur' => $instruktur,
   			'virtual' => $virtual
   		]);
   	}

   	public function putUbahVirtualClass($id, Request $request)
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

   		$virtual = KelasVirtual::find($request->id);
   		$virtual->nama_kelas = $request->nama_kelas;
        $virtual->keterangan = $request->keterangan;
   		$virtual->angkatan_diklat_id = $request->angkatan_diklat_id;
   		$virtual->mata_pelajaran_id = $request->mata_pelajaran_id;
   		$virtual->users_account_id = $request->instruktur_id;
   		$virtual->save();

   		Session::flash('success', 'Kelas Virtual berhasil diubah.');
    	return redirect()->route('getVirtualClassPage');
   	}

   	public function getHapusVirtualClassPage($id)
   	{
   		$virtual = KelasVirtual::find($id);
   		return view('staff.virtualclass.delete', [
   			'virtual' => $virtual
   		]);
   	}

   	public function deleteHapusVirtualClass($id, Request $request)
   	{
   		$this->validate($request, [
   			'id' => 'required'
   		]);

   		$virtual = KelasVirtual::find($request->id);
   		$virtual->delete();
   		
   		Session::flash('success', 'Kelas Virtual berhasil dihapus.');
    	return redirect()->route('getVirtualClassPage');
   	}
}
