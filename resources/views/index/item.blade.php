<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>产品详情页</title>
	<!-- <link rel="icon" href="/assets/img/favicon.ico"> -->

	<link rel="stylesheet" type="text/css" href="/css/webbase.css" />
	<link rel="stylesheet" type="text/css" href="/css/pages-item.css" />
	<link rel="stylesheet" type="text/css" href="/css/pages-zoom.css" />
	<link rel="stylesheet" type="text/css" href="/css/widget-cartPanelView.css" />
</head>

<body>

	<!--页面顶部 开始-->
	<div id="nav-bottom">
		<!--顶部-->
		<div class="nav-top">
			<div class="top">
				<div class="py-container">
					<div class="shortcut">
						<ul class="fl">
							<li class="f-item">品优购欢迎您！</li>
							<li class="f-item">请<a href="login.html" target="_blank">登录</a>　<span><a href="register.html" target="_blank">免费注册</a></span></li>
						</ul>
						<ul class="fr">
							<li class="f-item">我的订单</li>
							<li class="f-item space"></li>
							<li class="f-item"><a href="home.html" target="_blank">我的品优购</a></li>
							<li class="f-item space"></li>
							<li class="f-item">品优购会员</li>
							<li class="f-item space"></li>
							<li class="f-item">企业采购</li>
							<li class="f-item space"></li>
							<li class="f-item">关注品优购</li>
							<li class="f-item space"></li>
							<li class="f-item" id="service">
								<span>客户服务</span>
								<ul class="service">
									<li><a href="cooperation.html" target="_blank">合作招商</a></li>
									<li><a href="shoplogin.html" target="_blank">商家后台</a></li>
									<li><a href="cooperation.html" target="_blank">合作招商</a></li>
									<li><a href="#">商家后台</a></li>
								</ul>
							</li>
							<li class="f-item space"></li>
							<li class="f-item">网站导航</li>
						</ul>
					</div>
				</div>
			</div>

			<!--头部-->
			<div class="header">
				<div class="py-container">
					<div class="yui3-g Logo">
						<div class="yui3-u Left logoArea">
							<a class="logo-bd" title="品优购" href="JD-index.html" target="_blank"></a>
						</div>
						<div class="yui3-u Center searchArea">
							<div class="search">
								<form action="" class="sui-form form-inline">
									<!--searchAutoComplete-->
									<div class="input-append">
										<input type="text" id="autocomplete" type="text" class="input-error input-xxlarge" />
										<button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
									</div>
								</form>
							</div>
							<div class="hotwords">
								<ul>
									<li class="f-item">品优购首发</li>
									<li class="f-item">亿元优惠</li>
									<li class="f-item">9.9元团购</li>
									<li class="f-item">每满99减30</li>
									<li class="f-item">亿元优惠</li>
									<li class="f-item">9.9元团购</li>
									<li class="f-item">办公用品</li>

								</ul>
							</div>
						</div>
						<div class="yui3-u Right shopArea">
							<div class="fr shopcar">
								<div class="show-shopcar" id="shopcar">
									<span class="car"></span>
									<a class="sui-btn btn-default btn-xlarge" href="{{route('cart')}}" target="_blank">
										<span>我的购物车</span>
										<i class="shopnum">{{$cartcount}}</i>
									</a>
									@if($cartcount==0)
										<div class="clearfix shopcarlist" id="shopcarlist" style="display:none">
										<p>"啊哦，你的购物车还没有商品哦！"</p>
										</div>
									@endif
									
								</div>
							</div>
						</div>
					</div>

					<div class="yui3-g NavList">
						<div class="yui3-u Left all-sort">
							<h4>全部商品分类</h4>
						</div>
						<div class="yui3-u Center navArea">
							<ul class="nav">
								<li class="f-item">服装城</li>
								<li class="f-item">美妆馆</li>
								<li class="f-item">品优超市</li>
								<li class="f-item">全球购</li>
								<li class="f-item">闪购</li>
								<li class="f-item">团购</li>
								<li class="f-item">有趣</li>
								<li class="f-item"><a href="seckill-index.html" target="_blank">秒杀</a></li>
							</ul>
						</div>
						<div class="yui3-u Right"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--页面顶部 结束-->
	<div class="py-container">
		<div id="item">
			<div class="crumb-wrap">
				<ul class="sui-breadcrumb">
					<li>
						<a href="#">手机、数码、通讯</a>
					</li>
					<li>
						<a href="#">手机</a>
					</li>
					<li>
						<a href="#">Apple苹果</a>
					</li>
					<li class="active">iphone 6S系类</li>
				</ul>
			</div>
			<!--product-info-->
	
			<div class="product-info">
				<div class="fl preview-wrap">
					<!--放大镜效果-->
					<div class="zoom">
						<!--默认第一个预览-->
						<div id="preview" class="spec-preview">
							<span class="jqzoom"><img jqimg="/img/_/b1.png" src="/img/_/s1.png" /></span>
						</div>
						<!--下方的缩略图-->
						<div class="spec-scroll">
							<a class="prev">&lt;</a>
							<!--左右按钮-->
							<div class="items">
								<ul>
									<li><img src="/img/_/s1.png" bimg="/img/_/b1.png" onmousemove="preview(this)" /></li>
									<li><img src="/img/_/s2.png" bimg="/img/_/b2.png" onmousemove="preview(this)" /></li>
									<li><img src="/img/_/s3.png" bimg="/img/_/b3.png" onmousemove="preview(this)" /></li>
									<li><img src="/img/_/s1.png" bimg="/img/_/b1.png" onmousemove="preview(this)" /></li>
									<li><img src="/img/_/s2.png" bimg="/img/_/b2.png" onmousemove="preview(this)" /></li>
									<li><img src="/img/_/s3.png" bimg="/img/_/b3.png" onmousemove="preview(this)" /></li>
									<li><img src="/img/_/s1.png" bimg="/img/_/b1.png" onmousemove="preview(this)" /></li>
									<li><img src="/img/_/s2.png" bimg="/img/_/b2.png" onmousemove="preview(this)" /></li>
									<li><img src="/img/_/s3.png" bimg="/img/_/b3.png" onmousemove="preview(this)" /></li>
								</ul>
							</div>
							<a class="next">&gt;</a>
						</div>
					</div>
				</div>
	
				<div class="fr itemInfo-wrap">
					<div class="sku-name">
						<h4>v{goodsAll.pro_title}</h4>
					</div>
					<div class="news"><span>v{goodsAll.brief_title}</span></div>
					<div class="summary">
						<div class="summary-wrap">
							<div class="fl title">
								<i>价　格</i>
							</div>
							<div class="fl price">
								<i>¥</i>
								<em>v{curSkuInfo.price}</em>
								<span>降价通知</span>
							</div>
							<div class="fr remark">
								<i>累计评价</i><em>612188</em>
							</div>
						</div>
						<div class="summary-wrap">
							<div class="fl title">
								<i>促　　销</i>
							</div>
							<div class="fl fix-width">
								<i class="red-bg">加价购</i>
								<em class="t-gray">v{goodsAll.promotion}
								</em>
							</div>
						</div>
					</div>
					<div class="support">
						<div class="summary-wrap">
							<div class="fl title">
								<i>支　　持</i>
							</div>
							<div class="fl fix-width">
								<em class="t-gray">以旧换新，闲置手机回收 4G套餐超值抢 礼品购</em>
							</div>
						</div>
					</div>


					<div class="clearfix choose">
						<div id="specification" class="summary-wrap clearfix">
							<dl class='suibian' v-for="(attr,k) in goodspec">
								<dt>
								
									<div class="fl title">
										<i>v{attr.spec_name}</i>
									</div>
									
								</dt>
								<dd v-bind:k="k" v-for="(val,key) in attr.vals">
										<!-- onclick="lzx(event)" -->
									<a  :id="'val_'+val.id" v-bind:key="key" @click="dianji(k,attr,val.id)"  :value="val.id" v-bind:class="{ selected: (attr['selt']==val.id)}"  >v{val.spec_val}
										<span title="点击取消选择">&nbsp;</span>
									</a>
									
								</dd>
																
							</dl>
							
								
							
						
						</div>

						<div class="summary-wrap">
							<div class="fl title">
								<div class="control-group">
									<div class="controls">
										<input autocomplete="off" type="text" value="1" minnum="1" v-model="goodsCount" class="itxt"/>
										<a href="javascript:void(0)" @click="plus" class="increment plus">+</a>
										<a href="javascript:void(0)" @click="mins" class="increment mins">-</a>
									</div>
								</div>
							</div>
							<div class="fl">
								<ul class="btn-choose unstyled">
									<li>
										<button class="sui-btn  btn-danger addshopcar" id="shop_cart" @click="addToCar" type="submit"><i class="icon-save "></i>加入购物车</button>
										<!-- <a  @click="addToCar" class="sui-btn  btn-danger addshopcar" id="shop_cart">加入购物车</a> -->
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--product-detail-->
			<div class="clearfix product-detail">
				<div class="fl aside">
					<ul class="sui-nav nav-tabs tab-wraped">
						<li class="active">
							<a href="#index" data-toggle="tab">
								<span>相关分类</span>
							</a>
						</li>
						<li>
							<a href="#profile" data-toggle="tab">
								<span>推荐品牌</span>
							</a>
						</li>
					</ul>
					<div class="tab-content tab-wraped">
						<div id="index" class="tab-pane active">
							<ul class="part-list unstyled">
								<li>手机</li>
								<li>手机壳</li>
								<li>内存卡</li>
								<li>Iphone配件</li>
								<li>贴膜</li>
								<li>手机耳机</li>
								<li>移动电源</li>
								<li>平板电脑</li>
							</ul>
							<ul class="goods-list unstyled">
								<li>
									<div class="list-wrap">
										<div class="p-img">
											<img src="/img/_/part01.png" />
										</div>
										<div class="attr">
											<em>Apple苹果iPhone 6s (A1699)</em>
										</div>
										<div class="price">
											<strong>
												<em>¥</em>
												<i>6088.00</i>
											</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
										</div>
									</div>
								</li>
								<li>
									<div class="list-wrap">
										<div class="p-img">
											<img src="/img/_/part02.png" />
										</div>
										<div class="attr">
											<em>Apple苹果iPhone 6s (A1699)</em>
										</div>
										<div class="price">
											<strong>
												<em>¥</em>
												<i>6088.00</i>
											</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
										</div>
									</div>
								</li>
								<li>
									<div class="list-wrap">
										<div class="p-img">
											<img src="/img/_/part03.png" />
										</div>
										<div class="attr">
											<em>Apple苹果iPhone 6s (A1699)</em>
										</div>
										<div class="price">
											<strong>
												<em>¥</em>
												<i>6088.00</i>
											</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
										</div>
									</div>
									<div class="list-wrap">
										<div class="p-img">
											<img src="/img/_/part02.png" />
										</div>
										<div class="attr">
											<em>Apple苹果iPhone 6s (A1699)</em>
										</div>
										<div class="price">
											<strong>
												<em>¥</em>
												<i>6088.00</i>
											</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
										</div>
									</div>
									<div class="list-wrap">
										<div class="p-img">
											<img src="/img/_/part03.png" />
										</div>
										<div class="attr">
											<em>Apple苹果iPhone 6s (A1699)</em>
										</div>
										<div class="price">
											<strong>
												<em>¥</em>
												<i>6088.00</i>
											</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div id="profile" class="tab-pane">
							<p>推荐品牌</p>
						</div>
					</div>
				</div>
				<div class="fr detail">
					<div class="clearfix fitting">
						<h4 class="kt">选择搭配</h4>
						<div class="good-suits">
							<div class="fl master">
								<div class="list-wrap">
									<div class="p-img">
										<img src="/img/_/l-m01.png" />
									</div>
									<em>￥5299</em>
									<i>+</i>
								</div>
							</div>
							<div class="fl suits">
								<ul class="suit-list">
									<li class="">
										<div id="">
											<img src="/img/_/dp01.png" />
										</div>
										<i>Feless费勒斯VR</i>
										<label data-toggle="checkbox" class="checkbox-pretty">
											<input type="checkbox"><span>39</span>
										</label>
									</li>
									<li class="">
										<div id=""><img src="/img/_/dp02.png" /> </div>
										<i>Feless费勒斯VR</i>
										<label data-toggle="checkbox" class="checkbox-pretty">
											<input type="checkbox"><span>50</span>
										</label>
									</li>
									<li class="">
										<div id=""><img src="/img/_/dp03.png" /></div>
										<i>Feless费勒斯VR</i>
										<label data-toggle="checkbox" class="checkbox-pretty">
											<input type="checkbox"><span>59</span>
										</label>
									</li>
									<li class="">
										<div id=""><img src="/img/_/dp04.png" /></div>
										<i>Feless费勒斯VR</i>
										<label data-toggle="checkbox" class="checkbox-pretty">
											<input type="checkbox"><span>99</span>
										</label>
									</li>
								</ul>
							</div>
							<div class="fr result">
								<div class="num">已选购0件商品</div>
								<div class="price-tit"><strong>套餐价</strong></div>
								<div class="price">￥5299</div>
								<button class="sui-btn  btn-danger addshopcar">加入购物车</button>
							</div>
						</div>
					</div>
					<div class="tab-main intro">
						<ul class="sui-nav nav-tabs tab-wraped">
							<li class="active">
								<a href="#one" data-toggle="tab">
									<span>商品介绍</span>
								</a>
							</li>
							<li>
								<a href="#two" data-toggle="tab">
									<span>规格与包装</span>
								</a>
							</li>
							<li>
								<a href="#three" data-toggle="tab">
									<span>售后保障</span>
								</a>
							</li>
							<li>
								<a href="#four" data-toggle="tab">
									<span>商品评价</span>
								</a>
							</li>
							<li>
								<a href="#five" data-toggle="tab">
									<span>手机社区</span>
								</a>
							</li>
						</ul>
						<div class="clearfix"></div>
						<div class="tab-content tab-wraped">
							<div id="one" class="tab-pane active">
								<ul class="goods-intro unstyled">
									<li>分辨率：1920*1080(FHD)</li>
									<li>后置摄像头：1200万像素</li>
									<li>前置摄像头：500万像素</li>
									<li>核 数：其他</li>
									<li>频 率：以官网信息为准</li>
									<li>品牌： Apple</li>
									<li>商品名称：APPLEiPhone 6s Plus</li>
									<li>商品编号：1861098</li>
									<li>商品毛重：0.51kg</li>
									<li>商品产地：中国大陆</li>
									<li>热点：指纹识别，Apple Pay，金属机身，拍照神器</li>
									<li>系统：苹果（IOS）</li>
									<li>像素：1000-1600万</li>
									<li>机身内存：64GB</li>
								</ul>
								<div class="intro-detail">
									<img src="/img/_/intro01.png" />
									<img src="/img/_/intro02.png" />
									<img src="/img/_/intro03.png" />
								</div>
							</div>
							<div id="two" class="tab-pane">
								<p>规格与包装</p>
							</div>
							<div id="three" class="tab-pane">
								<p>售后保障</p>
							</div>
							<div id="four" class="tab-pane">
								<p>商品评价</p>
							</div>
							<div id="five" class="tab-pane">
								<p>手机社区</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--like-->
			<div class="clearfix"></div>
			<div class="like">
				<h4 class="kt">猜你喜欢</h4>
				<div class="like-list">
					<ul class="yui3-g">
						<li class="yui3-u-1-6">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/img/_/itemlike01.png" />
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
						<li class="yui3-u-1-6">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/img/_/itemlike02.png" />
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
						<li class="yui3-u-1-6">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/img/_/itemlike03.png" />
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
						<li class="yui3-u-1-6">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/img/_/itemlike04.png" />
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
						<li class="yui3-u-1-6">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/img/_/itemlike05.png" />
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
						<li class="yui3-u-1-6">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/img/_/itemlike06.png" />
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
	<!-- 底部栏位 -->

	<!--页面底部  开始 -->
	<div class="clearfix footer">
		<div class="py-container">
			<div class="footlink">
				<div class="Mod-service">
					<ul class="Mod-Service-list">
						<li class="grid-service-item intro  intro1">

							<i class="serivce-item fl"></i>
							<div class="service-text">
								<h4>正品保障</h4>
								<p>正品保障，提供发票</p>
							</div>

						</li>
						<li class="grid-service-item  intro intro2">

							<i class="serivce-item fl"></i>
							<div class="service-text">
								<h4>正品保障</h4>
								<p>正品保障，提供发票</p>
							</div>

						</li>
						<li class="grid-service-item intro  intro3">

							<i class="serivce-item fl"></i>
							<div class="service-text">
								<h4>正品保障</h4>
								<p>正品保障，提供发票</p>
							</div>

						</li>
						<li class="grid-service-item  intro intro4">

							<i class="serivce-item fl"></i>
							<div class="service-text">
								<h4>正品保障</h4>
								<p>正品保障，提供发票</p>
							</div>

						</li>
						<li class="grid-service-item intro intro5">

							<i class="serivce-item fl"></i>
							<div class="service-text">
								<h4>正品保障</h4>
								<p>正品保障，提供发票</p>
							</div>

						</li>
					</ul>
				</div>
				<div class="clearfix Mod-list">
					<div class="yui3-g">
						<div class="yui3-u-1-6">
							<h4>购物指南</h4>
							<ul class="unstyled">
								<li>购物流程</li>
								<li>会员介绍</li>
								<li>生活旅行/团购</li>
								<li>常见问题</li>
								<li>购物指南</li>
							</ul>

						</div>
						<div class="yui3-u-1-6">
							<h4>配送方式</h4>
							<ul class="unstyled">
								<li>上门自提</li>
								<li>211限时达</li>
								<li>配送服务查询</li>
								<li>配送费收取标准</li>
								<li>海外配送</li>
							</ul>
						</div>
						<div class="yui3-u-1-6">
							<h4>支付方式</h4>
							<ul class="unstyled">
								<li>货到付款</li>
								<li>在线支付</li>
								<li>分期付款</li>
								<li>邮局汇款</li>
								<li>公司转账</li>
							</ul>
						</div>
						<div class="yui3-u-1-6">
							<h4>售后服务</h4>
							<ul class="unstyled">
								<li>售后政策</li>
								<li>价格保护</li>
								<li>退款说明</li>
								<li>返修/退换货</li>
								<li>取消订单</li>
							</ul>
						</div>
						<div class="yui3-u-1-6">
							<h4>特色服务</h4>
							<ul class="unstyled">
								<li>夺宝岛</li>
								<li>DIY装机</li>
								<li>延保服务</li>
								<li>品优购E卡</li>
								<li>品优购通信</li>
							</ul>
						</div>
						<div class="yui3-u-1-6">
							<h4>帮助中心</h4>
							<img src="/img/wx_cz.jpg">
						</div>
					</div>
				</div>
				<div class="Mod-copyright">
					<ul class="helpLink">
						<li>关于我们<span class="space"></span></li>
						<li>联系我们<span class="space"></span></li>
						<li>关于我们<span class="space"></span></li>
						<li>商家入驻<span class="space"></span></li>
						<li>营销中心<span class="space"></span></li>
						<li>友情链接<span class="space"></span></li>
						<li>关于我们<span class="space"></span></li>
						<li>营销中心<span class="space"></span></li>
						<li>友情链接<span class="space"></span></li>
						<li>关于我们</li>
					</ul>
					<p>地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</p>
					<p>京ICP备08001421号京公网安备110108007702</p>
				</div>
			</div>
		</div>
	</div>


	<!--侧栏面板开始-->
	<div class="J-global-toolbar">
		<div class="toolbar-wrap J-wrap">
			<div class="toolbar">
				<div class="toolbar-panels J-panel">

					<!-- 购物车 -->
					<div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-cart toolbar-animate-out">
						<h3 class="tbar-panel-header J-panel-header">
							<a href="" class="title"><i></i><em class="title">购物车</em></a>
							<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('cart');"></span>
						</h3>
						<div class="tbar-panel-main">
							<div class="tbar-panel-content J-panel-content">
								<div id="J-cart-tips" class="tbar-tipbox hide">
									<div class="tip-inner">
										<span class="tip-text">还没有登录，登录后商品将被保存</span>
										<a href="#none" class="tip-btn J-login">登录</a>
									</div>
								</div>
								<div id="J-cart-render">
									<!-- 列表 -->
									<div id="cart-list" class="tbar-cart-list">
									</div>
								</div>
							</div>
						</div>
						<!-- 小计 -->
						<div id="cart-footer" class="tbar-panel-footer J-panel-footer">
							<div class="tbar-checkout">
								<div class="jtc-number"> <strong class="J-count" id="cart-number">0</strong>件商品 </div>
								<div class="jtc-sum"> 共计：<strong class="J-total" id="cart-sum">¥0</strong> </div>
								<a class="jtc-btn J-btn" href="#none" target="_blank">去购物车结算</a>
							</div>
						</div>
					</div>

					<!-- 我的关注 -->
					<div style="visibility: hidden;" data-name="follow" class="J-content toolbar-panel tbar-panel-follow">
						<h3 class="tbar-panel-header J-panel-header">
							<a href="#" target="_blank" class="title"> <i></i> <em class="title">我的关注</em> </a>
							<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('follow');"></span>
						</h3>
						<div class="tbar-panel-main">
							<div class="tbar-panel-content J-panel-content">
								<div class="tbar-tipbox2">
									<div class="tip-inner"> <i class="i-loading"></i> </div>
								</div>
							</div>
						</div>
						<div class="tbar-panel-footer J-panel-footer"></div>
					</div>

					<!-- 我的足迹 -->
					<div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-history toolbar-animate-in">
						<h3 class="tbar-panel-header J-panel-header">
							<a href="#" target="_blank" class="title"> <i></i> <em class="title">我的足迹</em> </a>
							<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('history');"></span>
						</h3>
						<div class="tbar-panel-main">
							<div class="tbar-panel-content J-panel-content">
								<div class="jt-history-wrap">
									<ul>
										<!--<li class="jth-item">
										<a href="#" class="img-wrap"> <img src=".portal/img/like_03.png" height="100" width="100" /> </a>
										<a class="add-cart-button" href="#" target="_blank">加入购物车</a>
										<a href="#" target="_blank" class="price">￥498.00</a>
									</li>
									<li class="jth-item">
										<a href="#" class="img-wrap"> <img src="portal/img/like_02.png" height="100" width="100" /></a>
										<a class="add-cart-button" href="#" target="_blank">加入购物车</a>
										<a href="#" target="_blank" class="price">￥498.00</a>
									</li>-->
									</ul>
									<a href="#" class="history-bottom-more" target="_blank">查看更多足迹商品 &gt;&gt;</a>
								</div>
							</div>
						</div>
						<div class="tbar-panel-footer J-panel-footer"></div>
					</div>

				</div>

				<div class="toolbar-header"></div>

				<!-- 侧栏按钮 -->
				<div class="toolbar-tabs J-tab">
					<div onclick="cartPanelView.tabItemClick('cart')" class="toolbar-tab tbar-tab-cart" data="购物车" tag="cart">
						<i class="tab-ico"></i>
						<em class="tab-text"></em>
						<span class="tab-sub J-count " id="tab-sub-cart-count">0</span>
					</div>
					<div onclick="cartPanelView.tabItemClick('follow')" class="toolbar-tab tbar-tab-follow" data="我的关注" tag="follow">
						<i class="tab-ico"></i>
						<em class="tab-text"></em>
						<span class="tab-sub J-count hide">0</span>
					</div>
					<div onclick="cartPanelView.tabItemClick('history')" class="toolbar-tab tbar-tab-history" data="我的足迹" tag="history">
						<i class="tab-ico"></i>
						<em class="tab-text"></em>
						<span class="tab-sub J-count hide">0</span>
					</div>
				</div>

				<div class="toolbar-footer">
					<div class="toolbar-tab tbar-tab-top"> <a href="#"> <i class="tab-ico  "></i> <em class="footer-tab-text">顶部</em> </a>
						</div>
					<div class="toolbar-tab tbar-tab-feedback"> <a href="#" target="_blank"> <i class="tab-ico"></i> <em class="footer-tab-text ">反馈</em>
							</a> </div>
				</div>

				<div class="toolbar-mini"></div>

			</div>

			<div id="J-toolbar-load-hook"></div>

		</div>
	</div>

	<script type="text/template" id="tbar-cart-item-template">
	<div class="tbar-cart-item" >
		<div class="jtc-item-promo">
			<em class="promo-tag promo-mz">满赠<i class="arrow"></i></em>
			<div class="promo-text">已购满600元，您可领赠品</div>
		</div>
		<div class="jtc-item-goods">
			<span class="p-img"><a href="#" target="_blank"><img src="{2}" alt="{1}" height="50" width="50" /></a></span>
			<div class="p-name">
				<a href="#">{1}</a>
			</div>
			<div class="p-price"><strong>¥{3}</strong>×{4} </div>
			<a href="#none" class="p-del J-del">删除</a>
		</div>
	</div>
</script>



	<script type="text/javascript" src="/js/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript">
		$(function () {



			
			$("#service").hover(function () {
				$(".service").show();
			}, function () {
				$(".service").hide();
			});
			$("#shopcar").hover(function () {
				$("#shopcarlist").show();
			}, function () {
				$("#shopcarlist").hide();
			});

		})
	</script>
	<script src="https://cdn.bootcss.com/axios/0.19.0-beta.1/axios.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script type="text/javascript" src="/js/model/cartModel.js"></script>
	<script type="text/javascript" src="/js/plugins/jquery.easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="/js/plugins/sui/sui.min.js"></script>
	<script type="text/javascript" src="/js/plugins/jquery.jqzoom/jquery.jqzoom.js"></script>
	<script type="text/javascript" src="/js/plugins/jquery.jqzoom/zoom.js"></script>


	<script >
	
		goodsAll = {!!$goodsAll!!}
	
	
	
	
	</script>

	<script type="text/javascript" src="/js/vues/product.js"></script>



	<!--页面底部  结束 -->
</body>

</html>

<script>


	// // 选择购买的规格
	// function lzx(event){

	// 	// console.log(event.path[2])
	// 	var parent = event.path[2];
	// 	// console.log(parent)

	// 	for( v of parent.childNodes){

	// 		if(v.localName == 'dd'){

	// 			for( k of v.childNodes){
	// 				if( k.className == 'selected' ){
						
	// 					// 除去 样式
	// 					k.classList.remove('selected');
	// 				}
	// 			}

	// 		}
	// 	}

	// 	// 给点中的 属性加上加上样式
	// 	event.path[0].classList.add("selected");
	// 	// 规格值
	// 	var goodspath = event.path[0];
	
	// }




	// // 购买数量
	// $(document).ready(function(){
	// 	//加的效果
	// 	$(".plus").click(function(){
	// 		var n=$(this).prev().val();
	// 		// console.log(n);
	// 		var num=parseInt(n)+1;
	// 		if(num==0){ return;}
	// 		$(this).prev().val(num);
	// 	});
	// 	//减的效果
	// 	$(".mins").click(function(){
	// 		// console.log(22);
	// 		var m=$('.itxt').val();
	// 		// console.log(m);
	// 		var num=parseInt(m)-1;
	// 		if(num==0){ return;}
	// 		$('.itxt').val(num);
	// 	});
	// });

	// function $_(f){
	// 	return document.querySelector(f)
	// }
	
	// // 加入购物车
	// var cart = $_("#shop_cart");
	
	// var arr = [1,4,6];
	// cart.onclick = function (){
	// 	// 获取各属性
	// 	var box = $_("#specification");
	// 	for(v of box.childNodes){
	// 		for( k of v.childNodes){
				
	// 			// var num = 0;
	// 			for(x of k.childNodes){
					
	// 				if(x.className == 'selected'){
						
	// 					// arr[num] = x.getAttribute('value');	
	// 					arr.push(x.getAttribute('value'))
	// 					// num++ ;
	// 					if(arr.length>5){
	// 					arr.splice(0,3);
		
						
	// 					}
						
						
	// 				}
	// 				var array = arr;
					
	// 			}
	// 			// console.log(arr);
	// 		}
	// 	}
		
	// 	var path=arr.join('-');
	// 	var count = $('.itxt').val();
	
	// 	var token="{{csrf_token()}}";
	// 	// 数组  
	// 	$.ajax({
	// 		//提交数据的类型 POST GET
	// 		type:"post",
	// 		//提交的网址
	// 		url:"{{route('addgoods')}}",
	// 		//提交的数据
	// 		data:{path:path,_token:token,id:"{{$id}}",count:count},
	// 		//返回数据的格式
	// 		datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
	// 		//在请求之前调用的函数
	// 		beforeSend:function(){$("#msg").html("logining");},
	// 		//成功返回之后调用的函数             
	// 		success:function(data){
				
	// 		},
	// 		//调用出错执行的函数
	// 		error: function(){
	// 			//请求出错处理
	// 		}         
	// 	});

		
	// }



	
	

</script>