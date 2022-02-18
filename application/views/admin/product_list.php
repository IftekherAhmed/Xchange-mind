<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title>Product List | <?php echo $site_title;?></title>
	
</head>
<body>
    <div class="container-fluid">
	

		
		<!--nav-->
			<?php include('menu.php');?>
		<!--end nav-->

		<div class="row">
			<div class="container">		
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
				<div class="row p-3">
				<!--product list-->
				<?php if(count($product_list)):?>
				<?php foreach($product_list as $product_list_row):?>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-2"> 
					<div class="mr-2">
						<div class="card">
							<div class="card-body bg-two-color-secondary">
								<img src="<?php echo base_url('');?>assest/images/product/<?php echo $product_list_row->product_thumbnail;?>" width="180" height="250" class="img-thumbnail">
								<h3 class="row mt-3 ml-2 mr-2">
								<?php echo anchor("ct_admin/single_product_view/{$product_list_row->product_id}", "{$product_list_row->product_name}", ['class'=>'text-dark']); ?>	
								</h3>
								<p class="row mt-3 ml-2 mr-1"><span class="far fa-clock"> <?php echo $controller->timestamp(strtotime($product_list_row->product_publish_date));?></span></p>
								<p>
									<?php echo anchor("ct_admin/user_view/{$product_list_row->user_id}", "<span class='fa fa-user'></span> {$product_list_row->user_name}", ['class'=>'text-dark mx-1']); ?>
									<?php echo anchor("ct_admin/category_view/{$product_list_row->category_id}", "<span class='fa fa-file-import'></span> {$product_list_row->category_name}", ['class'=>'text-dark mr-1']); ?>
								</p>
								<?php 
									if($product_list_row->product_visiblity == 0){
										echo"<p class='text-danger'>[Unapproved]</p>";
									}
								?>
								<p class="row mt-3 ml-2 mr-1"><?php echo word_limiter($product_list_row->product_description,50);?>
									<a href="#" data-original-title='Details' class="text-info right-tooltip"><?php echo anchor("ct_admin/single_product_view/{$product_list_row->product_id}", "[...]"); ?></a>
								</p>
							</div>
							<div class="card-footer">                                    
								<div class="dropdown float-right">
									<button type="button" class="btn btn-default bg-skyblue text-white dropdown-toggle" data-toggle="dropdown">Action</button>
									<div class="dropdown-menu">
										<?php 
											if($product_list_row->product_visiblity == 0){
												echo anchor("ct_admin/single_product_approve/{$product_list_row->product_id}", "<span class='fa fa-hands-helping'></span> Approve", ['data-original-title'=>'Approve','class'=>'dropdown-item text-dark right-tooltip']);
											}
										?>
										<?php echo anchor("ct_admin/single_product_view/{$product_list_row->product_id}", "<span class='fa fa-eye'></span> View", ['data-original-title'=>'View','class'=>'dropdown-item text-dark right-tooltip']); ?>								
										<?php echo anchor("ct_admin/single_product_edit_view/{$product_list_row->product_id}", "<span class='fa fa-cut'></span> Edit", ['data-original-title'=>'Edit','class'=>'dropdown-item text-dark right-tooltip']); ?>								
										<?php echo anchor("ct_admin/single_product_delete/{$product_list_row->product_id}", "<span class='fa fa-trash-alt'></span> Delete", ['data-original-title'=>'Delete','class'=>'dropdown-item text-danger right-tooltip']); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> 
				<?php endforeach;?>
				<?php endif;?>
                <!--end product list-->	



				</div><br /><br /><br />
			</div>
			<div class="container mt-5 mb-3">
				<nav class="custome-pagination">
					<?php echo $this->pagination->create_links($product_list_row->product_id);?>
				</nav>
			</div>
		</div>

        
    </div>
    <!--container-fluid-->
	
	
</body>
</html>