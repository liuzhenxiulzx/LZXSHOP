<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imgcategory;
use App\Models\Advertimg;
use Image;
use Storage;


class Admin_ImageController extends Controller
{
    // 广告管理
    public function Index(){
        // 获取广告图分类
        $imgcate = Imgcategory::get();
        // 获取广告图信息
        $image = Advertimg::get();

        return view('admin.Image.advertising',[
            'imgcate'=>$imgcate,
            'image'=>$image,
        ]);
    }


    public function addadvert(){
        $imgcate = Imgcategory::get();
        return view('admin.Image.addadvert',[
            'imgcate'=>$imgcate
        ]);
    }


    public function doaddadvert(Request $req){

       $id =  $req->catName;
       $all = Imgcategory::where('id',$id)->first();
        // 获取图片分类名
       $catName = $all->catName;
       //获取缩略图的宽高
       $size_w = $req->size_w;
       $size_h = $req->size_h;

        // 如果表单中上传了图片就执行上传
        if($req->has('image') && $req->image->isValid()){
            // 当前图片上传的临时路径
            $oldimage = $req->image->path();
            // 保存图片
            $date = date('Ymd');
            $orimg = $req->image->store('goods/'.$date);
            // 打开要处理的图片
            $img = Image::make($oldimage);
            
            $img -> resize($size_w,$size_h);
            $img -> save('./uploads/'.$orimg);
        }
        
        // 把数据设置到模型上
        $Advertimg = new Advertimg;

        $Advertimg->imgclass = $catName;
        $Advertimg->size_w = $size_w;
        $Advertimg->size_h = $size_h;
        $Advertimg->image = $orimg;
        

        $Advertimg->save();

        return back();
       
    }

    // 修改广告图
    public function editadvert($id){
        $image = Advertimg::where('id',$id)->first();
        $imgcate = Imgcategory::get();
        return view('admin.Image.editadvert',[
            'image'=>$image,
            'imgcate'=>$imgcate
        ]);
    }

    public function doeditadvert(Request $req,$id){

        $editimage = Advertimg::where('id',$id)->first();

        $cateid = $req->catName;
        $imgcate = Imgcategory::where('id',$cateid)->first();
        $catName = $imgcate->catName;

        $size_w = $req->size_w;
        $size_h = $req->size_h; 

        // 如果表单中上传了图片就执行上传
        if($req->has('image') && $req->image->isValid()){
            // 删除原图
            Storage::delete( $req->image );
            // 当前图片上传的临时路径
            $oldimage = $req->image->path();
            // 保存图片
            $date = date('Ymd');
            $orimg = $req->image->store('goods/'.$date);

        
            // 打开要处理的图片
            $img = Image::make($oldimage);
            
            $img -> resize($size_w,$size_h);
            $img -> save('./uploads/'.$orimg);
        }

        $editimage->imgclass = $catName;
        $editimage->size_w = $size_w;
        $editimage->size_h = $size_h;
        $editimage->image = $orimg;

        $editimage->save();
        
        return back();
    }   


    public function delectadvert($id){

        $img = Advertimg::where('id', $id)->first();   
        // 删除图片
        Storage::delete($img->image);
        // 删除日志
        $img->delete();

        return back();
    }



    // 分类管理
    public function Imgclass(){
        $imgcate = Imgcategory::get();
        return view('admin.Image.Sort_ads',[
            'imgcate'=>$imgcate
        ]);
    }
    //添加图片分类
    public function addImgclass(){
        
        return view('admin.Image.addImagecate');
    }
    // 添加图片分类
    public function doaddImageclass(Request $req){
        $imgcate = new Imgcategory;
        $imgcate->fill($req->all());
        $imgcate->save();
        return back();
    }

    // 修改图片分类
    public function editImgcate($id){
        $imgcate = Imgcategory::where('id',$id)->first();
        return view('admin.Image.editImgcate',[
            'imgcate'=>$imgcate
        ]);
    }

    public function doeditImgcate(Request $req,$id){
        $imgcate = Imgcategory::where('id',$id)->first();
   
        $imgcate->fill($req->all());
        $imgcate->save();
        return back();
    }

    // 删除图片分类
    public function delectImgcate($id){
        $imgcate = Imgcategory::where('id',$id)->first();
        $imgcate->delete();
        return back();
    }


}
