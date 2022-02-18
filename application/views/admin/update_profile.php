<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title>Update profile | <?php echo $site_title;?></title>
	
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
						<div class="bg-white form-shadow p-5 my-2">
							<?php echo form_open_multipart("ct_admin/update_profile/{$admin_id}"); ?> 
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
								<?php echo form_error('admin_name', '<div class="text-danger">', '</div>');?>
								<?php echo form_label('Name');?>
								<?php echo form_input(['name'=>'admin_name', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Name', 'value'=>$admin_name]); ?>
								</div>	

								<div class="form-group">
								<?php echo form_error('admin_number', '<div class="text-danger">', '</div>');?>
								<?php echo form_label('Number');?>
								<?php echo form_input(['name'=>'admin_number', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Number', 'value'=>$admin_number]); ?>
								</div>	
								
								<div class="form-group">
								<?php echo form_error('admin_email', '<div class="text-danger">', '</div>');?>
								<?php echo form_label('Email');?>
								<?php echo form_input(['name'=>'admin_email', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Email', 'value'=>$admin_email]); ?>
								<small class="form-text text-muted text-capitalize">Your email will not share with anyone</small>
								</div>
								
								<div class="form-group">
								<?php echo form_label('Gender');?>    
									<select class="custom-select" name="admin_gender">
										<option selected>Choose One...</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Other">Other</option>
									</select> 
								</div>
								
								
							   
								<div class="form-group">
								<?php echo form_label('Birthday');?><br />
								<?php				
									echo "<select name='admin_dob_date'>";
									for ($i=1; $i <=31 ; $i++) { 
									$day = $i;
									//echo $year; 

									echo "<option value='$day'>$day</option>";
									}
									echo "</select>";

									echo"&nbsp;&nbsp;<select name='admin_dob_month'>
									<option value='January'>January</option>
									<option value='February'>February</option>
									<option value='March'>March</option>
									<option value='April'>April</option>
									<option value='May'>May</option>
									<option value='June'>June</option>
									<option value='July'>July</option>
									<option value='August'>August</option>
									<option value='September'>September</option>
									<option value='October'>October</option>
									<option value='November'>November</option>
									<option value='December'>December</option>
									</select>";

									echo "&nbsp;&nbsp;<select name='admin_dob_year'>";
									for ($i=1960; $i <=2020 ; $i++) { 
									$year = $i;
									//echo $year; 

									echo "<option value='$year'>$year</option>";
									}
									echo "</select>";
								?>
								</div>
								<br /><br /><br />
								<?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-outline-success', 'type'=>'submit', 'value'=>'Update']);?>
                        <?php echo form_close(); ?> 			
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