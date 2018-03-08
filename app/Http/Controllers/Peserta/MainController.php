<?php

namespace App\Http\Controllers\Peserta;

use App\Models\UserAccount;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function getPesertaHomePage()
    {
    	$profil = UserAccount::find(Auth::user()->id);
    	return view('peserta.home', [
    		'profil' => $profil
    	]);
    }
}
