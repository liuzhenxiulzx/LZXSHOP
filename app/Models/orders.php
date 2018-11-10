<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    public function ordernum(){
        return $this->belongsTo(ordernumber::class,'order_id');
    }

    public function ordergoods(){
        return $this->belongsTo(products::class,'goods_id');
    }

    public function ordersku(){
        return $this->belongsTo(skus::class,'sku_id');
    }
}
