<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class listController extends Controller
{
    /**
     * Function displays the List Of Beneficiaries page
     */

    public function getListOfBeneficiaries()
    {
        return view('Page.listOfBeneficiaries');
    }
}
