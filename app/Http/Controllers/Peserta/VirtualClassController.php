<?php

namespace App\Http\Controllers\Peserta;

use App\Models\KelasVirtual;
use App\Models\KelasPost;
use App\Models\KelasComment;
use App\Models\AngkatanPeserta;
use App\Models\TugasPost;

use Auth;
use Pusher\Pusher;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VirtualClassController extends Controller
{
    public function getPVClassList()
    {
    	$angkatan_id = Auth::user()->angkatan_peserta->first()->angkatan_diklat_id;
    	$listKelas = KelasVirtual::where('angkatan_diklat_id', $angkatan_id)->get();

    	return view('peserta.virtualclass.list', [
    		'listKelas' => $listKelas
    	]);
    }

    public function getMainPvClassList($id)
    {
    	$kelas = KelasVirtual::find($id);
    	$listKelas = KelasVirtual::where('angkatan_diklat_id', $kelas->angkatan_diklat_id)->get();
    	$posting = KelasPost::where('kelas_virtual_id', $id)->orderBy('created_at', 'desc')->paginate(5);
    	$anggota = AngkatanPeserta::where('angkatan_diklat_id', $kelas->angkatan_diklat_id)->get();
        $tugas = TugasPost::where('kelas_virtual_id', $id)->orderBy('created_at', 'desc')->get();

    	return view('peserta.virtualclass.main', [
    		'kelas' => $kelas,
    		'listKelas' => $listKelas,
    		'posting' => $posting, 
    		'anggota' => $anggota,
            'tugas' => $tugas
    	]);
    }

    public function postVClassPost(Request $request)
    {
    	$user_id = Auth::user()->id;

        $newPost = new KelasPost([
            'users_account_id' => $user_id,
            'kelas_virtual_id' => $request->kelas_id,
            'konten' => $request->konten
        ]);
        $newPost->save();

        $waktu = $newPost->created_at->format("d M Y H:i");

        $posting = [
            'id' => $newPost->id,
            'nama' => $newPost->user_account->user_profil->nama,
            'photo' => $newPost->user_account->user_profil->photo,
            'konten' => $newPost->konten,
            'waktu' => $waktu,
            'c_komen' => count(KelasComment::where('kelas_post_id', $newPost->id)->get()),
        ];

        $posting_json = json_encode(collect($posting));

        $this->makeEventObject()->trigger('kelas_virtual', 'new-post', ['data' => $posting_json]);

        return response()->json([
            'success' => true,
        ]);
    }

    public function postVClassComment(Request $request)
    {
    	$user_id = Auth::user()->id;

        $newComment = new KelasComment([
            'kelas_post_id' => $request->post_id,
            'users_account_id' => $user_id,
            'konten' => $request->konten
        ]);
        $newComment->save();

        $waktu = $newComment->created_at->format("d M Y H:i");

        $comment = [
            'id' => $newComment->id,
            'post_id' => $newComment->kelas_post_id,
            'nama' => $newComment->user_account->user_profil->nama,
            'photo' => $newComment->user_account->user_profil->photo,
            'konten' => $newComment->konten,
            'waktu' => $waktu,
        ];

        $comment_json = json_encode(collect($comment));

        $this->makeEventObject()->trigger('kelas_virtual', 'new-comment', ['data' => $comment_json]);

        return response()->json([
            'success' => true,
            'data' => $comment_json,
        ]);
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

    public function getPMateriPage()
    {
    	
    }
}
