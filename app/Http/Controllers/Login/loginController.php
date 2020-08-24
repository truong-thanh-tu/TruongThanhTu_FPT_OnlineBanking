<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user;

class loginController extends Controller
{
    /**
     * Function getFormLogin the displays Form Login
     */
    public function getFormLogin(Request $request)
    {
        $login = user::all();
        $user = $request->get('user');
        if ($user == null) {
            return view('Layout.login');
        } else {
            if ($user == $login[0]->user){
                return view('Page.informationCustomer');
            }
            else{
                return view('Layout.login');
            }
        }
    }
}
