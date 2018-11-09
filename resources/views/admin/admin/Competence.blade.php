<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="/Admin/css/style.css" />
	<link href="/Admin/assets/css/codemirror.css" rel="stylesheet">
	<link rel="stylesheet" href="/Admin/assets/css/ace.min.css" />
	<!-- <link rel="stylesheet" href="font/css/font-awesome.min.css" /> -->
	<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
	<script src="/Admin/js/jquery-1.9.1.min.js"></script>
	<script src="/Admin/assets/js/bootstrap.min.js"></script>
	<script src="/Admin/assets/js/typeahead-bs2.min.js"></script>
	<script src="/Admin/assets/js/jquery.dataTables.min.js"></script>
	<script src="/Admin/assets/js/jquery.dataTables.bootstrap.js"></script>
	<script src="/Admin/assets/layer/layer.js" type="text/javascript"></script>
	<script src="/Admin/assets/laydate/laydate.js" type="text/javascript"></script>
	<script src="/Admin/js/dragDivResize.js" type="text/javascript"></script>
	<title>添加权限</title>
</head>

<body>
@if($errors->any())
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
		@endif
	<form action="{{route('doaddpower')}}" method="post">
	{{csrf_field()}}
	<div class="Competence_add_style clearfix">
		<div class="left_Competence_add">
			<div class="title_name">添加角色</div>
			<div class="Competence_add">
				<div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 角色名称 </label>
					<div class="col-sm-9"><input type="text" id="form-field-1" placeholder="" name="role_name" class="col-xs-10 col-sm-5"></div>
				</div>
				<div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 角色描述 </label>
					<div class="col-sm-9">
						<textarea  class="form-control" name="role_describe" id="form_textarea" placeholder="" ></textarea>
						<span class="wordage">剩余字数：<span id="sy" style="color:Red;">200</span>字</span>
					</div>
				</div>
			
				
			</div>
		</div>
		<!--权限分配-->
		<div class="Assign_style">
			<div class="title_name">权限分配</div>
			<div class="Select_Competence">
				@foreach($arr as $v)
				<dl class="permission-list">
					<dt>
						<label class="middle">
							<!-- <input name="power_bg[]" value="{{$v['id']}}" class="ace" type="checkbox" id="id-disable-check"> -->
							<span class="lbl">{{$v['power_name']}}</span>
						</label>
					</dt>
					@foreach($v['two'] as $k)
					<dd>
						<dl class="cl permission-list2">
							<dt>
								<label class="middle"><input type="checkbox" value="{{$k['id']}}" class="ace" name="power_mg[]" id="id-disable-check">
								<span class="lbl">{{$k['power_name']}}</span></label>
							</dt>
							@if(isset($k['three']))
							<dd>
								@foreach($k['three'] as $b)
								<label class="middle">
									<input type="checkbox" value="{{$b['id']}}" class="ace" name="power_sg[]" id="user-Character-0-0-0">
									<span class="lbl">{{$b['power_name']}}</span>
								</label>
								@endforeach
							</dd>
							@endif
						</dl>
						
					</dd>
					@endforeach
				</dl>
				@endforeach
				
			</div>
			<div class="Button_operation">
				<button  class="btn btn-primary radius" type="submit"><i class="fa fa-save "></i> 保存并提交</button>
				<button  class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</div>	
	
	</form>
</body>

</html>
<script type="text/javascript">
	//初始化宽度、高度  
	$(".left_Competence_add,.Competence_add_style").height($(window).height()).val();;
	$(".Assign_style").width($(window).width() - 500).height($(window).height()).val();
	$(".Select_Competence").width($(window).width() - 500).height($(window).height() - 40).val();
	//当文档窗口发生改变时 触发  
	$(window).resize(function () {

		$(".Assign_style").width($(window).width() - 500).height($(window).height()).val();
		$(".Select_Competence").width($(window).width() - 500).height($(window).height() - 40).val();
		$(".left_Competence_add,.Competence_add_style").height($(window).height()).val();;
	});
	/*字数限制*/
	function checkLength(which) {
		var maxChars = 200; //
		if (which.value.length > maxChars) {
			layer.open({
				icon: 2,
				title: '提示框',
				content: '您出入的字数超多限制!',
			});
			// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
			which.value = which.value.substring(0, maxChars);
			return false;
		} else {
			var curr = maxChars - which.value.length; //250 减去 当前输入的
			document.getElementById("sy").innerHTML = curr.toString();
			return true;
		}
	};
	/*按钮选择*/
	$(function () {
		$(".permission-list dt input:checkbox").click(function () {
			$(this).closest("dl").find("dd input:checkbox").prop("checked", $(this).prop("checked"));
		});
		$(".permission-list2 dd input:checkbox").click(function () {
			var l = $(this).parent().parent().find("input:checked").length;
			var l2 = $(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
			if ($(this).prop("checked")) {
				$(this).closest("dl").find("dt input:checkbox").prop("checked", true);
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked", true);
			}
			else {
				if (l == 0) {
					$(this).closest("dl").find("dt input:checkbox").prop("checked", false);
				}
				if (l2 == 0) {
					$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked", false);
				}
			}

		});
	});

</script>