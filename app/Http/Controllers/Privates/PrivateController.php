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
        return view('private\information\detailAccountInfoPravite');
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

    public function showTransactionInSystem()
    {
        return view('private.transaction.inSystem.transactionInSystem');

    }

    public function showConfirmInfoTransactionInSystem()
    {
        return view('private.transaction.inSystem.confirmInfoTransactionInSystem');

    }

    public function showReceiveCodeOTPInSystem()
    {
        return view('private.transaction.inSystem.receiveCodeOTPInSystem');

    }

    public function showAlertsSuccessTransactionInSystem()
    {
        return view('private.transaction.inSystem.alertsSuccessTransactionInSystem');

    }

    public function showTransactionOutSystem()
    {
        return view('private.transaction.outSystem.transactionOutSystem');

    }

    public function showConfirmInfoTransactionOutSystem()
    {
        return view('private.transaction.outSystem.confirmInfoTransactionOutSystem');

    }

    public function showReceiveCodeOTPOutSystem()
    {
        return view('private.transaction.outSystem.receiveCodeOTPOutSystem');

    }

    public function showAlertsSuccessTransactionOutSystem()
    {
        return view('private\transaction\outSystem\alertSuccessTransactionOutSystem');

    }

}
