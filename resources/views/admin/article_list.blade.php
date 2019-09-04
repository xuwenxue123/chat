<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1" align="center">
       <h2 align="center">列表页</h2>
        <tr>
           <td>#</td>
           <td>文章标题</td>
           <td>点赞</td>
           <td>点赞数</td>
 
        </tr>
        @foreach($data as $v)
        <tr>
           <td>{{$v->id}}</td>
           <td>{{$v->name}}</td>
           <td><a href="javascript:;" class="dian" data-id="{{$v->id}}">点赞</a></td>
           <td class="num" num="{{$v->id}}"></td>
        </tr>
        @endforeach
    </table>
</body>
</html>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript">
	$('.dian').click(function(){
		obj = $(this);
        id  = obj.data('id')
        // alert(id);
        $.ajax({
			url:'/article/red',
			data:{'id': id, 'flag': flag},
			success:function(msg) {
				$('.num' + id).html(msg)
				if (flag == '点赞') {
					obj.html('取消点赞')
				} else {
					obj.html('点赞')
				}
				
			}
		});

	});	
</script>