<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('students/add_do')}}" method="post">
      @csrf
       <table>
           <tr>
              <td>学生姓名</td>
              <td><input type="text" name="stu_name"></td>
           </tr>
           <tr>
              <td>年龄</td>
              <td>
                <select name="stu_age" id="">
                  @for ($i=18; $i <= 28; $i++) { 
                            <option value="{{$i}}">{{$i}}</option>';
                        }
                   @endfor
                </select>
              </td>
           </tr>
           <tr>
              <td>住址</td>
              <td>
                <select name="stu_address" id="">
                   <option value="0">三里屯</option>
                   <option value="1">房山</option>
                   <option value="2">朝阳</option>
                </select>
              </td>
           </tr>
           <tr>
              <td>状态</td>
              <td>
                 <input type="radio" value="住校" name="status" checked="checked">住校
                 <input type="radio" value="不住校" name="status">不住校
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