<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vips;
use App\Models\vip_grade;
use App\Models\viprank;
use DB;
class Admin_ViplistController extends Controller
{
    public function Index(){
        $vip = vips::get();
        // 取出等级id
        $grande = vip_grade::get();


        
        return view('admin.vip.user_list',[
            'vip'=>$vip,
            'grande'=>$grande
        ]);
    }

    public function addvip(){
        // 取出等级
        $grade = vip_grade::get();
        return view('admin.vip.addvip',[
            'grade'=>$grade
        ]);
    }

    // 添加会员
    public function doaddvip(Request $req){
        
        $vip = new vips;
        // new 一个会员等级中间表

        // 接收数据
        $vip->vipname = $req->vipname;
        $vip->real_name = $req->real_name;
        $vip->userEmail = $req->email;
        $vip->phone = $req->phone;
        $vip->home_address = $req->home_address;
        $vip->grade_ID = $req->grade_ID;
        // 保存
        $vip->save();

        // 返回会员表的id
        $vipid = $vip->id;
        // 接收等级id
        $gradeid = $req->grade_ID;

        $grade = new viprank;
        // 保存数据到模型
        $grade->vip_id = $vipid;
        $grade->grade_id = $gradeid;
        $grade->save();

        return back();

    }

    // 修改会员
    public function editvip($id){
        $vip = vips::where('id',$id)->first();
        return view('admin.vip.editvip',[
            'vip'=>$vip
        ]);
    }

    // 接收修改表单的值
    public function doeditvip(Request $req,$id){
        $editvip = vips::where('id',$id)->first();

        $editvip->vipname = $req->vipname;
        $editvip->real_name = $req->real_name;
        $editvip->userEmail = $req->email;
        $editvip->phone = $req->phone;
        $editvip->home_address = $req->home_address;
        $editvip->grade_ID = $req->grade_ID;

        $editvip->save();

        return back();
    }


    // 删除会员
    public function delectvip($id){
        
        $delectvip = vips::where('id', $id)->first();   
      
        // 删除会员
        $delectvip->delete();

        return back();
    }
}
