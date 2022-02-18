<!DOCTYPE html>
<html lang="en">
<head>
    
    <!--header-->
	<?php include('header.php');?>
	<!--header-->



    <title>Help Desk | <?php echo $site_title;?></title>
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
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-6 col-xs-12 my-2">
                </div>

                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 my-2">
					<div class="card">
						<div class="card-header"><span class="fa fa-info-circle"></span> Help Desk!</div>
						<div class="card-body pb-5">
							
							<?php if(count($help_list)):?>
							<?php foreach($help_list as $help_list_row):?>
							<div class="card card-default mb-2">
								<p class="card-header">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $help_list_row->help_id;?>" class="text-dark">
									<span class="fa fa-caret-right"></span> <?php echo $help_list_row->help_title;?>
									</a>
								</p>
								<div id="collapseOne<?php echo $help_list_row->help_id;?>" class="card-collapse collapse in">
									<div class="card-body font-perpetua font-size-p"><?php echo $help_list_row->help_description;?></div>
								</div>
							</div>							
							<?php endforeach;?>
							<?php endif;?>
							
						</div> 
					</div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 my-2">
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