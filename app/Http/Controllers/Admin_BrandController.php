<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brands;
use Symfony\Component\HttpFoundation\File\UploadedFile; 
use Storage;
use Image;
use DB;

class Admin_BrandController extends Controller
{
    public function Index(){
        $Brand = DB::table('Brands')->paginate(5);
       
        return view('admin.product.Brand_Manage',[
            'Brand'=>$Brand
        ]);
    }

    public function addBrand(){
        return view('admin.product.Add_Brand');
    }


    public function doaddBrand(Request $req){
        $brand = new Brands;

        // 获取表单信息
        $brand->brandName = $req->brandName;
        $brand->brand_order = $req->brand_order;
        $brand->colony = $req->colony;
        $brand->brand_describe = $req->describe;
        // 上传图片     
        if($req->has('brand_img') && $req->brand_img->isValid()){
            // $dir = app_path();
            // $root = $dir.'public/uploads/';
            // // 当前图片上传的位置
            // $oldimage = $req->brand_img->path();
            
            // 保存图片到face下
            $date = date('Ymd');

            // 新路径
            // $newpath = $root.$date.'/';
            // dd($oldimage);
           $path =  $req->brand_img->store('brand/'.$date);
        
        }
        // 图片上传的路径
        $path = 'storage/app'.$path;

        $brand->brand_image = $path;

        $brand->save();
        
        return back();

    }





















// public function upload(Request $request){
//     if ($request->isMethod('POST')) { //判断是否是POST上传，应该不会有人用get吧，恩，不会的

//         //在源生的php代码中是使用$_FILE来查看上传文件的属性
//         //但是在laravel里面有更好的封装好的方法，就是下面这个
//         //显示的属性更多
//         $fileCharater = $request->file('source');

//         if ($fileCharater->isValid()) { //括号里面的是必须加的哦
//             //如果括号里面的不加上的话，下面的方法也无法调用的

//             //获取文件的扩展名 
//             $ext = $fileCharater->getClientOriginalExtension();

//             //获取文件的绝对路径
//             $path = $fileCharater->getRealPath();

//             //定义文件名
//             $filename = date('Ymd').'.'.$ext;

//             //存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
//             Storage::disk('public')->put($filename, file_get_contents($path));
//         }
//     }
//     return view('upload');
// }

//      // 上传图片
//     // 参数一、表单中文件名
//     // 参数二、保存到的二级目录

    // public function uploads($imge,$level){
    //     // $path = $file -> move(base_path().'/uploads',$newName);
       
    //     // 先创建目录
    //     $root ='public/uploads/';
    //     // 今天日期
    //     $time =  date('Ymd');
    //     // 如果没有这个目录则创建目录
    //     // if(!is_dir($root.$time)){
    //     //     // 创建目录
    //     //     mkdir(iconv("UTF-8", "GBK", $root),0777,true); 
    //     // }



    //     // 生成唯一的名字
    //     $name = md5( time().rand(1,9999) );

    //     // 取出原来这个图片的后缀
    //     // strrchr : 从最后一个字符开始截取到最后
    //     $ext = '.'.$imge->getClientOriginalExtension();//.jpg
    //     $name = $name.$ext;
    //     // 移动图片
    //     // store($imge->path(),$root.$time.'/'.$level.'/'.$name);
    //     //  返回路径
    //     // return $time.'/'.$level.'/'.$name;
    //     return $path;
    // }
// }


}