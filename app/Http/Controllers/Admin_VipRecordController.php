<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin_VipRecordController extends Controller
{
    public function Index(){
        return view('admin.vip.integration');
    }
}
