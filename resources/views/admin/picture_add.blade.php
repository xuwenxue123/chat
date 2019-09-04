<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('picture/do_add')}}" method="post"enctype="multipart/form-data">
      @csrf
        <table>
             <tr>
                <td>货物名称</td>
                <td><input type="text" name="p_name"></td>
             </tr>
             <tr>
                <td>货物LOGO</td>
                <td>
                   <input type="file" name="pic">                
                </td>
             </tr>
             <tr>
                <td>库存</td>
                <td><input type="text" name="sum"></td>
             </tr>
             <tr>
                <td></td>
                <td><input type="submit" value="提交"></td>
             </tr>
        </table>
    </form>
</body>
</html>