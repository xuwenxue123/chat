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
          <td>学生姓名</td>
          <td>学生年龄</td>
          <td>学生性别</td>
          <td>添加时间</td>
          <td>学生操作</td>
       </tr>
       @foreach($data as $v)
       <tr>
          <td>{{$v->id}}</td>
          <td>{{$v->name}}</td>
          <td>{{$v->age}}</td>
          <td>
             @if($v->sex==0)
             男
             @else
             女
             @endif
          </td>
          <td>{{date('Y-m-d H:i:s',$v->addtime)}}</td>
          <td>
            <a href="">删除</a>
          </td>
       </tr>
       @endforeach
       <p>{{ $data->links() }}</p>
    </table>
</body>
</html>