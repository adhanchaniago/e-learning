<?php

namespace App\Http\Controllers\Instruktur;

use App\Models\TugasPost;

use Pusher\Pusher;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TugasController extends Controller
{
    public function postNewTugas(Request $request)
    {
    	$newTugas = new TugasPost([
    		'kelas_virtual_id' => $request->kelas_id,
    		'judul' => $request->judul,
    		'deskripsi' => $request->deskripsi
    	]);
    	$newTugas->save();

    	$waktu = $newTugas->created_at->format("d M Y H:i");

    	$tugas = [
    		'id' => $newTugas->id,
    		'judul' => $newTugas->judul,
    		'deskripsi' => $newTugas->deskripsi,
    		'waktu' => $waktu
    	];

    	$posting_json = json_encode(collect($tugas));

        $this->makeEventObject()->trigger('kelas_virtual', 'new-tugas', ['data' => $posting_json]);

    	return response()->json([
            'success' => true
        ]);
    }

    public function getLihatDaftarJawaban($id)
    {
    	dd('masuk');
    }

    private function makeEventObject()
    {
        $options = [
            'cluster' => 'ap1',
            'encrypted' => true
        ];

         return new Pusher(
            '6488bf9c8db71076f95c',
            '5ef55cb63eb154a10b18',
            '474247',
            $options
        );
    }
}
