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
					href="#">商品管理</a>&nbsp;-</span>&nbsp;商品添加
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>商品添加</span>
				</div>
				<form action="{{url('goods/add_do')}}" method="post" enctype="multipart/form-data">
				  <input type="hidden" name="g_id" value="{{$info->g_id}}">
				  @csrf
				<div class="baBody">
					<div class="bbD">
						商品名称：<input type="text" class="input3" name="g_name" value="{{$info->g_name}}"/>
					</div>
					<div class="bbD">
						商品货号：<input type="text" class="input3" name="g_number" value="{{$info->g_name}}"/>
                    </div>
                    <div class="bbD">
						商品分类：<select class="input3" name="cid">
						            @foreach($data as $v)
						               <option value="{{$v->cid}}">{{ str_repeat("--|",$v->level).$v->cate_name}}</option>
									@endforeach
								 </select>
                    </div>
                    <div class="bbD">
						商品品牌：<select class="input3" name="brand_id">
						               @foreach($infos as $v)
						                   <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
									    @endforeach
								 </select>
					</div>
					<div class="bbD">
						本店售价：<input type="text" class="input3" name="g_price" value="{{$info->g_price}}"/>
					</div>
                    <div class="bbD">
						商品库存：<input type="text" class="input3" name="g_num" value="{{$info->g_num}}"/>
                    </div>
                    <div class="bbD">
						上传图片：
						<div class="bbDd">
							<div class="bbDImg">+</div>
							<input type="file" class="file" name="g_pic" value="{{$info->g_pic}}"/> <a class="bbDDel" href="#">删除</a>
						</div>
					</div>
                    <div class="bbD">
						上架：<label><input type="radio" checked="checked"
							name="is_shang" value="1" @if($info->is_shang==1) checked="checked" @endif/>&nbsp;是</label><label><input type="radio"
							name="is_shang" value="0" @if($info->is_shang==0) checked="checked" @endif/>&nbsp;否</label>
                    </div>
                    <div class="bbD">
						是否新品：<label><input type="radio" checked="checked"
							name="is_new" value="1" @if($info->is_new==1) checked="checked" @endif/>&nbsp;是</label><label><input type="radio"
							name="is_new" checked="checked" value="0" @if($info->is_new==0) checked="checked" @endif/>&nbsp;否</label>
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