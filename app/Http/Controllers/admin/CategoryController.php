<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CategoryController extends Controller
{
    //分类添加展示
    public function add()
    {   
        $datas = DB::table('category')->get();
    	//  dd($datas);
    	$data = createTree($datas,$pid=0,$level=0);
    	// dd($data);
        return view('admin/category_add',['data'=>$data]);
    }
    //分类添加入库
    public function do_add(Request $request)
    {   
         $info=$request->all();
        //   dd($info);
        unset($info['_token']);;
         $res=DB::table('category')->insert([
             'cate_name'=>$info['cate_name'],
             'cate_cost'=>$info['cate_cost'],
             'cate_sort'=>$info['cate_sort'],
             'pid'=>$info['pid'],
             'add_time'=>time(),
         ]);
        //  dd($res); 
        return redirect('category/list');
    }

    //分类列表
    public function list(Request $request)
    {   
        $datas=DB::table('category')->get();
        // dd($res);
        $datas = createTree($datas);
        // dd($res);
        return view('admin.category_list',['datas'=>$datas]);
        // $query=$request->all();
        // $cate_name=$query['cate_name']??'';
        // $where=[];
        // if($cate_name){
        //     $where[]=['cate_name','like',$cate_name.'%'];
        // }
        // $pageSize=config('app.pageSize');
        // $datas=DB::table('category')->where($where)->orderBy('cid','desc')->paginate($pageSize);
        // return view('admin.category_list',compact('datas','query','cate_name'));
    }

    //分类删除
    public function del(Request $request)
    {   
        $data=$request->all();
        // dd($data);
        $res=DB::table('category')->where(['cid'=>$data['cid']])->delete();
        return redirect('category/list');
    }

    public function update(Request $request)
    {   
        $info=$request->all();
        // dd($info);
        $datas=DB::table('category')->get();
        // dd($data);
        $res=DB::table('category')->where(['cid'=>$info['cid']])->first();
        // dd($res);
        $data = createTree($datas,$pid=0,$level=0);
        // dd($data);
        return view('admin/category_update',['data'=>$data],['info'=>$res]);
    }

    //分类修改入库
    public function do_update(Request $request)
    {
        $data=$request->all();
        $res=DB::table('category')->where(['cid'=>$data['cid']])->update([
            'cate_name'=>$data['cate_name'],
             'cate_cost'=>$data['cate_cost'],
             'cate_sort'=>$data['cate_sort'],
             'pid'=>$data['pid'],
        ]);
        // $datas = createTree($datas);
        return redirect('category/list');
    }

}
