<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title>Category List | <?php echo $site_title;?></title>	
	
</head>
<body>
    <div class="container-fluid">
	

		
		<!--nav-->
			<?php include('menu.php');?>
		<!--end nav-->
		
		
		<div class="row">
			<div class="container">
				<div class="row p-3">

					
					
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
					
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 my-1">
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
						<div class="p-2 my-2">
							<div class="card">
								<div class="card-header">Category</div>
								<div class="card-body">
				
									<!--responsive table-->
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered" id="dataTables-example">
											<thead>
												<tr>
													<th><span class="fa fa-sort"></span> ID</th>
													<th>Name</th>
													<th>Published</th>
													<th><span class="fa fa-eraser"></span> Action</th>
												</tr>
											</thead>
											<tbody>
											<?php if(count($menu)):?>
											<?php foreach($menu as $menu_row):?>
												<tr>
													<td><?php echo $menu_row->category_id;?></td>
													<td>
													<?php echo anchor("ct_admin/category_view/{$menu_row->category_id}", "{$menu_row->category_name} <span class='badge badge-dark'>{$controller->count_product_by_category($menu_row->category_id)}</span>", ['data-original-title'=>"{$menu_row->category_name} ({$controller->count_product_by_category($menu_row->category_id)})",'class'=>'right-tooltip text-dark font-openSans-Regular']); ?>	
													</td>
													<td><?php echo $controller->timestamp(strtotime($menu_row->category_published_date));?></td>
													<td>                                  
														<div class="dropdown float-right">
															<a href="#" class="dropdown-toggle text-link" data-toggle="dropdown">Action</a>
															<div class="dropdown-menu">
																<?php echo anchor("ct_admin/category_view/{$menu_row->category_id}", "<span class='fa fa-eye'></span> View", ['data-original-title'=>'View','class'=>'dropdown-item text-dark right-tooltip']); ?>								
																<?php echo anchor("ct_admin/single_category_edit_view/{$menu_row->category_id}", "<span class='fa fa-cut'></span> Edit", ['data-original-title'=>'Edit','class'=>'dropdown-item text-dark right-tooltip']); ?>								
																<?php echo anchor("ct_admin/single_category_delete/{$menu_row->category_id}", "<span class='fa fa-trash-alt'></span> Delete", ['data-original-title'=>'Delete','class'=>'dropdown-item text-danger right-tooltip']); ?>
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
					
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
						
					

				</div><br /><br /><br />
			</div>
		</div>

        
    </div>
    <!--container-fluid-->
	
	
</body>
</html>