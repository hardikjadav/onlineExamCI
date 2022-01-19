<?php
$this->load->view('include/header.php');
 ?>
<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Change Password Forms</h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form action = "" method="post" class="form-horizontal">
	<div class="bs-example" data-example-id="form-validation-states-with-icons">
						<form>
			
						  
						  		<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Old Password:</label>
									<div class="col-sm-8">
										<input type="password" name="userPasswordFetch" class="form-control1" id="focusedinput" placeholder="Enter Old Password">
										<span style="color:red"><?php echo form_error('userPasswordFetch');?></span>
									</div>
									
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">New Password:</label>
									<div class="col-sm-8">
										<input type="password" name="newUserPassword" class="form-control1" id="focusedinput" placeholder="Enter New Password">
										<span style="color:red"><?php echo form_error('newUserPassword');?></span>
									</div>
									
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">ReEnter Password:</label>
									<div class="col-sm-8">
										<input type="password" name="confirmUserPassword" class="form-control1" id="focusedinput" placeholder="Enter Confirm Password">
										
										<span style="color:red"><?php echo form_error('confirmUserPassword');?></span>
									</div>
									
									
								</div>

							
								
								
								
						  <div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<input type="submit" name="changePassword" value="change Password" class="btn-success btn">
									
									
								</div>
							</div>
						 </div>
						</form>
					  </div>
				</div>
			</div>
		</div>
		<?php
$this->load->view('include/footer.php');
 ?>