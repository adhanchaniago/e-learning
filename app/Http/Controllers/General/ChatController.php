<?php

namespace App\Http\Controllers\General;

use Auth;
use App\Events\ChatEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\SendMessageRequest;
use App\Models\UserAccount;
use App\Models\UserProfil;
use App\Models\ChatMessage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getLiveChatPage(Request $request)
    {

        $users = UserAccount::all();

        return view('global.chat.main', [ 'users' => $users ]);
    }

    public function getLiveChatData(Request $request)
    {
         $pesan = ChatMessage::select('sender','receiver','message','created_at')
         ->whereIn('sender',[$request->sender,$request->receiver])
         ->whereIn('receiver',[$request->sender,$request->receiver])->take(20)->get();

        return ['messages'=>$pesan];
    }

    public function getLiveChatUserData(Request $request)
    {
        $users = UserAccount::select('id','username','hak_akses_id')
        ->with(['user_profil' => function($query) {
            $query->select('id', 'nama', 'photo');
        }])->with(['hak_akses' => function($query) {
            $query->select('id', 'nama');
        }])
        ->get();


        $listUser = $users->except(Auth::id());
        foreach ($listUser as $user) {
            $user['messages'] = [];
        }

        return ['friends'=>$listUser,'user'=> UserAccount::with('user_profil')->find(Auth::id())];
    }

    public function postSendChat(SendMessageRequest $request)
    {
        $chatMessage = ChatMessage::create($request->all());

        $sender = UserAccount::find(Auth::id());
        $receiver = UserAccount::find($request->receiver);
        event(new ChatEvent($sender,$receiver,$request->message));
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
