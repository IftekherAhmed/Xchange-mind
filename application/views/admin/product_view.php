<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title><?php echo $single_product_view->product_name;?> | <?php echo $site_title;?></title>
	
</head>
<body>
    <div class="container-fluid">
	

		
		<!--nav-->
			<?php include('menu.php');?>
		<!--end nav-->
		
		
		<div class="row bg-off-white">
			<div class="container">
				<div class="row p-3">

				<!-- Modal -->
                <div class="modal fade" id="Modal_video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header badge-danger">
                        <h5 class="modal-title" id="exampleModalLabel">Video</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <?php echo $single_product_view->product_video_link; ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <hr /><br />

                <!--leftbar-->
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-xs-12 mb-2">
                    <div class="card">                            
                        <img src="<?php echo base_url('');?>assest/images/product/<?php echo $single_product_view->product_thumbnail;?>" class="card-img-top">
                        <div class="card-body">
                            <h3 class="card-sub-title"><?php echo $single_product_view->product_name;?></h3>                     
                            
							<?php echo anchor("http://{$single_product_view->product_live_preview_link}", "Live Preview", ['class'=>'btn btn-info my-1']); ?>
							<button type="button" class="btn btn-danger my-1" data-toggle="modal" data-target="#Modal_video"><span class="fa fa-angle-right"></span> Video</button>
							
							<?php if(!empty($single_product_view->product_download_link)):?>
							<a href="<?php echo base_url('');?>assest/product/zip/<?php echo $single_product_view->product_download_link;?>" class="btn btn-primary my-1"><span class='fa fa-download'></span> Download this</a>
							<?php else:?>
							<?php 
								echo "<button class='btn btn-primary my-1 disabled' role='button' aria-disabled='true'> Download this</button>";
								echo "<br /><p class='my-1'>This project is premium! Message ".anchor("ct_user/user_view/{$single_product_view->user_id}", "{$single_product_view->user_name}", ['class'=>'text-link'])." to buy this.</p>";
								//echo "<button class='btn btn-primary my-1 disabled' role='button' aria-disabled='true'> Download this</button>";
								?>
							<?php endif;?>
							
                            <div class="row">
                                <div class="col mx-2 my-2">																
									<p class="text-secondary">
									<?php echo anchor("ct_admin/user_view/{$single_product_view->user_id}", "<span class='fa fa-user'></span> {$single_product_view->user_name}", ['class'=>'text-secondary mx-2']); ?>
									 
									<?php echo anchor("ct_admin/category_view/{$single_product_view->category_id}", "<span class='fa fa-file-import'></span> {$single_product_view->category_name}", ['class'=>'text-secondary mx-2']); ?>
                                    <span class="fa fa-calendar"></span> <?php echo $controller->timestamp(strtotime($single_product_view->product_publish_date));?></p>
                                </div>
                            </div>
                            <p class="font-perpetua font-size-p">
                                <?php echo $single_product_view->product_description;?>	
                            </p>
                            <hr /> 

                        </div>   
                    </div>
                </div>
                <!--end leftbar-->  
                                

                <!--rightbar-->
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-12 mb-2">
                    <div class="row pl-3">

                        <div class="col">

                            <div class="card">
                                <div class="card-header bg-skyblue text-white">Feature</div>
                                <table class="table table-strip">
                                    <tr>
                                        <td>Responsive</td>
                                        <td>
										<?php 
										if($single_product_view->product_responsive == 1){
											echo "<span class='badge badge-success'><span class='fa fa-check'></span></span>";
										}else{
											echo "<span class='badge badge-danger'><span class='fa fa-times'></span></span>";
										}
										?>										
										</td>
                                    </tr>
                                    <tr>
                                        <td>Bootstrap</td>
                                        <td>
										<?php 
										if($single_product_view->product_bootstrap == 1){
											echo "<span class='badge badge-success'><span class='fa fa-check'></span></span>";
										}else{
											echo "<span class='badge badge-danger'><span class='fa fa-times'></span></span>";
										}
										?>										
										</td>
                                    </tr>
                                    <tr>
                                        <td>Dynamic</td>
                                        <td>
										<?php 
										if($single_product_view->product_type == 2){
											echo "<span class='badge badge-success'><span class='fa fa-check'></span></span>";
										}else{
											echo "<span class='badge badge-danger'><span class='fa fa-times'></span></span>";
										}
										?>									
										</td>
                                    </tr>
                                    <tr>
                                        <td>Static</td>
                                        <td>
										<?php 
										if($single_product_view->product_type == 1){
											echo "<span class='badge badge-success'><span class='fa fa-check'></span></span>";
										}else{
											echo "<span class='badge badge-danger'><span class='fa fa-times'></span></span>";
										}
										?>										
										</td>
                                    </tr>
                                    <tr>
                                        <td>Seo</td>
                                        <td>
										<?php 
										if($single_product_view->product_seo == 1){
											echo "<span class='badge badge-success'><span class='fa fa-check'></span></span>";
										}else{
											echo "<span class='badge badge-danger'><span class='fa fa-times'></span></span>";
										}
										?>										
										</td>
                                    </tr>
                                </table>
                            </div>							
							
							<div class="bg-white border p-3 mt-3">
								<p>Tag!</p>
								<p class="text-primary">
								<?php  
									$product_tag = $single_product_view->product_tag;
									$product_tag_ex = explode(',',$product_tag);
									foreach($product_tag_ex as $key=> $product_tag){
										echo "-".$product_tag."<span class='mr-1'></span>";
									}
								?>
								</p>
							</div>
                            
                        </div>  



				</div><br /><br /><br />
			</div>
		</div>

        
    </div>
    <!--container-fluid-->
	
	
</body>
</html>