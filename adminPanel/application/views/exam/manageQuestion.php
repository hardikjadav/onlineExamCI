<?php
$this->load->view('include/header.php');
 ?>

			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1"> Questions</h3>
					 <div class="xs tabls">
					   
						
						<div class="panel panel-info" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
							<div class="panel-heading">
								<h2>Question Table</h2>
								<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							<div class="panel-body no-padding" style="display: block;">
							<form action="<?php echo site_url('adminControl/searchQuestion');?>" method="post">
							<?php echo form_open("manageQuestion" , ['class' => 'form-inline']); ?>
            <div class="form-group">
              <input type="text" class="form-control" id="searchuser" name="questionName" placeholder="Type a Question Name">
            </div>
            <input type="submit" name="searchQuestions" class="btn btn-primary submit" value="search">
			<?php echo form_close(); ?>
       					 <?php echo '<h3 style="color: #26324E;">'.$message.'</h3>';?>
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											
											<th>Category Name</th>
											<th>Question Name</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
									<?php
									if(!empty($fetch))
									{
											foreach($fetch as $f)
												{
											?>
										<tr>
											
											<td><?php echo $f->categoryName;?></td>
											<td><?php echo $f->questionName;?></td>
											<td><a href="<?php echo site_url('adminControl/editQuestion');?>/<?php echo $f->questionId;?>"><img src="<?php echo base_url() ?>public/admin/assets/images/edit.jpg" height="40px" width="40px"></a></td>
											<td><a href="<?php echo site_url('adminControl/deleteQuestion');?>/<?php echo $f->questionId;?>"><img src="<?php echo base_url() ?>public/admin/assets/images/delete1.jpg" height="40px" width="40px"></a></td>
										</tr>
										<?php }
										}
										?>
									</tbody>
								</table>
								<p><?php echo $links; ?></p>
									</form>
									
							</div>
						</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
$this->load->view('include/footer.php');
 ?>