<!DOCTYPE html>
<html lang="en">
<head>

    <!--header-->
	<?php include('header.php');?>
	<!--header-->

    <title>Update Picture | <?php echo $site_title;?></title>
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
                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 col-xs-12 my-2">
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 bg-white form-shadow my-2">
                    <div class="m-4">						
                        <h3 class="text-secondary"><span class="fa fa-image text-info"></span> Update Your Picture</h3>
                        <br />
						
						<img src="<?php echo base_url('assest/images/user/').$user_image_address;?>" class="img-thumbnail mb-2" width="180">
						
                        <?php echo form_open_multipart("ct_user/update_profile_picture/{$user_id}"); ?> 
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
							<?php echo form_error('user_image_address', '<div class="text-danger">', '</div>');?>
							<?php echo form_upload(['name'=>'user_image_address', 'id'=>'file-1', 'class'=>'file', 'ata-preview-file-type'=>'any', 'accept'=>'image/*']);?>
                                <small class="text-muted">Use 1080px*1440px image.</small>
                            </div>	
                            
                           
                            <?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-outline-success', 'type'=>'submit', 'value'=>'Update']);?>

                        <?php echo form_close(); ?> 
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 col-xs-12 my-2">
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