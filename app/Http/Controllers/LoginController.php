<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Hash;

class LoginController extends Controller
{

    public function login(){
        return view('user.login');
    }

    public function dologin(Request $req){

        
        $username = $req->username;
        $password = $req->password;
 
        // 根據用戶名到數據庫中查詢
        $user = Users::where('username',$username)->first();
        
        if($user){
            //判断密码是否正确
            if(Hash::check($password,$user->password)){
                // 保存到session中
                session([
                    'id'=>$user->id,
                    'username'=>$user->username
                ]);
            }else{
                return back()->withErrors('密码错误');
            }
        }else{
            return back()->withErrors('该用户不存在');
        }

        
        return redirect()->route('index');


    }

    // 退出登录
    public function outlogin(){
        
            session()->flush();
            return redirect()->route('login');
   
    }


    
}
