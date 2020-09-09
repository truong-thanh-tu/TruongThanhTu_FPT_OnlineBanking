<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'IDTransaction';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function typeAccountCustomer()
    {
        return $this->hasMany(TypeAccountCustomer::class, 'IDTypeAccountCustomer', 'IDTypeAccountCustomer');
    }

    public function bank()
    {
        return $this->hasOne(Bank::class, 'IDBank', 'IDBank');
    }

    public function saveTransaction($transaction, $codeOTP)
    {

        $objTransaction = new Transaction();

        $objTransaction->IDTypeAccountCustomer = $transaction['idTypeAccountCustomer'];
        $objTransaction->IDBank = $transaction['idBank'];
        $objTransaction->CodeTransaction = $transaction['codeTransaction'];
        $objTransaction->Beneficiaries = $transaction['accountNumber'];
        $objTransaction->NameBeneficiaries = $transaction['nameBeneficiary'];
        $objTransaction->TransactionMoneyNumber = $transaction['money'];
        $objTransaction->ContentTransaction = $transaction['contentTransaction'];
        $objTransaction->Payer = $transaction['feePayer'];
        $objTransaction->Fee = $transaction['fee'];
        $objTransaction->CodeOTP = $codeOTP;
        $objTransaction->Species = 0;


        $objAccount = new Account();
        $idAccountBeneficiaries = $objAccount->getIDAccount($transaction['accountNumber']);

        $getAccountSource = Account::find($transaction['idAccount']);
        $getAccountBeneficiaries = Account::find($idAccountBeneficiaries);

        if ($transaction['feePayer'] == 1) {
            $getAccountSource->BalanceSource = $getAccountSource->BalanceSource - $transaction['fee'] - $transaction['money'];
            $getAccountBeneficiaries->BalanceSource = $getAccountBeneficiaries->BalanceSource + $transaction['money'];
            $objTransaction->Balance = $getAccountSource->BalanceSource;
        } else {
            $getAccountSource->BalanceSource = $getAccountSource->BalanceSource - $transaction['money'];
            $getAccountSource->BalanceSource = $getAccountSource->BalanceSource + $transaction['money'] - $transaction['fee'];
            $objTransaction->Balance = $getAccountSource->BalanceSource;
        }

        $objTransaction->save();


        $objTransaction = new Transaction();
        $objTransaction->IDTypeAccountCustomer = $getAccountBeneficiaries->IDTypeAccountCustomer;
        $objTransaction->IDBank = $transaction['idBank'];
        $objTransaction->CodeTransaction = $transaction['codeTransaction'];
        $objTransaction->Beneficiaries = $transaction['accountNumber'];
        $objTransaction->NameBeneficiaries = $transaction['nameBeneficiary'];
        $objTransaction->TransactionMoneyNumber = $transaction['money'];
        $objTransaction->ContentTransaction = $transaction['contentTransaction'];
        $objTransaction->Payer = $transaction['feePayer'];
        $objTransaction->Fee = $transaction['fee'];
        $objTransaction->CodeOTP = $codeOTP;
        $objTransaction->Species = 1;

        if ($transaction['feePayer'] == 1) {
            $objTransaction->Balance = $getAccountBeneficiaries->BalanceSource + $transaction['money'];
        } else {
            $objTransaction->Balance = $getAccountBeneficiaries->BalanceSource;
        }
        $objTransaction->save();
        $getAccountSource->save();
        $getAccountBeneficiaries->save();
    }

    public function saveOutTransaction($transaction, $codeOTP)
    {
        $objTransaction = new Transaction();

        $objTransaction->IDTypeAccountCustomer = $transaction['idTypeAccountCustomer'];
        $objTransaction->IDBank = $transaction['idBank'];
        $objTransaction->CodeTransaction = $transaction['codeTransaction'];
        $objTransaction->Beneficiaries = $transaction['accountNumber'];
        $objTransaction->NameBeneficiaries = $transaction['nameBeneficiary'];
        $objTransaction->TransactionMoneyNumber = $transaction['money'];
        $objTransaction->ContentTransaction = $transaction['contentTransaction'];
        $objTransaction->Payer = $transaction['feePayer'];
        $objTransaction->Fee = $transaction['fee'];
        $objTransaction->CodeOTP = $codeOTP;
        $objTransaction->Species = 0;

        $getDataAccount = Account::find($transaction['idAccount']);
        if ($transaction['feePayer'] == 1) {
            $getDataAccount->BalanceSource = $getDataAccount->BalanceSource - $transaction['feePayer'] - $transaction['money'];
            $objTransaction->Balance = $getDataAccount->BalanceSource - $transaction['feePayer'] - $transaction['money'];
        } else {
            $getDataAccount->BalanceSource = $getDataAccount->BalanceSource - $transaction['money'];
            $objTransaction->Balance = $getDataAccount->BalanceSource - $transaction['money'];

        }
        $objTransaction->save();
        $getDataAccount->save();
    }

    public function getTransaction($IDTransaction)
    {

        return Transaction::all()->where('IDTransaction', $IDTransaction);
    }

    public function getYearHistoryTransaction($getDataTypeAccountCustomers)
    {
        $dt = Carbon::now();
        $year = $dt->subYear();
        return Transaction::where('deleted', false)
            ->where('IDTypeAccountCustomer', $getDataTypeAccountCustomers->IDTypeAccountCustomer)
            ->whereDate('TransactionDate', '>=', $year)
            ->orderBy('TransactionDate', 'desc')
            ->paginate(5);
    }

    public function getMonthHistoryTransaction($getDataTypeAccountCustomers)
    {
        $dt = Carbon::now();
        $month = $dt->subMonth();
        return Transaction::where('deleted', false)
            ->where('IDTypeAccountCustomer', $getDataTypeAccountCustomers->IDTypeAccountCustomer)
            ->whereDate('TransactionDate', '>=', $month)
            ->orderBy('TransactionDate', 'desc')
            ->paginate(5);
    }

    public function getHistoryTransaction($getDataTypeAccountCustomers)
    {
        return Transaction::where('deleted', false)
            ->where('IDTypeAccountCustomer', $getDataTypeAccountCustomers->IDTypeAccountCustomer)
            ->orderBy('TransactionDate', 'desc')
            ->paginate(5);
    }

    public function totalCome($getDataTypeAccountCustomers, $value)
    {
        $objComes = Transaction::where('deleted', false)
            ->select('TransactionMoneyNumber')
            ->where('Species', $value)
            ->where('IDTypeAccountCustomer', $getDataTypeAccountCustomers->IDTypeAccountCustomer)
            ->get();
        $sum = 0;
        foreach ($objComes as $objCome) {
            $sum = $sum + $objCome->TransactionMoneyNumber;
        }
        return $sum;
    }  public function totalMonthCome($getDataTypeAccountCustomers, $value)
    {
        $dt = Carbon::now();
        $month = $dt->subMonth();
        $objComes = Transaction::where('deleted', false)
            ->select('TransactionMoneyNumber')
            ->whereDate('TransactionDate', '>=', $month)
            ->where('Species', $value)
            ->where('IDTypeAccountCustomer', $getDataTypeAccountCustomers->IDTypeAccountCustomer)
            ->get();
        $sum = 0;
        foreach ($objComes as $objCome) {
            $sum = $sum + $objCome->TransactionMoneyNumber;
        }
        return $sum;
    }

    public function totalYearCome($getDataTypeAccountCustomers, $value)
    {
        $dt = Carbon::now();
        $year = $dt->subYear();
        $objComes = Transaction::where('deleted', false)
            ->select('TransactionMoneyNumber')
            ->whereDate('TransactionDate', '>=', $year)
            ->where('Species', $value)
            ->where('IDTypeAccountCustomer', $getDataTypeAccountCustomers->IDTypeAccountCustomer)
            ->get();
        $sum = 0;
        foreach ($objComes as $objCome) {
            $sum = $sum + $objCome->TransactionMoneyNumber;
        }
        return $sum;
    }

    public function CountNameBeneficiaries($getDataTypeAccountCustomers)
    {
        $objNames = Transaction::where('deleted', false)
            ->select('NameBeneficiaries')
            ->where('IDTypeAccountCustomer', $getDataTypeAccountCustomers->IDTypeAccountCustomer)
            ->get();
        $arr = [];
        foreach ($objNames as $objName) {
            $arr[] = $objName->NameBeneficiaries;
        }
        return array_count_values($arr);
    }

    public function FindTransaction($ID)
    {
        return Transaction::where('IDTransaction', $ID)->first();
    }
}
