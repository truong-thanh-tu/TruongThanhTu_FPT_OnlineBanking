<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TypeAccount extends Model
{
    protected $table = 'type_ccount';
    protected $primaryKey = 'IDTypeAccount';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }
}
