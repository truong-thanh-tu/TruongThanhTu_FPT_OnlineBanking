<?php

namespace App\Model;

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

        $objTransaction->save();

        $objAccount = new Account();
        $idAccountBeneficiaries = $objAccount->getIDAccount($transaction['accountNumber']);

        $getAccountSource = Account::find($transaction['idAccount']);
        $getAccountBeneficiaries = Account::find($idAccountBeneficiaries);

        if ($transaction['feePayer'] == 1) {
            $getAccountSource->BalanceSource = $getAccountSource->BalanceSource - $transaction['fee'] - $transaction['money'];
            $getAccountBeneficiaries->BalanceSource = $getAccountBeneficiaries->BalanceSource + $transaction['money'];

        } else {
            $getAccountSource->BalanceSource = $getAccountSource->BalanceSource - $transaction['money'];
            $getAccountBeneficiaries->BalanceSource = $getAccountBeneficiaries->BalanceSource - $transaction['fee'] + $transaction['money'];

        }
        $getAccountSource->save();
        $getAccountBeneficiaries->save();
    }

    public function getTransaction($IDTransaction)
    {

        return Transaction::all()->where('IDTransaction', $IDTransaction);
    }
}
