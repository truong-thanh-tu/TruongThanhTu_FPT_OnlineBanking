<?php

namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class historyTransfer extends Controller
{
    /**
     * Function getHistory the display page History
     */
    public function getHistory()
    {
        return view('Page.historyTransfer');
    }

    /**
     * Function getHistory the display page History
     */
    public function getDetailHistoryTransfer()
    {
        return view('Page.detailHistoryTransfer');
    }
}
