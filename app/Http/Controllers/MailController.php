<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email='2668856505@qq.com';
        $this->send($email);
    }
    
    public function send($email){
        \Mail::send('mail' , ['name'=>'小雪'] ,function($message)use($email){
        //设置主题
            $message->subject("欢迎注册小仙女有限公司");
        //设置接收方
            $message->to($email);
        });
   }
}
