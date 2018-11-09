<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>注册界面</title>
	<link rel="stylesheet" href="/Admin/css/reset.css" />
	<link rel="stylesheet" href="/Admin/css/commonc.css" />
	<!-- <link rel="stylesheet" href="/Admin/css/font-awesome.min.css" /> -->
</head>
<style>
	#email-send{
		margin-left: 330px;
		margin-top: 0px;
	}
	#btn-send{
		margin-left: 330px;
		margin-top: 0px;
	}
</style>

<body>
	<div class="wrap login_wrap">
		<div class="content">

			<div class="logo"></div>

			<div class="login_box">

				<div class="login_form">
					<div class="login_title">
						注册
				</div>
				@if($errors->any())
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
				@endif
					<form action="{{route('Admindorbacregist')}}" method="post">
					{{csrf_field()}}
						<div class="form_text_ipt">
							<input name="rbac_name" id="one" type="text" placeholder="用户名">
						</div>	
						<div class="ececk_warning"><span>用户名不能为空</span></div>
						<div class="form_text_ipt">
							<input name="phone" type="text" placeholder="手机号">
							<!-- <input  type="button" id="btn-send" style="width:150px;font-size:14px;" value="获取验证码"> -->
							<input  type="button" id="email-send" style="width:150px;font-size:14px;" value="发送邮箱验证码">
						</div>
						<div class="ececk_warning"><span>手机号不能为空</span></div>
						
						<div class="form_text_ipt">
							<input name="email" id="one" type="text" placeholder="邮箱">
						</div>	
						<div class="ececk_warning"><span>邮箱不能为空</span></div>
										
   						<div class="form_text_ipt">
							<input name="password" id="one" type="password" placeholder="密码">
						</div>
						<div class="ececk_warning"><span>密码不能为空</span></div>

						<!-- <div class="form_text_ipt">
							<input name="repassword" id="two" type="password" placeholder="重复密码">
						</div>
						<div class="ececk_warning"><span>密码不能为空</span></div> -->

						<div class="form_text_ipt">
							<input name="code" type="text" placeholder="验证码">
						</div>
						<div class="ececk_warning"><span>验证码不能为空</span></div>

						<div class="form_btn">
							<button type="submit">注册</button>
						</div>
						</form>
						<div class="form_reg_btn">
							<span>已有帐号？</span><a href="{{route('Adminrbaclogin')}}">马上登录</a>
						</div>
					
					<div class="other_login">
						<div class="left other_left">
							<span>其它登录方式</span>
						</div>
						<div class="right other_right">
							<a href="#"><i class="fa fa-qq fa-2x"></i></a>
							<a href="#"><i class="fa fa-weixin fa-2x"></i></a>
							<a href="#"><i class="fa fa-weibo fa-2x"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
<script type="text/javascript" src="/Admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/Admin/js/common.js"></script>

<script>
		$("#btn-send").click(function(){
			// 获取手机号码
			var phone = $('input[name=email]').val();
			var si;
			var seconds = 60;
			//执行AJAX
			$.ajax({
				type:"GET",
				url:"{{route('Adminsendcode')}}",
				data:{phone:phone},
				success:function(){
					$('#btn-send').attr('disabled',true);
					// 每1秒执行一次
					si = setInterval(function(){
							seconds--;
							if(seconds==0)
							{
								// 生效
								$("#btn-send").attr('disabled',false);
								seconds = 60;
								$("#btn-send").val("发送验证码");
								// 关闭定时器
								clearInterval( si );
							}
							else
							{
								$("#btn-send").val("还剩验证时间:"+(seconds));
							}
	
						},1000);
				}
			});
		});
		


		$("#email-send").click(function(){
			// 获取邮箱
			var email = $('input[name=email]').val();
			var si;
			var seconds = 60;
			//执行AJAX
			$.ajax({
				type:"GET",
				url:"{{route('AdmintestMail')}}",
				data:{email:email},
				success:function(){
					$('#email-send').attr('disabled',true);
					// 每1秒执行一次
					si = setInterval(function(){
							seconds--;
							if(seconds==0)
							{
								// 生效
								$("#email-send").attr('disabled',false);
								seconds = 60;
								$("#email-send").val("发送验证码");
								// 关闭定时器
								clearInterval( si );
							}
							else
							{
								$("#email-send").val("还剩验证时间:"+(seconds));
							}
	
						},1000);
				}
			});
		});
	</script>
	
