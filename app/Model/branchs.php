<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class branchs extends Model
{
    protected $table = 'branchs';
    protected $primaryKey = 'branchs_id';
    protected $guarded = [];
    protected $perPage = 5;

    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function account()
    {
        return $this->hasOne(accounts::class, 'account_type', 'account_type');
    }
}
