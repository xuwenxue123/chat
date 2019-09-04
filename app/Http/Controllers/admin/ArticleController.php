<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use DB;
class ArticleController extends Controller
{    
    //用户登录
    public function article_log(Request $request)
    {  
        return view('admin/article_log');
    }
    //用户登录执行
    public function article_log_do(Request $request)
    {
        $data=request()->except('_token');
        $res=DB::table('logo')->where(['u_name'=>$data['u_name'],'u_pwd'=>$data['u_pwd']])->first();
        // dd($res);
        if(empty($res)){
            echo "<script>alert('账户或密码有误');history.back()</script>";die;
        }
        $user = [
            'uid' => $res->l_id,
            'u_name' => $res->u_name,
        ];
        // dd($user);
        $a=request()->session()->put('user',$user);
        // dd($a);
        $session = request()->session()->get('user');
        // dd($session);
        if ($session) {
            echo "<script>alert('登陆成功');location='/article/add'</script>";
        }else{
            echo "<script>alert('登陆失败');history.back()</script>";
        }
       
        // echo 11;
    }
    //文章显示页面
    public function add()
    {
        return view('admin.article_add');
    }
    //文章添加入库
    public function add_do(Request $request)
    {   
        $data=$request->all();
        $res=DB::table('article')->insert([
            'name'=>$data['name'],
            'article'=>$data['article'],
            'content'=>$data['content'],
            'addtime'=>time(),
            'uid'=>session('user')['uid'],
        ]);
        if($res){
            return redirect('article/list');
        }
    }
    //文章列表
    public function list()
    {   
        $data=DB::table('article')->get();
        $rela = DB::table('relation')->where(['uid' => session('user')['u_id']])->get();
        $rela = json_decode(json_encode($rela),true);

        $dianzan = array_column($rela, 'news_id');

        foreach($data as $key => $val) {
            $v = Redis::get('dianzan' . $val['news_id']);
            $data[$key]['dian'] = empty($v) ? 0 : $v;


            $data[$key]['flag'] = in_array($val['news_id'], $dianzan) ? '取消点赞' : '点赞';
        }
        return view('admin.article_list',['data'=>$data]);
    }
    public function red()
    {
        $id   = request()->get('id');
        // dd($id);
        $flag = request()->get('flag');
        if ($flag == '点赞') {
            Redis::incr('dianzan' . $id);
            // 新增点赞关系
            DB::table('relation')->insert(['uid' => session('user')['u_id'], 'news_id' => $id]);
        } else {
            Redis::decr('dianzan' . $id);
            // 删除点赞关系
            DB::table('relation')->where(['uid' => session('user')['u_id'], 'news_id' => $id])->delete();
        }

        echo Redis::get('dianzan' . $id);
    }
 
}
