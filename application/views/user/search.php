<!DOCTYPE html>
<html lang="en">
<head>    

	<!--header-->
	<?php include('header.php');?>
	<!--header-->

	<title><?php echo$search_product_title;?> | <?php echo $site_title;?></title>
	<!--favicon-->
	<link rel="shortcut icon" href="<?php echo base_url('');?>assest/images/fevicon.png" />  
	<!--End favicon-->
</head>
<body>
    <div class="container-fluid">

    
    <!--menu-->
	<?php include('menu.php');?>
	<!--menu-->

       
        <div class="container mb-2">
            <div class="row">
    
                <!---product-->
                <div class="row pr-4 pl-4">
                    
                <?php if(count($search_product)):?>		
				<?php foreach($search_product as $product_row_by_search):?>				
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 mt-2">
						<div class="card border-custome home-product-effect mx-1">                             
							<img src="<?php echo base_url('');?>assest/images/product/<?php echo $product_row_by_search->product_thumbnail;?>" class="card-img-top">                          
							<div class="home-product-effect-con text-center p-3">
								<h3 class="card-sub-title mt-1"><?php echo anchor("ct_user/product_view/{$product_row_by_search->product_id}", "{$product_row_by_search->product_name}", ['class'=>'text-white']); ?></h3>
								<p>
									<?php echo anchor("ct_user/user_view/{$product_row_by_search->user_id}", "<span class='fa fa-user'></span> {$product_row_by_search->user_name}", ['class'=>'text-white mr-1']); ?>
									<?php echo anchor("ct_user/category_view/{$product_row_by_search->category_id}", "<span class='fa fa-file-import'></span> {$product_row_by_search->category_name}", ['class'=>'text-white mr-1']); ?>
								</p>
								<p class="text-secondary">
									<?php echo word_limiter($product_row_by_search->product_description,10);?>
								</p>                                           
							</div> 
						</div>
					</div>     
				<?php endforeach;?>
				<?php else:?>
				<h1>No product founded like "<?php echo $search_product_title;?>".</h1>
				<?php endif;?>


                    
                </div>
                <!--end post-->
                
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