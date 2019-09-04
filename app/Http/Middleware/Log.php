<?php

namespace App\Http\Middleware;

use Closure;

class Log
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
          //执行动作
          $b=$request->session()->get('user');
          // dd($b);
          if (empty($b)) {  
              echo "<script>alert('请先登录哦');location='/index/loging'</script>";
              //  return redirect('index/loging');  
          }  
          return $next($request);
    }
}
