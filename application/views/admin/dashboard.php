<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title>Dashboard | <?php echo $site_title;?></title>
	
</head>
<body>
<div id="load_screen"><div id="loading"><img src="<?php echo base_url('');?>assest/images/loading.gif" /></div></div>
    <div class="container-fluid">
	

		<!--nav-->
			<?php include('menu.php');?>
		<!--end nav-->
		
		
		<div class="row bg-off-white">
			<div class="container">
				<div class="row p-3">

					<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12 my-1">
						<div class="row pr-3">
						
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-1">
								<div class="bg-off-blue2 dashboard-con p-5 text-center text-white border-round-10">
									<h4 class="">Opinion</h4>
									<span class="fa fa-comment fa-4x"> <?php echo$total_opinion;?></span><br>
									<?php echo anchor("ct_admin/opinion_view", "View", ['class'=>'btn btn-outline-light row mt-4']);?>
								</div>
							</div>
						
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-1">
								<div class="bg-off-green dashboard-con p-5 text-center text-white border-round-10">
									<h4 class="">Product</h4>
									<span class="fa fa-exchange-alt fa-4x"> <?php echo$total_product;?></span><br>
									<?php echo anchor("ct_admin/product_view", "View", ['class'=>'btn btn-outline-light row mt-4']);?>
								</div>
							</div>
						
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1">
								<div class="bg-info dashboard-con p-5 text-center text-white border-round-10">
									<h4 class="">Category</h4>
									<span class="fa fa-feather fa-4x"> <?php echo$total_category;?></span><br>
									<?php echo anchor("ct_admin/category_list_view", "View", ['class'=>'btn btn-outline-light row mt-4']);?>
								</div>
							</div>
						
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-1">
								<div class="bg-off-yellow dashboard-con p-5 text-center text-white border-round-10">
									<h4 class="">User</h4>
									<span class="fa fa-users fa-4x"> <?php echo$total_user;?></span><br>
									<?php echo anchor("ct_admin/user_list_view", "View", ['class'=>'btn btn-outline-light row mt-4']);?>
								</div>
							</div>
							
						</div>						
					</div>

					<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 my-1">
					
						<div class="bg-white border p-3">
							<p> 
								Welcome <b><?php echo $admin_name;?></b><br>
								<small class="text-muted">This is your dashboard</small>
							<p>
						</div>
						
						<div class="bg-white border my-2 p-3">
							
							<div class="media">
								<img src="<?php echo base_url('assest/images/admin/').$admin_image_address;?>" class="d-flex mr-2 border-round-90" height="80" width="80" />
								<div class="media-body">
									<h5 class=""><?php echo $admin_name;?></h5>									
									
									<?php echo anchor("ct_admin/admin_profile", "Profile", ['class'=>'top-tooltip text-link','data-original-title'=>'View']); ?>
									|
									<?php echo anchor("ct_admin/admin_setting", "Setting", ['class'=>'top-tooltip text-link','data-original-title'=>'Setting']); ?>
									|
									<?php echo anchor("ct_admin_lr/log_out", "Logout", ['class'=>'right-tooltip text-danger','data-original-title'=>'Logout']); ?>
 
									
								</div>
							</div>
						</div>
						
						<div class="bg-white border my-2 p-3">
						<?php echo form_open_multipart('ct_admin/make_category', ['class'=>'form-inline p-2']); ?> 
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
							<div class="form-group mr-2">
								<?php echo form_error('category_name', '<div class="text-danger">', '</div>');?>
								<?php echo form_input(['name'=>'category_name', 'class'=>'form-control mr-2', 'placeholder'=>'Category Title']); ?>
							
							<?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-outline-success', 'type'=>'submit', 'value'=>'Publish']);?>
							<?php echo form_close(); ?> 
						</div>	  								
						</div>	

						<div class="bg-white border p-3 my-2">
							<?php echo form_open_multipart('ct_admin/make_notice', ['class'=>'p-3']); ?> 
							<?php 
								if($this->session->flashdata('errors')):
								 echo "<div class='text-danger'>".$this->session->flashdata('errors')."</div><br />";
								endif;
								
								if($this->session->flashdata('success')):
								 echo "<div class='text-success'>".$this->session->flashdata('success')."</div><br />";
								endif;
							?>
								<div class="form-group">
									<?php echo form_error('notice_title', '<div class="text-danger">', '</div>');?>
									<?php echo form_label('Notice Title');?>
									<?php echo form_input(['name'=>'notice_title', 'class'=>'form-control mr-2', 'placeholder'=>'Notice Title']); ?>
								</div>	
								
								<div class="form-group">
									<?php echo form_error('notice_description', '<div class="text-danger">', '</div>');?>
									<?php echo form_label('Notice Description');?>
									<?php echo form_textarea(['name'=>'notice_description', 'class'=>'form-control', 'placeholder'=>'Notice']); ?>
								</div>	
								<?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-outline-success', 'type'=>'submit', 'value'=>'Done']);?>
							<?php echo form_close(); ?> 
						</div>
												
					</div>

				</div>
			</div>
		</div>

        
    </div>
    <!--container-fluid-->
	
	
</body>
</html>