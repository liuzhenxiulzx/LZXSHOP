<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\classify;

class ProductController extends Controller
{
    public function Index($id){
        // 取出商品基本信息
        $product = products::where('parent_id',$id)->get();
        // dd($product);
        // 根据id取出所有对应的分类
        $class = classify::where('id',$id)->get()->toArray();
        $cates = [];
        // 取出三级分类的id和类名
        foreach($class as $v){
            $parent_id1 = $v['parent_id'];
            $cates[] = $v['catName'];
        }
        // 取出二级分类的id和类名
        $class2 = classify::where('id',$parent_id1)->get()->toArray();
        foreach($class2 as $v){
            $parent_id2 = $v['parent_id'];
            $cates[] = $v['catName'];
        }
        // 取出一级分类的类名
        $class3 = classify::where('id',$parent_id2)->get()->toArray();
        foreach($class3 as $v){
            $cates[] = $v['catName'];
        }
        return view('product.pro_details',[
            'product'=>$product,
            'cates'=>$cates
        ]);
    }
}
