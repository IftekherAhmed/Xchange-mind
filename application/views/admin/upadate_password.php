<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title>Update Password | <?php echo $site_title;?></title>
	
</head>
<body>
    <div class="container-fluid">
	

		
		<!--nav-->
			<?php include('menu.php');?>
		<!--end nav-->
		
		
		<div class="row">
			<div class="container">
				<div class="row p-3">

					<!--leftbar-->
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 my-2">
					</div>

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 bg-white form-shadow my-2">
						<div class="m-4">						
							<h3 class="text-secondary"><span class="fa fa-eye-slash text-info"></span> Update Your Password</h3>
							<br />
							<?php echo form_open("ct_admin/update_password/{$admin_id}"); ?> 
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
								<div class="form-group">
								<?php echo form_error('admin_old_password', '<div class="text-danger">', '</div>');?>
								<?php echo form_input(['name'=>'admin_old_password', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Old Password', 'data-toggle'=>'password']); ?>
								</div>
								
								<div class="form-group">
								<?php echo form_error('admin_password', '<div class="text-danger">', '</div>');?>
								<?php echo form_input(['name'=>'admin_password', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'New Password', 'data-toggle'=>'password']); ?>
								</div>
								
								<div class="form-group">
								<?php echo form_error('admin_re_password', '<div class="text-danger">', '</div>');?>
								<?php echo form_input(['name'=>'admin_re_password', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Re Password', 'data-toggle'=>'password']); ?>
								</div>
								
								<?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-outline-success', 'type'=>'submit', 'value'=>'Update']);?>
							<?php echo form_close(); ?>
						</div>
					</div>

					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 my-2">
					</div>
					<!--end leftbar-->   

				

				</div>
			</div>
		</div>

        
    </div>
    <!--container-fluid-->
	
	
</body>
</html>