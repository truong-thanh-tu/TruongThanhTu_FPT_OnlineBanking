<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';
    protected $primaryKey = 'IDAccount';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function typeAccountCustomer()
    {
        return $this->belongsTo(TypeAccountCustomer::class, 'IDTypeAccountCustomer', 'IDTypeAccountCustomer');
    }


    public function bank()
    {
        return $this->hasOne(Bank::class, 'IDBank', 'IDBank');
    }

    public function beneficiaries()
    {
        return $this->hasMany(Beneficiaries::class, 'IDAccount', 'IDAccount');
    }

    public function checkUser($numAccount)
    {
        $getDBs = Account::all();

        foreach ($getDBs as $gDB) {
            if ($gDB->AccountSourceNumber == $numAccount) {
                return true;
            }
        }
        return false;
    }

    public function getIDAccount($AccountSourceNumber)
    {
        $getData = Account::where('deleted', false)
            ->where('AccountSourceNumber', $AccountSourceNumber)
            ->first();

        return $getData->IDAccount;
    }
}
