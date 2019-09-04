<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/layui/css/layui.css">
    <script src="/layui/layui.js"></script>
</head>
<body>
<form action="">
   <input type="text" name="sname" value="{{$sname}}" placeholder="请输入网站名称">
   <input type="submit" value="搜索">
</form>
    <table border="1">
        <tr>
            <td>#</td>
            <td>网站名称</td>
            <td>网站地址</td>
            <td>图片</td>
            <td>链接类型</td>
            <td>联系人</td>
            <td>状态</td>
            <td>介绍</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr>
            <td>{{$v->sid}}</td>
            <td>{{$v->sname}}</td>
            <td>{{$v->surl}}</td>
            <td><img src="http://www.uploads.com/{{$v->spic}}" alt="" height="100" width="100"></td>
            <td>{{$v->scut}}</td>
            <td>{{$v->sman}}</td>
            <td>{{$v->sshow}}</td>
            <td>{{$v->sdesc}}</td>
            <td>
                <a href="{{url('site/del')}}?sid={{$v->sid}}" class="delete" delid="{{$v->sid}}">删除</a>               
                <a href="{{url('site/update/'.$v->sid)}}">修改</a>           
            </td>
        </tr>
        @endforeach
    </table>
    {{ $data->appends(['sname' => $sname])->links() }}
</body>
</html>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script>
$(function(){
    layui.use('form', function(){
    	var form = layui.form;
    });
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
    });
    $(document).on('click','.delete',function(){
    	var msg = confirm('确定要删除吗？');
    	if (msg==true) {
    		var sid = $(this).attr('delid');
    		var data = {sid:sid};
    		var tr = $(this).parents('tr');
    		// console.log(data);
    		$.post(
    			"{{url('site/del')}}",
    			data,
    			function(res){
    				layer.msg(res.font,{icon:res.code,time:1500},function(){
    					if (res.code==1) {
    						tr.remove();
    					};
    				});
    			},
    			'json'
    		);
    	}
    	return false;
    });
});
</script>