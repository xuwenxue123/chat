<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('students/update_do')}}" method="post">
     <input type="hidden" name="stu_id" value="{{$data->stu_id}}">
      @csrf
       <table>
           <tr>
              <td>住址</td>
              <td>
                <select name="stu_address">
                   <option value="0" @if($data->stu_address=='0') selected @endif>三里屯</option>
                   <option value="1" @if($data->stu_address=='1') selected @endif>房山</option>
                   <option value="2" @if($data->stu_address=='2') selected @endif>朝阳</option>
                </select>
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
