<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAkunController extends Controller
{
    public function getUserAkunPage()
    {
    	return view('staff.userakun.main');
    }
}
