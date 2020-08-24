<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\account;
use  App\Model\customer;

class user extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function customer()
    {
        return $this->belongsTo(customer::class, 'id_customer', 'id_customer');
    }

    public function account()
    {
        return $this->hasMany(account::class, 'id_account', 'id_account');
    }
}
