<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Classify;
use DB;
use Storage;
use Image;
class Admin_EditproductController extends Controller
{
    
    //修改产品 显示
    public function editpro($id){

        $product = Products::where('id', $id)->first();    
        $classid = $product->parent_id;
      
        // 获取分类的所有数据
        $allclass = Classify::get()->toArray();
        $data =  $this->sortTree($allclass);
    
        // 取出当前产品的父级id
        $class = DB::table('Classify')->where('id', $classid)->first();
        
        return view('admin.product.editproduct',[
            'product'=>$product,
            'class'=>$class,
            'data'=>$data,
            'classid'=>$classid
        ]);


    }

    public function doeditpro(Request $req,$id){

        $product = Products::where('id', $id)->first();  
     
        $product->fill($req->all());
        // $product->pro_title  = $req->pro_title;
        // $product->brief_title  = $req->brief_title;
        // $product->promotion  = $req->promotion;
        // $product->pro_name  = $req->pro_name;
        // $product->parent_id  = $req->parent_id;
        // $product->pro_number  = $req->pro_number;
        // $product->area  = $req->area;
        // $product->weight  = $req->weight;
        // $product->price  = $req->price;

        // 如果表单中上传了图片就执行上传
        if($req->has('pro_image') && $req->pro_image->isValid()){
            // 当前图片上传的临时路径
            $oldimage = $req->pro_image->path();
            // 把图片保存到当前日期目录下
            $date = date('Ymd');
            $image = $req->pro_image->store('product/'.$date);

            // 删除原图片
            Storage::delete($product->pro_image);

            // 打开要处理的图片
            $img = Image::make($oldimage);
            $img -> resize(220,282);
            $img -> save('./uploads/'.$image);
            // // 把图片路径保存到模型上
            $product->pro_image=$image;
        }         

        $product->save();
       
        return redirect()->route('Adminproduct');
    }

    // 删除产品
    public function delteproduct($id){

        $product = Products::where('id', $id)->first();   
        // 删除图片
        Storage::delete($product->pro_image);
        // 删除日志
        $product->delete();

        return back();
    }


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
