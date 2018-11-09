<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogcate;
use App\Models\blog;

class Admin_BlogController extends Controller
{
    // 文章列表
    public function Bloglist(){
        $blogcate = blogcate::get();
        $blog = blog::get();
        //根据id取出文章分类
        $cateid = [];
        foreach($blog as $v){
            $cateid[] = $v->blogcate_id;
        }
        // $cateid = $blog->blogcate_id;
        // dd($cateid);
        foreach($cateid as $k){
    
             $cateName[] = blogcate::where('id',$k)->get()->toArray();
            //  dd($cateName);
        }
        
        foreach($cateName as $a){
            foreach($a as $b){  
                $catename['a'] = $b['catName'];
            }        
        }
    //    dd($catename['a']);

        return view('admin.blog.article_list',[
            'blogcate'=>$blogcate,
            'blog'=>$blog,
            'catename'=>$catename
        ]);
    }

   
    // 添加文章
    public function addblog(){
        $blogcate = blogcate::get();
        return view('admin.blog.article_add',[
            'blogcate'=>$blogcate
        ]);
    }

    public function doaddblog(Request $req){
        $blog = new blog;
        // $title = $req->blog_title;
        // $abstract = $req->blog_abstract;
        // $content = $req->content;
        // $blogcate_id = $req->blogcate_id;
        
        $blog->fill($req->all());
        $blog->save();
        return back();
    }

    // 修改文章
    public function editblogs($id){

        $blog = blog::where('id',$id)->first();
        // 取出分类id
        $cateid = $blog->blogcate_id;
        // 根据id取出文章分类名
        $cate = blogcate::where('id',$cateid)->first();
        $catName =$cate->catName;
        // 取出所有文章分类
        $name = blogcate::get();  
      
        return view('admin.blog.editbloglist',[
            'blog'=>$blog,
            'catName'=>$catName,
            'name'=>$name
        ]);

    }
 

    public function doeditblog(Request $req,$id){
        // dd($req->all());
        $blog = blog::where('id',$id)->first();
        $blog->fill($req->all());
        $blog->save();
        return back();
    }


    public function deltblog($id){

        $blog = blog::where('id',$id)->first();

        $blog->delete();

        return back();
    }




    // ==========文章分类============
 
    public function Blogcate(){
        $blogcate = blogcate::get();
        return view('admin.blog.article_Sort',[
            'blogcate'=>$blogcate
        ]);
    }

     // 添加文章分类
    public function addBlogcate(){
        return view('admin.blog.addarticle');
    }

    public function doaddBlogcate(Request $req){
        $blogcate =  new blogcate;
        $blogcate->fill($req->all());
        $blogcate->save();
        return back();
    }

    // 修改文章分类
    public function editBlogcate($id){
        $blog = blogcate::where('id',$id)->first();
        return view('admin.blog.editblogcate',[
            'blog'=>$blog
        ]);
    }
  
    public function doeditBlogcate(Request $req,$id){
        $blog = blogcate::where('id',$id)->first();
        $blog->fill($req->all());
        $blog->save();
        return back();
    }
    // 删除文章分类
    public function deletblogcate($id){
        $blog = blogcate::where('id',$id)->first();
        $blog->delete();
    }

}
