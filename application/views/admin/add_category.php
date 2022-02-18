<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title>Add Category | <?php echo $site_title;?></title>
	
</head>
<body>
    <div class="container-fluid">
	

		
		<!--nav-->
			<?php include('menu.php');?>
		<!--end nav-->
		
		
		<div class="row">
			<div class="container">
				<div class="row p-3">

					
					
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
					
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 my-1">
						<div class="form-shadow p-5 my-2">
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
					
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
						
					

				</div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /> 
			</div>
		</div>

        
    </div>
    <!--container-fluid-->
	
	
</body>
</html>