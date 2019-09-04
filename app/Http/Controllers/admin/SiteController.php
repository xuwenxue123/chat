<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class SiteController extends Controller
{
    public function add()
    {
        return view('admin/site_add');
    }

    public function add_do(Request $request)
    {
        $data = request()->except(['_token']);
        // $validatedData=$request->validate([
        //     'sname'=>'required|unique:site',
        //     'surl'=>'required',
        // ],[
        //     'sname.required'=>'不为空',
        //     'sname.unique'=>'已存在',
        //     'surl.required'=>'网站不能为空',
        // ]);
        if($request->hasFile('spic')){
            $data['spic'] = uploads('spic');
        }
        $post = DB::table('site')->insert($data);
        if ($post){
            return redirect('site/list');
        }
    }
    public function list(Request $request)
    {   
        // $data=DB::table('site')->get();
        // return view('admin.site_list',['data'=>$data]);
        $query=$request->all();
        $sname=$query['sname']??'';
        $where=[];
        if($sname){
            $where[]=['sname','like',$sname.'%'];
        }
        $pageSize=config('app.pageSize');
        $data=DB::table('site')->where($where)->orderBy('sid','desc')->paginate($pageSize);
        return view('admin.site_list',compact('data','query','sname'));
    }
    public function del(Request $request)
    {
        $data = $request->all();
        // dd($data);
    	$res =DB::table('site')->where(['sid'=>$data['sid']])->delete();
    	if ($res) {
    		echo json_encode(['font'=>'删除成功','code'=>1]);
    	}else{
    		echo json_decode(['font'=>'删除失败','code'=>2]);die;
        }
        
    }
     public function update(Request $request,$sid)
     {
         // $brand_id = request()->input();
         // dd($id);
         $where = ['sid'=>$sid];
         $data = DB::table('site')->where($where)->first();
         // dd($data);
         // $data = DB::table('brand_info')->find($id);
         return view('admin.site_update',['data'=>$data]);
     }

     public function update_do(Request $request,$sid)
    {
        $data = request()->all();
        unset($data['_token']);
        //   dd($data);
        if (request()->hasfile('spic')) {
            $data['spic'] = uploads('spic');
        }
        $where = ['sid'=>$sid];
        //   dd($where);
        $res = DB::table('site')->where($where)->update($data);
        //   dd($res);
        if ($res) {
            //   echo "<script>alert('修改成功');location='brand/list'</script>";
            return redirect('site/list');
        }else{
            echo "<script>alert('修改失败');history.back()</script>";
        }
    }
    
    //唯一性验证
    public function checkName()
    {
        $sname=request()->input('sname');
        $sid=request()->input('sid')??"";
        //dd($sid);
        if($sid){
            $where[]=['sid','!=',$sid];
        } 
        if($sname){
            $where[]=['sname','=',$sname];
        }
        $res=DB::table('site')->where($where)->first();
        if($res){
            echo json_encode(['ret'=>1,'msg'=>'网站名称已存在']);die;
        }
    }
}
