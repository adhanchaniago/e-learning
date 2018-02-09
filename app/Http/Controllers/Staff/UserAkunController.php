<?php

namespace App\Http\Controllers\Staff;

use App\Models\HakAkses;
use App\Models\UserAccount;
use App\Models\UserProfil;
use App\Models\KantorCabang;
use App\Models\AngkatanDiklat;
use App\Models\AngkatanPeserta;

use Auth;
use Session;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAkunController extends Controller
{
    public function getUserAkunPage()
    {
    	return view('staff.userakun.main');
    }

    public function getDataUserAkun()
    {
    	return Datatables::of(UserProfil::query())
    		->addColumn('ttl', function ($user) {
                return $user->tempat_lahir.', '.Carbon::parse($user->tanggal_lahir)->format('d M Y');
            })
            ->addColumn('action', function ($user) {
                $status = $user->user_account->status;
                if ($status == 1) {
                    return '
                        <a href="userakun/ubah/'.$user->id.'" class="btn btn-sm btn-green btn-icon btn-icon-mini btn-round"><i class="fa fa-edit"></i></a>
                        <a href="userakun/blok/'.$user->id.'" class="btn btn-sm btn-warning btn-icon btn-icon-mini btn-round"><i class="fa fa-ban"></i></a>
                        <a href="userakun/hapus/'.$user->id.'" class="btn btn-sm btn-danger btn-icon btn-icon-mini btn-round"><i class="fa fa-trash"></i></a>
                        <a href="userakun/reset/'.$user->id.'" class="btn btn-sm btn-warning btn-icon btn-icon-mini btn-round"><i class="fa fa-key"></i></a>
                    ';
                } else {
                    return '
                        <a href="userakun/ubah/'.$user->id.'" class="btn btn-sm btn-green btn-icon btn-icon-mini btn-round"><i class="fa fa-edit"></i></a>
                        <a href="userakun/unblok/'.$user->id.'" class="btn btn-sm btn-success btn-icon btn-icon-mini btn-round"><i class="fa fa-circle-o"></i></a>
                        <a href="userakun/hapus/'.$user->id.'" class="btn btn-sm btn-danger btn-icon btn-icon-mini btn-round"><i class="fa fa-trash"></i></a>
                        <a href="userakun/reset/'.$user->id.'" class="btn btn-sm btn-warning btn-icon btn-icon-mini btn-round"><i class="fa fa-key"></i></a>
                    ';
                }
                
            })
            ->addColumn('status', function ($user){
                $status = $user->user_account->status;
                if ($status == '0') {
                    return 'Tidak Aktif';
                } else {
                    return 'Aktif';
                }
            })
            ->addColumn('hak_akses', function ($user){
                $hak_akses = $user->user_account->hak_akses->nama;
                return $hak_akses;
            })
            ->editColumn('kantor_cabang_id', function($user){
            	return $user->kantor_cabang->nama;
            })
    		->make(true);
    }

    public function getAddUserAkunPage()
    {
    	$cabang = KantorCabang::all();
    	$angkatan = AngkatanDiklat::all();
    	$akses = HakAkses::all();
    	return view('staff.userakun.add', [
    		'cabang' => $cabang, 
    		'angkatan' => $angkatan, 
    		'akses' => $akses
    	]);
    }

    public function postAddUserAkun(Request $request)
    {
    	$this->validate($request, [
    		'nik' => 'required|unique:users_profil',
    		'nama' => 'required',
    		'email' => 'required|email|unique:users_profil',
    		'tempat_lahir' => 'required',
    		'tanggal_lahir' => 'required|date',
    		'jenis_kelamin' => 'required',
    		'agama' => 'required',
    		'kantor_cabang_id' => 'required',
    		'hak_akses_id' => 'required'
    	],[
            'nik.required' => 'NIK tidak boleh kosong.',
            'nik.required' => 'NIK yang diinputkan sudah terdaftar.',
            'nama.required' => 'Nama tidak boleh kosong.',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email yang diinputkan tidak valid.',
            'email.unique' => 'Email yang diinputkan sudah terdaftar.',
            'tempat_lahir.required' => 'Tempat Lahir tidak boleh kosong.',
            'tanggal_lahir.required' => 'Tanggal Lahir tidak boleh kosong.',
            'tanggal_lahir.date' => 'Tanggal Lahir harus berformat YYYY-MM-DD',
            'jenis_kelamin' => 'Jenis Kelamin tidak boleh kosong.',
            'agama.required' => 'Agama tidak boleh kosong',
            'kantor_cabang_id.required' => 'Kantor Cabang tidak boleh kosong.',
            'hak_akses_id.required' => 'Hak Akses tidak boleh kosong.' 
        ]);

    	$userAkun = new UserAccount([
    		'username' => $request->nik,
            'password' => bcrypt($request->nik),
            'hak_akses_id' => $request->hak_akses_id,
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
    	]);
    	$userAkun->save();

    	$userProfil = new UserProfil([
    		'nik' => $request->nik,
            'email' => $request->email,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'photo' => '',
            'kantor_cabang_id' => $request->kantor_cabang_id
    	]);
    	$userAkun->user_profil()->save($userProfil);

    	if ($request->hak_akses_id == '4') {
    		$angkatanPeserta = new AngkatanPeserta([
    			'angkatan_diklat_id' => $request->angkatan_diklat_id,
    			'users_account_id' => $userAkun->id
    		]);
    		$angkatanPeserta->save();
    	}

    	Session::flash('success', 'User Akun berhasil ditambahkan.');
    	return redirect()->route('getUserAkunPage');
    }

    public function getEditUserAkunPage($id)
    {
        $cabang = KantorCabang::all();
        $user = UserProfil::find($id);
        return view('staff.userakun.edit', [
            'cabang' => $cabang, 
            'user' => $user
        ]);
    }

    public function putEditUserAkun($id, Request $request)
    {
        $this->validate($request, [
            'nik' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'kantor_cabang_id' => 'required'
        ],[
            'nik.required' => 'NIK tidak boleh kosong.',
            'nama.required' => 'Nama tidak boleh kosong.',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email yang diinputkan tidak valid.',
            'tempat_lahir.required' => 'Tempat Lahir tidak boleh kosong.',
            'tanggal_lahir.required' => 'Tanggal Lahir tidak boleh kosong.',
            'tanggal_lahir.date' => 'Tanggal Lahir harus berformat YYYY-MM-DD',
            'jenis_kelamin' => 'Jenis Kelamin tidak boleh kosong.',
            'agama.required' => 'Agama tidak boleh kosong',
            'kantor_cabang_id.required' => 'Kantor Cabang tidak boleh kosong.'
        ]);

        $user = UserProfil::find($request->id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->agama = $request->agama;
        $user->alamat = $request->alamat;
        $user->telepon = $request->telepon;
        $user->kantor_cabang_id = $request->kantor_cabang_id;
        $user->save();

        Session::flash('success', 'User Akun berhasil diubah.');
        return redirect()->route('getUserAkunPage');
    }

    public function getHapusUserAkunPage($id)
    {
        $user = UserProfil::find($id);
        return view('staff.userakun.delete', [
            'user' => $user
        ]);
    }

    public function deleteHapusUserAkun($id, Request $request)
    {
        $user = UserAccount::where('id', $request->id)->first();
        $user->delete();

        Session::flash('success', 'User Akun berhasil dihapus.');
        return redirect()->route('getUserAkunPage');
    }

    public function getBlokUserAkunPage($id)
    {
        $user = UserProfil::find($id);
        return view('staff.userakun.block', [
            'user' => $user
        ]);
    }

    public function putBlokUserAkun($id, Request $request)
    {
        $user = UserAccount::where('id', $request->id)->first();
        $user->status = 0;
        $user->save();
        
        Session::flash('success', 'User Akun berhasil diblok.');
        return redirect()->route('getUserAkunPage');
    }

    public function getUnblokUserAkunPage($id)
    {
        $user = UserProfil::find($id);
        return view('staff.userakun.unblock', [
            'user' => $user
        ]);
    }

    public function putUnblokUserAkun($id, Request $request)
    {
        $user = UserAccount::where('id', $request->id)->first();
        $user->status = 1;
        $user->save();
        
        Session::flash('success', 'User Akun berhasil diunblok.');
        return redirect()->route('getUserAkunPage');
    }

    public function getResetPasswordPage($id)
    {
        $user = UserProfil::find($id);
        return view('staff.userakun.reset', [
            'user' => $user
        ]);
    }

    public function putResetPassword($id, Request $request)
    {
        $password = UserProfil::find($request->id)->nik;
        $user = UserAccount::where('id', $request->id)->first();
        $user->password = bcrypt($password);
        $user->save();

        Session::flash('success', 'Password berhasil direset.');
        return redirect()->route('getUserAkunPage');
    }
}
