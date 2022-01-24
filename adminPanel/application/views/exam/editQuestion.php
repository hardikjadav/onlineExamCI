<?php
$this->load->view('include/header.php');
 ?>
<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Update Question</h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" action="" method="post">
	
							
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Category Name:</label>
									<div class="col-sm-8">
									<select name="categoryId"  class="form-control1" onchange="getState(this.value)">
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
									<label for="focusedinput" class="col-sm-2 control-label">Question Name:</label>
									<div class="col-sm-8">
										<input type="text" name="questionName" class="form-control1" id="focusedinput" value="<?php echo $fetch[0]['questionName'];?>" />
										
									</div>
									
								</div>
								
							
							
								<div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<input type="submit" name="update" value="Update" class="btn-success btn">
									<a href="<?php echo site_url('manageQuestion');?>" class="col-sm-offset-8"><img src="<?php echo base_url() ?>public/admin/assets/images/back.jpg"height="40px" width="40px"></a>
									
								</div>
							</div>
						 </div>
						</form>
					  </div>
				
			</div>
		</div>
		<?php
$this->load->view('include/footer.php');
 ?>