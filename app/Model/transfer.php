<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\account;

class transfer extends Model
{
    protected $table = 'transfer';
    protected $primaryKey = 'transfer';
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

    public function beneficiary()
    {
        return $this->hasOne(beneficiary::class, 'id_beneficiary', 'id_beneficiary');
    }
}
