<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title>Help List | <?php echo $site_title;?></title>
	
</head>
<body>
    <div class="container-fluid">
	

		
		<!--nav-->
			<?php include('menu.php');?>
		<!--end nav-->
		
		
		<div class="row bg-white">
			<div class="container">
				<div class="row p-3">

					
					
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
					
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 my-1">
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
					<?php if(count($help_list)):?>
					   <?php foreach($help_list as $help_list_row):?>
					   <div class="bg-white border p-3 my-2" style="display: flow-root;box-shadow: 2px 5px 5px #CCC;">
							<h3 class="text-off-black"><?php echo $help_list_row->help_title;?></h3>							
							
							<p class="text-as-usual">
							<?php echo word_limiter($help_list_row->help_description,30);?>
								<a href="#" data-original-title='Details' class="text-info right-tooltip"><?php echo anchor("ct_admin/single_help_view/{$help_list_row->help_id}", "[...]"); ?></a>
							</p>
							
							<footer class="blockquote-footer">
								<cite><?php echo $controller->timestamp(strtotime($help_list_row->help_published));?></cite>
							</footer>
							<hr />
							<div class="dropdown float-right mr-2">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Action</a>
								<div class="dropdown-menu">
								
								<?php echo anchor("ct_admin/single_help_view/{$help_list_row->help_id}", "<span class='fa fa-eye'></span> View", ['data-original-title'=>'View','class'=>'dropdown-item text-dark right-tooltip']); ?>
								
								<?php echo anchor("ct_admin/single_help_edit_view/{$help_list_row->help_id}", "<span class='fa fa-cut'></span> Edit", ['data-original-title'=>'Edit','class'=>'dropdown-item text-dark right-tooltip']); ?>
								
								<?php echo anchor("ct_admin/single_help_delete/{$help_list_row->help_id}", "<span class='fa fa-trash-alt'></span> Delete", ['data-original-title'=>'Delete','class'=>'dropdown-item text-danger right-tooltip']); ?>
								
								</div>
							</div>                                                    
						</div>
					   <?php endforeach;?>
					<?php endif;?>
						
					</div>
					
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
						
					

				</div><br /><br /><br />
			</div>
		</div>

        
    </div>
    <!--container-fluid-->
	
	
</body>
</html>