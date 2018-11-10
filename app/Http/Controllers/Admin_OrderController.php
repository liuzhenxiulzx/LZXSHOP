<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classify;
use App\Models\orders;
use App\Models\products;

class Admin_OrderController extends Controller
{
    // 订单管理
    public function ordermanage(){
        // 取出所有订单类型
        $calss = classify::where('parent_id',0)->get();
        // 取出订单信息
        $orders = orders::get();
        // 关联订单号表
        foreach($orders as $v){
            $v->ordernum;
        }
        // 关联商品表
        foreach($orders as $v){
            $v->ordergoods;
        }
        // 关联sku表
        foreach($orders as $v){
            $v->ordersku;
        }
        // 取出该商品所属分类
        // 1.取出商品id
//         foreach($orders as $v){
//             $goodsid[] =  $v->goods_id;
//         }
//         // 2.在商品表中取出分类id
//         foreach($goodsid as $k){
//             $product[] = products::where('id',$k)->get();
            
//         }
        
//         foreach($product as $v){
// $classid[] = $v->parent_id;
//             // $class[] = classify::where('id',$v)->get(); 
//         }
//         dd($classid);


        return view('admin.transaction.Orderform',[
            'calss'=>$calss,
            'orders'=>$orders
        ]);
    }
    // 订单处理
    public function orderprocess(){
        return view('admin.transaction.Order_handling');
    }

    // 订单详情
    public function orderdetails(){
        return view('admin.transaction.order_detailed');
    }
    // 退款管理
    public function refund(){
        return view('admin.transaction.Refund');
    }
}
