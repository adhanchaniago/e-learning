<?php

namespace App\Http\Controllers\Peserta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function getPesertaHomePage()
    {
    	return view('peserta.home');
    }
}
