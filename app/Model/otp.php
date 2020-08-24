<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\account;

class otp extends Model
{
    protected $table = 'otp';
    protected $primaryKey = 'id_otp';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function account()
    {
        return $this->hasMany(account::class, 'id_account', 'id_account');
    }
}
