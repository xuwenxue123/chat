<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('article/add_do')}}" method="post">
       @csrf
       <table align="center">
        <h2 align="center">添加页</h2>
         <tr>
            <td>标题</td>
            <td><input type="text" name="name"></td>
         </tr>
         <tr>
            <td>作者</td>
            <td><input type="text" name="article"></td>
         </tr>
         <tr>
            <td>内容</td>
            <td>
               <textarea    cols="30" rows="10" name="content"></textarea>
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