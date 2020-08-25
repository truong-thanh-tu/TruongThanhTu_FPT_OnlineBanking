<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class changeController extends Controller
{
    /**
     * Function getChangePassword the display page change password
     */
    public function getChangePassword()
    {

        return view('Page.changePassword');
    }
}
