<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public  function checkAccount(){
        if (empty(session()->get('IDCustomer'))){
            return redirect('public');
        }
    }
}
