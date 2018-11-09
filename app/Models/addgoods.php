<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class addgoods extends Model
{
    public function gdsall(){
       return $this->belongsTo(products::class,'goods_id');
    }

    public function gdsku(){
        return $this->belongsTo(skus::class,'sku_id');
     }
}
