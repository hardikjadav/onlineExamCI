<?php
$this->load->view('include/header');
?>
<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Add Result</h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" action="" method="post">
	<div class="bs-example" data-example-id="form-validation-states-with-icons">
						<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Category Name:</label>
							<div class="col-sm-8">
								<select name="userCategory" class="form-control1" id="focusedinput" required="">
									<option>----select----</option>
									<option value="Fresher">Fresher</option>
									<option value="Intermediate">Intermediate</option>
									<option value="Experince">Experince</option>
									<span style="color:red"><?php echo form_error('categoryId');?></span>
							
									
								</select>
							</div>
						</div>
						
						  
						  <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">User Name:</label>
									<div class="col-sm-8">
										<input type="text" name="userName" class="form-control1" id="focusedinput" placeholder="Add User Name">
										<span style="color:red"><?php echo form_error('userName');?></span>
									</div>
									
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Points:</label>
									<div class="col-sm-8">
										<input type="number" name="points" class="form-control1" id="focusedinput" placeholder="Enter Result Points">
										<span style="color:red"><?php echo form_error('points');?></span>
									</div>
									
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Total Points:</label>
									<div class="col-sm-8">
										<input type="number" name="totalPoints" class="form-control1" id="focusedinput" placeholder="Enter Total Points">
										<span style="color:red"><?php echo form_error('totalPoints');?></span>
									</div>
									
								</div>
								
								
								
						  <div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<input type="submit" name="addResult" value="Insert" class="btn-success btn">
									
									
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