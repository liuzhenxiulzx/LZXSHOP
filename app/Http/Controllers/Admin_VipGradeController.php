<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vip_grade;
use App\Models\vips;

class Admin_VipGradeController extends Controller
{
    public function Index(){

        $grade = vip_grade::get();

        $viplist = vips::get();

        return view('admin.vip.member-Grading',[
            'viplist'=>$viplist,
            'grade'=>$grade,
        ]);
    }
}
