<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\skus;
use App\Models\specs;
use App\Models\spec_val;
use App\Models\addgoods;
use DB;

class DetailController extends Controller
{
    public function Detail($id){
        // 查询购物车数量
        $cartcount = addgoods::count();
        // dd($cartcount);
        // 获取商品的基本信息
        $goods = products::where('id',$id)->first();
        // 获取商品对应的规格名
        $spec = specs::where('goods_id',$id)->with('vals')->get();
        // 关联spec表
        $goods->goodspec;

        foreach($goods->goodspec as $spe){
            $spe->vals;
        }
        // 关联sku表
        $goods->goodsku;

    
        return view('index.item',[
            'goods'=>$goods,
            'spec'=>$spec,
            'id'=>$id,
            'goodsAll'=>json_encode($goods),
            'cartcount'=>$cartcount,
        ]);
    }

    public function dodetail(Request $req){
        $goodsCount = $req->input('goodsCount');
        $sku_id = $req->input('sku_id');
        $goods_id = $req->input('goods_id');
        $userid = session('id');

       $cartgoods = addgoods::where([
                        ['user_id', '=', $userid],
                        ['goods_id', $goods_id],
                        ['sku_id', $sku_id]
                    ])->first();
   
        
        if($cartgoods){
            $cartgoods->goodscount += $goodsCount;
            $cartgoods->save();
        }else{
            
       
        $addgoods = new addgoods;
        $addgoods->user_id = $userid;
        $addgoods->goods_id = $goods_id;
        $addgoods->sku_id = $sku_id;
        $addgoods->goodscount = $goodsCount;
    
        $addgoods->save();
          }
    }


    public function delcart(Request $req){
    
        $cartid = $req->input('id');

        $data =  DB::table('addgoods')->where('id', '=', $cartid)->delete();
        
        
    

    }


   
}
