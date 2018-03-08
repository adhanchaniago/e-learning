<?php

namespace App\Http\Controllers\Instruktur;

use App\Models\UserAccount;
use App\Models\AngkatanPeserta;
use App\Models\RewardList;
use App\Models\RewardTo;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RewardController extends Controller
{
    public function getPutRewardBadge($id, $kelas)
    {
    	$user = UserAccount::find($id);
    	$kelas_virtual_id = $kelas;
    	$reward = RewardList::all();

    	return view('instruktur.reward.put', [
    		'user' => $user, 
    		'kelas_virtual_id' => $kelas_virtual_id, 
    		'reward' => $reward
    	]);
    }

    public function postPutReward(Request $request, $id, $kelas)
    {
    	$this->validate($request, [
    		'reward_list_id' => 'required'
    	], [
    		'reward_list_id.required' => 'Penghargaan tidak boleh kosong.'
    	]);

    	$reward = new RewardTo([
    		'kelas_virtual_id' => $request->kelas_virtual_id,
    		'users_account_id' => $request->users_account_id,
    		'reward_list_id' => $request->reward_list_id
    	]);
    	$reward->save();

    	Session::flash('success', 'Penghargaan berhasil ditambahkan.');
    	return redirect()->route('getMainDataVirtualClassPage', [$request->kelas_virtual_id]);
    }
}
