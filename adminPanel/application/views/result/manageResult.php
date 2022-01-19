<?php
$this->load->view('include/header.php');
 ?>

			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Result</h3>
					 <div class="xs tabls">
					   
						
						<div class="panel panel-info" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
							<div class="panel-heading">
								<h2>Result Table</h2>
								<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							<div class="panel-body no-padding" style="display: block;">
							<form action="<?php echo site_url('adminControl/searchResult');?>" method="post">
							<?php echo form_open("manageResult" , ['class' => 'form-inline']); ?>
            				<div class="form-group">
             				 <input type="text" class="form-control" id="searchuser" name="userName" placeholder="Type a User Name">
            					</div>
           					 <input type="submit" name="searchUserResult" class="btn btn-primary submit" value="search">
								<?php echo form_close(); ?>
       							 <?php echo '<h3 style="color: #26324E;">'.$message.'</h3>';?>
								<table class="table table-striped">
									<thead>
										<tr class="warning">

											<th>Category Name</th>
											<th>User Name</th>
											<th>Points</th>
											<th>Total Points</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach($fetch as $f)
												{
											?>
										<tr>
										<tr>
											
											<td><?php echo $f->userCategory;?></td>
											<td><?php echo $f->userName;?></td>
											<td><?php echo $f->points;?></td>
											<td><?php echo $f->totalPoints;?></td>
											<td><a href="<?php echo site_url('adminControl/editResult');?>/<?php echo $f->resultId;?>"><img src="<?php echo base_url() ?>public/admin/assets/images/edit.jpg" height="40px" width="40px"></a></td>
											<td><a href="<?php echo site_url('adminControl/editResult');?>/<?php echo $f->resultId;?>"><img src="<?php echo base_url() ?>public/admin/assets/images/delete1.jpg" height="40px" width="40px"></a></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
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