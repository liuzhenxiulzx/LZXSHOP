<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\skus;
use App\Models\addgoods;
use App\Models\products;
use DB;

class CartController extends Controller
{
    public function Cart(Request $req){
        // 获取购物车的信息
        $user_id = session('id');
        $goods = addgoods::where('user_id',$user_id)->get();
        foreach($goods as $k){
            $k['selected'] = false;
        }
        foreach($goods as $v){
            $v->gdsall;
        }
        foreach($goods as $v){
            $v->gdsku;
        }
        return view('payment.cart',[
            'goods'=>json_encode($goods),
        ]);
    }



    
}
