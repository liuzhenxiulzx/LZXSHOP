<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_address extends Model
{
    protected $table = "user_addresses";
    protected $fillable = ['user_id','userName','userTel','address','isDefault'];
}
