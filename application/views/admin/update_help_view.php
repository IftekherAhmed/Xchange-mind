<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title><?php echo $update_help_view->help_title;?> | <?php echo $site_title;?></title>
	
</head>
<body>
    <div class="container-fluid">
	

		
		<!--nav-->
			<?php include('menu.php');?>
		<!--end nav-->
		
		
		<div class="row bg-off-white">
			<div class="container">
				<div class="row p-3">

					
					
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
					
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 my-1">
						<div class="bg-white form-shadow p-5 my-2">
						<?php
							if($update_help_view):
						?>
							<?php echo form_open_multipart("ct_admin/single_help_edit/{$update_help_view->help_id}", ['class'=>'']); ?> 
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
									<?php echo form_error('help_title', '<div class="text-danger">', '</div>');?>
									<?php echo form_label('Help Title');?>
									<?php echo form_input(['name'=>'help_title', 'class'=>'form-control mr-2', 'placeholder'=>'help Title', 'value'=>$update_help_view->help_title]); ?>									
								</div>	
								
								<div class="form-group">
									<?php echo form_error('help_description', '<div class="text-danger">', '</div>');?>
									<?php echo form_label('Help Description');?>
									<?php echo form_textarea(['name'=>'help_description', 'class'=>'form-control', 'placeholder'=>'help', 'value'=>$update_help_view->help_description]); ?>
								</div>	
								<?php echo form_submit(['name'=>'update', 'class'=>'btn btn-info', 'type'=>'submit', 'value'=>'Done']);?>
							<?php echo form_close(); ?> 
							<?php endif; ?> 
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