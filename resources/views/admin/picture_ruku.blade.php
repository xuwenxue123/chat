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
           <td>用户id</td>
           <td>货物id</td>
           <td>操作时间</td>
           <td>操作类型</td>
        </tr>
        @foreach($data as $v)
        <tr>
           <td>{{$v->uid}}</td>
           <td>{{$v->p_id}}</td>
           <td> {{date('Y-m-d H:i:s',$v->addtime)}}</td>
           <td><a href=""></a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>