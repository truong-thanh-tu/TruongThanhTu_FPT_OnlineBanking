<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class cc_transaction extends Model
{
    protected $table = 'cc_transactions';
    protected $primaryKey = 'transaction_id';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function account()
    {
        return $this->hasMany(accounts::class, 'account_id', 'account_id');
    }

    /*    public function beneficiary(){
            return $this->hasOne(beneficiary::class,'beneficiray_id','beneficiray_id');
        }*/
}
