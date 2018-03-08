<?php

namespace App\Http\Controllers\Staff;

use App\Models\UserAccount;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function getStaffHomePage()
    {
    	$profil = UserAccount::find(Auth::user()->id);
        return view('staff.home', [
        	'profil' => $profil
        ]);
    }
}
