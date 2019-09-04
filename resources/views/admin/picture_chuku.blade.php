<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('picture/chuku_do')}}" method="post">
      @csrf
       <table>
          <tr>
             <td>货物名称</td>
             <td><input type="text" name="p_name"></td>
          </tr>
          <tr>
             <td>用户id</td>
             <td><input type="text" name="uid"></td>
          </tr>
          <tr>
             <td></td>
             <td><input type="submit" value="出库"></td>
          </tr>
       </table>
    </form>
</body>
</html>