<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Cache;
use Hash;
use App\Models\Users;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;

class RegisterController extends Controller
{
    public function register(){
        return view('user.register');
    }
    
    // 发送手机验证码
    public function sendcode(Request $req){
        
        // 生成6位随机数
        // $code = rand(10000,99999);
        $code = 666666;
        // 缓存时的名字
        $name = 'code-'.$req->phone;
        // 把随机数缓存起来
        Cache::put($name,$code,10);
        $config = [
            'accessKeyId'    => 'LTAIRFzYI935tz2L',
            'accessKeySecret' => 'iaNH3QUvwpqP2Fry0bECPmqPHvyNZW',
        ];
      
         
        $client  = new Client($config);
        $sendSms = new SendSms;
        $sendSms->setPhoneNumbers($req->phone);
        $sendSms->setSignName('彭文双sns项目');
        $sendSms->setTemplateCode('SMS_135043697');
        $sendSms->setTemplateParam(['code'=>$code]);
        
        return([
            'state'=>true
        ]);
        
        $data = $client->execute($sendSms);
        if($data->Message=="OK" || $data->Code=="OK"){
            return([
                'state'=>true
            ]);
        }else{
            return [
                'state'=>false
            ];
        }
         // 发送
        //print_r($client->execute($sendSms));
    }

    public function doregister(Request $req){

        $user = new Users;
    
        // 密码加密
        $password = Hash::make($req->password);

        if($req->password!=$req->repassword){
            return back()->withErrors('密码不一致');
        }else{
            // 把表单中的手机号设置到模型中
            $user->phone = $req->phone;
            // 把加密之后的密码设置到模型中
            $user->password = $password;
            // 把表单中的用户名设置到表单中
            $user->username = $req->username;
            // 保存到表中
            $user->save();
            //跳转页面
            return redirect()->route('login');
        }
        
    }

}