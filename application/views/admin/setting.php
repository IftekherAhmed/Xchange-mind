<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title>Setting | <?php echo $site_title;?></title>
	
</head>
<body>
    <div class="container-fluid">
	

		
		<!--nav-->
			<?php include('menu.php');?>
		<!--end nav-->
		
		
		<div class="row">
			<div class="container">
				<div class="row p-3 bg-white">

					<!--leftbar-->
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-6 col-xs-12 my-2">
                    <div class="m-4">						
                         <h3><?php echo anchor("ct_admin/admin_setting_picture", "<span class='fa fa-image text-info'></span> Picture", ['class'=>'text-secondary']);?></h3>
                         <p class="text-muted">Update profile picture in here.</p>
					</div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 my-2">
                    <div class="m-4">                    					
						 <h3><?php echo anchor("ct_admin/admin_setting_profile", "<span class='fa fa-user-secret text-info'></span> Profile", ['class'=>'text-secondary']);?></h3>
                         <p class="text-muted">Update profile bio in here.</p>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 my-2">
                    <div class="m-4">						
                        <h3><?php echo anchor("ct_admin/admin_setting_password", "<span class='fa fa-eye-slash text-info'></span> Password", ['class'=>'text-secondary']);?></h3>
                         <p class="text-muted">Update password in here.</p>
                    </div>
                </div>
					<!--end leftbar-->  

				</div>
			</div>
		</div>

        
    </div>
    <!--container-fluid-->
	
	
</body>
</html>