<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class getSupport extends Controller
{
    /**
     * Function getChangePassword the display page Support
     */
    public function getSupport()
    {
        return view('Page.support');
    }
}
