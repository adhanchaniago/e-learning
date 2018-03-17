<?php

namespace App\Http\Controllers\Peserta;

use App\Models\MataPelajaran;
use App\Models\MateriPelajaran;

use Auth;
use Response;
use Storage;
use Session;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MateriController extends Controller
{
    public function getListPMateriPage()
    {
        $listMateri = MateriPelajaran::all();

    	return view('peserta.materi.list', [
            'listMateri' => $listMateri
        ]);
    }

    public function GetDataListPMateri()
    {
        $materiPelajaran = MateriPelajaran::all();
        return Datatables::of($materiPelajaran)
            ->addColumn('action', function ($materi) {       
            	$display =	'<a href="materi/download/'.$materi->id.'" class="btn btn-sm btn-green btn-round"><i class="fa fa-download"></i> DOWNLOAD</a>';
                return $display;
            })
            ->editColumn('id', function ($materi) {
            	return 'MTR-'.str_pad($materi->id, 3, "0", STR_PAD_LEFT);
            })
            ->editColumn('mata_pelajaran_id', function ($materi) {
            	return $materi->mata_pelajaran->nama_pelajaran;
            })
            ->editColumn('users_account_id', function ($materi) {
            	return $materi->users_account->user_profil->nama;
            })
            ->make(true);
    }

    public function getDownloadPMateri($id)
    {
    	$materi = MateriPelajaran::find($id);

        return Storage::download($materi->lokasi);
    }

    public function getLihatMateri($id)
    {
        $materi = MateriPelajaran::find($id);
        $name = $materi->lokasi;
        // $filename = storage_path().'/app/'.$materi->lokasi;

        // $headers = [
        //     'Content-type' => 'video/mp4',
        //     'Content-Disposition' => 'inline; filename="'.$filename.'"'
        // ];

        // return Response::make(file_get_contents($filename), 200, $headers);

        // $filelocation = substr($name, 6);

        return view('peserta.materi.lihat', [
            'filelocation' => $name,
            'materi' => $materi
        ]);
    }
}
