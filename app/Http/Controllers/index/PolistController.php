<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class PolistController extends Controller
{
        //所有商品
        public function polist(Request $request)
        {   
            $info=$request->all();
            $data=DB::table('wares')->get();
            // dd($data);
            return view('index.polist',['info'=>$data]);
        }
}
