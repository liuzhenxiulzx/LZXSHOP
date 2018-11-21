<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>我的订单</title>
     <link rel="icon" href="/assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/css/pages-seckillOrder.css" />
</head>

<body>
    <!-- 头部栏位 -->
    <!--页面顶部-->
@extends('layout.head')


@section('content')

<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#service").hover(function(){
		$(".service").show();
	},function(){
		$(".service").hide();
	});
	$("#shopcar").hover(function(){
		$("#shopcarlist").show();
	},function(){
		$("#shopcarlist").hide();
	});

})
</script>
<script type="text/javascript" src="js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="js/widget/nav.js"></script>
</body>
    <!--header-->
    <div id="account">
        <div class="py-container">
            <div class="yui3-g home">
                <!--左侧列表-->
                <div class="yui3-u-1-6 list">

                    <div class="person-info">
                        <div class="person-photo"><img src="img/_/photo.png" alt=""></div>
                        <div class="person-account">
                            <span class="name">{{$userName}}</span>
                            <span class="safe"><a href="{{route('outlogin')}}">退出登录 </a></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="list-items">
                        <dl>
							<dt><i>·</i> 订单中心</dt>
							<dd ><a href="{{route('homeindex')}}"  class="list-active" >我的订单</a></dd>
							<dd><a href="{{route('pendingpay')}}" >待付款</a></dd>
							<dd><a href="{{route('pendingdelivery')}}"  >待发货</a></dd>
							<dd><a href="{{route('overgoods')}}" >待收货</a></dd>
							<dd><a href="{{route('evaluate')}}" >待评价</a></dd>
						</dl>
						<dl>
							<dt><i>·</i> 我的中心</dt>
							<dd><a href="home-person-collect.html">我的收藏</a></dd>
							<dd><a href="home-person-footmark.html">我的足迹</a></dd>
						</dl>
						<dl>
							<dt><i>·</i> 物流消息</dt>
						</dl>
						<dl>
							<dt><i>·</i> 设置</dt>
							<dd><a href="{{route('Personalinfo')}}">个人信息</a></dd>
							<dd><a href="{{route('Addressmanage')}}"  >地址管理</a></dd>
							<dd><a href="{{route('safety')}}" >安全管理</a></dd>
						</dl>
                    </div>
                </div>
                <!--右侧主内容-->
                <div class="yui3-u-5-6 order-pay">
                    <div class="body">
                        <div class="table-title">
                            <table class="sui-table  order-table">
                                <tr>
                                    <thead>
                                        <th width="35%">宝贝</th>
                                        <th width="5%">单价</th>
                                        <th width="5%">数量</th>
                                        <th width="8%">商品操作</th>
                                        <th width="10%">实付款</th>
                                        <th width="10%">交易状态</th>
                                        <th width="10%">交易操作</th>
                                    </thead>
                                </tr>
                            </table>
                        </div>
                        <div class="order-detail">
                            <div class="orders">
                                <!-- <div class="choose-order">
                                    <div class="sui-pagination pagination-large top-pages">
                                        <ul>
                                            <li class="prev disabled"><a href="#">上一页</a></li>

                                            <li class="next"><a href="#">下一页</a></li>
                                        </ul>
                                    </div>
                                </div> -->

                                <!--order1-->
                                @foreach($order as $v)
                          
                                <div class="choose-title">
                                    <label data-toggle="checkbox" class="checkbox-pretty ">
                                           <input type="checkbox" checked="checked"><span>{{$v->created_at}}　订单编号：{{$v->ordernum->ordernumber}}  店铺：哇哈哈 <a>和我联系</a></span>
                                     </label>
									  <a class="sui-btn btn-info share-btn">分享</a>
                                </div>
                                <table class="sui-table table-bordered order-datatable">
                                    <tbody>
                                        <tr>
                                            <td width="35%">
                                                <div class="typographic">
                                                    <img src="img/goods.png" />
                                                    <!-- <img src="{{ URL::asset('./uploads/'.$v->ordergoods->pro_image) }}" /> -->
                                                    <a href="#" class="block-text">包邮 {{$v->ordergoods->pro_title}}</a>
                                                    <span class="guige">规格：温泉喷雾150ml</span>
                                                </div>
                                            </td>
                                            <td width="5%" class="center">
                                                <ul class="unstyled">
                                                    <!-- <li class="o-price">¥{{$v->ordergoods->pro_image}}</li> -->
                                                    <li>¥{{$v->ordersku->price}}</li>
                                                </ul>
                                            </td>
                                            <td width="5%" class="center">{{$v->goodsCount}}</td>
                                            <td width="8%" class="center">
                                               
                                            </td>
                                            <td width="10%" class="center" >
                                                <ul class="unstyled">
                                                    <li>¥{{$v->ordersku->price*$v->goodsCount}}</li>
                                                    <!-- <li>（含运费：￥0.00）</li> -->
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                @if($v->order_state == 1)
                                                    <li>已退款</li>
                                                @elseif($v->order_state == 2)
                                                    <li>待发货</li>
                                                @elseif($v->order_state == 3)
                                                    <li>待收货</li>
                                                @elseif($v->order_state == 4)
                                                    <li>已签收</li>
                                                @elseif($v->order_state == 5)
                                                    <li>已退货</li>
                                                @endif
                                                    <li><a href="orderDetail.html" class="btn">订单详情 </a></li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                     <li>还剩4天23时</li>
                                                     @if($v->order_state == 2)
                                                     <li><a href="#" class="sui-btn btn-info">确认发货</a></li>
                                                     @elseif($v->order_state == 3)
                                                     <li><a href="#" class="sui-btn btn-info">确认收货</a></li>
                                                     @elseif($v->order_state == 4)
                                                     <li><a href="#" class="sui-btn btn-info">确认签收</a></li>
                                                     @endif
                                                </ul>
                                            </td>
                                        </tr>
                                        

                                    </tbody>
                                </table>
                                @endforeach


                            </div>
                            <div class="choose-order">
                                <div class="sui-pagination pagination-large top-pages">
                                    <ul>
                                        <li class="prev disabled"><a href="#">«上一页</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li class="dotted"><span>...</span></li>
                                        <li class="next"><a href="#">下一页»</a></li>
                                    </ul>
                                    <div><span>共10页&nbsp;</span><span>
                                            到
                                            <input type="text" class="page-num"><button class="page-confirm" onclick="alert(1)">确定</button>
                                            页</span></div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>

                        <div class="like-title">
                            <div class="mt">
                                <span class="fl"><strong>热卖单品</strong></span>
                            </div>
                        </div>
                        <div class="like-list">
                            <ul class="yui3-g">
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="img/_/itemlike01.png" />
                                        </div>
                                        <div class="attr">
                                            <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                                        </div>
                                        <div class="price">
                                            <strong>
											<em>¥</em>
											<i>3699.00</i>
										</strong>
                                        </div>
                                        <div class="commit">
                                            <i class="command">已有6人评价</i>
                                        </div>
                                    </div>
                                </li>
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="img/_/itemlike02.png" />
                                        </div>
                                        <div class="attr">
                                            <em>Apple苹果iPhone 6s/6s Plus 16G 64G 128G</em>
                                        </div>
                                        <div class="price">
                                            <strong>
											<em>¥</em>
											<i>4388.00</i>
										</strong>
                                        </div>
                                        <div class="commit">
                                            <i class="command">已有700人评价</i>
                                        </div>
                                    </div>
                                </li>
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="img/_/itemlike03.png" />
                                        </div>
                                        <div class="attr">
                                            <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                                        </div>
                                        <div class="price">
                                            <strong>
											<em>¥</em>
											<i>4088.00</i>
										</strong>
                                        </div>
                                        <div class="commit">
                                            <i class="command">已有700人评价</i>
                                        </div>
                                    </div>
                                </li>
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="img/_/itemlike04.png" />
                                        </div>
                                        <div class="attr">
                                            <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                                        </div>
                                        <div class="price">
                                            <strong>
											<em>¥</em>
											<i>4088.00</i>
										</strong>
                                        </div>
                                        <div class="commit">
                                            <i class="command">已有700人评价</i>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 底部栏位 -->
    <!--页面底部-->
    @endsection

<!--页面底部END-->


</html>