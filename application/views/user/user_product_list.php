<!DOCTYPE html>
<html lang="en">
<head>

    <!--header-->
	<?php include('header.php');?>
	<!--header-->
    <title><?php echo $user_view->user_name;?> | <?php echo $site_title;?></title>
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
                 <!--product list-->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="ml-2 pl-1">
                        <div class="card">
                            <div class="card-header">
							<?php
								if($user_id == $user_view->user_id):
								echo "Your product.";
								else:
								echo $user_view->user_name."'s product.";
								endif;
							?>                
							</div>
                            <div class="card-body">
            
                                <!--responsive table-->
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Authore</th>
                                                <th>Cover Lettter</th>
                                                <th><span class="fa fa-eraser"></span> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
										if($user_product_list):
											foreach($user_product_list as $user_product_row):
												echo"<tr>";
												echo"<td>{$user_product_row->product_name}</td>";
												echo"<td>";
												echo anchor("ct_user/user_view/{$user_product_row->user_id}", "{$user_product_row->user_name}", ['data-original-title'=>"{$user_product_row->user_name}", 'class'=>'right-tooltip']);
												echo"</td>";
												echo"<td>";
												echo word_limiter($user_product_row->product_description,17);
												echo"</td>";
												
												echo"<td><div class='dropdown float-right'>
                                                        <button type='button' class='btn btn-info btn-sm dropdown-toggle' data-toggle='dropdown'>Action</button>
                                                        <div class='dropdown-menu'>";
														echo anchor("ct_user/product_view/{$user_product_row->product_id}", "<span class='fa fa-eye'></span> View", ['data-original-title'=>'View', 'class'=>'dropdown-item text-dark right-tooltip']);
														
														if($user_product_row->user_id == $user_id){
															echo anchor("ct_user/single_product_delete/{$user_product_row->product_id}", "<span class='fa fa-trash-alt'></span> Delete", ['data-original-title'=>'Delete','class'=>'dropdown-item text-danger right-tooltip']);
														}
														
												echo"</div>
                                                    </div></td>";
													
												echo"</tr>";
											endforeach;
										endif;
										?>                                           
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->     
                            </div>
                        </div> 
                        <!--card-->
                    </div>
                    <!--end product list-->
                    
                   
                </div>                
                <!--end product list main area-->                            

                           
                
                
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