<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class GoodsController extends Controller
{   
    //商品添加视图
    public function goods_add()
    {
        return view('admin/goods_add');
    }

    //商品添加入库
    public function goods_add_do(Request $request)
    {     
        // $user=['uid','goods_name'=>'tt'];
        // request()->session()->put('user',$user);
        // request()->session()->save();
        // $user=request()->session()->get('user');
        // dd($user);
        $data=$request->all();
        $validatedData=$request->validate([
            'goods_name'=>'required',
        ],[
            'goods_name.required'=>'不为空',
        ]);
        $path = $request->file('goods_pic')->store('');
        // dd($path);
        $goods_pic=asset('storage'.'/'.$path);
        // dd($goods_pic);
        $res=DB::table('goodss')->insert([
            'goods_name'=>$data['goods_name'],
            'goods_price'=>$data['goods_price'],
            'goods_pic'=>$goods_pic,
            'add_time'=>time(),
        ]);
        if($res){
            return redirect('goods_list');
        }
    }

    //商品列表展示
    public function goods_list(Request $request)
    {
        $query=$request->all();
        $goods_name=$query['goods_name']??'';
        $where=[];
        if($goods_name){
            $where[]=['goods_name','like',$goods_name.'%'];
        }
        $goods_price=$query['goods_price']??'';
        if($goods_price){
           $where[]=['goods_price','=',$goods_price];
        }
        $pageSize=config('app.pageSize');
        $data=DB::table('goodss')->where($where)->orderBy('id','desc')->paginate($pageSize);
        return view('admin/goods_list',compact('data','query','goods_name','goods_price'));
        
    }

    //商品删除
    public function goods_delete(Request $request)
    {
        $data=$request->all();
        $res=DB::table('goodss')->delete($data);
        // dd($res);
        return redirect('goods_list');
    }

    //商品修改
    public function goods_update(Request $request)
    {   
        $info=$request->all();
        $data=DB::table('goodss')->where('id',$info['id'])->first();
        return view('admin/goods_update',['info'=>$data]);
    }

      //商品修改执行
      public function goods_update_do(Request $request)
      {
          $data=$request->all();
          $path = $request->file('goods_pic');
          // dd($path);
          if($path){
              $path = $request->file('goods_pic')->store('');
              $goods_pic=asset('storage'.'/'.$path);
              // dd($path);
              $res=DB::table('goodss')->where(['id'=>$data['id']])->update([
                  'goods_name'=>$data['goods_name'],
                  'goods_price'=>$data['goods_price'],
                  'goods_pic'=>$goods_pic,
                  'add_time'=>time(),
              ]);
          }else{
              $res=DB::table('goodss')->where(['id'=>$data['id']])->update([
                  'goods_name'=>$data['goods_name'],
                  'goods_price'=>$data['goods_price'],
                  'goods_pic'=>$goods_pic,
                  'add_time'=>time(),
              
              ]);
          }
              return redirect('goods_list');
      }

    
}

