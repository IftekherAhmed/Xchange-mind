<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title>User List | <?php echo $site_title;?></title>
	
</head>
<body>
    <div class="container-fluid">
	

		
		<!--nav-->
			<?php include('menu.php');?>
		<!--end nav-->
		
		
		<div class="row">
			<div class="container">
				<div class="row p-3">

					
					
					
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 my-1">
						<div class="p-2 my-2">
							<div class="card">
								<div class="card-header">User List							
								<!--database message-->
								<?php 
									if($this->session->flashdata('errors')):
										echo "<div class='alert alert-dismissable alert-danger'>
										<button type='button' class='close float-right' data-dismiss='alert' aria-hidden='true'>&times;</button>
										<strong><span class='glyphicon glyphicon-info-circle'></span> ".$this->session->flashdata('errors')."</strong>
										</div>";
									endif;
									
									if($this->session->flashdata('success')):
										echo "<div class='alert alert-dismissable alert-success'>
										<button type='button' class='close float-right' data-dismiss='alert' aria-hidden='true'>&times;</button>
										<strong><span class='fa fa-info-circle'></span> ".$this->session->flashdata('success')."</strong>
										</div>";
									endif;
									
								?>
								<!--end database message-->
								</div>
								<div class="card-body">
				
									<!--responsive table-->
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered" id="dataTables-example">
											<thead>
												<tr>
													<th><span class="fa fa-sort"></span> ID</th>
													<th>Image</th>
													<th>Name</th>
													<th>Number</th>
													<th>Email</th>
													<th>Country</th>
													<th>Profession</th>
													<th><span class="fa fa-eraser"></span> Action</th>
												</tr>
											</thead>
											<tbody>
											<?php if(count($user_list)):?>
											<?php foreach($user_list as $user_list_row):?>
												<tr>
													<td><?php echo $user_list_row->user_id;?></td>
													<td>
													<?php 
														if(!empty($user_list_row->user_image_address)){
													?>
														<img src="<?php echo base_url('assest/images/user/').$user_list_row->user_image_address;?>" width="50">
													<?php	
													}else{
														echo"<div class='img-thumbnail p-2 text-danger'>Not uploaded!</div>";
													}
													?>													
													</td>
													<td class="font-openSans-Regular">													
													<?php echo anchor("ct_admin/user_view/{$user_list_row->user_id}", "{$user_list_row->user_name}", ['data-original-title'=>"{$user_list_row->user_name}",'class'=>'right-tooltip']); ?>
													</td>
													<td class="font-openSans-Regular"><?php echo $user_list_row->user_number;?></td>
													<td class="font-openSans-Regular"><?php echo $user_list_row->user_email;?></td>
													<td class="font-openSans-Regular"><?php echo $user_list_row->user_country;?></td>
													<td class="font-openSans-Regular"><?php echo $user_list_row->user_profession;?></td>
													<td class="font-openSans-Regular">                                  
														<div class="dropdown float-right">
															<a href="#" class="dropdown-toggle text-link" data-toggle="dropdown">Action</a>
															<div class="dropdown-menu">
																<?php echo anchor("ct_admin/user_view/{$user_list_row->user_id}", "<span class='fa fa-eye'></span> View", ['data-original-title'=>'View','class'=>'dropdown-item text-dark right-tooltip']); ?>								
																<?php echo anchor("ct_admin/user_edit_view/{$user_list_row->user_id}", "<span class='fa fa-cut'></span> Edit", ['data-original-title'=>'Edit','class'=>'dropdown-item text-dark right-tooltip']); ?>								
																<?php echo anchor("ct_admin/user_delete/{$user_list_row->user_id}", "<span class='fa fa-trash-alt'></span> Delete", ['data-original-title'=>'Delete','class'=>'dropdown-item text-danger right-tooltip']); ?>
															</div>
														</div>                                                    
													</td>
												</tr>												
											<?php endforeach;?>
											<?php endif;?>
											</tbody>
										</table>
									</div>
									<!-- /.table-responsive -->     
								</div>
							</div> 
							<!--card-->			
						</div>
					</div>
						
					

				</div><br /><br /><br />
			</div>
		</div>

        
    </div>
    <!--container-fluid-->
	
	
</body>
</html>