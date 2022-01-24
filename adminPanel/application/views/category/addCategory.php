<?php
$this->load->view('include/header.php');
 ?>
<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Add Category</h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" action="<?php echo site_url('CategoryController/saveCategory');?>" method="post">
	
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Category Name:</label>
									<div class="col-sm-8">
										<input type="text" name="categoryName" class="form-control1" id="focusedinput" placeholder="Add Category" />
										<span style="color:red"><?php echo form_error('categoryName');?></span>
									</div>
									
								</div>
								
							
							
								<div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<input type="submit" name="addCategory" value="Insert" class="btn-success btn">
									
									
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