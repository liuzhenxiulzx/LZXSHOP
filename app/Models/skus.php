<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class skus extends Model
{
    protected $table = "skuses";
    protected $fillable = ['goods_id','spec_all','Stock','price'];
}
