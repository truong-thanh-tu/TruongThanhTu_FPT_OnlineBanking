<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\users;

class customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function users()
    {
        return $this->hasOne(users::class, 'user_id', 'user_id');
    }


}
