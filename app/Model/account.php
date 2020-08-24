<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\user;
use App\Model\type_account;
use  App\Model\otp;

class account extends Model
{
    protected $table = 'account';
    protected $primaryKey = 'id_account';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function user()
    {
        return $this->hasOne(user::class, 'id_user', 'id_user');
    }

    public function type_account()
    {
        return $this->hasOne(type_account::class, 'id_type_account', 'id_type_account');
    }

    public function otp()
    {
        return $this->hasOne(otp::class, 'id_otp', 'id_otp');
    }
}
