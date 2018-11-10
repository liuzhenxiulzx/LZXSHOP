<?php


// 注册
Route::get('/regist','RegisterController@register')->name('regist');
Route::post('/doregist','RegisterController@doregister')->name('doregist');
//手机验证码
Route::get('/sendcode','RegisterController@sendcode')->name('sendcode'); //手机验证码
// 登录
Route::get('/login','LoginController@login')->name('login');
Route::post('/dologin','LoginController@dologin')->name('dologin');


    Route::middleware(['Reception'])->group(function(){
        
Route::get('/outlogin','LoginController@outlogin')->name('outlogin'); //退出登录
Route::get('/','IndexController@index')->name('index');// 前台首页
Route::get('/classify','ClassifyController@show')->name('classify');// 分类

Route::get('/detail/{id}','DetailController@Detail')->name('detail');// 商品选择详情页
Route::post('/dodetail','DetailController@dodetail')->name('dodetail');
Route::get('/product_details/{id}','ProductController@Index')->name('pro_details');// 商品详情页

Route::get('/cart','CartController@Cart')->name('cart');// 购物车
Route::post('/detail','DetailController@addgoods')->name('addgoods'); 
Route::get('/delcart','DetailController@delcart')->name('delcart');  //购物车删除商品

// ===========支付类==============
// 结算页
Route::get('/balance','BalanceController@balance')->name('balance');
Route::post('/dobalance','BalanceController@dobalance')->name('dobalance');
Route::get('/order','BalanceController@order')->name('order'); //生成订单
Route::post('/address','BalanceController@address')->name('address'); //结算页添加收货地址
Route::get('/showadress','BalanceController@showadress')->name('showadress'); //结算页添加收货地址

// 支付页
Route::get('/payindex','AlipayController@index')->name('payindex');// 扫码支付页
Route::get('alipay','AlipayController@pay')->name('pay');//支付宝支付处理
Route::get('alipayreturn','AlipayController@result')->name('result');//支付后跳转页面
Route::post('notify','AlipayController@notify')->name('notify');// 通知地址


// =================个人中心====================
// 订单中心
Route::get('homeindex','PersonalController@homeindex')->name('homeindex');  //个人中心首页
Route::get('pendingpay','PersonalController@pendingpay')->name('pendingpay');  //待付款
Route::get('pendingdelivery','PersonalController@pendingdelivery')->name('pendingdelivery');  //待发货
Route::get('overgoods','PersonalController@overgoods')->name('overgoods');  //待收货
Route::get('evaluate','PersonalController@evaluate')->name('evaluate');  //待评价

// 设置
Route::get('Personalinfo','SetupController@Personalinfo')->name('Personalinfo');   //个人信息
Route::get('Addressmanage','SetupController@Addressmanage')->name('Addressmanage');   //地址管理
Route::get('safety','SetupController@safety')->name('safety');   //安全管理



});

// ==================后台=======================
// 后台登录
Route::get('/Admin/rbaclogin','Admin_LoginController@rbaclogin')->name('Adminrbaclogin'); //后台登录
Route::post('/Admin/dorbaclogin','Admin_LoginController@dorbaclogin')->name('Admindorbaclogin'); //后台登录
Route::get('/Admin/rbacregist','Admin_LoginController@rbacregist')->name('Adminrbacregist'); //后台注册
Route::post('/Admin/dorbacregist','Admin_LoginController@dorbacregist')->name('Admindorbacregist'); //后台注册
//手机验证码
Route::get('/Admin/sendcode','Admin_LoginController@Adminsendcode')->name('Adminsendcode'); //手机验证码
Route::get('/Admin/testMail','Admin_LoginController@AdmintestMail')->name('AdmintestMail'); //邮箱验证码

    Route::middleware(['Adminlogin'])->group(function(){
        
Route::get('/Admin/index','Admin_IndexController@Index')->name('AdminIndex');
Route::get('/Admin/home','Admin_IndexController@Home')->name('Adminhome');
// 产品管理模块
Route::get('/Admin/product','Admin_ProductController@Index')->name('Adminproduct');
Route::get('/Admin/addproduct','Admin_ProductController@addpro')->name('addproduct');// 添加产品
Route::post('/Admin/doaddproduct','Admin_ProductController@doaddpro')->name('doaddproduct');// 添加产品
Route::get('/Admin/editpro/{id}','Admin_EditproductController@editpro')->name('editproduct');// 修改产品
Route::post('/Admin/doeditpro/{id}','Admin_EditproductController@doeditpro')->name('doeditproduct');// 修改产品
Route::get('/Admin/delteproduct/{id}','Admin_EditproductController@delteproduct')->name('delteproduct');// 删除产品

Route::get('/Admin/addsku/{id}','Admin_SpecController@index')->name('Adminaddsku'); //sku添加
Route::post('/Admin/doaddsku/{id}','Admin_SpecController@dosku')->name('Admindoaddsku'); //sku添加
Route::post('/Admin/addspec','Admin_SpecController@spec')->name('Adminaddspec'); //添加规格
Route::post('/Admin/addspecval','Admin_SpecController@specval')->name('Adminaddspecval'); //添加规格值

Route::get('/Admin/category','Admin_CategoryController@Index')->name('Admincategory');
Route::get('/Admin/categoryadd','Admin_CategoryController@add')->name('Admincategoryadd');
Route::get('/Admin/addclass1/{id}','Admin_CategoryController@ajax_get_cat1')->name('Adminclass'); //三级联动
Route::get('/Admin/addclass2/{id}','Admin_CategoryController@ajax_get_cat2')->name('Adminclass'); //三级联动
Route::post('/Admin/docategoryadd','Admin_CategoryController@doadd')->name('doAdmincategoryadd'); //添加分类
// Route::get('/Admin/editcategory','Admin_CategoryController@editcate')->name('Admineditcate'); // 修改分类
// Route::post('/Admin/doeditcategory','Admin_CategoryController@doeditcate')->name('Admindoeditcate'); // 修改分类
// Route::get('/Admin/delcate','Admin_CategoryController@delcate')->name('Admindelcate'); //删除分类

Route::get('/Admin/brand','Admin_BrandController@Index')->name('Adminbrand');
Route::get('/Admin/brandadd','Admin_BrandController@addBrand')->name('addbrand'); // 添加品牌
Route::post('/Admin/dobrandadd','Admin_BrandController@doaddBrand')->name('doaddbrand'); // 添加品牌提交
Route::get('/Admin/editbrand/{id}','Admin_EditbrandController@editbrand')->name('editbrand'); // 修改品牌
Route::post('/Admin/doeditbrand/{id}','Admin_EditbrandController@doeditbrand')->name('doeditbrand'); // 修改品牌
Route::get('/Admin/deletebrand/{id}','Admin_EditbrandController@deletebrand')->name('deletebrand'); // 删除品牌

// 会员模块
Route::get('/Admin/viplist','Admin_ViplistController@Index')->name('AdminvipIndex');//会员列表
Route::get('/Admin/addvip','Admin_ViplistController@addvip')->name('Adminaddvip');//添加会员
Route::post('/Admin/doaddvip','Admin_ViplistController@doaddvip')->name('Admindoaddvip');//添加会员
Route::get('/Admin/editvip/{id}','Admin_ViplistController@editvip')->name('Admineditvip');//修改会员
Route::post('/Admin/doeditvip/{id}','Admin_ViplistController@doeditvip')->name('Admindoeditvip');//修改会员
Route::get('/Admin/delectvip/{id}','Admin_ViplistController@delectvip')->name('Admindelectvip');//删除会员

Route::get('/Admin/grade','Admin_VipGradeController@Index')->name('Admingrade');//等级管理
Route::get('/Admin/record','Admin_VipRecordController@Index')->name('Adminrecord');//会员记录

// 图片模块
Route::get('Admin/image','Admin_ImageController@Index')->name('AdminImage'); //广告管理
Route::get('Admin/addadvert','Admin_ImageController@addadvert')->name('addadvert'); //添加广告管理图
Route::post('Admin/doaddadvert','Admin_ImageController@doaddadvert')->name('doaddadvert'); //添加告管理图
Route::get('Admin/editadvert/{id}','Admin_ImageController@editadvert')->name('editadvert'); //修改广告管理图
Route::post('Admin/doeditadvert/{id}','Admin_ImageController@doeditadvert')->name('doeditadvert'); //修改广告管理图
Route::get('Admin/delectadvert/{id}','Admin_ImageController@delectadvert')->name('delectadvert'); //删除广告管理图

Route::get('Admin/Imgclass','Admin_ImageController@Imgclass')->name('AdminImgclass'); //广告分类管理
Route::get('Admin/addImageclass','Admin_ImageController@addImgclass')->name('AdminaddImageclass'); //添加广告分类
Route::post('Admin/doaddImageclass','Admin_ImageController@doaddImageclass')->name('doaddImageclass'); //添加广告分类
Route::get('Admin/editImgcate/{id}','Admin_ImageController@editImgcate')->name('editImgcate'); //修改广告分类
Route::post('Admin/doeditImgcate/{id}','Admin_ImageController@doeditImgcate')->name('doeditImgcate'); //修改广告分类
Route::get('Admin/delectImgcate/{id}','Admin_ImageController@delectImgcate')->name('delectImgcate'); //删除广告分类


// 文章模块
Route::get('Admin/bloglist','Admin_BlogController@Bloglist')->name('Adminbloglist'); //文章列表
Route::get('Admin/addblog','Admin_BlogController@addblog')->name('Adminaddblog'); //添加文章
Route::post('Admin/doaddblog','Admin_BlogController@doaddblog')->name('doaddblog'); //添加文章
Route::get('Admin/editblogs/{id}','Admin_BlogController@editblogs')->name('editblog'); //修改文章
Route::post('Admin/doeditblog/{id}','Admin_BlogController@doeditblog')->name('doeditblog'); //修改文章
Route::get('Admin/deltblog/{id}','Admin_BlogController@deltblog')->name('deltblog'); //删除文章


Route::get('Admin/blogcate','Admin_BlogController@Blogcate')->name('Adminblogcate'); //文章分类
Route::get('Admin/addblogcate','Admin_BlogController@addBlogcate')->name('Adminaddblogcate'); //添加文章分类
Route::post('Admin/doaddblogcate','Admin_BlogController@doaddBlogcate')->name('Admindoaddblogcate'); //添加文章分类
Route::get('Admin/editblogcate/{id}','Admin_BlogController@editBlogcate')->name('Admineditblogcate'); //修改文章分类
Route::post('Admin/doeditblogcate/{id}','Admin_BlogController@doeditBlogcate')->name('doAdmineditblogcate'); //修改文章分类
Route::get('Admin/deletblogcate/{id}','Admin_BlogController@deletblogcate')->name('Admindeletblogcate'); //删除文章分类

//RBAC
Route::get('/Admin/power','Admin_PowerController@power')->name('Adminpower'); //权限
Route::get('/Admin/addpower','Admin_PowerController@addpower')->name('addpower'); //权限添加
Route::post('/Admin/doaddpower','Admin_PowerController@doaddpower')->name('doaddpower'); //权限添加
Route::get('/Admin/editpower/{id}','Admin_PowerController@editpower')->name('editpower'); //权限修改
Route::post('/Admin/doeditpower/{id}','Admin_PowerController@doeditpower')->name('doeditpower'); //权限修改
Route::get('/Admin/delpower/{id}','Admin_PowerController@delpower')->name('delpower'); //权限删除

Route::get('/Admin/manager','Admin_ManagerController@manager')->name('Adminmanager'); //管理员
Route::get('/Admin/addmanager','Admin_ManagerController@addmanager')->name('Adminaddmanager'); //添加管理员
Route::post('/Admin/doaddmanager','Admin_ManagerController@doaddmanager')->name('Admindoaddmanager'); //添加管理员
Route::get('/Admin/editmanager/{id}','Admin_ManagerController@editmanager')->name('Admineditmanager'); //修改管理员
Route::post('/Admin/doeditmanager/{id}','Admin_ManagerController@doeditmanager')->name('Admindoeditmanager'); //修改管理员
Route::get('/Admin/delmanager/{id}','Admin_ManagerController@delmanager')->name('Admindelmanager');  //删除管理员


// 交易管理
Route::get('/Admin/trade','Admin_TradeController@trade')->name('Admintrade'); //交易信息
Route::get('/Admin/orderimg','Admin_TradeController@orderimg')->name('Adminorderimg'); //交易订单图
Route::get('/Admin/trademoney','Admin_TradeController@trademoney')->name('Admintrademoney'); //交易金额

Route::get('/Admin/ordermanage','Admin_OrderController@ordermanage')->name('ordermanage');  //订单管理
Route::get('/Admin/orderprocess','Admin_OrderController@orderprocess')->name('orderprocess');  //订单处理
Route::get('/Admin/orderdetails','Admin_OrderController@orderdetails')->name('orderdetails');  //订单详情
Route::get('/Admin/refund','Admin_OrderController@refund')->name('refund');  //退款管理








});