<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table = 'support';
    protected $primaryKey = 'IDTransaction';
    protected $guarded = [];
    protected $perPage = 5;

    public function getSupport($id){
        return Support::where('deleted', false)->where('IDSupport', $id)->first();
    }
}
