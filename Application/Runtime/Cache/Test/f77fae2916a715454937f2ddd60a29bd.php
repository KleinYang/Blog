<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">


	<title>后台管理登录</title>

	<link rel="stylesheet" href="http://fonts.useso.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="/yy/Public/xenon/assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="/yy/Public/xenon/assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/yy/Public/xenon/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/yy/Public/xenon/assets/css/xenon-core.css">
	<link rel="stylesheet" href="/yy/Public/xenon/assets/css/xenon-forms.css">
	<link rel="stylesheet" href="/yy/Public/xenon/assets/css/xenon-components.css">
	<link rel="stylesheet" href="/yy/Public/xenon/assets/css/xenon-skins.css">
	<link rel="stylesheet" href="/yy/Public/xenon/assets/css/custom.css">

	<script src="/yy/Public/xenon/assets/js/jquery-1.11.1.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
		.shadow{
			-webkit-box-shadow:0 0 10px 5px rgba(255,255,255,0.5);
			-moz-box-shadow:0 0 10px 5px rgba(255,255,255,0.5);
			box-shadow:0 0 10px 5px rgba(255,255,255,0.5);
			background-color:rgba(255,255,255,0.7) !important;
			border-radius:10px;
			min-width:453px !important;
			width:453px;
			}
		.input_img{
			float:left;
			border-top-left-radius:5px;
			border-bottom-left-radius:5px;
			position:absolute;
			left:1px;
			top:1px;
			padding-top:6px;
			background-color:white;
			padding-left:8px;
			padding-bottom:8px;
			padding-right:8px;
			}
		.footbox{
			position:absolute;
			bottom:0;
			left:50%;
			width:400px;
			margin-left:-200px;
			text-align:center;
			font-family:'微软雅黑';
			font-size:14px;
			color:#0876cb;
			}
		.loginh{
			margin-top:20px;
			float:left;
			color:#373737 !important;
			font-size:22px !important;
			font-family:'黑体';
			font-weight:bold;
			}
	</style>
</head>
<body class="page-body login-page login-light" style="background-image:url(/yy/Public/xenon/assets/images/login1231.jpg); background-repeat:no-repeat; background-size: contain; background-position:center;">
	<div class="login-container">

		<div class="row">

			<div class="col-sm-3" style=" float:right; position: absolute; top:50%; right:100px; margin:-200px auto 0; min-width:453px !important; width:453px;">

				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						// Reveal Login form
						setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
						// Set Form focus
						$("form#login .form-group:has(.form-control):first .form-control").focus();
					});
				</script>

				<form method="post" action="<?php echo U("Login/login");?>" role="form" id="login" class="login-form fade-in-effect shadow">
					<div class="login-header">
						<a href="dashboard-1.html" class="logo">
                            <img style=" float:left;" src="/yy/Public/xenon/assets/images/logo1231.png" alt="" width="60" />
							<span class="loginh">后台管理系统登录</span>
						</a><!--color:#1263a9;-->

						<p style="float:right;">登录</p>
					</div>

					<div class="form-group" style="margin-top:100px; position:relative;">
                    	<img class="input_img" src="/yy/Public/xenon/assets/images/user.png" width="40"/>
						<input style="border-radius:5px; padding-left:60px;" placeholder="用户名" type="text" value="" class="form-control" name="username" id="username"/>
					</div>

					<div class="form-group" style="position:relative;">
                    	<img class="input_img" src="/yy/Public/xenon/assets/images/pwd.png" width="40"/>
						<input style="border-radius:5px;padding-left:60px;" placeholder="密码" type="password" value="" class="form-control" name="passwd" id="passwd" />
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-block text-left" style="text-align:center; border-radius:5px; font-size:16px;">
							登录
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>



	<!-- Bottom Scripts -->
	<script src="/yy/Public/xenon/assets/js/bootstrap.min.js"></script>
	<script src="/yy/Public/xenon/assets/js/TweenMax.min.js"></script>
	<script src="/yy/Public/xenon/assets/js/resizeable.js"></script>
	<script src="/yy/Public/xenon/assets/js/joinable.js"></script>
	<script src="/yy/Public/xenon/assets/js/xenon-api.js"></script>
	<script src="/yy/Public/xenon/assets/js/xenon-toggles.js"></script>
	<script src="/yy/Public/xenon/assets/js/jquery-validate/jquery.validate.min.js"></script>
	<script src="/yy/Public/xenon/assets/js/toastr/toastr.min.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="/yy/Public/xenon/assets/js/xenon-custom.js"></script>

</body>
</html>