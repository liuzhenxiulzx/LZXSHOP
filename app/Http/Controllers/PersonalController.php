<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\ordernumber;
use App\Models\products;
use App\Models\skus;

class PersonalController extends Controller
{
    //个人中心首页(我的订单)
    public function homeindex(){
        $userName = session('username');
        $userid = session('id');

        $order = orders::where('user_id',$userid)->orderBy('id', 'desc')->get();
        // 关联订单号表
        foreach($order as $v){
             $v->ordernum;
        }

        // 取出商品信息
        foreach($order as $v){
            $v->ordergoods;
       }
        
        //关联sku表
        foreach($order as $v){
            $v->ordersku;
        } 

        // dd($order);
    
        return view('personal.home_index',[
            'userName'=>$userName,
            'order'=>$order,
        ]);
    }


    // 待付款
    public function pendingpay(){
        return view('personal.home_order_pay');
    }

    // 待发货
    public function pendingdelivery(){
        return view('personal.home_order_send');
    }


     //待收货
     public function overgoods(){
        return view('personal.home_order_receive');
    }


    // 待评价
    public function evaluate(){
        return view('personal.home_order_evaluate');
    }

}
