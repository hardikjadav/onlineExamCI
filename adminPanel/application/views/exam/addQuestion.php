<?php
$this->load->view('include/header');
 ?>
<div id="page-wrapper">
	<div class="graphs">
	<h3 class="blank1">Add Questions</h3>
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<div class="bs-example" data-example-id="form-validation-states-with-icons">
					<form class="form-horizontal" action="" method="post">
							
						
						<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Category Name:</label>
							<div class="col-sm-8">
								<select name="categoryId" class="form-control1" id="focusedinput">
									<option>----select----</option>
									<?php foreach($fetchCategory as $fetch){?>
									<option value="<?php echo $fetch['categoryId'];?>"><?php echo $fetch['categoryName'];?></option>
									<?php } ?>
									<span style="color:red"><?php echo form_error('categoryId');?></span>
								</select>
							</div>
						</div>
						
						 <div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Questions Name:</label>
							<div class="col-sm-8">
								<input type="text" name="questionName" class="form-control1" id="focusedinput" placeholder="Add Exam Questions">
								<span style="color:red"><?php echo form_error('questionName');?></span>
							</div>
									
						</div>
										
							
						<div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<input type="submit" name="addQuestion" value="Insert" class="btn-success btn">
								</div>
							</div>
						</div>
									
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
		<?php
$this->load->view('include/footer');
 ?>