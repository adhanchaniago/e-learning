<?php

namespace App\Http\Controllers\General;

use App\Models\UserAccount;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function getLiveChatPage()
    {
    	$users = UserAccount::all();

    	return view('global.chat.main', [
    		'users' => $users
    	]);
    }

    public function gpostCariKontak() 
    {
    	dd('masuk');
    }
}
