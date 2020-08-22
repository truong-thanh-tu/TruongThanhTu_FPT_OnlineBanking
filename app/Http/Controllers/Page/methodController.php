<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class methodController extends Controller
{
    /**
     * Function getMethodHeardOTP the displays page Method Heard OTP
     */
    public function getMethodHeardOTP()
    {
        return view('Page.methodHeardOTP');
    }
}
