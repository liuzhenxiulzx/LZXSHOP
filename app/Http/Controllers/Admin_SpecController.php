<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\specs;
use App\Models\skus;
use App\Models\spec_val;
use DB;
use Illuminate\Support\Str;

class Admin_SpecController extends Controller
{
       


     // 添加规格
     public function spec(Request $request){
     
        $specs = new specs;
        $specs->goods_id = $request->id;
        $specs->spec_name = $request->name;
        $specs->save();

    }

    public function specval(Request $req){
        $specval = new spec_val;
        $specval->spec_id = $req->id;
        $specval->spec_val = $req->sepcval;
        $specval->save();
    }

    public function index(Request $req,$id){

        $speclist = specs::where('goods_id',$id)->get();
    
        foreach($speclist as $v){
            $v->vals;
        }
        // dd($speclist);
        
      
        return view('admin.product.addsku',[
            'id'=>$id,
            'speclist'=>$speclist,
        ]);
    }

    // sku添加
    public function dosku(Request $req,$id){
    
            // 1.根据商品id取出规格id
            $ids = [];
            $specs = specs::where('goods_id',$id)->get()->toArray();
            foreach($specs as $v){
                 $ids[] = $v['id'];
            }
            // 2.拼接select框名
            foreach($ids as $k){
                $str = 'spec_all'.$k;
                $arr['spec_all'][] = $req->$str;
            }
            // 3.拼接规格id
            $data = [];
            foreach($arr['spec_all'] as $k => $v)
            {   
                foreach($v as $k1 => $v1)
                {
                    $data[$k1][] = $v1;  
                } 
            }
            foreach($data as $v){
                $spec_all[] = implode("-",$v);
            } 
            //4.保持到数据库
        
            $arr['spec_all'] = $spec_all;
            $arr['Stock'] = $req->Stock;
            $arr['price'] = $req->price;

            for($i=0; $i<count($arr['spec_all']); $i++){
                $sku = new skus;
                $sku->goods_id = $id;
                $sku->spec_all = $arr['spec_all'][$i];
                $sku->Stock = $arr['Stock'][$i];
                $sku->price = $arr['price'][$i];
                $a = $sku->save();
                return back();
            
        
            }
            
            
            
            
            }
            
    }


