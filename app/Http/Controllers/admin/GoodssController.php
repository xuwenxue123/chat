<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class GoodssController extends Controller
{
    //项目后台商品
    public function add()
    {   
        $datas = DB::table('category')->get();
        //  dd($datas);
    	$data = createTree($datas,$pid=0,$level=0);  //分类
        $info=DB::table('brand')->get();    //品牌
        // dd($info);
    	// $data = createTree($datas,$pid=0,$level=0);
        return view('admin/goodss_add',['data'=>$data],['info'=>$info]);
    }
    //商品执行添加
    public function add_do(Request $request)
    {
          $data=$request->all();
          unset($data['_token']);
          if($request->hasFile('g_pic')){
            $data['g_pic'] = uploads('g_pic');
        }
          $res=DB::table('wares')->insert($data);
          return redirect('goods/index');
    }
    //商品展示
    public function index()
    {   
        $data=DB::table('wares')->get();
        return view('admin.goods_index',['data'=>$data]);
    }

    //商品删除
    public function del(Request $request)
    {
        $data=$request->all();
        // dd($data);
        $res=DB::table('wares')->where(['g_id'=>$data['g_id']])->delete();
        return redirect('goods/index');
    }
    
    //商品修改
    public function updates(Request $request)
    {   
        $info=$request->all();
        // dd($info);
        $datas=DB::table('category')->get();
        // dd($datas);
        $data = createTree($datas,$pid=0,$level=0);  //分类
        $infos=DB::table('brand')->get();    //品牌        
        // dd($info);
        $res=DB::table('wares')->where(['g_id'=>$info['g_id']])->first();
        // $data = createTree($datas,$pid=0,$level=0);  
        return view('admin/goods_updates',['info'=>$res],['data'=>$infos]);
    }
}
