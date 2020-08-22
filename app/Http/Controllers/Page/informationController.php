<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class informationController extends Controller
{
    /**
     * Function displays the Customer Information page
     */

    public function getInformationCustomer()
    {
        return view('Page.informationCustomer');
    }
}
