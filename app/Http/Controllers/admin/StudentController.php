<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class StudentController extends Controller
{
    //学生添加
    public function add(Request $request)
    {
        return view('admin/student_add');
    }

    //学生添加入库
    public function add_do(Request $request)
    {
        $data=$request->all();
        $res=DB::table('stu')->insert([
             'name'=>$data['name'],
             'age'=>$data['age'],
             'sex'=>$data['sex'],
             'addtime'=>time()
        ]);
        // $post=$request->only('name');指定值接收
        // $post=$request->except('_token');去除token 
        if($res){
            return redirect('student/list');
        }
    }

    public function list(Request $request)
    {
        $data=$request->all();
        $info=DB::table('stu')->get();
        return view('admin.student_list',['data'=>$info]);
        // echo 111;
    }
}
