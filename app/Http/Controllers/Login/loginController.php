<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\users;

class loginController extends Controller
{
    /**
     * Function getFormLogin the displays Form Login
     */
    public function getFormLogin(Request $request)
    {
        $username = $request->get('user');
        $password = $request->get('pass');

        if ($username == null || $password == null) {
            return view('Layout.login');
        } else {
            $takeDates = users::all();
            foreach ($takeDates as $takeDate) {
                if ($takeDate->user == $username && $takeDate->pass == $password) {
                    session(['user' => $username, 'pass' => $password]);
                    if ($takeDate->level == 1) {
                        return view('Page.changePassword');
                    } else {
                        return view('Page.informationAccount');
                    }
                }
            }
        }
    }
}
