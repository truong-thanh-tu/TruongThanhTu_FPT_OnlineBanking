<?php

namespace App\Model;

use App\Model\accounts;
use Illuminate\Database\Eloquent\Model;
use  App\Model\customer;

class users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
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

    public function customer()
    {
        return $this->hasOne(customer::class, 'customer_id', 'customer_id');
    }

}
