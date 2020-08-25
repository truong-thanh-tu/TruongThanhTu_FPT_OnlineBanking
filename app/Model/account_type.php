<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class account_type extends Model
{
    protected $table ='account_type';
    protected  $primaryKey='account_type_id';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }
}
