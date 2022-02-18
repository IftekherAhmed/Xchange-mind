<!DOCTYPE html>
<html lang="en">
<head>

    <!--header-->
	<?php include('header.php');?>
	<!--header-->


    <title>Registeration | <?php echo $site_title;?></title>
    <!--favicon-->
	<link rel="shortcut icon" href="<?php echo base_url('');?>assest/images/fevicon.png" />  
	<!--End favicon-->
</head>
<body>
    <div class="container-fluid home-login">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-2"></div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-8 col-xs-12">
                <div class="home-login-con bg-light mt-5 p-5">
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
					<?php echo form_open('ct_lr/register_user', ['class'=>'mb-5', 'method'=>'post']);?>
						<?php echo form_error('user_email', '<div class="text-danger">', '</div>');?>
						<?php echo form_input(['type'=>'text', 'name'=>'reg_user_log_id', 'placeholder'=>'Id', 'class'=>'form-control mb-2']);?>
						<?php echo form_error('reg_user_password', '<div class="text-danger">', '</div>');?>
						<?php echo form_input(['type'=>'password', 'name'=>'reg_user_password', 'placeholder'=>'Password', 'class'=>'form-control mb-2']);?>
						<?php echo form_error('reg_user_re_password', '<div class="text-danger">', '</div>');?>
						<?php echo form_input(['type'=>'password', 'name'=>'reg_user_re_password', 'placeholder'=>'Re Password', 'class'=>'form-control mb-2']);?>
                        <button class="btn btn-outline-success mr-2">Join</button>
						<?php echo anchor("ct_lr/login_view", "Already member?", ['class'=>'text-link']);?>
                    <?php echo form_close();?>
                </div>   
            </div>            
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-2"></div>
        </div>
    </div>
</body>
</html>