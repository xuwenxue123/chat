<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LoginController extends Controller
{
    //商城后台登录
    public function logina()
    {
        return view('admin/logina');
    }

    //登录入库
    public function login_add(Request $request)
    {
        $data=request()->except('_token');
        $res=DB::table('login')->where(['u_name'=>$data['u_name'],'u_pwd'=>$data['u_pwd']])->first();
        if($res){
            session(['user'=>$res]);
            return redirect('indexa');
        }else{
            return redirect('logina');
      }
   }

}