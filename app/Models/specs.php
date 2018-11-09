<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class specs extends Model
{
    protected $fillable=['goods_id','spec_name',];
    protected $casts=[
        'goods_id'=>'string',
        'spec_name'=>'string'
    ];

    function vals(){
        return $this->hasMany(spec_val::class,'spec_id');
    }
}
