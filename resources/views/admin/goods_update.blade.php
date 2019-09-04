<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('goods_update_do')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{$info->id}}">
      @csrf
       <table>
            <tr>
              <td>商品名称</td>
              <td><input type="text" name="goods_name" value="{{$info->goods_name}}"></td>
            </tr>
            <tr>
              <td>商品价格</td>
              <td><input type="text" name="goods_price" value="{{$info->goods_price}}"></td>
            </tr>
            <tr>
              <td>商品图片</td>
              <td>
                <img src="{{$info->goods_pic}}" alt="" width="100" height="100">   
                <input type="file" name="goods_pic">
              </td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" value="修改"></td>
            </tr>
       </table>
    </form>
</body>
</html>