@extends('layouts.shop')
@section('title', '前台')
@section('content')
<body>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1><marquee behavior="" direction="">苏大强的购物车</marquee></h1>
      </div>
     </header>
     <div class="head-top">
      <img src="images/timg.jpg" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><span class="hui">购物车共有：<strong class="orange">2</strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(images/xian.jpg) left center no-repeat;">
        <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
       </td>
      </tr>
     </table>
     
     <div class="dingdanlist" id="quan">
      <table>
       <tr>
        <td width="100%" colspan="4"><a href="javascript:;"><input type="checkbox" name="1" id="allbox"/> 全选</a></td>
       </tr>
       @foreach($data as $v)
       <tr>
        <td width="4%"><input type="checkbox" name="1" class="box"/></td>
        <td class="dingimg" width="15%"><img src="http://www.uploads.com/{{$v->g_pic}}" /></td>
        <td width="50%">
         <h3>{{$v->g_name}}</h3>
         <time>下单时间：2015-08-11  13:51</time>
        </td>
        <td align="right"><input type="text" class="spinnerExample" /></td>
       </tr>
       @endforeach
       <tr>
        <th colspan="4"><strong class="orange">¥</strong></th>
       </tr>
      </table>
     </div><!--dingdanlist/-->
     
 
     <div class="height1"></div>
     <div class="gwcpiao">
     <table>
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <td width="50%">总计：<strong class="orange">¥{{$total}}</strong></td>
       <td width="40%"><a href="{{url('/index/order')}}" class="jiesuan">去结算</a></td>
      </tr>
     </table>
    </div><!--gwcpiao/-->
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('/index/js/jquery.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/style.js"></script>
    <!--jq加减-->
    <script src="js/jquery.spinner.js"></script>
   <script>
	$('.spinnerExample').spinner({});
	</script>
  </body>
</html>
<script>
  $(function(){
      //点击全选
      $("#allbox").click(function(){
        var _this=$(this);
        var status=_this.prop('checked');
        $(".box").prop("checked",status);
    });
  })
</script>
@endsection 