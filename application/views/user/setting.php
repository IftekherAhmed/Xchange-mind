<!DOCTYPE html>
<html lang="en">
<head>
    

    <!--header-->
	<?php include('header.php');?>
	<!--header-->


    <title>Setting | <?php echo $site_title;?></title>
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
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-6 col-xs-12 my-2">
                    <div class="m-4">						
                         <h3><?php echo anchor("ct_user/user_setting_picture", "<span class='fa fa-image text-info'></span> Picture", ['class'=>'text-secondary']);?></h3>
                         <p class="text-muted">Update profile picture in here.</p>
					</div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-6 col-xs-12 my-2">
                    <div class="m-4">                    					
						 <h3><?php echo anchor("ct_user/user_setting_profile", "<span class='fa fa-user-secret text-info'></span> Profile", ['class'=>'text-secondary']);?></h3>
                         <p class="text-muted">Update profile bio in here.</p>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-6 col-xs-12 my-2">
                    <div class="m-4">						
                        <h3><?php echo anchor("ct_user/user_setting_privacy", "<span class='fa fa-user-alt-slash text-info'></span> Privacy", ['class'=>'text-secondary']);?></h3>
                         <p class="text-muted">Give profile security in here.</p>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-6 col-xs-12 my-2">
                    <div class="m-4">						
                        <h3><?php echo anchor("ct_user/user_setting_password", "<span class='fa fa-eye-slash text-info'></span> Password", ['class'=>'text-secondary']);?></h3>
                         <p class="text-muted">Update password in here.</p>
                    </div>
                </div>
                <!--end leftbar-->                                 

                
            </div> 
            <!--main row-->           
        </div>
        <!--container-->
		<br /><br />
    <!--footer-->
    <?php include('footer.php');?>
	<!--end footer-->



        
    </div>
    <!--container-fluid-->
</body>
</html>