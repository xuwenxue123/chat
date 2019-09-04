<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CarController extends Controller
{
      //购物车
      public function car(Request $request,$id)
      {     
            $uid=session('user')['id'];
            $data=DB::table('wares')->where('g_id',$id)->first();
            // dd($data);
            // dd($data->g_name);
            // $info = json_decode($data, true);
            $res=DB::table('car')->insert([
                'uid'=>$uid,
                'g_name'=>$data->g_name,
                'g_id'=>$data->g_id,
                'g_pic'=>$data->g_pic,
                'g_price'=>$data->g_price,
                'addtime'=>time()
            ]);
            // dd($res);
            return redirect('/index/car_do');
      }
      //购物车列表循环展示
      public function car_do()
      {     
            //获取session值
            $uid=session('user')['id'];
            $data=DB::table('car')->where('uid',$uid)->get();
            // dd($data);
            $price=DB::table('car')->where('uid',$uid)->select('g_price')->get();
            // dd($price);
            $total=0;
            foreach($price as $k=>$v){
                // var_dump($v);
                // $prices=$v;
                // $total=array_sum($v);
                $total += $v->g_price;
            }
            return view('index.car',['data'=>$data],['total'=>$total]);
      }
       
      //订单
      public function order(Request $request)
      {      
            return view('index.order');

      }
}
