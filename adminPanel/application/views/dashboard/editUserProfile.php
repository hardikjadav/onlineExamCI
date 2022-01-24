

<!DOCTYPE HTML>
<html>
<head>
<title>Register | Online Exam</title>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	function getState(str)
{
	$.ajax
	({
		type: "POST",
		url: "stateData",
		data:"btn=" + str,
		success: function(data)
		{
			$("#stateId").html(data) ;
		}
	});
}
</script>

<script>
	function getCity(str)
{
	$.ajax
	({
		type: "POST",
		url: "stateData",
		data:"btn=" + str,
		success: function(data)
		{
			$("#stateId").html(data) ;
		}
	});
}
</script>
</head> 
   
 <body class="sign-in-up">
    <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-up">
						<h3>Edit User Profile</h3>
					
						<form action="" method="post" enctype="multipart/form-data">
						<div class="sign-u">
						
							<div class="sign-up1">
								<h4>First Name* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="text" name="firstName" value="<?php echo $fetch[0]['firstName'];?>" required=" "/>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Last Name* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="text" name="lastName" value="<?php echo $fetch[0]['lastName'];?>" required=" "/>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						
						<div class="sign-u">
							<div class="sign-up1">
								<h4>User Name* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="text" name="userName" value="<?php echo $fetch[0]['userName'];?>" required=" "/>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						<?php
						$userGender=$fetch[0]['gender'];
						if($userGender==0)
						{
						?>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Gender* :</h4>
							</div>
							<div class="sign-up2">
									<input type="radio" name="gender" value="0" checked="" /> Male
									<input type="radio" name="gender" value="1" /> Female
							
							</div>
							
							<div class="clearfix"> </div>
						</div>
						<?php
						}
						else{
						?><div class="sign-u">
						<div class="sign-up1">
							<h4>Gender* :</h4>
						</div>
						<div class="sign-up2">
								<input type="radio" name="gender" value="0" /> Male
								<input type="radio" name="gender" value="1" checked="" /> Female
						
						</div>
						
						<div class="clearfix"> </div>
					</div>
					<?php } ?>
						
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Address* :</h4>
							</div>
							<div class="sign-up2">
							
									<input type="text" name="address" value="<?php echo $fetch[0]['address'];?>" required=" "/>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Country* :</h4>
							</div>
							<div class="sign-up2">
							
									<select name="countryId"  class="form-control1" onchange="getState(this.value)">
										<option>---Select Country---</option>
										<?php
										foreach($countryArray as $c)
										{
											if($c['countryId']==$fetch[0]['countryId'])
											{
										?>
										<option value="<?php echo $c['countryId'];?>" selected><?php echo $c['countryName'];?></option>
										<?php
											}else{
												?>
												<option value="<?php echo $c['countryId'];?>"><?php echo $c['countryName'];?></option>
										<?php
										}}
										?>
									</select>
								
							</div>
							<div class="clearfix"> </div>
						</div>

						<div class="sign-u">
							<div class="sign-up1">
								<h4>State* :</h4>
							</div>
							<div class="sign-up2">
							
									<select name="stateId"  class="form-control1" onchange="getState(this.value)">
										<option>---Select State---</option>
										<?php
										foreach($stateArray as $c)
										{
											if($c['stateId']==$fetch[0]['stateId'])
											{
										?>
										<option value="<?php echo $c['stateId'];?>" selected><?php echo $c['stateName'];?></option>
										<?php
											}else{
												?>
												<option value="<?php echo $c['stateId'];?>"><?php echo $c['stateName'];?></option>
										<?php
										}}
										?>
									</select>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						

						<div class="sign-u">
							<div class="sign-up1">
								<h4>City* :</h4>
							</div>
							<div class="sign-up2">
							
									<select name="cityId"  class="form-control1" onchange="getState(this.value)">
										<option>---Select City---</option>
										<?php
										foreach($cityArray as $c)
										{
											if($c['cityId']==$fetch[0]['cityId'])
											{
										?>
										<option value="<?php echo $c['cityId'];?>" selected><?php echo $c['cityName'];?></option>
										<?php
											}else{
												?>
												<option value="<?php echo $c['cityId'];?>"><?php echo $c['cityName'];?></option>
										<?php
										}}
										?>
									</select>
								
							</div>
							<div class="clearfix"> </div>
						</div>
			
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Image :</h4>
							</div>
							<div class="sign-up2">
							
									<input type="file" name="adminImage" value="<?php echo $fetch[0]['adminImage']?>" required=" "/>
										
							</div>
							<div class="clearfix"> </div>
						</div>
						<img src="<?php echo base_url() ?>/public/admin/upload/<?php echo $fetch[0]['adminImage']?>" height="100px" width="100px">
						<div class="sub_home">
							<div class="sub_home_left">
							<input type="submit" value="Update" name="submit">
							</div>
							<div class="sub_home_right">
							<a href="<?php echo site_url('profile');?>"><img src="<?php echo base_url() ?>public/admin/assets/images/back.jpg"height="40px" width="40px"></a>
							</div>
							<div class="clearfix"> </div>
						</div>
						
						</form>
					</div>
				</div>
			</div>
<footer>
	   <p>&copy 2022 Online Exam Panel. All Rights Reserved | Design by <a href="https://www.maven-infotech.com/" target="_blank">Maven Infotech.</a></p>
	</footer>
	