<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'Brands';
    protected $fillable = ['brandName','brand_image','colony','brand_describe','brand_order'];
}
