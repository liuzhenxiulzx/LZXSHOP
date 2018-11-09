<!DOCTYPE html >
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link href="/Admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/Admin/css/style.css" />
    <link href="/Admin/assets/css/codemirror.css" rel="stylesheet">
    <link rel="stylesheet" href="/Admin/assets/css/ace.min.css" />
    <link rel="stylesheet" href="/Admin/font/css/font-awesome.min.css" />
    <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
    <script src="/Admin/js/jquery-1.9.1.min.js"></script>
    <script src="/Admin/assets/js/bootstrap.min.js"></script>
    <script src="/Admin/assets/js/typeahead-bs2.min.js"></script>
    <script src="/Admin/assets/layer/layer.js" type="text/javascript"></script>
    <script src="/Admin/assets/laydate/laydate.js" type="text/javascript"></script>
    <script src="/Admin/js/H-ui.js" type="text/javascript"></script>
    <title>添加管理员</title>
    <style>
        #Button_operation{
            margin-left:100px;
            margin-top:100px;
        }
    </style>
</head>

<body>

  @if($errors->any())
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
		@endif
        <div class="margin clearfix">
            <div class="article_style">
            <form action="{{route('Admindoeditmanager',['id'=>$user->id])}}" method="post"  enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="add_content" id="form-article-add">
                    <ul>
                        <li class="clearfix Mandatory">
                            <label class="label_name"><i>*</i>登录名:</label>
                            <span class="formControls col-10">
                                <input name="uname" value="{{$user->rbac_name}}" type="text" id="form-field-1" >
                            </span>
                        </li>
                        <li class="clearfix Mandatory"><label class="label_name"><i>*</i>密码:</label>
                            <span class="formControls col-10">
                                <input name="password" type="password" value="{{$user->password}}" id="form-field-1">
                            </span>
                        </li>   
                        <!-- <li class="clearfix Mandatory"><label class="label_name"><i>*</i>手机号:</label>
                            <span class="formControls col-10">
                                <input name="phone" type="text" id="form-field-1" >
                            </span>
                        </li>                     -->
                        <li class="clearfix"><label class="label_name"><i>*</i>角色:</label>
                            <span class="formControls col-4">
                                <select class="form-control" name="role" id="form-field-select-1" name="blogcate_id">
                                @foreach($allrole as $v)
                                    @if($roles->id == $v->id)
                                   <option value="{{$v->id}}" selected >{{$v->role_name}}</option>
                                   @else
                                   <option value="{{$v->id}}">{{$v->role_name}}</option>
                                   @endif
                                @endforeach
                                </select>
                            </span>
                        </li>
                    </ul>
                    <div id="Button_operation">
                        <button  class="btn btn-primary radius" type="submit">保存并提交</button>
                        <button  class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
                    </div>
                </div>
                   </form>
            </div>
        </div>
    
            

</body>

</html>
