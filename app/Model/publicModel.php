<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class publicModel extends Model
{
    //
    /**
     * @param $request
     * @return mixed
     *
     */
    public function getID($request)
    {
        $valueIDCustomer = $request->session()->get('IDCustomer');

        return $getDataTypeAccountCustomers = TypeAccountCustomer::where('IDCustomer', $valueIDCustomer)->get();
    }

    public function getIDReport($request)
    {
        $valueIDCustomer = $request->session()->get('IDCustomer');

        return $getDataTypeAccountCustomers = TypeAccountCustomer::where('IDCustomer', $valueIDCustomer)->first();
    }

    /**
     * @param $IDBank
     * @param $control
     * @return mixed
     */
    public function getHistory($IDBank, $control, $dateTo, $dateFrom)
    {
        if ($dateTo == null && $dateFrom == null) {
            return $getHistoryInSystems = Transaction::
            where('IDBank', $control, $IDBank)
                ->where('IDTypeAccountCustomer', session()->get('IDCustomer'))
                ->orderBy('TransactionDate', 'desc')
                ->paginate(5);
        } else {

            $getHistoryInSystems = Transaction::
            where('IDBank', $control, $IDBank)
                ->where('IDTypeAccountCustomer', session()->get('IDCustomer'))
                ->whereDate('TransactionDate', '>=', $dateTo)
                ->whereDate('TransactionDate', '<=', $dateFrom)
                ->orderBy('TransactionDate', 'desc')
                ->paginate(5);
            return $getHistoryInSystems;
        }
    }

    /**
     * @param $IDTypeAccountCustomer
     * @return mixed
     */
    public function getTypeAccountCustomer($IDTypeAccountCustomer)
    {
        return $getDataTypeAccountCustomer = TypeAccountCustomer::find($IDTypeAccountCustomer);

    }

    /**
     * setTypeAccountCustomer
     * @param $IDCustomer
     * @param $IDTypeAccount
     * @return mixed
     */
    public function setTypeAccountCustomer($IDCustomer, $IDTypeAccount)
    {
        return $getDataTypeAccountCustomer = TypeAccountCustomer::all()->where('IDTypeAccount', $IDTypeAccount)->where('IDCustomer', $IDCustomer)->first();

    }

    public function compareMoney($theMoney, $IDAccount)
    {
        $getDataAccount = Account::all()->where('IDAccount', $IDAccount)->first();
        $getBalanceSource = $getDataAccount->BalanceSource;
        $theCheckMoney = $getBalanceSource - $theMoney;
        if ($theCheckMoney > 50000) {
            return true;
        }
        return false;
    }

}
