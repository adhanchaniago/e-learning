<?php

namespace App\Http\Controllers\Pimpinan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function getPimpinanHomePage()
    {
    	return view('pimpinan.home');
    }
}
