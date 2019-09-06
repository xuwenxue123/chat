<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    echo phpinfo();
});


Route::get('indexa','admin\AdminController@index');//后台模板显示
//商品管理
// Route::get('/goods_add','admin\GoodsController@goods_add');//后台商品添加显示
// Route::post('/goods_add_do','admin\GoodsController@goods_add_do');//后台商品入库
// Route::get('/goods_list','admin\GoodsController@goods_list');//后台商品列表
// Route::get('goods_delete','admin\GoodsController@goods_delete');//后台商品删除
// Route::get('goods_update','admin\GoodsController@goods_update');//后台商品修改表单
// Route::post('goods_update_do','admin\GoodsController@goods_update_do');//后台商品修改入库

//品牌
Route::prefix('brand')->middleware('logina')->group(function(){
	Route::get('add','admin\BrandController@add');//后台品牌添加
    Route::post('add_do','admin\BrandController@add_do');//品牌入库 域名/brand/add_do
    Route::get('list','admin\BrandController@list');//品牌列表展示
    Route::get('del','admin\BrandController@del');//品牌删除
    Route::get('update/{id}','admin\BrandController@update');//品牌修改
    Route::post('update_do/{id}','admin\BrandController@update_do');//品牌修改执行
});

//学生管理
Route::prefix('student')->group(function(){
	//学生管理
    Route::get('add','admin\StudentController@add');//学生添加显示
    Route::post('add_do','admin\StudentController@add_do');//学生添加入库
    Route::get('list','admin\StudentController@list');//学生列表展示
});
//后台商品管理
Route::prefix('goods')->middleware('logina')->group(function(){
     Route::get('add','admin\GoodssController@add');//商品显示
     Route::post('add_do','admin\GoodssController@add_do');//商品入库
     Route::get('index','admin\GoodssController@index');//商品列表
     Route::get('del','admin\GoodssController@del');//商品列表
     Route::get('updates','admin\GoodssController@updates');//商品修改
     Route::post('updates_do/{g_id}','admin\GoodssController@updates_do');//商品修改
});
//后台分类管理
Route::prefix('category')->middleware('logina')->group(function(){
    Route::get('add','admin\CategoryController@add');//分类展示
    Route::post('do_add','admin\CategoryController@do_add');//分类展示
    Route::get('list','admin\CategoryController@list');//分类展示
    Route::get('del','admin\CategoryController@del');//分类删除
    Route::get('update','admin\CategoryController@update');//分类修改
    Route::post('do_update','admin\CategoryController@do_update');//分类修改
});
//网站链接
Route::prefix('site')->group(function(){
    Route::get('add','admin\SiteController@add');
    Route::post('add_do','admin\SiteController@add_do');
    Route::get('list','admin\SiteController@list');
    Route::post('del','admin\SiteController@del');
    Route::get('update/{sid}','admin\SiteController@update');
    Route::post('update_do/{sid}','admin\SiteController@update_do');
    Route::post('checkName','admin\SiteController@checkName');
});
//后台登录
Route::get('logina','admin\LoginController@logina');//后台登录
Route::post('login_add','admin\LoginController@login_add');//后台登录执行


//发送邮件
Route::get('mail','MailController@index');
Auth::routes();
///////////////////////////////////////////////////////////////////
// Route::get('index/loging','index\LoginController@loging');//登录
// Route::post('index/do_login','index\LoginController@do_login');//登录
// Route::get('index/logout','index\LoginController@logout');//登出

/////////////////////////////////////////////////////////////////
//微商城前台
Route::get('index/loging','index\LoginController@loging');//登录
Route::post('index/do_login','index\LoginController@do_login');//登录 
Route::prefix('index')->middleware('log')->group(function(){
    Route::get('shop','index\IndexController@shop');
    Route::get('index','index\IndexController@index');
    Route::get('polist','index\PolistController@polist');//所有商品
    Route::get('car/{id}','index\CarController@car');//购物车
    Route::get('car_do','index\CarController@car_do');//购物车执行
    Route::get('order','index\CarController@order');//购物车执行
    Route::get('user','index\UserController@user');//我的
    Route::get('goods_detail','index\IndexController@goods_detail');//我的
    Route::get('reg','index\LoginController@reg');//注册
    Route::post('reg/sendemail','index\LoginController@sendemail');//发送邮件
    Route::post('do_reg','index\LoginController@do_reg');//注册执行
    Route::get('pay','Pay\AliPayController@pay');//支付宝支付
    Route::get('return_url','Pay\AliPayController@return_url');//同步
    Route::get('notify_url','Pay\AliPayController@notify_url');//异步
});

Route::get('/home', 'HomeController@index')->name('home');
//调用中间件
Route::group(['middleware'=>['site']],function(){
    Route::get('add','admin\SiteController@add');    
});
// //调用中间件
// Route::group(['middleware'=>['login']],function(){
//     //  Route::get('logina','admin\LoginController@login');//后台登录   
// });

//学生管理
Route::prefix('students')->middleware('logina')->group(function(){
    Route::get('add','admin\StudentsController@add');
    Route::post('add_do','admin\StudentsController@add_do');
    Route::get('list','admin\StudentsController@list');
    Route::get('update','admin\StudentsController@update');
    Route::post('update_do','admin\StudentsController@update_do');
    Route::post('del','admin\StudentsController@del');
});

Route::get('admin/article_log','admin\ArticleController@article_log');
Route::post('admin/article_log_do','admin\ArticleController@article_log_do');
//文章管理系统
Route::prefix('article')->middleware('logo')->group(function(){
    Route::get('add','admin\ArticleController@add');
    Route::post('add_do','admin\ArticleController@add_do');
    Route::get('list','admin\ArticleController@list');
    Route::any('red','admin\ArticleController@red');
});

//竞猜
Route::prefix('team')->middleware('logo')->group(function(){
    Route::get('add','admin\TeamController@add');
    Route::post('do_add','admin\TeamController@do_add');
    Route::get('index','admin\TeamController@index');
    Route::get('yong_guess/{jingcai_id}','admin\TeamController@yong_guess');
    Route::post('do_guess','admin\TeamController@do_guess');
    Route::get('chakan_bisai','admin\TeamController@chakan_bisai');
    Route::get('chakan_jingcai/{jingcai_id}','admin\TeamController@chakan_jingcai');
});
Route::prefix('football')->group(function(){
    Route::get('add','football\FootBallController@add');
    Route::post('add_do','football\FootBallController@add_do');
    Route::get('list','football\FootBallController@list');
    Route::get('guess/{id}','football\FootBallController@guess');
    Route::post('guess_do/{id}','football\FootBallController@guess_do');
    Route::get('result/{id}','football\FootBallController@result');
    Route::get('lookresult/{id}','football\FootBallController@lookresult');
    Route::post('result_do/{id}','football\FootBallController@result_do');
});
Route::get('admin/lu','admin\MenController@lu');
Route::post('admin/do_lu','admin\MenController@do_lu');

Route::get('admin/picture_log','admin\PictureController@picture_log');
Route::post('admin/picture_log_do','admin\PictureController@picture_log_do');
//kaoshi
Route::prefix('picture')->middleware('logs')->group(function(){
    Route::get('yonghu','admin\PictureController@yonghu');
    Route::post('do_yonghu','admin\PictureController@do_yonghu');
    Route::get('add','admin\PictureController@add');
    Route::post('do_add','admin\PictureController@do_add');
    Route::get('index','admin\PictureController@index');
    Route::get('chuku','admin\PictureController@chuku');
    Route::post('chuku_do','admin\PictureController@chuku_do');
    Route::get('chulist','admin\PictureController@chulist');
    Route::get('ruku','admin\PictureController@ruku');
});

///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
//微信
//微信获取用户列表 粉丝列表
Route::get('wechat/get_access_token','WechatController@get_access_token'); //获取access_token
Route::get('/wechat/get_user_list','WechatController@get_user_list'); //获取用户列表
Route::get('/wechat/get_user_info','WechatController@get_user_info');//详情

//微信授权登录
route::get('/login/loging','wechat\LoginController@loging');
route::get('logss','wechat\LoginController@logss');
route::get('code','wechat\LoginController@code');

Route::get('/wechat/upload','WechatController@upload');
Route::post('/wechat/do_upload','WechatController@do_upload'); //上传