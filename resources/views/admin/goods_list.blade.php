<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="">
   <input type="text" name="goods_name" value="{{$goods_name}}" placeholder="请输入商品名称">
   <input type="text" name="goods_price" value="{{$goods_price}}" placeholder="请输入商品价格">
   <input type="submit" value="搜索">
</form>
    <table border="1">
        <tr>
            <td>#</td>
            <td>商品名称</td>
            <td>商品价格</td>
            <td>商品图片</td>
            <td>添加时间</td>
            <td>操作</td>
         </tr>
         @foreach($data as $v)
         <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->goods_name}}</td>
            <td>{{$v->goods_price}}</td>
            <td><img src="{{$v->goods_pic}}" alt="" width="100" height="100"></td>
            <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
            <td>
               <a href="{{url('goods_delete')}}?id={{$v->id}}">删除</a>
               <a href="{{url('goods_update')}}?id={{$v->id}}">修改</a>
            </td>
         </tr>
         @endforeach
    </table>
    {{ $data->appends(['goods_name' => $goods_name],['goods_price'=>$goods_price])->links() }}
</body>
</html>