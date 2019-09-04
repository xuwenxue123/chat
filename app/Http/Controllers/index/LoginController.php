<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LoginController extends Controller
{
    public function sendemail()
    {
        $code=rand(1000,9999);
        session(['code'=>$code]);
        $email=request()->email;
        $info='欢迎注册电商前台用户';
        send($email,$info,$code);
        echo json_encode(['msg'=>'注册成功，请前往邮箱查看验证码']);
    }
    //注册
    public function reg()
    {
        return view('index.reg');
    }
    //注册执行
    public function do_reg()
    {
        $post=request()->except('_token');
        // dd($post);
        $code=request()->session()->get('code');
        $count=DB::table('log')->where(['email'=>$post['email']])->count();
        // dd($count);
        if ($count) {
             echo json_encode(['msg'=>'该邮箱已被他人注册','code'=>0]);die;
        }
        // dd($code);
        if ($post['code']!=$code) {
            echo json_encode(['msg'=>'您填写的验证码与邮箱中不符请核对后再进行注册','code'=>0]);die;
        }
        if ($post['pwd']!=$post['upwd']) {
            echo json_encode(['msg'=>'密码与确认密码不一致','code'=>0]);die;
        }
        unset($post['code']);
        $res=DB::table('log')->insert($post);
        // dd($res);
        if ($res) {
            echo json_encode(['msg'=>'注册成功','code'=>1]);
        }
    }

    //登录
    public function loging()
    {
        return view('index.loging');
    }
    //登录执行
    public function do_login(Request $request)
    {
        $data=request()->except('_token');
        $res=DB::table('log')->where(['email'=>$data['email'],'pwd'=>$data['pwd']])->first();
        // dd($res);
        if(empty($res)){
            echo "<script>alert('账户或密码有误');history.back()</script>";die;
        }
        $user = [
            'id' => $res->l_id,
            'email' => $res->email,
        ];
        request()->session()->put('user',$user);
        $session = request()->session()->get('user');
        if ($session) {
            echo "<script>alert('登陆成功');location='/index/index'</script>";
        }else{
            echo "<script>alert('登陆失败');history.back()</script>";
        }
    }  
    
}
