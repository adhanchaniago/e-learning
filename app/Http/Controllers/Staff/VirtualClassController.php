<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VirtualClassController extends Controller
{
    public function getVirtualClassPage()
    {
    	return view('staff.virtualclass.main');
    }
}
