<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title><?php echo $update_category_view->category_name;?> | <?php echo $site_title;?></title>
	
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
							if($update_category_view):
						?>
							<?php echo form_open_multipart("ct_admin/single_category_edit/{$update_category_view->category_id}", ['class'=>'']); ?> 
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
									<?php echo form_error('category_name', '<div class="text-danger">', '</div>');?>
									<?php echo form_label('Category Name');?>
									<?php echo form_input(['name'=>'category_name', 'class'=>'form-control mr-2', 'placeholder'=>'category Name', 'value'=>$update_category_view->category_name]); ?>									
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