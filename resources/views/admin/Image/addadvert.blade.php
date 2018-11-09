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
<!-- <style>
	#size-image{
		width:250px;
		height:15px;
	}
</style> -->
<style>
.img-container {
    width: 500px;
    height: 500px;
    float:left;
}
.img-preview {
    float: left;
    overflow: hidden;
    margin-left: 20px;
}
.preview-lg {
    width: 240px;
    height: 240px;
}
.preview-md {
    width: 80px;
    height: 80px;
}
</style>
<body>
<div class="clearfix" id="add_picture">


   
	<form action="{{route('doaddadvert')}}" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
    {{csrf_field()}}
		<div class="clearfix cl">
         	<label class="form-label col-2">所属分类:</label>
			 <div class="formControls col-2">
			 <select name="catName" id="">
			 	@foreach($imgcate as $v)
			 		<option value="{{$v->id}}">{{$v->catName}}</option>
				 @endforeach
			 </select>
			</div>
		</div>
		<div class="clearfix cl">
         	<label class="form-label col-2">图片尺寸:</label>
			 <div class="formControls col-2">
			 	<input type="text" name="size_w">  * <input type="text" name="size_h">					 
			</div>
		</div>
        <!-- <div class="clearfix cl">
         	<label class="form-label col-2">链接地址:</label>
			 <div class="formControls col-2">
                <input type="text" class="input-text" value="" placeholder="" id="" name="catName">  
			</div>
		</div> -->
        <div class="clearfix cl">
         	<label class="form-label col-2">图片:</label>
			 <div class="formControls col-2">
                <!-- <input type="file" name="image" id=""> -->
				<input id="img" type="file" name="image">
			</div>
		</div>
    <!-- 显示原图 -->
	<div class="img-container">
        <img id="image" src="">
    </div>
    <!-- 预览图片 -->
    <!-- <div class="docs-preview clearfix">
        <div class="img-preview peview-lg"></div>
        <div class="img-preview preview-md"></div>
    </div> -->

    <!-- <div>
        选择图片：
        <input id="img" type="file" name="image">
    </div> -->
    <!-- <div>
        <input type="submit" value="上传">
    </div> -->
    <!-- 保存裁切时的区域信息 -->
    <!-- <input type="text" name="x" id="x">
    <input type="text" name="y" id="y">
    <input type="text" name="w" id="w">
    <input type="text" name="h" id="h"> -->
		
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
<script src="./cropper/cropper.min.js"></script>
<link rel="stylesheet" href="./cropper/cropper.min.css">
<script>
// 选中图片
var $image = $('#image')

var x = $("#x")
var y = $("#y")
var w = $("#w")
var h = $("#h")

// 当选择图片时触发函数
$("#img").change(function(){

    /* 预览图片 */
    // this.files ： 当前选中的图片数组
    // 把选中的图片转成字符串（图片的临时地址，在浏览器中可以直接访问并显示图片）
    var url = getObjectUrl( this.files[0] )    
    // 把图片的地址设置到 img 标签的 src 属性上
    $image.attr('src', url)

    // 先消毁原插件 
    $image.cropper("destroy")

    /* 启动 cropper 插件 */
    $image.cropper({
        aspectRatio: 1,                              // 缩略图1:1的比例
        preview:'.img-preview',                      // 显示缩略图的框
        viewMode:3,                                  // 显示模式
        // 裁切时触发事件
        crop: function(event) {
            x.val(event.detail.x);             // 裁切区域左上角x坐标
            y.val(event.detail.y);             // 裁切区域左上角y坐标
            w.val(event.detail.width);         // 裁切区域宽高
            h.val(event.detail.height);        // 裁切区域高度
        }
    })

});

// 预览时需要使用下面这个函数转换一下(为了兼容不同的浏览器，所以要判断支持哪一种函数就使用哪一种)
function getObjectUrl(file) {
    var url = null;
    if (window.createObjectURL != undefined) {
        url = window.createObjectURL(file)
    } else if (window.URL != undefined) {
        url = window.URL.createObjectURL(file)
    } else if (window.webkitURL != undefined) {
        url = window.webkitURL.createObjectURL(file)
    }
    return url
}

</script>