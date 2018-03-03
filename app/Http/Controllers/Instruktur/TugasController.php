<?php

namespace App\Http\Controllers\Instruktur;

use App\Models\TugasPost;
use App\Models\TugasJawaban;
use App\Models\TugasNilai;

use Pusher\Pusher;
use Session;
use Storage;
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
        $tugas = TugasPost::find($id);
    	return view('instruktur.tugas.lihat', [
            'tugas' => $tugas
        ]);
    }

    public function getFileJawabanTugas($id)
    {
        $tugas = TugasJawaban::find($id);

        return Storage::download('public/tugas/'.$tugas->file_tugas);
    }

    public function getBeriNilaiPage($id)
    {
        $jawaban = TugasJawaban::find($id);

        return view('instruktur.tugas.nilai', [
            'jawaban' => $jawaban
        ]);
    }

    public function postBeriNilaiTugas(Request $request)
    {
        $this->validate($request, [
            'jawaban_id' => 'required',
            'nilai' => 'required|numeric|between:0,100'
        ],[
            'nilai.required' => 'Kolom nilai tidak boleh kosong.',
            'nilai.numeric' => 'Nilai harus merupakan angka.',
            'nilai.between' => 'Range nilai harus antara 0 - 100.'
        ]);

        $tugas_id = TugasJawaban::find($request->jawaban_id)->tugas_post->id;

        $nilai = new TugasNilai([
            'tugas_jawaban_id' => $request->jawaban_id,
            'nilai' => $request->nilai
        ]);
        $nilai->save();

        Session::flash('success', 'Nilai berhasil ditambahkan.');
        return redirect()->route('getLihatDaftarJawaban', [$tugas_id]);
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
