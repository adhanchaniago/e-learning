<?php

namespace App\Http\Controllers\Staff;

use App\Models\RewardList;

use Session;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class RewardController extends Controller
{
    public function getRewardPage()
    {
    	return view('staff.reward.main');
    }

    public function getRewardData()
    {
    	$reward = RewardList::all();

    	return Datatables::of($reward)
    		->addColumn('action', function ($value) {
                return '
                    <a href="penghargaan/ubah/'.$value->id.'" class="btn btn-sm btn-green btn-icon btn-icon-mini btn-round"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-sm btn-danger btn-icon btn-icon-mini btn-round"><i class="fa fa-trash"></i></a>
                ';
            })
    		->make(true);
    }

    public function getAddRewardPage()
    {
    	return view('staff.reward.add');
    }

    public function postAddReward(Request $request)
    {
	    if ($request->hasFile('gambar')) {
	    	$this->validate($request, [
	    		'nama' => 'required', 
	    		'keterangan' => 'required'
	    	], [
	    		'nama.required' => 'Nama tidak boleh kosong.',
	    		'keterangan.required' => 'Keternagan tidak boleh kosong.'
	    	]);

	    	$filename = str_slug($request->nama, '-').'.'.$request->file('gambar')->getClientOriginalExtension();
	    	$destinasi = 'public/reward';

	    	$upload = $request->file('gambar')->storeAs($destinasi, $filename);

	    	if ($upload) {
	    		$reward = new RewardList([
	    			'nama' => $request->nama,
	    			'keterangan' => $request->keterangan,
	    			'gambar' => $filename
	    		]);
	    		$reward->save();

	    		Session::flash('success', 'Penghargaan berhasil ditambahkan.');
                return redirect()->route('getRewardPage');
	    	}

	    } else {
	    	Session::flash('failure', 'Tidak ada file yang diinputkan.');
            return redirect()->back();
	    }
    }

    public function getUbahRewardPage($id)
    {
    	$reward = RewardList::find($id);

    	return view('staff.reward.edit', [
    		'reward' => $reward
    	]);
    }

    public function putUbahReward($id, Request $request)
    {
    	$this->validate($request, [
    		'id' => 'required'
    	]);
    	$reward = RewardList::find($request->id);
    	$reward->nama = $request->nama;
    	$reward->keterangan = $request->keterangan;
    	if ($request->hasFile('gambar')) {
    		$filename = str_slug($request->nama, '-').'.'.$request->file('gambar')->getClientOriginalExtension();
	    	$destinasi = 'public/reward';
	    	$upload = $request->file('gambar')->storeAs($destinasi, $filename);
	    	if ($upload) {
	    		$reward->gambar = $filename;
	    		$reward->save();
	    		Session::flash('success', 'Penghargaan berhasil dirubah.');
	    		return redirect()->route('getRewardPage');
	    	}
    	}
    	$reward->save();
    	Session::flash('success', 'Penghargaan berhasil dirubah.');
    	return redirect()->route('getRewardPage');
    }
}
