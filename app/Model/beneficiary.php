<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class beneficiary extends Model
{

    protected $table = 'beneficiary';
    protected $primaryKey = 'id_beneficiary';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }


}
