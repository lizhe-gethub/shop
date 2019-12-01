<?php

//临时添加管理员用户
//Route::get('admin/insert','Admin\LoginController@insert');

//测试第三方类 发送验证码
Route::get('home/register/sendp', 'Home\RegisterController@sendp');

//加载无权限页面
Route::get('admin/rbac', function () {
    return view('admin.rbac');
});
//后台登录和权限 中间件 路由组控制器
Route::group(['middleware' => ['login', 'nodes']], function () {

    //后台主页路由
    Route::get('admin', 'Admin\IndexController@index');
    //后台用户路由
    Route::resource('admin/users', 'Admin\UsersController');
    //后台分类路由
    Route::resource('admin/cates', 'Admin\CatesController');
    //后台管理员路由
    Route::resource('admin/adminuser', 'Admin\AdminuserController');
    //后台角色路由
    Route::resource('admin/roles', 'Admin\RolesController');
    //权限
    Route::resource('admin/nodes', 'Admin\NodesController');
    //后台公告
    Route::resource('admin/article', 'Admin\ArticleController');
    //后台商品
    Route::resource('admin/shops', 'Admin\ShopsController');
    //后台订单管理
    Route::resource('admin/orders','Admin\OrdersController');
    //ajax订单状态修改
    Route::get('orderupdate','Admin\OrdersController@orderupdate');
    //友情链接
    Route::resource('admin/links','Admin\LinksController');
    //修改友情链接状态
    Route::get('linkscheck','Admin\LinksController@linkscheck');
    //轮播图管理路由
    Route::resource('admin/slide','Admin\SlideController');
    //修改轮播图状态
    Route::get('slidecheck','Admin\SlideController@slidecheck');
    //评价列表
    Route::resource('admin/comment','Admin\CommentController');
});


//后台登录主页
Route::get('admin/login', 'Admin\LoginController@login');
//后台登录
Route::post('admin/dologin', 'Admin\LoginController@dologin');
//退出登录
Route::get('admin/outlogin', 'Admin\LoginController@outlogin');

//ajax删除公告表数据
Route::get('admin/delarticle', 'Admin\ArticleController@delarticle');
//ajax删除商品表数据
Route::get('admin/delshops', 'Admin\ShopsController@delshops');


//前台首页路由
Route::resource('/home/index', 'Home\IndexController');
//友情链接
Route::get('/home/links', 'Home\IndexController@homelinks');
//申请友情链接
Route::post('/home/linkscheck', 'Home\IndexController@linkscheck');
//商品列表页
Route::get('/home/lists/{id}', 'Home\IndexController@lists');
//个人中心页面
Route::get('/home/center', 'Home\IndexController@homecenter');



//前台注册路由
Route::get('home/register', 'Home\RegisterController@index');
//验证码
Route::get('home/code', 'Home\RegisterController@code');
//发送验证码
Route::get('home/register/sendPhone', 'Home\RegisterController@sendPhone');
//验证手机号验证码
Route::post('home/register/store', 'Home\RegisterController@store');
//发送邮箱
Route::post('home/register/insert', 'Home\RegisterController@insert');
//激活邮箱
Route::get('home/register/changeStatus/{id}/{token}', 'Home\RegisterController@changeStatus');
//手机号校验
Route::get('/checkphone', 'Home\RegisterController@checkphone');
//邮箱校验
Route::get('/checkemail', 'Home\RegisterController@checkemail');
//验证码校验
Route::get('/checkcode', 'Home\RegisterController@checkcode');
//图片验证码校验
Route::get('/checkcodes', 'Home\RegisterController@checkcodes');







//前台登录
Route::get('home/login', 'Home\LoginController@index');
//执行前台登录
Route::post('home/login/dologin', 'Home\LoginController@dologin');
//执行前台退出登录
Route::get('home/login/outhomelogin', 'Home\LoginController@outhomelogin');
//加载忘记密码
Route::get('home/login/forgetindex', 'Home\LoginController@forgetindex');
//执行忘记密码找回操作
Route::post('home/login/doforget', 'Home\LoginController@doforget');
//重置密码
Route::get('home/login/resetpwdindex', 'Home\LoginController@resetpwdindex');
//执行密码找回
Route::post('home/login/doreset', 'Home\LoginController@doreset');
//邮箱激活校验
Route::get('/checkemailstatus', 'Home\LoginController@checkemailstatus');
//手机号登录校验
Route::get('/checkep', 'Home\LoginController@checkep');


//前台登录路由组
Route::group(['middleware' => 'homelogin'], function () {
    //购物车路由
    Route::resource('homecart', 'Home\CartController');
    //购物车商品全部删除
    Route::get('alldelete', 'Home\CartController@alldelete');
    //ajax实现商品数量加
    Route::get('cartjian','Home\CartController@cartjian');
    //ajax实现商品数量减
    Route::get('cartjia','Home\CartController@cartjia');
    //ajax实现商品单条删除
    Route::get('cartdel','Home\CartController@cartdel');
    //统计购买总数 和价格
    Route::get('cartcheck','Home\CartController@cartcheck');
    //全选按钮
    Route::get('allselect','Home\CartController@allselect');
    //ajax结算
    Route::get('jiesuan','Home\OrderController@jiesuan');
    //跳转到结算页路由
    Route::get('homeorder/insert','Home\OrderController@insert');
    //添加收货地址
    Route::post('addresss/insert','Home\AddressController@insert');
    //城市级联ajax请求
    Route::get('address','Home\AddressController@address');
    //切换收货地址
    Route::get('chooseadd','Home\AddressController@chooseadd');
    //下单操作 往订单表 和详情表 插数据
    Route::post('order/create','Home\OrderController@orderinsert');
    //支付成功 跳转页面
    Route::get('returnurl','Home\OrderController@returnurl');

});



