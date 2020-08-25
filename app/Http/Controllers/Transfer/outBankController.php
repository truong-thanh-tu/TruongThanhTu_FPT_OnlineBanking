<?php

namespace App\Http\Controllers\Transfer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class outBankController extends Controller
{
    /**
     * Function getInTransferBank the display page In Transfer Bank
     */
    public function getOutTransferBank()
    {
        return view('Page.outTransferBank');
    }

    /**
     * Function getInTransferBank the display page In Transfer Bank
     */
    public function getConfirmOutTransferBank()
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