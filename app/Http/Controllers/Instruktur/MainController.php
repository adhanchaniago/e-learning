<?php

namespace App\Http\Controllers\Instruktur;

use App\Models\UserAccount;

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
}
