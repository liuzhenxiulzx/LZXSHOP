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
<style>
    .skutitle{
        margin-left:50px;
        margin-bottom:100px;
        width:80px;
        font-size:20px;
    }
    .addsku{
        margin-left:70px;
        margin-top:50px;
        
    }
    #skuul{
        margin-top:40px;
        margin-bottom:30px;

    }
    #input-text{
        width:110px;
    }
    .img-container {
    /* width: 200px;
    height: 200px;
    float:left;
    margin-left: 390px;
    margin-top: -79px; */
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
.btns{
    margin-left:300px;
}

</style>
</head>
<body>
<div class="clearfix" id="add_picture">
<!-- <div id="scrollsidebar" class="left_Treeview">
    <div class="show_btn" id="rightArrow"><span></span></div>
    <div class="widget-box side_content" >
    <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
     <div class="side_list">
      <div class="widget-header header-color-green2">
          <h4 class="lighter smaller">选择产品类型</h4>
      </div>
      <div class="widget-body">
          <div class="widget-main padding-8">
              <div  id="treeDemo" class="ztree"></div>
          </div>
  </div> -->
  </div>
  </div>  
  </div>
   <div class="page_right_style">
   <div class="type_title">添加商品</div>
   
	<form action="{{route('doaddproduct')}}" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
    {{csrf_field()}}
		<div class="clearfix cl">
         <label class="form-label col-2">产品标题：</label>
		 <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name="pro_title"></div>
		</div>
		<div class=" clearfix cl">
         <label class="form-label col-2">简略标题：</label>
	     <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name="brief_title"></div>
        </div>
        <div class="clearfix cl">
			<label class="form-label col-2">促&nbsp;&nbsp;&nbsp;&nbsp;销：</label>
			<div class="formControls col-10">
				<input type="text" class="input-text" value="" placeholder="" id="" name="promotion">
			</div>
		</div>
        <div class="clearfix cl">
         <label class="form-label col-2">产品名称：</label>
		 <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="pro_name" name="pro_name"></div>
        </div>

         <div class="clearfix cl">
             <label class="form-label col-2">一级分类ID：</label>
		     <div class="formControls">
                <select name="cat1_id" id="">
                    @foreach($sort as $v)
                     <option value="{{$v['id']}}" name="class">{{$v['catName']}}</option>  
                     @endforeach
                </select>
            </div>
        </div>
        <div class="clearfix cl">
             <label class="form-label col-2">二级分类ID：</label>
		     <div class="formControls">
                <select name="cat2_id" id=""></select>
            </div>
        </div>
        <div class="clearfix cl">
             <label class="form-label col-2">三级分类ID：</label>
		     <div class="formControls">
                <select name="cat3_id" id=""></select>
            </div>
        </div>
        
        <div class="clearfix cl">
         <label class="form-label col-2">产品品牌：</label>
		    <div class="formControls">
               
                <select name="brand_id" id="">
                    @foreach($Brand as $v)
                     <option value="{{$v['id']}}">{{$v->brandName}}</option>  
                     @endforeach
                </select>
                
            </div>
		</div>
		<div class=" clearfix cl">
			<div class="Add_p_s">
            <label class="form-label col-2">产品编号：</label>
			<div class="formControls col-2"><input type="text" class="input-text" value="" placeholder="" id="" name="pro_number"></div>
            </div>
			<div class="Add_p_s">
             <label class="form-label col-2">产&nbsp;&nbsp;&nbsp;&nbsp;地：</label>	
			 <div class="formControls col-2"><input type="text" class="input-text" value="" placeholder="" id="" name="area"></div>
			</div>
        
             <div class="Add_p_s">
             <label class="form-label col-2">产品重量：</label>	
			 <div class="formControls col-2"><input type="text" class="input-text" value="" placeholder="" id="" name="weight" >kg</div>
			</div>
            
            <div class="Add_p_s">
             <label class="form-label col-2">产品最低价格：</label>	
			 <div class="formControls col-2"><input type="text" class="input-text" value="" placeholder="" id="" name="price" >元</div>
			</div>
		</div>
		
		
		
		<div class="clearfix cl">
			<label class="form-label col-2">产品图片：</label>
			<div class="formControls col-10">
				<input type="file" name="pro_image" id="img">
			</div>
		</div>
           <!-- 显示原图 -->
        <div class="img-container">
            <img id="image" src="">
        </div>

 

		<div class="clearfix cl">
			<div class="btns">
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
<script>
    // 选中图片
// var $image = $('#image')

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


    $("select[name=cat1_id]").change(function(){
        // 取出这个分类的id
        var id = $(this).val();
        if(id != ""){
            $.ajax({
                type:"GET",
                url:"/Admin/addclass1/"+id,
                dataType:"json",
                contentType:"application/json",
                success:function(data){
                    // console.log(data);
                    var str = " "
                    for (var i = 0; i < data.length; i++) {
                        str += '<option value="' + data[i].id + '">' + data[i].catName + '</option>';
                    }
                    // 把拼好的option 放到第二个下拉框中
                    $("select[name=cat2_id]").html(str);
                    // 触发第三个框的change事件
                    $("select[name=cat2_id]").trigger('change');
                }
            });
        }
    });


 $("select[name=cat2_id]").change(function () {

    // 取出这个分类的id
    var id = $(this).val()
    if (id != "") {
        $.ajax({
            type: "GET",
            url:"/Admin/addclass1/"+id,
            dataType:"json",
            contentType:"application/json",
            success: function (data) {

                var str = ""
                for (var i = 0; i < data.length; i++) {
                    str += '<option value="' + data[i].id + '">' + data[i].catName + '</option>';
                }
                // 把拼好的option 放到第三个下拉框中
                $("select[name=cat3_id]").html(str);
            }
        });
    }
    });
// 触发一级分类的change事件，让它直接取出二级分类
$("select[name=cat1_id]").trigger("change");


 

</script>








</body>
</html>