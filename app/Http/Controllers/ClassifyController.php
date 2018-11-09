<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Classify;

class ClassifyController extends Controller
{
    public function index(){
      
          $classify = Classify::show();
          dd($classify);
    }
 
}
