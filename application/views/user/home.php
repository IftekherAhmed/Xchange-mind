<!DOCTYPE html>
<html lang="en">
<head>
    
    <!--header-->
	<?php include('header.php');?>
	<!--header-->
	
	<!--Meta-->
	<meta charset="utf-8">
	<meta name="description" content="You can easily share your web template.">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="keywords" content="e-commerce, share, template, web, x-change">
	<meta name="author" content="Iftekhar Emon">
	<!--End Meta-->
	
    <title>Home | <?php echo $site_title;?></title>
    <!--favicon-->
    <link rel="shortcut icon" href="<?php echo base_url('');?>assest/images/fevicon.png" />  
    <!--End favicon-->
</head>
<body>
<div id="load_screen"><div id="loading"><img src="<?php echo base_url('');?>assest/images/loading.gif" /></div></div>
    <div class="container-fluid">

       

    <!--menu-->
	<?php include('menu.php');?>
	<!--menu-->
       
        <div class="container my-2">
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
            <div class="row">
                <!--leftbar-->
                <div class="row col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-12 mb-2">
                    <!--main content-->
                    <div class="pr-3 pl-3">
                        <img src="<?php echo base_url('');?>assest/images/E-Commerce011.jpg" class="img-fluid rounded">
                    </div>

                    <!---product-->
                    <div class="row pr-4 pl-4">
					
					<?php if(count($product_list_for_home)):?>
					   <?php foreach($product_list_for_home as $product_list_row):?>					   
							<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-2">
								<div class="card border-custome home-product-effect mx-1">                             
									<img src="<?php echo base_url('');?>assest/images/product/<?php echo $product_list_row->product_thumbnail;?>" class="card-img-top">                          
									<div class="home-product-effect-con text-center p-3">
										<h3 class="card-sub-title mt-2">
										<?php echo anchor("ct_user/product_view/{$product_list_row->product_id}", "{$product_list_row->product_name}", ['class'=>'text-white']); ?>
										</h3>
											<?php echo anchor("ct_user/user_view/{$product_list_row->user_id}", "<span class='fa fa-user'></span> {$product_list_row->user_name}", ['class'=>'text-white mr-1']); ?>
											<?php echo anchor("ct_user/category_view/{$product_list_row->category_id}", "<span class='fa fa-file-import'></span> {$product_list_row->category_name}", ['class'=>'text-white mr-1']); ?>
										</p>
										<p class="text-secondary">
											<?php echo htmlentities(word_limiter($product_list_row->product_description,15));?>
										</p>                                           
									</div> 
								</div>
							</div>
					   <?php endforeach;?>
					<?php endif;?>
                        
                        

                        
                    </div>
                    <!--end post-->
                </div>
                <!--end leftbar-->  
                                

                <!--rightbar-->
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="row pl-3">

                        
                        <!--notice-->
					
					<?php if(count($notice)):?>
					   <?php foreach($notice as $notice_row):?>				   
							
							<div class="card">						
								<div class="card-body notice alert alert-dismissable m-0">
									<button type='button' class='close float-right' data-dismiss='alert' aria-hidden='true'>&times;</button>
									<h1 class="card-title"><?php echo $notice_row->notice_title;?></h1><hr />
									<b><?php echo $controller->timestamp(strtotime($notice_row->notice_published));?></b><br />
									<p class="card-text">									
									<?php echo $notice_row->notice_description;?>                                   
									</p><hr />
								</div> 
							</div>
							
					   <?php endforeach;?>
					<?php endif;?>
					
                        <!--ad-->
                        <div class="my-2">
                            <img src="<?php echo base_url('');?>assest/images/first-con.jpg" class="img-thumbnail">
                        </div>
                        

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