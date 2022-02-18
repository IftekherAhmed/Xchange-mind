<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title><?php echo $single_help_view->help_title;?> List | <?php echo $site_title;?></title>
	
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
					<?php if($single_help_view):?>
					   <div class="bg-white border p-3 my-2" style="display: flow-root;box-shadow: 2px 5px 5px #CCC;">
							<h3 class="text-off-black"><?php echo $single_help_view->help_title;?></h3>
							<p class="text-as-usual"><?php echo $single_help_view->help_description;?></p>
							<footer class="blockquote-footer">
								<cite><?php echo $controller->timestamp(strtotime($single_help_view->help_published));?></cite>
							</footer>
							<hr />                                                 
						</div>
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