<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class type_account extends Model
{
    protected $table ='type_account';
    protected  $primaryKey='id_type_account';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }
}
