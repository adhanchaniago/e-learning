<?php

namespace App\Http\Controllers\Instruktur;

use App\Models\PollingPost;
use App\Models\PollingDetail;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PollingController extends Controller
{
    public function getPollingMainPage()
    {
    	$listPolling = PollingPost::all();

    	return view('instruktur.polling.main', [
    		'listPolling' => $listPolling
    	]);
    }

    public function getAddPollingPage()
    {
    	return view('instruktur.polling.add');
    }

    public function postAddPolling(Request $request)
    {
    	$userID = $request->user_id;

    	$countOpsi = count($request->opsi);

    	$polling = new PollingPost([
    		'users_account_id' => $userID,
    		'judul' => $request->judul,
    		'deskripsi' => $request->deskripsi
    	]);
    	$polling->save();

    	for ($i=0; $i < $countOpsi; $i++) { 
    		
    		$detail = new PollingDetail([
    			'polling_post_id' => $polling->id,
    			'deskripsi' => $request->opsi[$i],
    		]);
    		$detail->save();

    	}

    	Session::flash('success', 'Polling berhasil ditambahkan.');
    	return redirect()->back();
    }

    public function getPollingDetail($id)
    {
        $pollID = $id;
        $polling = PollingPost::find($id);
        $data = $this->getData($pollID);

    	return view('instruktur.polling.detail', [
    		'polling' => $polling,
            'data' => $data,
            'pollID' => $pollID
    	]);
    }

    public function getPollingData($id)
    {
        $data = $this->getData($id);

        $newData = [];

        foreach ($data['hasil'] as $key => $value) {
            
            $newData['label'][$key] = 'OPSI-'.($key+1);
            $newData['hasil'][$key] = $value['hasil'];
            $newData['warna'][$key] = 'LightGreen';
            $newData['border'][$key] = 'green';

        }

        return response()->json([
            'success' => true,
            'data' => $newData,
        ]);
    }

    private function getData($id)
    {
        $polling = PollingPost::find($id);
        $data = [];
        $total = 0;
        foreach ($polling->polling_detail as $key => $value) {
            $xx = count($value->polling_hasil);
            $data['hasil'][$key]['id'] = $value->id;
            $data['hasil'][$key]['desc'] = $value->deskripsi;
            $data['hasil'][$key]['hasil'] = $xx;
            $total = $total + $xx;
        }
        $data['total'] = $total;

        return $data;
    }
}
