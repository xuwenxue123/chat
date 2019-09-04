<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class PictureController extends Controller
{   

    //货物登录
    public function picture_log()
    {
        return view('admin/picture_log');
    }
    
    public function picture_log_do(Request $request)
    {
        $data=request()->except('_token');
        $res=DB::table('picture_log')->where(['username'=>$data['username'],'pwd'=>$data['pwd']])->first();
        // dd($res);
        if(empty($res)){
            echo "<script>alert('账户或密码有误');history.back()</script>";die;
        }
        $user = [
            'uid' => $res->l_id,
            'username' => $res->username,
        ];
        // dd($user);
        $a=request()->session()->put('user',$user);
        // dd($a);
        $session = request()->session()->get('user');
        // dd($session);
        if ($session) {
            echo "<script>alert('登陆成功');location='/picture/yonghu'</script>";
        }else{
            echo "<script>alert('登陆失败');history.back()</script>";
        }
    }

    public function yonghu()
    {
        return view('admin.picture_yonghu');
    }

    public function do_yonghu(Request $request)
    {
        $data=$request->all();
        unset($data['_token']);
        // dd($data);
        $res=DB::table('yonghu')->insert($data);
        return redirect('picture/add');
    }

    //货物
    public function add()
    {
        return view('admin.picture_add');
    }
    public function do_add(Request $request)
    {
          $data=$request->all();
          unset($data['_token']);
        //   dd($data);
          if($request->hasFile('pic')){
            $data['pic'] = uploads('pic');
        }
          $res=DB::table('picture')->insert([
              'p_name'=>$data['p_name'],
              'pic'=>$data['pic'],
              'sum'=>$data['sum'],
              'addtime'=>time(),
              'uid'=>session('user')['uid'],
          ]);
          return redirect('picture/index');
    }

    public function index()
    {   
        $data=DB::table('picture')->get();
        return view('admin.picture_index',['data'=>$data]);
    }

    public function chuku()
    {   
        // $data=DB::table('picture')->get();
        return view('admin.picture_chuku');
    }
    public function chuku_do(Request $request)
    {
         $data=$request->all();
         unset($data['_token']);
         $res=DB::table('picture')->insert([
             'uid'=>$uid,
             'p_name'=>$data['p_name'],
             'addtime'=>time(),
         ]);
         return redirect('picture/chulist');
        // echo 111;
    }
    public function chulist()
    {
        $data=DB::table('picture')->first();
        // dd($data);
        return view('admin.picture_chulist',['data'=>$data]);
    }
    
    public function ruku()
    {   
        $data=DB::table('picture')->get();
        return view('admin.picture_ruku',['data'=>$data]);
    }
    
}
