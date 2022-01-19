<?php
$this->load->view('include/header.php');
 ?>

			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Category</h3>
					 <div class="xs tabls">
					   
						
						<div class="panel panel-info" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
							<div class="panel-heading">
								<h2>Category Table</h2>
								<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							<div class="panel-body no-padding" >
				<form action="<?php echo site_url('adminControl/searchCategory');?>" method="post">
							<?php echo form_open("manageCategory" , ['class' => 'form-inline']); ?>
            <div class="form-group">
              <input type="text" class="form-control" id="searchuser" name="categoryName" placeholder="Type a categoryName">
            </div>
            <input type="submit" name="searchBtn" class="btn btn-primary submit" value="search">
        
        					<?php echo form_close(); ?>
       					 <?php echo '<h3 style="color: #26324E;">'.$message.'</h3>';?>
							
								<table class="table table-striped">
								
									<thead>
										<tr class="warning">
											
											<th>Category Name</th>
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
											<td><a href="<?php echo site_url('adminControl/editCategory');?>/<?php echo $f->categoryId;?>"><img src="<?php echo base_url() ?>public/admin/assets/images/edit.jpg" height="40px" width="40px"></a></td>
											<td><a href="<?php echo site_url('adminControl/deleteCategory');?>/<?php echo $f->categoryId;?>"><img src="<?php echo base_url() ?>public/admin/assets/images/delete1.jpg" height="40px" width="40px"></a></td>
											
										</tr>
										<?php }
										}
										else{	
										?>
										<tr><td>Data Not Found</td></tr>

									</tbody>
									<?php
								}										
								?>
								</table>
								
								
								</form>
								<p><?php echo $links; ?></p>
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