<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Beneficiaries extends Model
{
    protected $table = 'beneficiaries';
    protected $primaryKey = 'IDBeneficiaries';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'IDBeneficiaries', 'IDBeneficiaries');
    }

    public function bank()
    {
        return $this->hasOne(Bank::class, 'IDBank', 'IDBank');
    }

    public function getBeneficiaries($control,$IDAccount)
    {

        return Beneficiaries::all()->where('IDBank', $control, 1)->where('IDAccount',$IDAccount);
    }


    public function checkBeneficiaries($numberAccount)
    {
        $getDBs = Beneficiaries::all();
        foreach ($getDBs as $gD) {
            if ($gD->AccountBeneficiaries == $numberAccount) {
                return false;
            }
        }
        return true;
    }

    public static function saveBeneficiaries($numberAccount, $nameAccount,$IDAccount)
    {
        $objDB = new Beneficiaries();
        $objDB->IDAccount = $IDAccount;
        $objDB->AccountBeneficiaries = $numberAccount;
        $objDB->NameAccountBeneficiaries = $nameAccount;
        $objDB->IDBank = 1;
        $objDB->save();
    }

}
