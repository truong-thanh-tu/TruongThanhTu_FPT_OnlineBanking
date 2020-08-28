<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TypeAccountCustomer extends Model
{
    protected $table = 'type_ccount';
    protected $primaryKey = 'IDTypeAccount';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function typeAccount()
    {
        return $this->hasMany(TypeAccountCustomer::class, 'IDTypeAccount', 'IDTypeAccount');
    }

    public function customer()
    {
        return $this->hasMany(Customer::class, 'IDCustomer', 'IDCustomer');
    }
}
