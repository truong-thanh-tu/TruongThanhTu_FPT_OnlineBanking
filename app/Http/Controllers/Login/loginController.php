<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{
    /**
     * Function getFormLogin the displays Form Login
     */
    public function getFormLogin( Request $request)
    {
        return view('Layout.login');
    }
}
