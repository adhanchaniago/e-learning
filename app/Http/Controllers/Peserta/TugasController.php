<?php

namespace App\Http\Controllers\Peserta;

use App\Models\TugasPost;
use App\Models\TugasJawaban;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TugasController extends Controller
{
    public function postTugasJawaban(Request $request)
    {
    	if ($request->hasFile('file_tugas')) {
    		$user_id = Auth::user()->id;
    		$filename = $request->tugas_id.'-'.$user_id.'-'.$request->file('file_tugas')->getClientOriginalName();
    		$destinasi = 'public/tugas';
    		$upload = $request->file('file_tugas')->storeAs($destinasi, $filename);

    		if ($upload) {
    			$jawaban = new TugasJawaban([
    				'tugas_post_id' => $request->tugas_id,
    				'users_account_id' => $user_id,
    				'file_tugas' => $filename,
    				'keterangan' => $request->keterangan
    			]);
    			$jawaban->save();

    			return redirect()->back();
    		}
    	} else {
    		return redirect()->back();
    	}
    }
}
