<?php

namespace App\Http\Controllers\General;

use Auth;
use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    public function getChangePasswordPage()
    {
    	return view('global.ubahpassword');
    }

    public function putChangePassword(Request $request)
    {
    	dd('masuk');
    }
}
