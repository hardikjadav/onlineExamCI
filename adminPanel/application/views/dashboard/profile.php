<?php
$this->load->view('include/header.php');
 ?>

			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Manage Profile</h3>
					 <div class="xs tabls">
					   
						
						<div class="panel panel-info" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
							<div class="panel-heading">
								<h2>Manage Profile</h2>
								<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											
											<th>Admin First Name</th>
											<th>Admin Last Name</th>
											<th>Admin User Name</th>
											<th>Address</th>
											<th>City</th>
											<th>State</th>
											<th>Country</th>
											<th>Profile Image</th>
											<th>Edit</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											
											<td><?php echo $fetch[0]['firstName'];?></td>
											<td><?php echo $fetch[0]['lastName'];?></td>
											<td><?php echo $fetch[0]['userName'];?></td>
											<td><?php echo $fetch[0]['address'];?></td>
											<td><?php echo $fetch[0]['cityName'];?></td>
											<td><?php echo $fetch[0]['stateName'];?></td>
											<td><?php echo $fetch[0]['countryName'];?></td>
											<td><img src="<?php base_url() ?> public/admin/upload/<?php echo $fetch[0]['adminImage'];?>" height="80px" width="80px"></td>

											<td><a href="adminControl/editUserProfile/<?php echo $fetch[0]['adminId']?>"><img src="<?php echo base_url() ?>public/admin/assets/images/edit.jpg"height="40px" width="40px"></a></td> 
										</tr>
										
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