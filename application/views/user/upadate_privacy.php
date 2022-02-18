<!DOCTYPE html>
<html lang="en">
<head>
    

    <!--header-->
	<?php include('header.php');?>
	<!--header-->


    <title>Ensure privacy | <?php echo $site_title;?></title>
    <!--favicon-->
    <link rel="shortcut icon" href="<?php echo base_url('');?>assest/images/fevicon.png" />  
    <!--End favicon-->
</head>
<body>
    <div class="container-fluid">

        

    <!--menu-->
	<?php include('menu.php');?>
	<!--menu-->
       
        <div class="container my-2">
            <div class="row" style="margin-bottom: 200px;">

                <!--leftbar-->
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-xs-12 my-2">
                </div>

                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 bg-white form-shadow my-2">
                    <div class="m-4">						
                        <h3 class="text-secondary"><span class="fa fa-user-alt-slash text-info"></span> Privacy</h3>
                        <br /> 
                        <?php echo form_open("ct_user/update_user_privacy/{$user_id}"); ?> 
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
			
						
						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-2">
								<div class="form-group">
								<?php echo form_error('privacy_user_name', '<div class="text-danger">', '</div>');?>							
								<?php echo form_label('<span class="fa fa-user text-secondary"> Name');?>				                               		
								<select name="privacy_user_name" class="custom-select">
									<option value='1'>Public</option>
									<option value='2'>Private</option>
								</select>
								</div>	
							</div>
							
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-2">
								<div class="form-group">
								<?php echo form_error('privacy_user_number', '<div class="text-danger">', '</div>');?>							
								<?php echo form_label('<span class="fa fa-phone text-secondary"> Number');?>				                               		
								<select name="privacy_user_number" class="custom-select">
									<option value='1'>Public</option>
									<option value='2'>Private</option>
								</select>
								</div>	
							</div>
							
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-2">
								<div class="form-group">
								<?php echo form_error('privacy_user_email', '<div class="text-danger">', '</div>');?>							
								<?php echo form_label('<span class="fa fa-envelope text-secondary"> Email');?>				                               		
								<select name="privacy_user_email" class="custom-select">
									<option value='1'>Public</option>
									<option value='2'>Private</option>
								</select>
								</div>	
							</div>
						</div>
						
						
						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-2">
								<div class="form-group">
								<?php echo form_error('privacy_user_country', '<div class="text-danger">', '</div>');?>							
								<?php echo form_label('<span class="fa fa-globe-asia text-secondary"> Country');?>				                               		
								<select name="privacy_user_country" class="custom-select">
									<option value='1'>Public</option>
									<option value='2'>Private</option>
								</select>
								</div>		
							</div>
							
							
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-2">
								<div class="form-group">
								<?php echo form_error('privacy_user_profession', '<div class="text-danger">', '</div>');?>							
								<?php echo form_label('<span class="fa fa-life-ring text-secondary"> Profession');?>				                               		
								<select name="privacy_user_profession" class="custom-select">
									<option value='1'>Public</option>
									<option value='2'>Private</option>
								</select>
								</div>		
							</div>
							
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-2">
								<div class="form-group">
								<?php echo form_error('privacy_user_link', '<div class="text-danger">', '</div>');?>							
								<?php echo form_label('<span class="fa fa-globe text-secondary"> Link');?>				                               		
								<select name="privacy_user_link" class="custom-select">
									<option value='1'>Public</option>
									<option value='2'>Private</option>
								</select>
								</div>		
							</div>
						</div>					
						
						
						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-2">
								<div class="form-group">
								<?php echo form_error('privacy_user_gender', '<div class="text-danger">', '</div>');?>							
								<?php echo form_label('<span class="fa fa-male text-secondary"> Gender');?>				                               		
								<select name="privacy_user_gender" class="custom-select">
									<option value='1'>Public</option>
									<option value='2'>Private</option>
								</select>
								</div>		
							</div>
							
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-2">
								 <div class="form-group">
								<?php echo form_error('privacy_user_birthday', '<div class="text-danger">', '</div>');?>							
								<?php echo form_label('<span class="fa fa-child text-secondary"> Birthday');?>				                               		
								<select name="privacy_user_birthday" class="custom-select">
									<option value='1'>Public</option>
									<option value='2'>Private</option>
								</select>
								</div>		
							</div>
							
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-2">
								<div class="form-group">
								<?php echo form_error('privacy_user_about', '<div class="text-danger">', '</div>');?>							
								<?php echo form_label('<span class="fa fa-lightbulb text-secondary"> About');?>				                               		
								<select name="privacy_user_about" class="custom-select">
									<option value='1'>Public</option>
									<option value='2'>Private</option>
								</select>
								</div>		
							</div>
						</div>
						
                        
						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-2">
								<div class="form-group">
								<?php echo form_error('privacy_user_address', '<div class="text-danger">', '</div>');?>							
								<?php echo form_label('<span class="fa fa-map-marker-alt text-secondary"> Address');?>		                               		
								<select name="privacy_user_address" class="custom-select">
									<option value='1'>Public</option>
									<option value='2'>Private</option>
								</select>
								</div>		
							</div>
							
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-2">
								<div class="form-group">
								<?php echo form_error('privacy_user_image_address', '<div class="text-danger">', '</div>');?>							
								<?php echo form_label('<span class="fa fa-image text-secondary"> Profile picture');?>				                               		
								<select name="privacy_user_image_address" class="custom-select">
									<option value='1'>Public</option>
									<option value='2'>Private</option>
								</select>
								</div>			
							</div>
							
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-2">
								 <div class="form-group">
								<?php echo form_error('privacy_user_join', '<div class="text-danger">', '</div>');?>							
								<?php echo form_label('<span class="fa fa-calendar text-secondary"> Joined');?>				                               		
								<select name="privacy_user_join" class="custom-select">
									<option value='1'>Public</option>
									<option value='2'>Private</option>
								</select>
								</div>	
							</div>
						</div>
                           
							<br /><br />
                            <?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-outline-success', 'type'=>'submit', 'value'=>'Update']);?>
                        <?php echo form_close(); ?> 
                    </div>
                </div>

                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-xs-12 my-2">
                </div>
                <!--end leftbar-->                                 

                
            </div> 
            <!--main row-->           
        </div>
        <!--container-->

    <!--footer-->
    <?php include('footer.php');?>
	<!--end footer-->



        
    </div>
    <!--container-fluid-->
</body>
</html>