<?php

namespace App\Http\Controllers\Transfer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class inBankController extends Controller
{
    /**
     * Function getInTransferBank the display page In Transfer Bank
     */
    public function getInTransferBank()
    {
        return view('Page.inTransferBank');
    }

    /**
     * Function getInTransferBank the display page In Transfer Bank
     */
    public function getConfirmInTransferBank()
    {
        return view('Page.confirmInTransferBank');
    }

    /**
     * Function getInTransferBank the display page In Transfer Bank
     */
    public function getEnterCodeOPT()
    {
        return view('Page.enterOTP');
    }

    /**
     * Function getInTransferBank the display page In Transfer Bank
     */
    public function getSuccessTransfer()
    {
        return view('Page.successTransfer');
    }
}
