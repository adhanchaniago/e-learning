<?php

namespace App\Http\Controllers\Instruktur;

use App\Models\KelasVirtual;
use App\Models\KelasPost;
use App\Models\KelasComment;

use Auth;
use Pusher\Pusher;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VirtualClassController extends Controller
{
    public function getVirtualClassListPage()
    {
    	$user_id = Auth::user()->id;
    	$listKelas = KelasVirtual::where('users_account_id', $user_id)->get();

    	return view('instruktur.virtualclass.list', [
    		'listKelas' => $listKelas
    	]);
    }

    public function getDataVirtualClassList()
    {
    	$user_id = Auth::user()->id;
    	$listKelas = KelasVirtual::where('users_account_id', $user_id)->whereHas('angkatan_diklat', function ($query) {
    		$query->where('status', '1');
    	})->get();

    	return Datatables::of($listKelas)
            ->addColumn('action', function ($kelas) {
                return '
                    <a href="virtualclass/download/'.$kelas->id.'" class="btn btn-sm btn-green btn-icon btn-icon-mini btn-round"><i class="fa fa-sign-in"></i></a>
                    <a href="virtualclass/hapus/'.$kelas->id.'" class="btn btn-sm btn-default btn-icon btn-icon-mini btn-round"><i class="fa fa-toggle-on"></i></a>
                ';
            })
            ->editColumn('angkatan_diklat_id', function($kelas) {
            	return $kelas->angkatan_diklat->nama_diklat;
            })
            ->editColumn('mata_pelajaran_id', function($kelas) {
            	return $kelas->mata_pelajaran->nama_pelajaran;
            })
            ->editColumn('status', function ($kelas) {
            	if ($kelas->status == '0') {
            		return 'Offline';
            	} elseif ($kelas->status == '1') {
            		return 'Online';
            	}
            })
            ->make(true);
    }

    public function getMainDataVirtualClassPage($id)
    {
        $user_id = Auth::user()->id;
    	$kelas = KelasVirtual::find($id);
        $listKelas = KelasVirtual::where('users_account_id', $user_id)->get();
        $posting = KelasPost::where('kelas_virtual_id', $id)->orderBy('created_at', 'desc')->paginate(5);

    	return view('instruktur.virtualclass.main', [
    		'kelas' => $kelas,
            'listKelas' => $listKelas,
            'posting' => $posting
    	]);
    }

    public function postStatusVirtualClass(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'status' => 'required'
        ]);

        $kelas = KelasVirtual::find($request->id);
        if ($request->status == '0') {
            $kelas->status = '1';
        } elseif ($request->status == '1') {
            $kelas->status = '0';
        }
        $kelas->save();

        return redirect()->back();
    }

    public function postKelasPost(Request $request) 
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

    public function postKelasComment(Request $request)
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
            'nama' => $newComment->user_account->user_profil->nama,
            'konten' => $newComment->konten,
            'waktu' => $waktu,
        ];

        $comment_json = json_encode(collect($comment));

        $this->makeEventObject()->trigger('kelas_virtual', 'new-comment', ['data' => $comment_json]);

        return response()->json([
            'success' => true,
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
}
