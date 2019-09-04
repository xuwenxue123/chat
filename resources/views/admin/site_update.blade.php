<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('site/update_do/'.$data->sid)}}"   method="post" enctype="multipart/form-data">
    <input type="hidden" name="sid" value="{{$data->sid}}">
      @csrf
        <table>
            <tr>
                <td>网站名称</td>
                <td><input type="text" name="sname" value="{{$data->sname}}"></td>
            </tr>
            <tr>
                <td>网站地址</td>
                <td><input type="text" name="surl" value="{{$data->surl}}"></td>
            </tr>
            <tr>
                <td>链接类型</td>
                <td>
                  <input type="radio" name="scut" value="1" @if($data->scut=='1') checked @endif> 是
                  <input type="radio" name="scut" value="2" @if($data->scut=='2') checked @endif> 否
               </td>
            </tr>
            <tr>
                <td>图片LOGO</td>
                <td>
                    <input type="file" name="spic" >
                    <img src="http://www.uploads.com/{{$data->spic}}" alt="" width="100" height="100">
                </td>
            </tr>
            <tr>
                <td>网站联系人</td>
                <td><input type="text" name="sman" value="{{$data->sman}}"></td>
            </tr>
            <tr>
                <td>网站介绍</td>
                <td>
                    <textarea  id="" cols="30" rows="10" name="sdesc">{{$data->sdesc}}</textarea>
                </td>
            </tr>
            <tr>
               <td>是否显示</td>
               <td>
                  <input type="radio" name="sshow" value="1" @if($data->sshow=='1') checked="checked" @endif> 是
                  <input type="radio" name="sshow" value="2" @if($data->sshow=='2') checkdate="checked" @endif> 否
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