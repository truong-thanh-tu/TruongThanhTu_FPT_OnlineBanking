<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'IDCustomer';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function typeAccountCustomer()
    {
        return $this->hasMany(TypeAccountCustomer::class, 'IDCustomer', 'IDCustomer');
    }
}
