<!DOCTYPE HTML>
<html>
	<head>
		<title>Login | Online Exam</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 
<link href="<?php echo base_url() ?>public/admin/assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />

<link href="<?php echo base_url() ?>public/admin/assets/css/style.css" rel='stylesheet' type='text/css' />

<link href="<?php echo base_url() ?>public/admin/assets/css/font-awesome.css" rel="stylesheet"> 

<link rel="<?php echo base_url() ?>public/admin/assets/stylesheet" href="css/icon-font.min.css" type='text/css' />

<script src="<?php echo base_url() ?>public/admin/assets/js/Chart.js"></script>

<link href="<?php echo base_url() ?>public/admin/assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="<?php echo base_url() ?>public/admin/assets/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>

<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

 
<script src="<?php echo base_url() ?>public/admin/assets/js/jquery-1.10.2.min.js"></script>
	</head> 
   
 <body class="sign-in-up">
    <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<p><span>Sign In to</span> <a href="#">Admin Panel</a></p>
						</div>
						<div class="signin">
							<form action="<?php echo site_url('adminControl/checkAuthentication');?>" method="post" >
							<div class="log-input">
								<div class="log-input-left">
								   <input type="text" class="user" name="userName" placeholder="Enter Your UserName" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}"/>
									<span class="customErrorWarning"><?php echo form_error('userName');?></span>
								</div>	<div class="clearfix"> </div>
							</div>
							<div class="log-input">
								<div class="log-input-left">
								   <input type="password" class="lock" name="userPassword" placeholder="Enter Your Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}"/>
								   <span  class="customErrorWarning"><?php echo form_error('userPassword');?></span>
								</div>
								<div class="clearfix"> </div>
							</div>
							<input type="submit" name="login" value="Login to your account">
						</form>	 
						</div>
						<div class="new_people">
							<h4>For New People</h4>
							<p></p>
							<a href="register">Register Now!</a>
						</div>
					</div>
				</div>
			</div>
			
<footer>
	   <p>&copy 2022 Online Exam Panel. All Rights Reserved | Design by <a href="https://www.maven-infotech.com/" target="_blank">Maven Infotech.</a></p>
	</footer>