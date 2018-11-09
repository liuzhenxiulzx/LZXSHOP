<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brands;
use Symfony\Component\HttpFoundation\File\UploadedFile; 
use Storage;
use Image;
use DB;

class Admin_EditbrandController extends Controller
{
   
    // 显示
    public function editbrand($id){
        // $all = Brands::where('id',$id)->get();                
        $allbrand = DB::table('Brands')->where('id', $id)->first();               
        
        return view('admin.product.editbrand',[
            'allbrand'=>$allbrand
        ]);
    }

    // 修改品牌
    public function doeditbrand(Request $req,$id){
        
        $allbrand = Brands::where('id', $id)->first();   

        $allbrand->brandName = $req->brandName;
        $allbrand->brand_order = $req->brand_order;
        $allbrand->colony = $req->colony;
        $allbrand->brand_describe = $req->describe;
        
        
        // 如果表单中上传了图片就执行上传
        if($req->has('brand_img') && $req->brand_img->isValid()){
            // 把图片保存到当前日期目录下
            $date = date('Ymd');
            $image = $req->brand_img->store('brand/'.$date);
            // 删除原图片
            Storage::delete($allbrand->brand_image);
            // 把图片路径保存到模型上
            $allbrand->brand_image=$image;
        }
        
        // 创建模型的save方法，保存到数据库
        $allbrand->save();
    }

    // 删除品牌
    public function deletebrand($id){
        $allbrand = Brands::where('id', $id)->first();   
        // 删除图片
        Storage::delete($allbrand->image);
        // 删除日志
        $allbrand->delete();

        return back();
    }

    

}
