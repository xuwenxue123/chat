<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class BrandController extends Controller
{
    //后台品牌管理
    public function add()
    {
        return view('admin/brand_add');
    }

    //后台品牌管理添加
    public function add_do(Request $request){

        $data = request()->except(['_token']);
        if($request->hasFile('brand_logo')){
            $data['brand_logo'] = uploads('brand_logo');
        }
        $post = DB::table('brand')->insert($data);
        if ($post){
            return redirect('brand/list');
        }
    }
    //品牌列表
    public function list(Request $request)
    {    
        //  $data=$request->all();
        //  $res=DB::table('brand')->get();
        //  return view('admin/brand_list',['data'=>$res]);
        //redis
        // $redis=new \Redis();
        // $redis->connect('127.0.0.1','6379');
        // $redis->incr('num');
        // $num=$redis->get('num');
        // echo $num;
        $query=$request->all();
        $brand_name=$query['brand_name']??'';
        $where=[];
        if($brand_name){
            $where[]=['brand_name','like',$brand_name.'%'];
        }
        $brand_desc=$query['brand_desc']??'';
        if($brand_desc){
           $where[]=['brand_desc','=',$brand_desc];
        }
        $pageSize=config('app.pageSize');
        $data=DB::table('brand')->where($where)->orderBy('brand_id','desc')->paginate($pageSize);
        return view('admin.brand_list',compact('data','query','brand_name','brand_desc'));
    }

    //品牌删除
    public function del(Request $request)
    {
        $data=$request->all();
        // dd($data);
        $res=DB::table('brand')->where(['brand_id'=>$data['brand_id']])->delete();
        return redirect('brand/list');
    }

    //品牌修改表单
    public function update(Request $request,$brand_id)
    {
        // $brand_id = request()->input();
        // dd($id);
        $where = ['brand_id'=>$brand_id];
        $data = DB::table('brand')->where($where)->first();
        return view('admin.brand_update',['data'=>$data]);
    }

    /*品牌修改处理入库*/
    public function update_do(Request $request,$brand_id)
    {
        $data = request()->all();
        unset($data['_token']);
        $brand_logo = $data['brand_logo']??'';
        //   dd($data);
        if (!$brand_logo) {
            echo "<script>alert('未上传图片');history.back()</script>";die;
        }
        if (request()->hasfile('brand_logo')) {
            $data['brand_logo'] = uploads('brand_logo');
        }
        $where = ['brand_id'=>$brand_id];
        //   dd($where);
        $res = DB::table('brand')->where($where)->update($data);
        //   dd($res);
        if ($res) {
            //   echo "<script>alert('修改成功');location='brand/list'</script>";
            return redirect('brand/list');
        }else{
            echo "<script>alert('修改失败');history.back()</script>";
        }
    }
}
