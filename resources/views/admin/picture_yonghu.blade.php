<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('picture/do_yonghu')}}" method="post">
       @csrf
       <table>
           <tr>
              <td>用户昵称</td>
              <td><input type="text" name="name"></td>
           </tr>
           <tr>
              <td>用户密码</td>
              <td><input type="password" name="pwd"></td>
           </tr>
           <tr>
              <td>用户身份</td>
              <td><input type="text" name="shenfen"></td>
           </tr>
           <tr>
              <td></td>
              <td><input type="submit" value="提交"></td>
           </tr>
       </table>
    </form>
</body>
</html>