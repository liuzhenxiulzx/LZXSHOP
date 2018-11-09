<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rbac_user extends Model
{
    protected $table = "rbac_users";
    protected $fillable = ['rbac_name','email','password','phone'];
    // public function user(){
    //     return $this->belongsTo('App\Models\role_user');
    // }
}
