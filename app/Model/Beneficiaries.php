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
}
