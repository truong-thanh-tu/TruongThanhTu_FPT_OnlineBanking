<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class transferController extends Controller
{
    /**
     * Function displays the Transfer Limit page
     */

    public function getTransferLimit()
    {
        return view('Page.transferLimit');
    }
}
