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

    public function account()
    {
        return $this->hasMany(Account::class, 'IDTransaction', 'IDTransaction');
    }

    public function beneficiaries()
    {
        return $this->hasOne(Beneficiaries::class, 'IDBeneficiaries', 'IDBeneficiaries');
    }
}
