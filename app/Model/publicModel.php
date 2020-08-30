<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class publicModel extends Model
{
    //
    /**
     * @param $request
     * @return mixed
     */
    public function getID($request)
    {
        $valueIDCustomer = $request->session()->get('IDCustomer');

        return $getDataTypeAccountCustomers = TypeAccountCustomer::where('IDCustomer', $valueIDCustomer)->get();
    }

    /**
     * @param $IDBank
     * @param $control
     * @return mixed
     */
    public function getHistory($IDBank, $control)
    {
        return $getHistoryInSystems = Transaction::where('IDBank', $control, $IDBank)->paginate(5);
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

    public function compareMoney($theMoney,$IDAccount){
        $getDataAccount = Account::all()->where('IDAccount',$IDAccount)->first();
        $getBalanceSource = $getDataAccount->BalanceSource;
        $theCheckMoney = $getBalanceSource - $theMoney;
        if ($theCheckMoney > 50000 ){
            return true;
        }
        return false;
    }

}
