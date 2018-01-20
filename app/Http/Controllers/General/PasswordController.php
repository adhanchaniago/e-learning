<?php

namespace App\Http\Controllers\General;

use Auth;
use Session;

use App\Models\UserAccount;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    public function getChangePasswordPage()
    {
    	return view('global.ubahpassword');
    }

    public function putChangePassword(Request $request)
    {
    	$password = Auth::user()->password;

    	if (!Hash::check($request->password_lama, $password)) {
    		Session::flash('failure', 'Passsword Lama yang diinputkan salah.');
    		return redirect()->back();
    	}

    	$this->validate($request, [
    		'password_lama' => 'required',
    		'password' => 'required|confirmed',
    		'password_confirmation' => 'required'
    	],[
    		'password_lama.required' => 'Password Lama tidak boleh kosong.',
    		'password.required' => 'Password Baru tidak boleh kosong',
    		'password.confirmed' => 'Konfirmasi Password Baru tidak cocok',
    		'password_confirmation.required' => 'Konfirmasi Password Baru tidak boleh kosong'
    	]);

    	$userAccount = UserAccount::find(Auth::user()->id);
    	$userAccount->password = bcrypt($request->password);
    	$userAccount->save();

    	Session::flash('success', 'Password berhasil diubah.');
    	return redirect()->back();
    }
}
