<?php

namespace App\Http\Controllers\Pimpinan;

use App\Models\UserAccount;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function getPimpinanHomePage()
    {
    	$profil = UserAccount::find(Auth::user()->id);
    	return view('pimpinan.home', [
    		'profil' => $profil
    	]);
    }
}
