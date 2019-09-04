<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <table  align="center">
                <tr>
                    <td colspan="2" align="center">
                        <h1 align="center">竞猜列表</h1>
                    </td>
                </tr>
                @foreach($data as $v)
                <tr>
                    <td><a href="{{url('team/chakan_bisai')}}">{{$v->qiudui_1}} vs {{$v->qiudui_2}}</a></td>
                    <td>
                            <a href="{{url('team/yong_guess',['jingcai_id'=>$v->jingcai_id])}}"><button>竞猜</button></a>
                            <a href="{{url('team/chakan_jingcai',['jingcai_id'=>$v->jingcai_id])}}"><button>查看结果</button></a>
                    </td>
                </tr>
                @endforeach
            </table>
</body>
</html>