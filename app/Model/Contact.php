<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';


    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }
}
