<?php

namespace App\Http\Controllers\Instruktur;

use App\Models\MataPelajaran;
use App\Models\MateriPelajaran;

use Auth;
use Storage;
use Session;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MateriController extends Controller
{
    public function getMateriPage()
    {
    	return view('instruktur.materi.main');
    }

    public function getDataMateri()
    {
        $user_id = Auth::user()->id;
        $materiPelajaran = MateriPelajaran::where('users_account_id', $user_id)->get();
        return Datatables::of($materiPelajaran)
            ->addColumn('action', function ($materi) {
                return '
                    <a href="materi/download/'.$materi->id.'" class="btn btn-sm btn-success btn-icon btn-icon-mini btn-round"><i class="fa fa-download"></i></a>
                    <a href="materi/hapus/'.$materi->id.'" class="btn btn-sm btn-danger btn-icon btn-icon-mini btn-round"><i class="fa fa-trash"></i></a>
                ';
            })
            ->editColumn('jenis_file', function($materi) {
                return strtoupper($materi->jenis_file);
            })
            ->editColumn('mata_pelajaran_id', function ($materi) {
                return $materi->mata_pelajaran->nama_pelajaran;
            })
            ->make(true);
    }

    public function getAddMateriPage()
    {
        $mataPelajran = MataPelajaran::all();

        return view('instruktur.materi.add', [
            'mataPelajaran' => $mataPelajran
        ]);
    }

    public function postAddMateri(Request $request)
    {
        if ($request->hasFile('materi')) {

            $this->validate($request, [
                'judul_materi' => 'required|unique:materi_pelajaran',
                'mata_pelajaran_id' => 'required',
            ], [
                'judul_materi.required' => 'Judul Materi tidak boleh kosong.',
                'judul_materi.unique' => 'Judul Materi sudah diambil.',
                'mata_pelajaran_id.required' => 'Mata Pelajaran tidak boleh kosong.'
            ]);

            $users_account_id = Auth::user()->id;
            $filename = rand(11111,99999).'-'.$request->file('materi')->getClientOriginalName();
            $filekategori = '';
            $extension = $request->file('materi')->getClientOriginalExtension();
            $destinasi = '';

            if ($extension == 'pdf') {
                $destinasi = 'public/materi/pdf';
                $filekategori = 'pdf';
            } elseif ($extension == 'ppt' || $extension == 'pptx') {
                $destinasi = 'public/materi/ppt';
                $filekategori = 'ppt';
            } elseif ($extension == 'mp4' || $extension == 'avi' || $extension == 'mkv') {
                $destinasi = 'public/materi/video';
                $filekategori = 'video';
            } else {
                Session::flash('failure', 'Format file tidak didukung..');
                return redirect()->back();
            }

            $upload = $request->file('materi')->storeAs($destinasi, $filename);
            $filefullpath = $destinasi.'/'.$filename;
            
            if ($upload) {

                $materi = new MateriPelajaran([
                    'judul_materi' => $request->judul_materi,
                    'keterangan' => $request->keterangan,
                    'users_account_id' => $users_account_id,
                    'mata_pelajaran_id' => $request->mata_pelajaran_id,
                    'jenis_file' => $filekategori,
                    'lokasi' => $filefullpath
                ]);
                $materi->save();

                Session::flash('success', 'Materi Pelajaran berhasil ditambahkan.');
                return redirect()->route('getMateriPage');

            }

        } else {
            Session::flash('failure', 'Tidak ada file yang diinputkan.');
            return redirect()->back();
        }
    }

    public function getHapusMateriPage($id)
    {
        $materi = MateriPelajaran::find($id);
        return view('instruktur.materi.hapus', [
            'materi' => $materi
        ]);
    }

    public function deleteHapusMateri($id, Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);

        $materi = MateriPelajaran::find($request->id);
        $deleteFile = Storage::delete($materi->lokasi);

        if ($deleteFile) {
            $materi->delete();
            Session::flash('success', 'Materi berhasil dihapus.');
            return redirect()->route('getMateriPage');
        } else {
            Session::flash('failure', 'Telah terjadi kesalahan.');
            return redirect()->back();
        }
    }

    public function getDownloadMateri($id)
    {
        $materi = MateriPelajaran::find($id);

        return Storage::download($materi->lokasi);
    }
}
