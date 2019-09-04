<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>分类管理-有点</title>
<link rel="stylesheet" type="text/css" href="/css/css.css" />
<script type="text/javascript" src="/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">分类管理</a>&nbsp;-</span>&nbsp;分类管理
			</div>
		</div>

		<div class="page">
			<!-- topic页面样式 -->
			<div class="topic">
				<div class="conform">
					<form>
						<div class="cfD">
							<input class="addUser" type="text"  placeholder="请输入分类名称" />
							<button class="button">搜索</button>
							<a class="addA addA1" href="{{url('category/add')}}">添加话题+</a>
						</div>
					</form>
				</div>
				<!-- topic表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">#</td>
							<td width="200px" class="tdColor">分类名称</td>
							<td width="125px" class="tdColor">上级分类</td>
							<td width="155px" class="tdColor">数量单位</td>
							<td width="175px" class="tdColor">排序</td>
							<td width="130px" class="tdColor">添加时间</td>
							<td width="200px" class="tdColor">操作</td>
						</tr>
          @foreach($datas as $v)
						<tr>
							<td>{{$v->cid}}</td>
							<td>{{$v->cate_name}}</td>
							<td>{{$v->pid}}</td>
							<td>{{$v->cate_cost}}</td>
							<td>{{$v->cate_sort}}</td>
							<td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
							<td><a href="{{url('category/update')}}?cid={{$v->cid}}"><img class="operation"
									src="/img/update.png"></a> <a href="{{url('category/del')}}?cid={{$v->cid}}"><img class="operation delban"
								src="/img/delete.png"></a></td>
						</tr>
          @endforeach
					</table>
					<div class="paging">分页</div>
				</div>
				<!-- topic 表格 显示 end-->
			</div>
			<!-- topic页面样式end -->
		</div>

	</div>
	<!-- 删除弹出框 -->
	<!-- <div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="#" class="ok yes">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div> -->
	<!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
  $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
// 广告弹出框 end
</script>
</html>