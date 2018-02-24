<?php

namespace App\Http\Controllers\General;

use App\Models\ForumPost;
use App\Models\ForumComment;

use Auth;
use Session;
use Pusher\Pusher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForumController extends Controller
{
    public function getForumListPage()
    {
    	$posting = ForumPost::all()->sortByDesc('created_at');
    	return view('global.forum.list', [
    		'posting' => $posting
    	]);
    }

    public function getAddForumPage()
    {
    	return view('global.forum.add');
    }

    public function postAddForum(Request $request)
    {
    	$this->validate($request, [
    		'user_id' => 'required',
    		'judul' => 'required',
    		'konten' => 'required'
    	], [
    		'judul.required' => 'Judul tidak boleh kosong.',
    		'konten.required' => 'Konten tidak boleh kosong.'
    	]);

    	$post = new ForumPost([
    		'users_account_id' => $request->user_id,
    		'judul' => $request->judul,
    		'konten' => $request->konten
    	]);
    	$post->save();

    	Session::flash('success', 'Topik Diskusi berhasil ditambahkan.');
    	return redirect()->route('getForumListPage');
    }

    public function getLihatForumPage($id)
    {
    	$post = ForumPost::find($id);

    	return view('global.forum.lihat', [
    		'post' => $post
    	]);
    }

    public function postForumComment(Request $request)
    {
    	$user_id = Auth::user()->id;

    	$comment = new ForumComment([
    		'forum_post_id' => $request->post_id,
    		'users_account_id' => $user_id,
    		'konten' => $request->konten
    	]);
    	$comment->save();

    	$waktu = $comment->created_at->format("d M Y H:i");

    	$x = [
            'id' => $comment->id,
            'post_id' => $comment->forum_post_id,
            'nama' => $comment->user_account->user_profil->nama,
            'hak_akses' => $comment->user_account->hak_akses->nama,
            'photo' => $comment->user_account->user_profil->photo,
            'konten' => $comment->konten,
            'waktu' => $waktu,
        ];

        $comment_json = json_encode(collect($x));

    	$this->makeEventObject()->trigger('forum_diskusi', 'new-comment', ['data' => $comment_json]);

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
