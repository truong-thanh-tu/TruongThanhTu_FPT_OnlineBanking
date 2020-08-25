<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

use App\Model\users;

class informationAccount extends Controller
{
    /**
     * Function getInTransferBank the display page In Transfer Bank
     */
    public function getInformationAccount()
    {
       /* $user =  SESSION('user');
        $accounts = user::all()->where('user',$user);
        dd($accounts);*/
        return view('Page.informationAccount');
    }

    /**
     * Function getInTransferBank the display page In Transfer Bank
     */
    public function getDetailInformationAccount($id)
    {
        return view('Page.detailInformationAccount');
    }
}
