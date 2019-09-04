<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
           <td>#</td>
           <td>货物名称</td>
           <td>货物图</td>
           <td>库存</td>
           <td>入库时间</td>
           <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr>
           <td>{{$v->p_id}}</td>
           <td>{{$v->p_name}}</td>
           <td>
              <img src="http://www.uploads.com/{{$v->pic}}" alt="" height="100" width="100">
           </td>
           <td>{{$v->sum}}</td>
           <td>
               {{date('Y-m-d H:i:s',$v->addtime)}}
           </td>
           <td>
             <a href="{{url('picture/chuku')}}">出库</a>
             <a href="{{url('picture/ruku')}}">入库</a>
           </td>
        </tr>
        @endforeach
    </table>
</body>
</html>