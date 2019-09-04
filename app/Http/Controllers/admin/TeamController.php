<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class TeamController extends Controller
{
    //
    public function add()
    {
        return view('admin.team_add');
    }
    public function do_add(Request $request)
    {
        $data=$request->all();
        unset($data['_token']);
        //dd($data);
        $time=$data['jieshu_time'];
        // dd($time);
        $jieshu_time=strtotime($time);
        // dd($jieshu_time);
        $res=DB::table('jingcai')->insert([
           'qiudui_1'=>$data['qiudui_1'],
           'qiudui_2'=>$data['qiudui_2'],
           'jieshu_time'=>$jieshu_time,
        ]);
        if($res){
            return redirect('team/index');
        }
    }
    //竞猜列表
    public function index()
    {   
        $data=DB::table('jingcai')->get()->toArray();
        return view('admin.team_index',['data'=>$data]);
    }

    //用户竞猜
    public function yong_guess(Request $request)
    {   
        $jingcai_id=$request->jingcai_id;
        $data=DB::table('jingcai')->where('jingcai_id',$jingcai_id)->first();
        // dd($data);
        return view('admin.yong_guess',['data'=>$data]);
    }
    public function do_guess(Request $request)
    {
        $data=$request->all();
        unset($data['_token']);
        // dd($data);
        $res=DB::table('jingcai_yonghu')->insert([
            'jingcai_id'=>$data['jingcai_id'],
            'xuanze'=>$data['xuanze'],
            'add_time'=>time(),
        ]);
        return redirect('team/index');
    }
    public function chakan_jingcai(Request $request)
    {
       $jingcai_id=$request->jingcai_id;
       $data=DB::table('jingcai')->where('jingcai_id',$jingcai_id)->first();
       //dd($data);
       $is_guess=DB::table('jingcai_yonghu')->where('jingcai_id',$jingcai_id)->first();
       //dd($is_guess);
       if(!empty($is_guess)){
        return view('admin.chakan_jingcai',['data'=>$data,'yonghu_guess'=>$is_guess]);
      }else{
            //没有竞猜
            return view('admin.chakan_jingcai',['data'=>$data]);
     }
    }
   
}
