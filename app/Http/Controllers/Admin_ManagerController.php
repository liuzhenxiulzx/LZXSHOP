<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\roles;
use App\Models\role_user;
use App\Models\rbac_user;
use Hash;
use DB;
class Admin_ManagerController extends Controller
{
    public function manager(Request $req){
        $role = roles::get();
        // $ro_po = role_user::get();
        // dd($ro_po);
        $users = DB::table('role_users')
            ->join('rbac_users', 'role_users.user_id', '=', 'rbac_users.id')
            ->join('roles', 'role_users.role_id', '=', 'roles.id')
            ->get();
        // dd($users);
      
           
        
        return view('admin.admin.administrator',[
            'role'=>$role,
            'users'=>$users,
        ]);
    }

    public function addmanager(){
        $role = roles::get();
        return view('admin.admin.addmanager',[
            'role'=>$role
        ]);
    }

    public function doaddmanager(Request $req){

        $name = $req->uname;
        $email = $req->email;
        $role = $req->role;
      
        if($req->uname!=""&&$req->password!=""){
            $user = rbac_user::where('rbac_name',$name)->first();
        
            // 判断用户是否存在
            if($user==""){
                return back()->withErrors('该用户不存在');
            }else{
                // 判断密码是否正确             
               if(Hash::check($req->password,$user->password)){
                   // 获取用户id
                   $user_id = $user->id;
                   $mid = new role_user;
                   $mid->user_id = $user_id;
                   $mid->role_id = $role;
                   $mid->save();
                   return redirect()->route('Adminmanager');
                   
               }else{
                     return back()->withErrors('密码错误');
               }
               
            }
        }else{
            return back()->withErrors('用户名或者密码不能为空');
        }
    }



    // 修改管理员
    public function editmanager($id){
        // 取出用户信息
        $user = rbac_user::where('id',$id)->first();
        // dd($user);
        // 取出所有管理员
        $allrole = roles::get();

        $role = role_user::where('user_id',$id)->first();
        // 取出该用户对应的角色
        $roleid = $role->role_id;
        $roles = roles::where('id',$roleid)->first();
        // dd($roles);
        return view('admin.admin.editmanager',[
            'user'=>$user,
            'role'=>$role,
            'roles'=>$roles,
            'allrole'=>$allrole
        ]);
    }    

    // 修改管理员
    public function doeditmanager(Request $req,$id){
        $role_user = role_user::where('user_id',$id)->first();
        $roleid = $req->role;
        $role_user->role_id = $roleid;
        $role_user->save();
        return redirect()->route('Adminmanager');
    }


    // 删除管理员
    public function delmanager($id){
        $role_user = role_user::where('user_id',$id)->first();
        $role_user->delete();
        return back();
    }
}
