<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title>Admin Login | <?php echo $site_title;?></title>
	
</head>
<body>
    <div class="container-fluid">
	
		
		<div class="row bg-off-white">
			<div class="container">
				<div class="row p-3">

					
					
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
					
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 my-1">
						<div class="bg-white border p-5 my-2">							
							
							<div class="justify-content-center mb-4 row">
								<img src="<?php echo base_url('');?>assest/images/logo.png" width="150" class="" />
							</div>

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
							
							<?php echo form_open('ct_admin_lr/login_admin', ['class'=>'mb-5', 'method'=>'post']);?>
								<?php echo form_error('admin_email', '<div class="text-danger">', '</div>');?>
								<?php echo form_input(['type'=>'email', 'name'=>'admin_email', 'placeholder'=>'Email', 'class'=>'form-control mb-2']);?>
								<?php echo form_error('admin_password', '<div class="text-danger">', '</div>');?>
								<?php echo form_input(['type'=>'password', 'name'=>'admin_password', 'placeholder'=>'Password', 'class'=>'form-control mb-2']);?>
								
								<label class="custom-control custom-checkbox">
									<?php echo form_checkbox(['name'=>'remember_me', 'class'=>'custom-control-input', 'value'=>'1']); ?>
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description"> Remember me.</span>
								</label>
								<br />

								<button class="btn btn-outline-success mr-2">Login</button>								
							<?php echo form_close();?>			
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
						
					

				</div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /> 
			</div>
		</div>

        
    </div>
    <!--container-fluid-->
	
	
</body>
</html>