<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_address;
use App\Libs\Snowflake;
use App\Models\addgoods;
use App\Models\products;
use App\Models\skus;
class BalanceController extends Controller
{
    public function balance(Request $req){
       
        // dd($req->all());
        if(isset($req->cartid)){
        
            // 一：保存勾选的商品信息
            //获取购物车id
            $cartid = $req->cartid; 
            //获取选中商品的数量
            // 1.拼接数量字符串
            foreach($cartid as $v){
                $count[] = 'count'.$v;
            }
            //2.循环取出对应的值
            foreach($count as $v){
                $goodscount[] = $req->$v;
            }
            // 把结算信息保存到session
            $data = addgoods::whereIn('id',$req->cartid)->get()->toArray();
   
            // 二：计算总价
            // 1.取出sku id 查询商品价格
            foreach($data as $v){
                $skuid[] = $v['sku_id'];
            }
            foreach($skuid as $v){
                $price[] = skus::where('id',$v)->get()->toArray();
            }
            // 取出价格
            foreach($price as $v){
                foreach($v as $k){
                    $prices[] = $k['price'];
                }
            }
            // 计算总价
            $sum = 0;
            foreach($prices as $key=>$v){
                foreach($goodscount as $key2=>$k){
                    $a = $v*$k;
                }
                $sum += $a;
            }
        
            // dd($sum);
            session([
                'data'=>$data,
                'cartid'=>$cartid,
                'goodscount'=>$goodscount,
                'sum'=>$sum,
                'prices'=>$prices,
                'skuid'=>$skuid,
            ]);

        }else{
            
            return back();
        }
// ===================================================
        // 二：根据用户id查询收货地址
        $user_id = session('id');
        $show_address = user_address::where('user_id',$user_id)->get();
        
        // 三：取出商品基本信息
        // 取出商品数量
        $counts =  session('goodscount');
       
        // 取出商品信息
        $goodsdata = session('data');

        // 1.根据商品id，取出商品名称
        foreach($goodsdata as $v){
            $goodsid[] = $v['goods_id'];
        }

        foreach($goodsid as $v){
           $goodsname[] =  products::where('id',$v)->first();
             
        }

        $goodsid = session(['goodsid'=>$goodsid]);
        // 从session 中取出价格
        $unit_Price = session('prices');
        // 保存商品id
       
      
        return view('payment.balance',[
            'show_address'=>json_encode($show_address),
            'goodsname'=>$goodsname,
            'counts'=>$counts,
            'sum'=>$sum,
            'unit_Price'=>$unit_Price,
        ]);
    
    }

    public function dobalance(){
        
    }
    
    // 添加收货地址
    public function address(Request $req){
    
        $user_id = session('id');
        $userName = $req->userName;
        $aaddress = $req->address;
        $userTel = $req->userTel;
        $isDefault = $req->isDefault;

        $address = new user_address;
        $address->user_id = $user_id;
        $address->userName = $userName;
        $address->address = $aaddress;
        $address->userTel = $userTel;
        $address->isDefault = $isDefault;
        $address->save();
        
    }

  


}
