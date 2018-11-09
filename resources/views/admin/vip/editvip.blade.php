<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<script type="text/javascript" src="js/respond.min.js"></script>
<script type="text/javascript" src="js/PIE_IE678.js"></script>
<![endif]-->
<link href="/Admin/assets/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="/Admin/css/style.css"/>       
<link href="/Admin/assets/css/codemirror.css" rel="stylesheet">
<link rel="stylesheet" href="/Admin/assets/css/ace.min.css" />
 <link rel="stylesheet" href="/Admin/Widget/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">
<link rel="stylesheet" href="/Admin/assets/css/font-awesome.min.css" />
<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
<link href="/Admin/Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
<link href="/Admin/Widget/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />

<title>新增图片</title>
</head>
<body>
<div class="clearfix" id="add_picture">


   
	<form action="{{route('Admindoeditvip',['id'=>$vip->id])}}" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
    {{csrf_field()}}
		<div class="clearfix cl">
         	<label class="form-label col-2">用户名：</label>
			 <div class="formControls col-2">
				<input type="text" class="input-text" value="{{$vip->vipname}}" placeholder="" id="" name="vipname">
			</div>
		</div>
		<div class="clearfix cl">
         	<label class="form-label col-2">真实姓名：</label>
			 <div class="formControls col-2">
				<input type="text" class="input-text" value="{{$vip->real_name}}" placeholder="" id="" name="real_name">
			</div>
		</div>
		<div class="clearfix cl">
         	<label class="form-label col-2">邮箱：</label>
			 <div class="formControls col-2">
				<input type="text" class="input-text" value="{{$vip->userEmail}}" placeholder="" id="" name="email">
			</div>
		</div>
		<div class="clearfix cl">
         	<label class="form-label col-2">手机号：</label>
			 <div class="formControls col-2">
				<input type="text" class="input-text" value="{{$vip->phone}}" placeholder="" id="" name="phone">
			</div>
		</div>
        <div class="clearfix cl">
			<label class="form-label col-2">家庭住址：</label>
			<div class="formControls col-2">
				<input type="text" class="input-text" value="{{$vip->home_address}}" placeholder="" id="" name="home_address">
			</div>
		</div>
		<div class="clearfix cl">
			<label class="form-label col-2">会员等级：</label>
			<div class="formControls col-2">
				<input type="text" class="input-text" value="{{$vip->grade}}" placeholder="" id="" name="grade">
			</div>
		</div>
   
	
		


		<div class="clearfix cl">
			<div class="Button_operation">
				<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="icon-save "></i>保存</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
    </div>
</div>
</div>
<script src="/Admin/js/jquery-1.9.1.min.js"></script>   
<script src="/Admin/assets/js/bootstrap.min.js"></script>
<script src="/Admin/assets/js/typeahead-bs2.min.js"></script>
<script src="/Admin/assets/layer/layer.js" type="text/javascript" ></script>
<script src="/Admin/assets/laydate/laydate.js" type="text/javascript"></script>
<script type="text/javascript" src="/Admin/Widget/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/Admin/Widget/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="/Admin/Widget/zTree/js/jquery.ztree.all-3.5.min.js"></script> 
<script type="text/javascript" src="/Admin/Widget/Validform/5.3.2/Validform.min.js"></script> 
<script type="text/javascript" src="/Admin/Widget/webuploader/0.1.5/webuploader.min.js"></script>
<script type="text/javascript" src="/Admin/Widget/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/Admin/Widget/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/Admin/Widget/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script> 
<script src="/Admin/js/lrtk.js" type="text/javascript" ></script>
<script type="text/javascript" src="/Admin/js/H-ui.js"></script> 
<script type="text/javascript" src="/Admin/js/H-ui.admin.js"></script> 


</body>
</html>