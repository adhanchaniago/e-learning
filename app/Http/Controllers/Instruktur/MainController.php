<?php

namespace App\Http\Controllers\Instruktur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function getInstrukturHomePage()
    {
    	return view('instruktur.home');
    }
}
