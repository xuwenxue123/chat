<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>话题添加-有点</title>
<link rel="stylesheet" type="text/css" href="/css/css.css" />
<script type="text/javascript" src="/js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">分类管理</a>&nbsp;-</span>&nbsp;分类添加
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>分类添加</span>
				</div>
			<form action="{{url('category/do_add')}}" method="post">
            @csrf
            <div class="baBody">
					<div class="bbD">
						分类名称：<input type="text" class="input3" name="cate_name"/>
					</div>
                    <div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上级分类：
                  <select class="input3" name="pid">
                          <option value="0">顶级分类</option>
						  @foreach($data as $v)
                          <option value="{{$v->cid}}">{{ str_repeat("--|",$v->level).$v->cate_name}}</option>
                          @endforeach
                  </select>
					</div>
					<div class="bbD">
						数量单位：<input type="text" class="input3" name="cate_cost"/>
					</div>
					<div class="bbD">
						排序：<input type="text" class="input3" name="cate_sort"/>
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" href="#">提交</button>
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
				</div>
            </form>
			</div>

			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</html>