<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class StudentsController extends Controller
{
    public function add()
    {
        return view('admin.students_add');
    }

    public function add_do(Request $request)
    {
        $data =$request->all();
        unset($data['_token']);
        // dd($data);
        $res=DB::table('student')->insert($data);
        return redirect('students/list');       
    }

    public function list()
    {  
       $data=DB::table('student')->where(['status'=>'住校'])->get();
       $datas=DB::table('student')->where(['status'=>'不住校'])->get();
       return view('admin.students_list',['data'=>$data,'datas'=>$datas]);
    }
    
    public function del()
    {
        $stu_id=request()->except('_token');
        // dd($stu_id);
        $data=DB::table('student')->where(['stu_id'=>$stu_id['stu_id']])->update(['status'=>'不住校']);
        if ($data){
            echo json_encode(['code'=>0,'msg'=>'学生已删除']);
        }
    }

    public function update(Request $request)
    {   
        $data=$request->all();
        // dd($data);
        $res=DB::table('student')->where('stu_id',$data['stu_id'])->first();
        // dd($res);
        return view('admin.students_update',['data'=>$res]);
    }

    public function update_do(Request $request)
    {
        $data=$request->all();
        unset($data['_token']);
        $res=DB::table('student')->where(['stu_id'=>$data['stu_id']])->update($data);
        // dd($res);
        if($res){
            return redirect('students/list');
        }
    }
}
