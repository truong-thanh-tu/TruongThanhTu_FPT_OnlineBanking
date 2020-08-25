<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\users;
use App\Model\account_type;
use  App\Model\otp;

class accounts extends Model
{
    protected $table = 'accounts';
    protected $primaryKey = 'account_id';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function user()
    {
        return $this->hasOne(users::class, 'account_id', 'account_id');
    }

    public function account_type()
    {
        return $this->hasOne(account_type::class, 'account_type_id', 'account_type_id');
    }

    public function branch()
    {
        return $this->hasOne(branchs::class, 'branch_id', 'branch_id');
    }


}
