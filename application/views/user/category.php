<!DOCTYPE html>
<html lang="en">
<head>
    
	<!--header-->
	<?php include('header.php');?>
	<!--header-->


	<title><?php echo $category_view->category_name;?> | <?php echo $site_title;?></title>
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
				<?php if(!empty($product_list_by_category)):?>		
				<?php foreach($product_list_by_category as $product_row_by_category):?>				
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 mt-2">
						<div class="card border-custome home-product-effect mx-1">                             
							<img src="<?php echo base_url('');?>assest/images/product/<?php echo $product_row_by_category->product_thumbnail;?>" class="card-img-top">                          
							<div class="home-product-effect-con text-center p-3">
								<h3 class="card-sub-title mt-1"><?php echo anchor("ct_user/product_view/{$product_row_by_category->product_id}", "{$product_row_by_category->product_name}", ['class'=>'text-white']); ?></h3>
								<p>
									<?php echo anchor("ct_user/user_view/{$product_row_by_category->user_id}", "<span class='fa fa-user'></span> {$product_row_by_category->user_name}", ['class'=>'text-white mr-1']); ?>
									<?php echo anchor("ct_user/category_view/{$product_row_by_category->category_id}", "<span class='fa fa-file-import'></span> {$product_row_by_category->category_name}", ['class'=>'text-white mr-1']); ?>
								</p>
								<p class="text-secondary">
									<?php echo word_limiter($product_row_by_category->product_description,10);?>
								</p>                                           
							</div> 
						</div>
					</div>     
				<?php endforeach;?>
				<?php else:?>
				<h3 class="text-info mt-2">There is nothing</h3>
				<?php endif;?>


                    
                </div>
				
                    <div class="container mt-5 mb-3">
						<nav class="custome-pagination">
							<?php echo $this->pagination->create_links($category_view->category_id);?>
						</nav>
                    </div>
                <!--end product-->
                
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