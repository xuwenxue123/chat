<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
    //前台显示
    public function shop()
    {
        echo "shop";
        return view('layouts.shop');
    }
    //前台商品展示
    public function index(Request $request)
    {
        // $data=$request->all();
        // $res=DB::table('wares')->get();
        // // dd($res);
        // //$res = 
        // // sdd($res);
        // return view('index.index',['data'=>$res]);
        $query=$request->all();
        $g_name=$query['g_name']??'';
        $where=[];
        if($g_name){
            $where[]=['g_name','like',$g_name.'%'];
        }
        $pageSize=config('app.pageSize');
        $data=DB::table('wares')->where($where)->paginate($pageSize);
        return view('index.index',compact('data','query','g_name'));
    }

    //商品详情
    public function goods_detail(Request $request)
    {   
        $info=$request->all();
        // dd($data);
        $res=DB::table('wares')->where('g_id',$info['g_id'])->first();
        // dd($res);     
        return view('index.goods_detail',['info'=>$res]);
    }

}
