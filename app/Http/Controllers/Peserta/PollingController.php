<?php

namespace App\Http\Controllers\Peserta;

use App\Models\PollingPost;
use App\Models\PollingDetail;
use App\Models\PollingHasil;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PollingController extends Controller
{
    public function getPollingListPage()
    {
    	$listPolling = PollingPost::all();

    	return view('peserta.polling.list', [
    		'listPolling' => $listPolling
    	]);
    }

    public function getPollingVote($id)
    {
    	$polling = PollingPost::find($id);
    	$listDetail = PollingDetail::where('polling_post_id', $polling->id)->get();

    	$userID = Auth::user()->id;

    	$count = 0;

    	// $xx = $listDetail->where('id', 2)->first()->polling_hasil->where('users_account_id', 3); 

    	foreach ($listDetail as $value) {
    		$cnt = count($value->polling_hasil->where('users_account_id', $userID));
    		$count = $count + $cnt;
    	}

    	return view('peserta.polling.vote', [
    		'polling' => $polling, 
    		'listDetail' => $listDetail,
    		'count' => $count
    	]);
    }

    public function postPollingVote($id, Request $request)
    {
    	$this->validate($request, [
    		'polling_id' => 'required', 
    		'user_id' => 'required', 
    		'hasil' => 'required'
     	], [
     		'hasil.required' => 'Anda belum memilih opsi polling.'
     	]);
    	
     	$hasil = new PollingHasil([
     		'polling_detail_id' => $request->hasil,
     		'users_account_id' => $request->user_id
     	]);
     	$hasil->save();

     	Session::flash('success', 'Anda telah melakukan voting.');
    	return redirect()->back();
    }
}
