<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    public static function all($columns = ['*'])
    {
        return parent::all($columns)->where('deleted', false);
    }

    public function getBlog()
    {
        return Blog::all();
    }
    public function getBlogItem($id){
        return Blog::where('IDBlog',$id)->first();
    }
}
