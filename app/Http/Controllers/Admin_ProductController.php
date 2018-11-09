<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classify;
use App\Models\Products;
use App\Models\Brands;
use App\Models\skus;
use DB;
use Image;
use Storage;

class Admin_ProductController extends Controller
{
    public function Index(){
        $product = Products::get();

        return view('admin.product.Products_List',[
            'product'=>$product
        ]);
    }

    public function addpro(){
        // 取出分类表的数据
        $sort = Classify::where('parent_id',0)->get()->toArray();
        // 递归排序
        // $sort = $this->sortTree($classify);  

        //  取出所有的品牌
        $Brand  = Brands::get();

        return view('admin.product.picture-add',[
            'sort'=>$sort,
            'Brand'=>$Brand,
        ]);
    }

    public function doaddpro(Request $req){

        $product = new Products;
        $product->pro_title = $req->pro_title;
        $product->brief_title = $req->brief_title;
        $product->promotion = $req->promotion;
        $product->pro_name = $req->pro_name;
        $product->price = $req->price;
        $product->parent_id = $req->cat3_id;
        $product->brand_id = $req->brand_id;
        $product->pro_number = $req->pro_number;
        $product->area = $req->area;
        $product->weight = $req->weight;
        
       
        // 上传图片     
        if($req->has('pro_image') && $req->pro_image->isValid()){
             // 当前图片上传的临时路径
            $oldimage = $req->pro_image->path();
            $date = date('Ymd');
            // 图片保存的路径
            $path =  $req->pro_image->store('product/'.$date);
             // 打开要处理的图片
            $img = Image::make($oldimage);
            $img -> resize(220,282);
            $img -> save('./uploads/'.$path);
            // 设置到模型中
            $product->pro_image = $path;
        }      
        $product->save();    
            
        
        return redirect()->route('Adminproduct');

    }

   

 




    // 无线级分类
    function sortTree($data, array $label = ['pid' => 'parent_id', 'id' => 'id', 'level' => 'level'], $parent_id = 0, $level = 0) {
        static $_ret = [];
        foreach ($data as $v) {
            if ($v[$label['pid']] == $parent_id) {
                $v[$label['level']] = $level;
                $_ret[] = $v;
                $this->sortTree($data, $label, $v[$label['id']], $level + 1);
            }
        }
        return $_ret;
    }


  


    
}
