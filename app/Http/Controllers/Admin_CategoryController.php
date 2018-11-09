<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classify;
use DB;

class Admin_CategoryController extends Controller
{
    public function Index(){
        
        return view('admin.product.Category_Manage');
    }

    public function add(){
        // 取出分类表的数据
        $classify = Classify::get()->toArray();
        // 递归排序
        $sort = $this->sortTree($classify);  
      


        return view('admin.product.product-category-add',[
            'sort'=>$sort,
        ]);
    }

    public function doadd(Request $req){
       
        $cate = new Classify;
          // 获取选中的值
        $id = $req->classify_add;
        // 获取分类名称
        $catName = $req->category_name;
  
        if($id==0){

            $bool = DB::table('classify')->insert(
                                ['catName'=>$catName,'parent_id'=>$id,'path'=>'-']
                            );

           return back();
        }else{

            $user = DB::table('Classify')->where('id', $id)->first();
            // dd($user);
            // 获取选中的id值
            $path = $user->path; 
            // dd($path);
            $parent_id = $user->parent_id;
            $id = $user->id;

            $bool = DB::table('classify')->insert(
                ['catName'=>$catName,'parent_id'=>$id,'path'=>$path.$id.'-']
            );

            return back();
        }
    
           
     
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


      // 获取子分类
      public function ajax_get_cat1($id){
        $id = (int)$id;
        // 根据这个ID查询子分类
        $data = Classify::where('parent_id',$id)->get();
        // 转成json
        return json_encode($data);
    }
   
}
