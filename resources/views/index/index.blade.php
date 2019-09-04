@extends('layouts.shop')
@section('title', '前台')
@section('content')
<div class="head-top">
      <img src="images/yy.jpg" width="1500" height="1500"/>
      <dl>
       <dt><a href="user.html"><img src="images/tou.jpg" /></a></dt>
       <dd>
        <h1 class="username">苏大强的购物商城</h1>
        <ul>
         <li><a href="prolist.html"><strong>34</strong><p>全部商品</p></a></li>
         <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span><p>收藏本店</p></a></li>
         <li style="background:none;"><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span><p>二维码</p></a></li>
         <div class="clearfix"></div>
        </ul>
       </dd>
       <div class="clearfix"></div>
      </dl>
     </div><!--head-top/-->
     <form action="#" method="get" class="search">
      <input type="text" name="g_name" value="{{$g_name}}" placeholder="请按商品名称搜索"class="seaText fl" />
      <input type="submit" value="搜索" class="seaSub fr" />
     </form><!--search/-->
     <ul class="reg-login-click">
      <li><a href="{{url('index/loging')}}">登录</a></li>
      <li><a href="{{url('index/reg')}}" class="rlbg">注册</a></li>
      <div class="clearfix"></div>
     </ul><!--reg-login-click/-->
     <div id="sliderA" class="slider">
      <img src="images/q.jpg" />
      <img src="images/de3.jpg" />
      <img src="images/q2.jpg" />
      <img src="images/q3.jpg" />
      <img src="images/q5.jpg" />
     </div><!--sliderA/-->
     <ul class="pronav">
      <li><a href="prolist.html">潮牌男装</a></li>
      <li><a href="prolist.html">休闲零食</a></li>
      <li><a href="prolist.html">女装</a></li>
      <li><a href="prolist.html">美妆</a></li>
      <div class="clearfix"></div>
     </ul><!--pronav/-->
     <div class="index-pro1">
     @foreach($data as $v)
      <div class="index-pro1-list">
        <dl>
            <dt><a href="{{url('/index/goods_detail')}}?g_id={{$v->g_id}}"><img src="http://www.uploads.com/{{$v->g_pic}}" /></a></dt>
            <dd class="ip-text"><a href="proinfo.html">{{$v->g_name}}</a><span>已售：488</span></dd>
            <dd class="ip-price"><strong>{{$v->g_price}}</strong> <span>¥599</span></dd>
        </dl>
      </div>
      @endforeach
      <div class="clearfix"></div>
      {{ $data->appends(['g_name' => $g_name])->links() }}
     </div><!--index-pro1/-->
     <!-- <div class="prolist">
      <dl>
       <dt><a href="proinfo.html"><img src="images/prolist1.jpg" width="100" height="100" /></a></dt>
       <dd>
        <h3><a href="proinfo.html">四叶草</a></h3>
        <div class="prolist-price"><strong>¥299</strong> <span>¥599</span></div>
        <div class="prolist-yishou"><span>5.0折</span> <em>已售：35</em></div>
       </dd>
       <div class="clearfix"></div>
      </dl>
      <dl>
       <dt><a href="proinfo.html"><img src="images/prolist1.jpg" width="100" height="100" /></a></dt>
       <dd>
        <h3><a href="proinfo.html">四叶草</a></h3>
        <div class="prolist-price"><strong>¥299</strong> <span>¥599</span></div>
        <div class="prolist-yishou"><span>5.0折</span> <em>已售：35</em></div>
       </dd>
       <div class="clearfix"></div>
      </dl>
      <dl>
       <dt><a href="proinfo.html"><img src="images/prolist1.jpg" width="100" height="100" /></a></dt>
       <dd>
        <h3><a href="proinfo.html">四叶草</a></h3>
        <div class="prolist-price"><strong>¥299</strong> <span>¥599</span></div>
        <div class="prolist-yishou"><span>5.0折</span> <em>已售：35</em></div>
       </dd>
       <div class="clearfix"></div>
      </dl>
     </div> -->

     <div class="joins"><a href="fenxiao.html"><img src="images/qo.jpg" /></a></div>
     <div class="copyright">Copyright &copy; <span class="blue">这是百宝箱</span></div>
     
     <div class="height1"></div>
     <div class="footNav">
      <dl>
       <a href="{{url('index/index')}}">
        <dt><span class="glyphicon glyphicon-home"></span></dt>
        <dd>微店</dd>
       </a>
      </dl>
      <dl>
       <a href="{{url('index/polist')}}">
        <dt><span class="glyphicon glyphicon-th"></span></dt>
        <dd>所有商品</dd>
       </a>
      </dl>
      <dl>
       <a href="{{url('index/car')}}">
        <dt><span class="glyphicon glyphicon-shopping-cart"></span></dt>
        <dd>购物车 </dd>
       </a>
      </dl>
      <dl>
       <a href="{{url('index/user')}}">
        <dt><span class="glyphicon glyphicon-user"></span></dt>
        <dd>我的</dd>
       </a>
      </dl>
      <div class="clearfix"></div>
     </div><!--footNav/-->
     @endsection