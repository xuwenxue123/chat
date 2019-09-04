<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部-有点</title>
<link rel="stylesheet" type="text/css" href="/css/css.css" />
<script type="text/javascript" src="/js/jquery.min.js"></script>
</head>
<body>
    <form action="{{url('brand/add_do')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">品牌管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>上传广告</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						品牌名称：<input type="text" class="input1" name="brand_name" />
					</div>
					<div class="bbD">
						品牌网址：<input type="text" class="input1" name="brand_url"/>
					</div>
               <div class="bbD">
						上传图片：
						<div class="bbDd">
							<div class="bbDImg">+</div>
							<input type="file" class="file" name="brand_logo"/> <a class="bbDDel" href="#">删除</a>
						</div>
					</div>
               <div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;商品描述：
						<div class="btext2">
							<textarea class="text2" name="brand_desc"></textarea>
						</div>
					</div>
					<div class="bbD">
						是否显示：<label><input type="radio" checked="checked" name="is_show"/>是</label> <label><input
							type="radio" name="is_show"/>否</label>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input class="input2"
							type="text" name="brand_sort"/>
               </div>
             
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" href="#">提交</button>
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
				</div>
			</div>

			<!-- 上传广告页面样式end -->
		</div>
	</div>
    </form>
</body>
</html>