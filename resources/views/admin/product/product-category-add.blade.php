<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="/Admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/Admin/css/style.css"/>       
        <link rel="stylesheet" href="/Admin/assets/css/ace.min.css" />
        <!-- <link rel="stylesheet" href="assets/css/font-awesome.min.css" /> -->
        <link href="/Admin/Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
	    <script src="/Admin/js/jquery-1.9.1.min.js"></script>
        <script src="/Admin/assets/js/bootstrap.min.js"></script>
<title>添加产品分类</title>
<style>
    #tj{
      margin-left:30px;
      margin-top:30px;
    }
    #form-label{
      float: left;
      width: 150px;
      text-align: right;
    }
    #newclass{
      margin-left:-50px;
    }
</style>
</head>
<body>
<div class="type_style">
 <div class="type_title">产品类型信息</div>
  <div class="type_content">
  <div class="Operate_btn">
  <a href="javascript:ovid()" class="btn  btn-warning"><i class="icon-edit align-top bigger-125"></i>新增子类型</a>
  <a href="javascript:ovid()" class="btn  btn-success"><i class="icon-ok align-top bigger-125"></i>禁用该类型</a>
  <a href="javascript:ovid()" class="btn  btn-danger"><i class="icon-trash   align-top bigger-125"></i>删除该类型</a>
  </div>

  <form action="{{route('doAdmincategoryadd')}}" method="post" class="form form-horizontal" id="form-user-add">
  {{csrf_field()}}
    <div class="Operate_cont clearfix">
       <label id="form-label">所属分类：</label><br>
      <div class="formControls">
        <select name="classify_add" id="classify_add" >
           <option value="0">顶级分类</option>
            @foreach($sort as $v) 
                @if($v['level']!=2)
                 <option value="{{$v['id']}}">{{str_repeat('-',$v['level']*4)}}{{$v['catName']}}</option>  
                @endif
            @endforeach
        </select>
      </div>
    </div>
     <div class="Operate_cont clearfix">
        <label id="form-label">分类名称：</label>
        <div class="formControls">
          <input type="text" class="input-text"  name="category_name" width="200">
        </div>
      </div>
     

      <!-- <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>排序：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="" placeholder="" id="user-name" name="product-category-name">
      </div>
      </div> -->

    <!-- <div class="Operate_cont clearfix">
    <label class="form-label">备注：</label>
    <div class="formControls">
    <textarea name="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,100)"></textarea>
     <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
    </div>
    </div> -->
    <div class="">
     <div class="" style=" text-align:center">
         <input id="tj" class="btn btn-primary radius" type="submit" value="提交">
      </div>
    </div>
  </form>

  </div>
</div> 
</div>
<script type="text/javascript" src="/Admin/Widget/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="/Admin/Widget/Validform/5.3.2/Validform.min.js"></script>
<script type="text/javascript" src="/Admin/assets/layer/layer.js"></script>
<script type="text/javascript" src="/Admin/js/H-ui.js"></script> 
<script type="text/javascript" src="/Admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-user-add").Validform({
		tiptype:2,
		callback:function(form){
			form[0].submit();
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});

  $("#newclass").click(function(){
        $("select").hide();
      
  });
</script>
</body>
</html>