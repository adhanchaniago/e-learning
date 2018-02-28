<?php

namespace App\Http\Controllers\General;

use App\Models\UserAccount;
use App\Models\UserProfil;

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

    public function gpostCariKontak(Request $request) 
    {
    	$vCari = $request->cari;
        $data = UserProfil::where('nama', 'LIKE', '%'.$vCari.'%')->get();
        $jsonData = [];

        foreach ($data as $key => $value) {
            $jsonData[$key]['id'] = $value->user_account->id;
            $jsonData[$key]['nama'] = $value->nama;
            $jsonData[$key]['photo'] = $value->photo;
        }

        return response()->json([
            'success' => true,
            'data' => $jsonData
        ]);
    }

    public function postGetChat(Request $request)
    {
        $targetID = $request->id;
        $objectID = Auth::user()->id;

        $targetUser = UserProfil::find($targetID);

        $jsonData = [
            'targetID' => $targetID,
            'targetNama' => $targetUser->nama,
            'targetPhoto' => $targetUser->photo,
            'targetAkses' => $targetUser->user_account->hak_akses->nama,
        ];

        return response()->json([
            'success' => true,
            'data' => $jsonData
        ]);
    }
}
