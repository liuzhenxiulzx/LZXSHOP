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
		margin-left: 18px;
	}
	#skuul li{
		padding-top: 10px;
	}
    #input-text{
        width:100px;
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
.addspec{
    background:skyblue;
    color:black;
}
hr{
	width:100%;
}
.spec_list{
	width:310%;
	height: 100%;
}

ul li span{
	display:inline-block;
	background:skyblue;
	text-align: center;
	font-size: 14px;
	font-weight: normal;
	border-radius: 4px;
	margin-left:15px;
	margin-bottom:15px;
	padding: 5px 8px;
}
.form-label{
	width:92px;
}
#specul{
	margin-bottom:20px;
}
#specul li{
	display:inline-block;
	margin-top:40px;

	/* margin-left: 10px; */
}
select{
	margin-left:8px;
}
.ullist{
	margin-top: -14px;
    margin-left: -12px;
    margin-bottom: -10px;
    float: right;
}
.ullist2{
	margin-top: -22px;
    margin-left: -134px;
    margin-bottom: -20px;
    float: right;
}
.del{
	margin-left: -69px;
}
#Button_operation{
	margin-left:150px;
	margin-top:100px;
}

</style>
</head>
<body>
<div class="clearfix" id="add_picture">

  </div>
  </div>  
  </div>
   <div class="page_right_style">
   <div class="type_title">添加商品</div>
   
	<form action="{{route('Admindoaddsku',['id'=>$id])}}" method="post"  enctype="multipart/form-data">
    {{csrf_field()}}
        
        <div>
            <span class="skutitle">规格：</span>
            <input type="text" value="" id="spec_val">
            <input type="button" value="新建规格" class="btn-warning" id="spec">
		</div>
		
        <div class="spec_list">
			<ul id="skuul">
				@foreach($speclist as $v)
				<li>
					<label class="form-label col-2">{{$v->spec_name}}:</label>
					@foreach($v->vals as $k)
					<span>{{$k->spec_val}}</span>
					@endforeach
					<input type="text" name="" id="specname_val{{$v->id}}">
					<input type="button" value="新建" onclick="addval({{$v->id}})" class="btn-warning"  id="specval">
				</li>
				@endforeach
			</ul>
			
		</div>
      

        <hr>

        <span class="skutitle">sku添加</span>
        <input id="addsku" type="button" value="sku添加" >
        <div class="clearfix cl">
           <ul id="specul">
		   		@foreach($speclist as $v)
                <li>
					<div class="specli">
						<label class="form-label col-2">{{$v->spec_name}}:</label>
						<select name="spec_all{{$v->id}}[]" id="">
							@foreach($v->vals as $k)
							<option value="{{$k->id}}">{{$k->spec_val}}</option>
							@endforeach
						</select>
					</div>	
				</li>
				@endforeach
          
                <li>
					<div class="ullist">
						<label class="form-label col-2">库存：</label>
						<div class="formControls"><input type="text" id="input-text" value="" placeholder="" id="" name="Stock[]"></div>
					</div>
				
                </li>
                <li>
					<div class="ullist2">
						<label class="form-label col-2">价 格：</label>
						<div class="formControls"><input type="text" id="input-text" value="" placeholder="" id="" name="price[]"></div>
					</div>
                </li>
               
           </ul>
        </div>

        <div id="prev">
            
		</div>
	
	
			<div id="Button_operation">
				<button class="btn btn-primary radius" type="submit"><i class="icon-save "></i>保存</button>
				<button class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>

	</form>
    </div>
</div>
</div>
<script src="/Admin/js/jquery-1.9.1.min.js"></script>   

<script>
	// ===================添加规格===================
	var token="{{csrf_token()}}";
	$("#spec").click(function(){
		var name = $('#spec_val').val();
		
		$.ajax({
            //提交数据的类型 POST GET
            type:"post",
            //提交的网址
            url:"{{route('Adminaddspec')}}",
            //提交的数据
            data:{name:name,_token:token,id:"{{$id}}"},
            //返回数据的格式
            datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
            //在请求之前调用的函数
            beforeSend:function(){$("#msg").html("logining");},
            //成功返回之后调用的函数             
            success:function(data){
				console.log(data);  
				$('#spec_val').val("");        
            },
            //调用出错执行的函数
            error: function(){
                //请求出错处理
            }         
         });

	});

	// ===================添加规格值===================
	var token="{{csrf_token()}}";
		function addval(id){

			var sepcval = $('#specname_val'+id).val();
			$.ajax({
				//提交数据的类型 POST GET
				type:"post",
				//提交的网址
				url:"{{route('Adminaddspecval')}}",
				//提交的数据
				data:{sepcval:sepcval,_token:token,id:id},
				//返回数据的格式
				datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
				//在请求之前调用的函数
				beforeSend:function(){$("#msg").html("logining");},
				//成功返回之后调用的函数             
				success:function(data){

					$('#specname_val'+id).val("");        
				},
				//调用出错执行的函数
				error: function(){
					//请求出错处理
				}         
			});
		}
	




// ==========================添加sku====================================

       function del_attr(a){
        var table =  $(a).parent()
        table.remove();
    }

		ulstr = `<div class="clearfix cl">
           <ul id="specul">
		   		@foreach($speclist as $v)
                <li>
					<div class="specli">
						<label class="form-label col-2">{{$v->spec_name}}:</label>
						<select name="spec_all{{$v->id}}[]" id="">
							@foreach($v->vals as $k)
							<option value="{{$k->id}}">{{$k->spec_val}}</option>
							@endforeach
						</select>
					</div>	
				</li>
				@endforeach
          
                <li>
					<div class="ullist">
						<label class="form-label col-2">库存：</label>
						<div class="formControls"><input type="text" id="input-text" value="" placeholder="" id="" name="Stock[]"></div>
					</div>
                </li>
                <li>
					<div class="ullist2">
						<label class="form-label col-2">价 格：</label>
						<div class="formControls"><input type="text" id="input-text" value="" placeholder="" id="" name="price[]"></div>
					</div>
                </li>
                <input onclick="del_attr(this)" type='button' value="删除" class="del">
		   </ul>
		  
        </div>`

    $("#addsku").click(function(){
            // 添加sku
            $("#prev").append(ulstr);
             // 删除sku
             $("skuul").remove();
              // 在框的前面放一个图片
         
    });
</script>

</body>
</html>
