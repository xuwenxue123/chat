<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('team/do_add')}}" align="center" method="post">
       @csrf
         <h1>添加竞猜球队</h1>
       <table>
           <tr>
              <p><input type="text" name="qiudui_1"> vs <input type="text" name="qiudui_2"></p>
           </tr>
           <tr>
              <p>结束竞猜时间 <input type="datetime-local" name="jieshu_time"></p>
           </tr>
           <tr>
              <p><input type="submit" value="添加"></p>
           </tr>
       </table>
    </form>
</body>
</html>