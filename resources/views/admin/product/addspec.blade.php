<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加规格</title>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>       
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link href="Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
	    <script src="js/jquery-1.9.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/typeahead-bs2.min.js"></script>
         <script src="assets/layer/layer.js" type="text/javascript"></script>
        <script type="text/javascript" src="Widget/swfupload/swfupload.js"></script>
        <script type="text/javascript" src="Widget/swfupload/swfupload.queue.js"></script>
        <script type="text/javascript" src="Widget/swfupload/swfupload.speed.js"></script>
        <script type="text/javascript" src="Widget/swfupload/handlers.js"></script>
</head>

<body>
<form action="" method="post"  enctype="multipart/form-data">
{{csrf_field()}}

      规格名称：<input type="text" name="specname" id="">

 <!-- <div id="add_brand" class="clearfix">


 <div class="left_add">

   <ul class="add_conent">
    <li class=" clearfix"><label class="label_name"><i>*</i>品牌名称：</label> <input name="brandName" type="text" class="add_text"/></li>
    <li class=" clearfix"><label class="label_name"><i>*</i>品牌序号：</label> <input name="brand_order" type="text" class="add_text" style="width:80px"/></li>
   
 </div> -->
 
 
  <div class="button_brand"><input name="" type="submit"  class="btn btn-warning" value="保存"/>
  <input name="" type="reset" value="取消" class="btn btn-warning"/></div>
</div>
</form>
</body>
</html>
