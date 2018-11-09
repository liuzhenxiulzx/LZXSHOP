<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetupController extends Controller
{
    // 个人信息
    public function Personalinfo(){
        return view('personal.home_setting_info');
    }

    // 地址管理
    public function Addressmanage(){
        return view('personal.home_setting_address');
    }

    // 安全管理
    public function safety(){
        return view('personal.home_setting_safe');
    }
    
}
