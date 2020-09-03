<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';
    protected $primaryKey = 'IDBank';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function getBank()
    {
        return Bank::all();
    }

    public function setBank($name, $city)
    {
        return $this->getBank()
            ->where('Name', $name)
            ->where('City', $city)
            ->first();
    }
    public function checkBank($name,$city){
        $checkBank = $this->getBank()
            ->where('Name', $name)
            ->where('City', $city)
            ->first();
        if (isset($checkBank)){
            return true;
        }
        return false;
    }
}
