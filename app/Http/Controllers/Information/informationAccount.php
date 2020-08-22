<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class informationAccount extends Controller
{
    /**
     * Function getInTransferBank the display page In Transfer Bank
     */
    public function getInformationAccount()
    {
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
