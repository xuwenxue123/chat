<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>品牌管理</title>
</head>
<body>
    <form action="{{url('brand/update_do/'.$data->brand_id)}}" method="post" enctype="multipart/form-data">
      <input type="hidden" value="{{$data->brand_id}}" name="brand_id">
        @csrf
        <table>
            <tr>
               <td>品牌名称</td>
               <td><input type="text" name="brand_name" value="{{$data->brand_name}}"></td>
            </tr>
            <tr>
               <td>品牌网址</td>
               <td><input type="text" name="brand_url" value="{{$data->brand_url}}"></td>
            </tr>
            <tr>
               <td>品牌LOGO</td>
               <td>
                   <input type="file" name="brand_logo">
                   <img src="http://www.uploads.com/{{$data->brand_logo}}" alt="" width="100" height="100">
                </td>
            </tr>
            <tr>
               <td>品牌描述</td>
               <td>
                  <textarea id="" cols="30" rows="10" name="brand_desc">{{$data->brand_desc}}</textarea>
               </td>
            </tr>
            <tr>
               <td>排序</td>
               <td><input type="text" name="brand_sort" value="{{$data->brand_sort}}"></td>
            </tr>
            <tr>
               <td>是否显示</td>
               <td>
                  <input type="radio" name="is_show" value="1" @if($data->is_show==1) checked="checked" @endif> 是
                  <input type="radio" name="is_show" value="0" @if($data->is_show==0) checkdate="checked" @endif> 否
               </td>
            </tr>
            <tr>
               <td></td>
               <td><input type="submit" value="修改品牌"></td>
            </tr>
        </table>
    </form>
</body>
</html>

