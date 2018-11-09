<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rbac_user;
use App\Models\powers;
use App\Models\roles;
use App\Models\role_powers;
use DB;

class Admin_PowerController extends Controller
{
    public function power(){
        $role = roles::get();
        // dd($role);
        return view('admin.admin.admin_Competence',[
            'role'=>$role,
        ]);
    }
    // 添加权限
    public function addpower(){
        // 获取所有后台的用户
        $alluser = rbac_user::get();
        // 取出所有权限
        $power = powers::get()->toArray();
        $data = $this->sortTree($power);
        // dd($data);
        static $arr = [];
        $count = 0;
        foreach($data as $key=>$v){
            if($v['level']==0){
                $arr[] = $v;
                $count++;
            }
            if($v['level'] == 1){
                $arr[$count-1]['two'][] = $v;
            }
        }
        foreach($arr as $ky=>&$v){
            foreach($v['two'] as $k=>&$a){
                foreach($data as $kk=>$key){
                    
                    if($a['id'] == $key['parent_id']){
                        $a['three'][] = $key; 
                       
                    }
                   
                }
                
               }   
        }
        

        return view('admin.admin.Competence',[
            'alluser'=>$alluser,
            'power'=>$power,
            'arr'=>$arr
        ]);

    }
    

    public function doaddpower(Request $req){
        // 接收角色表单数据
        $role_name = $req->role_name;
        $role_describe = $req->role_describe;

        if($req->role_name!=""&&$req->role_describe!=""){
            $role = new roles;
            $role->role_name = $role_name;
            $role->role_describe = $role_describe;
            $role->save();
            // 获取插入的id
            $id = $role->id;
        }else{
            return back()->withErrors('角色不能为空');
        }
        
       
        // 权限表单数据
        $powermg = $req->power_mg;
        $powersg = $req->power_sg;
        $powers = array_merge($powermg,$powersg);

        
        foreach($powers as $v){
            $role_power = new role_powers;
            $role_power->power_id = $v;
            $role_power->role_id = $id;
            $role_power->save();
        }

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

    // 删除权限
    public function delpower($id){
        $role = roles::where("id",$id)->first();
        $role->delete();
        // 删除角色权限表的数据
        DB::table('role_powers')->where('role_id', '=',$id)->delete();
        return back();
    }

    // 修改权限
    public function editpower($id){

        $role = roles::where('id',$id)->first();
        // 取出该角色对应的权限
        $role_power = role_powers::where('role_id',$id)->get();
        // dd($role_power);
        $ro_poid = [];
        foreach($role_power as $v){
            $ro_poid[] = $v['power_id'];
        }
        // dd($ro_poid);
         // 取出所有权限
         $power = powers::get()->toArray();
         $data = $this->sortTree($power);
         // dd($data);
         static $arr = [];
         $count = 0;
         foreach($data as $key=>$v){
             if($v['level']==0){
                 $arr[] = $v;
                 $count++;
             }
             if($v['level'] == 1){
                 $arr[$count-1]['two'][] = $v;
             }
         }
         foreach($arr as $ky=>&$v){
             foreach($v['two'] as $k=>&$a){
                 foreach($data as $kk=>$key){
                     
                     if($a['id'] == $key['parent_id']){
                         $a['three'][] = $key; 
                        
                     }
                    
                 }
                 
                }   
         }

        return view('admin.admin.editpower',[
            'role'=>$role,
            'arr'=>$arr,
            'ro_poid'=>$ro_poid
        ]);
    }

    public function doeditpower(Request $req,$id){
         // 接收角色表单数据
         $role_name = $req->role_name;
         $role_describe = $req->role_describe;
 
         if($req->role_name!=""&&$req->role_describe!=""){
             $role = roles::where('id',$id)->first();
             $role->role_name = $role_name;
             $role->role_describe = $role_describe;
             $role->save();
             // 获取插入的id
             $id = $role->id;
         }else{
             return back()->withErrors('角色不能为空');
         }
         
        
         // 权限表单数据
         $powermg = $req->power_mg;
         $powersg = $req->power_sg;
         $powers = array_merge($powermg,$powersg);
         DB::table('role_powers')->where('role_id', '=', $id)->delete();
         foreach($powers as $v){
             $role_power = new role_powers;
             $role_power->power_id = $v;
             $role_power->role_id = $id;
             $role_power->save();
         }
 
         return redirect()->route('Adminpower');
    }

    

}
