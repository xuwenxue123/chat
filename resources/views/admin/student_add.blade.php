<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('student/add_do')}}" method="post">
       @csrf
       <table>
           <tr>
              <td>学生姓名</td>
              <td><input type="text" name="name"></td>
           </tr>
           <tr>
              <td>学生年龄</td>
              <td><input type="text" name="age"></td>
           </tr>
           <tr>
              <td>学生性别</td>
              <td>
                <input type="radio" value="0" name="sex">男
                <input type="radio" value="1" name="sex">女
              </td>
           </tr>
           <tr>
              <td></td>
              <td><input type="submit" value="提交"></td>
           </tr>
       </table>
    </form>
</body>
</html>