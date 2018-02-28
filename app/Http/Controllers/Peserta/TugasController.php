<?php

namespace App\Http\Controllers\Peserta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TugasController extends Controller
{
    public function postTugasJawaban(Request $request)
    {
    	dd($request->all());
    }
}
