<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>话题管理-有点</title>
<link rel="stylesheet" type="text/css" href="/css/css.css" />
<script type="text/javascript" src="/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>

		<div class="page">
			<!-- topic页面样式 -->
			<div class="topic">
				<div class="conform">
					<form>
						<div class="cfD">
							<input class="addUser" type="text"  name="" value="" placeholder="品牌名称" />
							<input class="addUser" type="text" name="" value="" placeholder="品牌描述" />
							<button class="button">搜索</button>
							<a class="addA addA1" href="{{url('brand/add')}}">添加商品+</a>
						</div>
					</form>
				</div>
				<!-- topic表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">#</td>
							<td width="200px" class="tdColor">商品名称</td>
							<td width="125px" class="tdColor">商品货号</td>
							<td width="155px" class="tdColor">本店售价</td>
							<td width="155px" class="tdColor">商品描述</td>							
							<td width="175px" class="tdColor">商品库存</td>
							<td width="190px" class="tdColor">上传图片</td>
							<td width="130px" class="tdColor">上架</td>
							<td width="130px" class="tdColor">是否新品</td>
							<td width="200px" class="tdColor">操作</td>
                        </tr>
                        @foreach($data as $v)
						<tr>
							<td>{{$v->g_id}}</td>
							<td>{{$v->g_name}}</td>
							<td>{{$v->g_number}}</td>
							<td>{{$v->g_price}}</td>
							<td>{{$v->g_desc}}</td>
							<td>{{$v->g_num}}</td>
							<td>
                                <img src="http://www.uploads.com/{{$v->g_pic}}" alt="" height="100" width="100">
                            </td>
							<td>{{$v->is_shang}}</td>
							<td>{{$v->is_new}}</td>
                            <td><a href="{{url('goods/updates')}}?g_id={{$v->g_id}}"><img class="operation"
									src="/img/update.png"></a> <a href="{{url('goods/del')}}?g_id={{$v->g_id}}"><img class="operation delban"
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
	<div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="#" class="ok yes">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>
	<!-- 删除弹出框  end-->
</body>

</html>