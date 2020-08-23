<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class getReport extends Controller
{
    /**
     * Function getChangePassword the display page Report
     */
    public function getReport()
    {
        return view('Page.report');
    }
}
