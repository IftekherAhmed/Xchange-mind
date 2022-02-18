<!DOCTYPE html>
<html lang="en">
<head>
    
    <!--header-->
	<?php include('header.php');?>
	<!--header-->


    <title>Give your opinion | <?php echo $site_title;?></title>
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
            <div class="row">

                <!--leftbar-->
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-xs-12 my-2">				
                        
					<?php echo form_open_multipart('ct_user/make_opinion', ['class'=>'p-4 border-custome-deep']); ?> 
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
					
					<?php echo form_input(['name'=>'user_id', 'type'=>'hidden', 'value'=>$user_id]); ?>
                    <?php echo form_input(['name'=>'user_name', 'type'=>'hidden', 'value'=>$user_name]); ?>
							
							
                        <div class="form-group">
							<?php echo form_error('opinion_description', '<div class="text-danger">', '</div>');?>
							<?php echo form_label('Opinion');?>
							<?php echo form_textarea(['name'=>'opinion_description', 'class'=>'form-control', 'placeholder'=>'type your opinion...']); ?>
							<small class="form-text text-muted text-capitalize">Response your opinion about us.</small>
                        </div>	
                        <br />
                        <?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-outline-success', 'type'=>'submit', 'value'=>'Done']);?>
                    <?php echo form_close(); ?>     
                </div>
                <!--end leftbar-->  
                                

                <!--rightbar-->
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-12 my-2">
                    <div class="row pl-4">          
                        
    
                    </div>
                    <!--end row-->  
                </div> 
                <!--end rightbar-->
                
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