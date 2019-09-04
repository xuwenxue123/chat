<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('admin/picture_log_do')}}" method="post">
       <h1 align="center">用户登录</h1>
       @csrf
       <table align="center">
           <tr>
              <td>账号</td>
              <td><input type="text" name="username"></td>
           </tr>
           <tr>
              <td>密码</td>   
              <td><input type="password" name="pwd"></td>   
           </tr>
           <tr>
              <td></td>
              <td><input type="submit" value="登录"></td>
           </tr>
       </table>
    </form>
</body>
</html>