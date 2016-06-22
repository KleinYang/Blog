<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="易源溯 客户 服务 平台" />
	<meta name="author" content="上海趣取信息技术有限公司" />
	
	<title>消毒供应灭菌追溯监控平台 - 登录</title>

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
	<div class="footbox">
    	<img src="/yy/Public/xenon/assets/images/logoeztracking-.png" width="80"/>
    	无菌物品供应追溯平台
    </div>
	<div class="login-container">
	
		<div class="row">
		
			<div class="col-sm-3" style=" float:right; position: absolute; top:50%; right:100px; margin:-200px auto 0; min-width:453px !important; width:453px;">
			
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						// Reveal Login form
						setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
						
						
						// Validation and Ajax action
						$("form#login").validate({
							rules: {
								username: {
									required: true
								},
								
								passwd: {
									required: true
								}
							},
							
							messages: {
								username: {
									required: '请输入用户名.'
								},
								
								passwd: {
									required: '请输入密码.'
								}
							},
							
							// Form Processing via AJAX
							submitHandler: function(form)
							{
								show_loading_bar(70); // Fill progress bar to 70% (just a given value)
								
								var opts = {
									"closeButton": true,
									"debug": false,
									"positionClass": "toast-top-full-width",
									"onclick": null,
									"showDuration": "300",
									"hideDuration": "1000",
									"timeOut": "5000",
									"extendedTimeOut": "1000",
									"showEasing": "swing",
									"hideEasing": "linear",
									"showMethod": "fadeIn",
									"hideMethod": "fadeOut"
								};
									
								$.ajax({
									url: "/yy/Test/Manage/login",
									method: 'POST',
									dataType: 'json',
									data: {
										do_login: true,
										username: $(form).find('#username').val(),
										passwd: $(form).find('#passwd').val(),
									},
									success: function(resp)
									{
										
										show_loading_bar({
											delay: .5,
											pct: 100,
											finish: function(){
												
												// Redirect after successful login page (when progress bar reaches 100%)
												
												if(resp.accessGranted)
												{
													window.location.href = '/yy/Test/Manage/../Index/index.html';
													
												}
												
											}
										});
										
																			
										// Remove any alert
										$(".errors-container .alert").slideUp('fast');
										
										
										// Show errors
										if(resp.accessGranted == false)
										{
											$(".errors-container").html('<div class="alert alert-danger">\
												<button type="button" class="close" data-dismiss="alert">\
													<span aria-hidden="true">&times;</span>\
													<span class="sr-only">Close</span>\
												</button>\
												' + resp.errors + '\
											</div>');
											
											
											$(".errors-container .alert").hide().slideDown();
											$(form).find('#passwd').select();
										}
																		
									}


								});
								
							}
						});
						
						// Set Form focus
						$("form#login .form-group:has(.form-control):first .form-control").focus();
					});
				</script>
				
				<!-- 错误提示 -->
				<div class="errors-container"></div>
				<form method="post" role="form" id="login" class="login-form fade-in-effect shadow">
					<div class="login-header">
						<a href="dashboard-1.html" class="logo">
                            <img style=" float:left;" src="/yy/Public/xenon/assets/images/logo1231.png" alt="" width="60" />
							<span class="loginh">医疗器械消毒灭菌追溯监控平台</span>
						</a><!--color:#1263a9;-->
						
						<p style="float:right;">登录</p>
					</div>
	
					<div class="form-group" style="margin-top:100px; position:relative;">
                    	<img class="input_img" src="/yy/Public/xenon/assets/images/user.png" width="40"/>
						<input style="border-radius:5px; padding-left:60px;" placeholder="用户名" type="text" value="smhi1@smhi " class="form-control" name="username" id="username"/>
					</div>
					
					<div class="form-group" style="position:relative;">
                    	<img class="input_img" src="/yy/Public/xenon/assets/images/pwd.png" width="40"/>
						<input style="border-radius:5px;padding-left:60px;" placeholder="密码" type="password" value="smhi1" class="form-control" name="passwd" id="passwd" />
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