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

<title>图片分类</title>

</head>

<style>
    #Button_operation{

       margin-left:80px;
       padding-top:50px;
    }
</style>
<body>
<div class="clearfix" id="add_picture">


   
	<form action="{{route('Admindoaddblogcate')}}" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
    {{csrf_field()}}
		<div class="clearfix cl">
         	<label class="form-label col-2">分类名称:</label>
			 <div class="formControls col-2">
                    <input type="text" name="catName" id="">
			</div>
		</div>

		<div class="clearfix cl">
         	<label class="form-label col-2">简介:</label>
			 <div class="formControls col-2">
                <textarea name="abstract" id="" cols="30" rows="10"></textarea>
			</div>
		</div>

		<div class="clearfix cl">
			<div id="Button_operation">
				<button class="btn btn-primary radius" type="submit"><i class="icon-save "></i>保存</button>
				<button class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
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
