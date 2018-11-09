<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;

class classify extends Model
{
    protected $table = 'classify';

    public function inserclass(){
        $bool = DB::table('classify')->insert(
            ['catName'=>$catName,'parent_id'=>$classify_id,'path'=>'-2-']
          );
    }

}
