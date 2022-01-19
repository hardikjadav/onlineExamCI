<?php
$this->load->view('include/header');
 ?>
<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Update result </h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" action="" method="post">
						<div class="bs-example" data-example-id="form-validation-states-with-icons">



						<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Category Name:</label>
									<div class="col-sm-8">
									<select name="categoryId"  class="form-control1">
										<option>---Select Category---</option>
										<?php
										foreach($categoryArray as $c)
										{
											if($c['categoryId']==$fetch[0]['categoryId'])
											{
										?>
										<option value="<?php echo $c['categoryId'];?>" selected><?php echo $c['categoryName'];?></option>
										<?php
											}else{
												?>
												<option value="<?php echo $c['categoryId'];?>"><?php echo $c['categoryName'];?></option>
										<?php
										}}
										?>
									</select>
										
									</div>
									
								</div>
						
						  
						  <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">User Name:</label>
									<div class="col-sm-8">
										<input type="text" name="userName" class="form-control1" id="focusedinput" value="<?php echo $fetch[0]['userName']?>">
										<span style="color:red"><?php echo form_error('userName');?></span>
									</div>
									
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Points:</label>
									<div class="col-sm-8">
										<input type="number" name="points" class="form-control1" id="focusedinput" value="<?php echo $fetch[0]['points']?>">
										<span style="color:red"><?php echo form_error('points');?></span>
									</div>
									
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Total Points:</label>
									<div class="col-sm-8">
										<input type="number" name="totalPoints" class="form-control1" id="focusedinput" value="<?php echo $fetch[0]['totalPoints']?>">
										<span style="color:red"><?php echo form_error('totalPoints');?></span>
									</div>
									
								</div>
								
								
								
						  <div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<input type="submit" name="editResult" value="Update" class="btn-success btn">
									
									
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