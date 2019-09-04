<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/layui/css/layui.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/layui/layui.js"></script>
</head>
<body>
  @if($errors->any())
          @foreach($errors->all() as $error)
              {{$error}}<br />
          @endforeach
    @endif
    <form action="{{url('site/add_do')}}"   method="post" enctype="multipart/form-data">
      @csrf
        <table>
            <tr>
                <td>网站名称</td>
                <td><input type="text" name="sname" class="checkName"></td>
            </tr>
            <tr>
                <td>网站地址</td>
                <td><input type="text" name="surl"></td>
            </tr>
            <tr>
                <td>链接类型</td>
                <td>
                   <input type="radio" name="scut" value="1">LOGO链接
                   <input type="radio" name="scut" value="2" checked>文字链接
                </td>
            </tr>
            <tr>
                <td>图片LOGO</td>
                <td>
                    <input type="file" name="spic">
                </td>
            </tr>
            <tr>
                <td>网站联系人</td>
                <td><input type="text" name="sman"></td>
            </tr>
            <tr>
                <td>网站介绍</td>
                <td>
                    <textarea  id="" cols="30" rows="10" name="sdesc"></textarea>
                </td>
            </tr>
            <tr>
                <td>是否显示</td>
                <td>
                    <input type="radio" name="sshow" value="1">是
                    <input type="radio" name="sshow" value="2" checked>否
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="button" value="提交"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script>
    $('input[name="sname"]').blur(function(){
        var sname=$(this).val();
        var obj=$(this);
        $(this).next().remove();
        // if(!sname){
        //     $(this).after('<b style="color:red">网站名称不能为空</b>')
        // }
        
        //中文 字母 .
        var reg=/^[\u4e00-\u9fa5A-Za-z.]{2,12}$/;
        if(!reg.test(sname)){
            $(this).after('<b style="color:red">网站名称必须中文字母和.组成长度为2~12位</b>');
            return;
        }
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
       });
        //唯一性验证
        $.post('/site/checkName',{sname:sname},function(msg){
              if(msg){
                  obj.after('<b style="color:red">网站名称已存在</b>')
              }
        });
    });
    //提交
    $('input[type="button"]').click(function(){
          
    });
</script>