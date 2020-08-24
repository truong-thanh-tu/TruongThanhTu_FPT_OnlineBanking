<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\user;

class customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
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


}
