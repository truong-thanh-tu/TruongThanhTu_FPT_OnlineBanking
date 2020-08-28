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
        return $this->hasOne(TypeAccountCustomer::class, 'IDTypeAccountCustomer', 'IDTypeAccountCustomer');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'IDAccount', 'IDAccount');
    }
}
