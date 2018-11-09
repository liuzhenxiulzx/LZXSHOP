<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rbac_user;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Cache;
use Hash;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;

class Admin_LoginController extends Controller
{
    public function rbaclogin(){
        return view('admin.auser.login');
    }
    public function dorbaclogin(Request $req){
        // 获取表单手机号
        $email = $req->email;
        // 获取密码
        $password = $req->password;
        // 根据手机号或邮箱判断是否有这个用户
        $rbac_user = rbac_user::where('phone',$email)->first();

        if($rbac_user){
            if(Hash::check($req->password,$rbac_user->password)){
                return back()->withErrors('密码错误');
            }else{

                session(['AdminId'=>$rbac_user->id]);
                
                return redirect()->route('AdminIndex');
            }
        }else{
            return back()->withErrors('该用户不存在');
        }

    }

    public function rbacregist(){
        return view('admin.auser.register');
    }



    // 发送邮箱
    public function AdmintestMail(Request $req)
    {
        $emailcode = rand(1,999999);
        session(['email' => $emailcode]);
        // 设置邮件服务器账号
        $transport = (new \Swift_SmtpTransport('smtp.126.com', 25))  // 邮件服务器IP地址和端口号
        ->setUsername('liuzhenxiu@126.com')       // 发邮件账号
        ->setPassword('lzx123');      // 授权码
        // 创建发邮件对象
        $mailer = new \Swift_Mailer($transport);
        // 创建邮件消息
        $message = new \Swift_Message();
        $message->setSubject('验证码')   // 标题
                ->setFrom(['liuzhenxiu@126.com' => '全栈1班'])   // 发件人
                ->setTo(['liuzhenxiu@126.com', 'goods@126.com' => '你好'])   // 收件人
                ->setBody('验证码为：'.$emailcode, 'text/html');     // 邮件内容及邮件内容类型
        // 发送邮件
        $ret = $mailer->send($message);
    
    }

    
    public function dorbacregist(Request $req){
        // 判断手机号是否存在
        $phone = $req->phone;
        
        $all = rbac_user::where('phone',$phone)->get();
        // 判断验证码是否正确
        $value = session('email');
        if($value!=$req->code){
            return back()->withErrors('验证码错误');
        }else{
            if($all==""){
                return back()->withErrors('手机号已经存在');
            }
            $rbac_user = new rbac_user;
            // 密码加密
            $password = Hash::make($req->password);
            // 把表单中的手机号设置到模型中
            $rbac_user->phone = $req->phone;
            // 把加密之后的密码设置到模型中
            $rbac_user->password = $password;
            // 把表单中的用户名设置到表单中
            $rbac_user->rbac_name = $req->rbac_name;
            // 把邮箱保存到模型中
            $rbac_user->email = $req->email;
            // 保存到表中
            $rbac_user->save();
            //跳转页面
            return redirect()->route('Adminrbaclogin');
        }

      
        
    }

}
