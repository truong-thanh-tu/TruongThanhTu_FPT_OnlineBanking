<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TypeAccountCustomer extends Model
{
    protected $table = 'type_account_customer';
    protected $primaryKey = 'IDTypeAccount';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function typeAccount()
    {
        return $this->hasOne(TypeAccount::class, 'IDTypeAccount', 'IDTypeAccount');
    }

    public function customer()
    {
        return $this->hasOne(Users::class, 'IDCustomer', 'IDCustomer');
    }

    public function account()
    {
        return $this->hasOne(Account::class, 'IDTypeAccountCustomer', 'IDTypeAccountCustomer');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'IDTypeAccountCustomer', 'IDTypeAccountCustomer');
    }

    public function getTypeAccountCustomer($IDCustomer,$IDTypeAccount){
        return TypeAccountCustomer::all()
            ->where('IDTypeAccount',$IDTypeAccount)
            ->where('IDCustomer',$IDCustomer)
            ->first();
    }
}
