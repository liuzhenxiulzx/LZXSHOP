<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\ordernumber;
use App\Models\products;
use App\Models\skus;
use Illuminate\Pagination\Paginator;

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
    
        return view('personal.home_index',[
            'userName'=>$userName,
            'order'=>$order,
        ]);
    }


    // 待付款
    public function pendingpay(){
      
        $no = ordernumber::where('isPay',0)->get();
   
        // 判断是否有数据
        if(count($no)){
           
            $nomoney = [];
            foreach($no as $a){
            $nomoney = $a->id;
            }
            // 判断是否为数组
            if(is_array($nomoney)){
                foreach($nomoney as $p){
                    $pading = orders::where('order_id',$p)->orderBy('id', 'desc')->get();
                }
            }else{
                $pading = orders::where('order_id',$nomoney)->orderBy('id', 'desc')->get();
            }
            return view('personal.home_order_pay',[
                'pading'=>$pading,
                'num'=>1
            ]);

           
        }else{
         
            return view('personal.home_order_pay',[
                'num'=>0
            ]);
        }

      
    }

    // 待发货
    public function pendingdelivery(){
        $deling = orders::where('order_state',2)->orderBy('id', 'desc')->get();
       
        if(count($deling)){
            
              // 关联订单号表
            foreach($deling as $v){
                $v->ordernum;
            }

            // 取出商品信息
            foreach($deling as $v){
                $v->ordergoods;
            }
        
            //关联sku表
            foreach($deling as $v){
                $v->ordersku;
            } 

            return view('personal.home_order_send',[
                'deling'=>$deling,
                'num'=>1
            ]);
        }else{
         
            return view('personal.home_order_send',[
                'num'=>0
            ]);
        }
       
    }


     //待收货
     public function overgoods(){
        $overgoods = orders::where('order_state',3)->orderBy('id', 'desc')->get();

        if(count($overgoods)){
    
             // 关联订单号表
            foreach($overgoods as $v){
                $v->ordernum;
            }
    
            // 取出商品信息
            foreach($overgoods as $v){
                $v->ordergoods;
            }
        
            //关联sku表
            foreach($overgoods as $v){
                $v->ordersku;
            } 
        
            return view('personal.home_order_receive',[
                'overgoods'=>$overgoods,
                'num'=>1
            ]);

        }else{
           
            return view('personal.home_order_receive',[
                'num'=>0
            ]);
        }
       
    }


    // 待评价
    public function evaluate(){
        
        $evaluates = orders::where('order_state',4)->orderBy('id', 'desc')->get();

        if(count($evaluates)){
              // 关联订单号表
              foreach($evaluates as $v){
                $v->ordernum;
            }
    
            // 取出商品信息
            foreach($evaluates as $v){
                $v->ordergoods;
            }
        
            //关联sku表
            foreach($evaluates as $v){
                $v->ordersku;
            } 

            return view('personal.home_order_evaluate',[
                'evaluates'=>$evaluates,
                'num'=>1
            ]);
        }else{
            return view('personal.home_order_evaluate',[
                'num'=>0
            ]);
        }
       
    }

}
