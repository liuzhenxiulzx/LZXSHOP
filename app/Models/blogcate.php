<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blogcate extends Model
{
    protected $table = 'blogcates';
    protected $fillable = ['catName','abstract'];
}
