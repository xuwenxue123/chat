<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
        //我的
        public function user()
        {
            return view('index.user');
        }
}
