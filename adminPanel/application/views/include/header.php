<!DOCTYPE HTML>
<html>
<head>
<title>OnlineExam Admin Module</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="<?php echo ADMINBASEPATH ?>public/admin/assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="<?php echo ADMINBASEPATH ?>public/admin/assets/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo ADMINBASEPATH ?>public/admin/assets/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="<?php echo ADMINBASEPATH ?>public/admin/assets/css/icon-font.min.css" type='text/css' />
<script src="<?php echo ADMINBASEPATH ?>public/admin/assets/js/Chart.js"></script>
<link href="<?php echo ADMINBASEPATH ?>public/admin/assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="<?php echo ADMINBASEPATH ?>public/admin/assets/js/wow.min.js"></script>
<script>
	 new WOW().init();
</script>

<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<script src="<?php echo ADMINBASEPATH ?>public/admin/assets/js/jquery-1.10.2.min.js"></script>

</head> 
 <body class="sticky-header left-side-collapsed">
    <section>
    
		<div class="left-side sticky-left-side">

			
			<div class="logo">
				<h1><a href="index.php">Easy <span>Admin</span></a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="<?php echo $basePath ?>index.php"><i class="lnr lnr-home"></i> </a>
			</div>

			
			<div class="left-side-inner">

				
					<ul class="nav nav-pills nav-stacked custom-nav">
						
						
						<li class="menu-list"><a href=""><i class="lnr lnr-spell-check"></i> <span>Category</span></a>
						<ul class="sub-menu-list">
								<li><a href="<?php echo site_url('addCategory')?>">Add Category</a> </li>
								<li><a href="<?php echo site_url('manageCategory')?>">Manage Category</a> </li>
								
								
								
								</li>
						
								</li>
								
							</ul>
						    </li> 
							
					<li class="menu-list"><a href=""><i class="lnr lnr-question-circle"></i> <span>Questions</span></a>
						<ul class="sub-menu-list">					
							<li><a href="<?php echo site_url('addQuestion')?>">Add Questions</a> </li>	
							<li><a href="<?php echo site_url('manageQuestion')?>">Manage Questions</a> </li>
						</ul>
						    </li> 	
							
							<li class="menu-list"><a href=""><i class="lnr lnr-menu"></i> <span>Results</span></a>
						<ul class="sub-menu-list">
								<li><a href="<?php echo site_url('addResult')?>">Add Result</a> 
								<li><a href="<?php echo site_url('manageResult')?>">Manage Result</a> 
								</li>
								
								
								
							</ul>
						    </li> 	

							
							<li><a href="logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>      
							
					</ul>
				
			</div>
		</div>
		
    
		
		<div class="main-content">
			
			<div class="header-section">
			 
			
			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
			
			<div class="menu-right">
				<div class="user-panel-top">  	
					<div class="profile_details_left">
						
					</div>
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span style="background:url(images/1.jpg) no-repeat center"> </span> 
										 <div class="user-name">
											<p><?php echo $this->session->userdata('admin');?><span>Administrator</span></p>
										 </div>
										 <i class="lnr lnr-chevron-down"></i>
										 <i class="lnr lnr-chevron-up"></i>
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
									 
									<li> <a href="profile"><i class="fa fa-user"></i>Profile</a> </li> 
									<li> <a href="changePassword"><i class="fa fa-sign-out"></i> Change Password</a> </li>
									<li> <a href="logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
								</ul>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>		
					       	
					<div class="clearfix"></div>
				</div>
			  </div>
			
			</div>
		