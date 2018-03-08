<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RewardController extends Controller
{
    public function getRewardPage()
    {
    	return view('staff.reward.main');
    }

    public function getAddRewardPage()
    {
    	return view('staff.reward.add');
    }
}
