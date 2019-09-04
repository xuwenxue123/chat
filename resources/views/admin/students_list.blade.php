<a href="javascript:;" class="show">显示离校学生</a>
<form action="">
    @csrf
</form>
<table align="center" width="700" border="1" class="a"> 
    <tr align="center">
        <td>ID</td>
        <td>姓名</td>
        <td>年龄</td>
        <td>住址</td>
        <td>学生状态</td>
        <td>操作</td>
    </tr>
    @foreach($data as $v)
    <tr align="center">
        <td>{{$v->stu_id}}</td>
        <td>{{$v->stu_name}}</td>
        <td>{{$v->stu_age}}</td>
        <td>{{$v->stu_address}}</td>
        <td>{{$v->status}}</td>
        <td> <a href="javascript:;" stu_id="{{$v->stu_id}}" class="del">删除</a>
            <a href="{{url('students/update/')}}?stu_id={{$v->stu_id}}">修改</a>
    </tr>
    @endforeach
</table>
<table align="center" width="700" border="1" class="b" style="display:none;"> 
    <tr align="center">
        <td>ID</td>
        <td>姓名</td>
        <td>年龄</td>
        <td>住址</td>
        <td>学生状态</td>
        <td>操作</td>
    </tr>
    @foreach($datas as $v)
    <tr align="center">
    <td>{{$v->stu_id}}</td>
        <td>{{$v->stu_name}}</td>
        <td>{{$v->stu_age}}</td>
        <td>{{$v->stu_address}}</td>
        <td>{{$v->status}}</td>
        <td>
        <a href="javascript:;" stu_id="{{$v->stu_id}}" class="del">删除</a>
            <a href="{{url('students/update/')}}?stu_id={{$v->stu_id}}">修改</a>
        </td>
    </tr>
    @endforeach
</table>
<script type="text/javascript" src="/admin/js/jq.min.js"></script>
<script type="text/javascript"> 
    $('.show').click(function() {
        // alert(1)
        var a = $(this).text();
        if (a=='显示离校学生') {
            $(this).text('显示在校学生');
            $('.a').hide();
            $('.b').show();
        }else{
            $(this).text('显示离校学生');
            $('.b').hide();
            $('.a').show();
        }
    });
    $('.del').click(function(){
        var _token = $('[name="_token"]').val();
        // alert(_token);
        var stu_id=$(this).attr('stu_id');
        // alert(stu_id)
        $.post(
            "/students/del",
            {stu_id:stu_id,_token:_token},
            function(res){
                alert(res.msg);
                location.reload();
            },
            'json'
        );
    });
</script>