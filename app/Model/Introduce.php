<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Introduce extends Model
{
    //
    protected $table = 'introduce';

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function getIntroduct()
    {
        return Introduce::all();
    }
    public function getIntroItem($id){
        return Introduce::where('IDIntroduce',$id)->first();
    }
}
