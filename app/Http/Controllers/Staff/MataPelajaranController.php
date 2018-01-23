<?php

namespace App\Http\Controllers\Staff;

use App\Models\MataPelajaran;

use Session;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MataPelajaranController extends Controller
{
    public function getMataPelajaranPage()
    {
    	return view('staff.matapelajaran.main');
    }

    public function getDataMataPelajaran()
    {
    	$mataPelajaran = MataPelajaran::select(['id', 'slug', 'nama_pelajaran']);
    	return Datatables::of($mataPelajaran)
    		->addColumn('action', function ($pelajaran) {
                return '
                    <div class="text-center">
                        <a href="matapelajaran/ubah/'.$pelajaran->id.'" class="btn btn-sm btn-green btn-icon btn-icon-mini btn-round"><i class="fa fa-edit"></i></a>
                        <a href="matapelajaran/hapus/'.$pelajaran->id.'" class="btn btn-sm btn-danger btn-icon btn-icon-mini btn-round"><i class="fa fa-trash"></i></a>
                    </div>
                ';
            })
    		->make(true);
    }

    public function getAddMataPelajaranPage()
    {
    	return view('staff.mataPelajaran.add');
    }

    public function postAddMataPelajaran(Request $request)
    {
    	$this->validate($request, [
    		'slug' => 'required',
    		'nama_pelajaran' => 'required'
    	], [
    		'slug.required' => 'Kode Pelajaran tidak boleh kosong.',
    		'nama_pelajaran.required' => 'Mata Pelajaran tidak boleh kosong.'
    	]);

    	$mataPelajaran = new MataPelajaran([
    		'slug' => $request->slug,
    		'nama_pelajaran' => $request->nama_pelajaran
    	]);

    	$mataPelajaran->save();

    	Session::flash('success', 'Mata Pelajaran berhasil ditambahkan.');
        return redirect()->route('getMataPelajaranPage');
    }

    public function getEditMataPelajaranPage($id)
    {
    	$mataPelajaran = MataPelajaran::find($id);
    	return view('staff.matapelajaran.edit', [
    		'mataPelajaran' => $mataPelajaran
    	]);
    }

    public function putEditMataPelajaran($id, Request $request)
    {
    	$this->validate($request, [
    		'slug' => 'required',
    		'nama_pelajaran' => 'required'
    	], [
    		'slug.required' => 'Kode Pelajaran tidak boleh kosong.',
    		'nama_pelajaran.required' => 'Mata Pelajaran tidak boleh kosong.'
    	]);

    	$mataPelajaran = MataPelajaran::find($request->id);
    	$mataPelajaran->slug = $request->slug;
    	$mataPelajaran->nama_pelajaran = $request->nama_pelajaran;
    	$mataPelajaran->save();

    	Session::flash('success', 'Mata Pelajaran berhasil diubah.');
        return redirect()->route('getMataPelajaranPage');
    }

    public function getHapusMataPelajaranPage($id)
    {
    	$mataPelajaran = MataPelajaran::find($id);
    	return view('staff.matapelajaran.delete', [
    		'mataPelajaran' => $mataPelajaran
    	]);	
    }

    public function deleteHapusMataPelajaran($id, Request $request)
    {
    	$this->validate($request, [
    		'id' => 'required'
    	]);

    	$mataPelajaran = MataPelajaran::find($request->id);
    	$mataPelajaran->delete();

    	Session::flash('success', 'Mata Pelajaran berhasil dihapus.');
        return redirect()->route('getMataPelajaranPage');
    }
}
