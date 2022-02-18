<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title>Opinion | <?php echo $site_title;?></title>
	
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
					<?php if(count($opinion_list)):?>
					   <?php foreach($opinion_list as $opinion_list_row):?>
					   <div class="bg-white border p-3 my-2" style="display: flow-root;box-shadow: 2px 5px 5px #CCC;">						
							<a class="text-as-usual">
							<?php echo anchor("ct_admin/user_view/{$opinion_list_row->user_id}", "<span class='fa fa-user'></span> {$opinion_list_row->user_name}"); ?>						
							</a>
							<p class="text-as-usual mt-3"><?php echo $opinion_list_row->opinion_description;?></p>	
							<footer class="blockquote-footer">
								<cite><?php echo $controller->timestamp(strtotime($opinion_list_row->opinion_date));?></cite>
							</footer>
							<hr />
							<div class="dropdown float-right mr-2">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Action</a>
								<div class="dropdown-menu">								
								<?php echo anchor("ct_admin/single_opinion_delete/{$opinion_list_row->opinion_id}", "<span class='fa fa-trash-alt'></span> Delete", ['data-original-title'=>'Delete','class'=>'dropdown-item text-danger right-tooltip']); ?>								
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