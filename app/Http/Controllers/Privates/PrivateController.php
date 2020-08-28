<?php

namespace App\Http\Controllers\privates;

use App\Http\Controllers\Controller;

class PrivateController extends Controller
{
    public function showInfoAccount()
    {
        return view('private.information.accountInfoPrivate');
    }

    public function showDetailInfoAccount($theIDAccount)
    {
        return view('private.information.detailAccountInfoPrivate');
    }

    public function showReport()
    {
        return view('private.report.reportPrivate');
    }
    public function showSupport()
    {
        return view('private.support.supportPrivate');
    }

    public function showHistory()
    {
        return view('private.history.historyTransactionPrivate');
    }

    public function showDetailHistory()
    {
        return view('private.history.detailHistoryTransactionPrivate');

    }

}
