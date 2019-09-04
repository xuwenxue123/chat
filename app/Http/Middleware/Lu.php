<?php

namespace App\Http\Middleware;

use Closure;

class Lu
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
        $a=request()->session()->get('user');
        // dd($a);
        if (empty($a)) {  
            echo "<script>alert('请先登录');location='/admin/men_lu'</script>";
            // return redirect('logina');  
        } 
        return $next($request);
    }
}
