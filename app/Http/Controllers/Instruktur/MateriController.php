<?php

namespace App\Http\Controllers\Instruktur;

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

    }

    public function getAddMateriPage()
    {
    	return view('instruktur.materi.add');
    }
}
