<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('category/do_update')}}" method="post">
    <input type="hidden" name="cid" value="{{$info->cid}}">
    @csrf
        <table>
            <tr>
                <td>分类名称</td>
                <td><input type="text" name="cate_name" value="{{$info->cate_name}}"></td>
            </tr>
            <tr>
               <td>上级分类</td>
               <td>
					<select name="pid">
                    <option value="0">顶级分类</option>
					@foreach ($data as $v)	
						<option value="{{ $v->cid }}" @if($info->cid ==$v->cid) selected @endif>{{ str_repeat("--|",$v->level).$v->cate_name}}</option>
					@endforeach	
                    </select>
				</td>
            </tr>
            <tr>
                <td>数量单位</td>
                <td><input type="text" name="cate_cost" value="{{$info->cate_cost}}"></td>
            </tr>
            <tr>
                <td>排序</td>
                <td><input type="text" name="cate_sort" value="{{$info->cate_sort}}"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="分类修改"></td>
            </tr>
        </table>
    </form>
</body>
</html>