<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'Products';
    protected $fillable = ['parent_id','brand_id','pro_name','pro_title','brief_title','price','pro_number','area','weight','promotion','pro_image'];

    public function goodspec(){
        return $this->hasMany(specs::class,'goods_id');
    }

    public function goodsku(){
        return $this->hasMany(skus::class,'goods_id');
    }
}
