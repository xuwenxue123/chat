<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WechatController extends Controller
{
    /**
     * 获取用户列表
     */
    public function get_user_list()
    {
        $result = file_get_contents('https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->get_wechat_access_token().'&next_openid=');
        $re = json_decode($result,1);
        $last_info = [];
        foreach($re['data']['openid'] as $k=>$v){
            $user_info = file_get_contents('https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$this->get_wechat_access_token().'&openid='.$v.'&lang=zh_CN');
            $user = json_decode($user_info,1);
            $last_info[$k]['nickname'] = $user['nickname'];
            $last_info[$k]['openid'] = $v;
        }
        // dd($last_info);
        // dd($re['data']['openid']);
        return view('Wechat.userList',['info'=>$last_info]);
    }
    /**
     * 获取access_token
     */
    public function get_access_token()
    {
        return $this->get_wechat_access_token();
    }
    public function get_wechat_access_token()
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        //加入缓存
        $access_token_key = 'wechat_access_token';
        if(!$token=$redis->get($access_token_key)){
            // echo 111;
            // dd(env('WECHAT_APPID'));
            $url='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.env('WECHAT_APPID').'&secret='.env('WECHAT_APPSECRET');
            // echo $url;
            $result = file_get_contents($url);
            // dd($result);
            $re = json_decode($result,1);
            // dd($re);
            if(isset($re['access_token'])){
                $redis->setex($access_token_key,$re['expires_in'],$re['access_token']);  //加入缓存
                $token= $re['access_token'];
            }
      
            
        }
        // dd($token);
        return $token;
    }
    public function get_user_info()
    {
        //1接openid
         $openid=$_GET['openid'];
        //2.获取数据  
        //获取access_token
         $access_token=$this->get_wechat_access_token();
        //dd($access_token);
        //调用接口   接收数据  
         $url="https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
         $re=file_get_contents($url);
        //  dd($re);
         //处理数据
         $result=json_decode($re,true);
        //  dd($result);
        //3.展示
        return view('Wechat.get_list',['result'=>$result]);
    }
    

    public function upload()
    {
        return view('Wechat.upload',[]);
    }
    public function do_upload(Request $request){
          $name = 'file_name';
          //dd($name);
         if(!empty($request->hasFile($name)) && request()->file($name)->isValid()){
            //$size = $request->file($name)->getClientSize() / 1024 / 1024;
            $ext = $request->file($name)->getClientOriginalExtension();  //文件类型
            // dd($ext);
            $file_name = time().rand(1000,9999).'.'.$ext;
            // dd($file_name);
            $path = request()->file($name)->storeAs('wechat\voice',$file_name);
            // dd($path);
            $path = realpath('./storage/'.$path);
            // dd($path);
            // $type="";
            $url = 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token='.$this->get_wechat_access_token().'&type=image';
            // dd($url);
            $result = $this->curl_upload($url,$path);
            // d($result);
            dd($result);
        }
    }

    public function curl_upload($url,$path)
    {   
        // echo $url;
        $curl = \curl_init($url);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //设置post方式提交
        curl_setopt($curl, CURLOPT_POST, 1);
        //设置post数据
        $form_data = [
            'meida' => new \CURLFile($path)
        ];
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $form_data);
        
        //执行命令
        $data = curl_exec($curl);
        var_dump(curl_error($curl));
         //关闭URL请求
        curl_close($curl);
        //显示获得的数据
        return $data;
    }
}


