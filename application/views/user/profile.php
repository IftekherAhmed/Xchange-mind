<!DOCTYPE html>
<html lang="en">
<head>
    

    <!--header-->
	<?php include('header.php');?>
	<!--header-->


    <title>Profile | <?php echo $site_title;?></title>
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

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="p-1">
                        <img src="<?php echo base_url('assest/images/user/').$user_image_address;?>" class="img-thumbnail mb-2">
						<div class="bg-orange my-1">                            
							<p class="text-center p-1 m-0">							
								<?php
								echo anchor("ct_user/add_product", "<span class='fa fa-plus'></span> Add Product", ['class'=>'text-white']);
								?>
							</p>
						</div>
						<div class="bg-skyblue my-1">                            
							<p class="text-center p-1 m-0">								
								<?php 
								echo anchor("ct_user/user_product_list/{$user_id}", "<span class='fa fa-list'></span> Product list ({$controller->count_product_by_user($user_id)})", ['class'=>'text-white']);
								?>
							</p>
						</div>

                        <div class="bg-off-white border p-3">                          
                            <span class="label label-large label-yellow arrowed-in pl-4 pr-3"><?php echo $user_log_id;?></span><br /><br />
							
                            <p><?php echo anchor("http://{$user_link}", "<span class='fa fa-globe'> {$user_link}</span>",['class'=>'text-info']); ?></p>
							
                            <p class="text-secondary"><span class="fa fa-calendar"></span> <?php echo $controller->timestamp(strtotime($user_join));?></p>  
							
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="mb-2">
                        <table class="table border">
                            <tbody>
                                <tr>
                                    <td width="16%" class="bg-light-info"><span class="fa fa-user"></span> Name</td>
                                    <td><?php echo $user_name;?></td>
                                </tr>
                                <tr>
                                    <td class="bg-light-info"><span class="fa fa-phone"></span> Number</td>
                                    <td><?php echo $user_number;?></td>
                                </tr>
                                <tr>
                                    <td class="bg-light-info"><span class="fa fa-envelope"></span> Email</td>
                                    <td><?php echo $user_email;?></td>
                                </tr>
                                <tr>
                                    <td class="bg-light-info"><span class="fa fa-globe-asia"></span> Country</td>
                                    <td><?php echo $user_country;?></td>
                                </tr>
                                <tr>
                                    <td class="bg-light-info"><span class="fa fa-life-ring"></span> Profession</td>
                                    <td><?php echo $user_profession;?></td>
                                </tr>
                                <tr>
                                    <td class="bg-light-info"><span class="fa fa-male"></span> Gender</td>
                                    <td><?php echo $user_gender;?></td>
                                </tr>
                                <tr>
                                    <td class="bg-light-info"><span class="fa fa-child"></span> Birthday</td>
                                    <td><?php echo $user_birthday;?></td>
                                </tr>
                                <tr>
                                    <td class="bg-light-info"><span class="fa fa-plug"></span> Product</td>
                                    <td>
									<?php 
									echo anchor("ct_user/user_product_list/{$user_id}", "<span class='badge badge-dark'>{$controller->count_product_by_user($user_id)}</span>");
									?>
									</td>
                                </tr>
                                <tr>
                                    <td class="bg-light-info"><span class="fa fa-lightbulb"></span> About</td>
                                    <td><?php echo $user_about;?></td>
                                </tr>
                                <tr>
                                    <td class="bg-light-info"><span class="fa fa-map-marker-alt"></span> Address</td>
                                    <td><?php echo $user_address;?></td>
                                </tr>
								
								<tr>
									<td class="bg-light-info"><span class="fa fa-splotch"></span> Position</td>
									<td>
									<div class="profile-position">
									<?php 
									$user_position      = $controller->count_product_by_user($user_id);
									
									if($user_position == 0){
										echo "<span class='profile-position-square fa fa-square'></span>";
									}
									if($user_position >= 1 && $user_position <= 4){
										echo "<span class='profile-position-star fa fa-star-half-alt'></span>";
									}
									if($user_position >= 5 && $user_position <= 9){
										echo "<span class='profile-position-star fa fa-star'></span>";
									}
									if($user_position >= 10 && $user_position <= 19){
										echo "<span class='profile-position-star fa fa-star'></span>";										
										echo "<span class='profile-position-star fa fa-star-half-alt'></span>";
									}
									if($user_position >= 20 && $user_position <= 29){
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star'></span>";
									}
									if($user_position >= 30 && $user_position <= 44){
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star-half-alt'></span>";
									}
									if($user_position >= 45 && $user_position <= 64){
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star'></span>";										
									}
									if($user_position >= 65 && $user_position <= 79){
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star-half-alt'></span>";
									}
									if($user_position >= 80 && $user_position <= 94){
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star'></span>";
									}
									if($user_position >= 95 && $user_position <= 99){
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star-half-alt'></span>";
									}
									if($user_position >= 100){
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star'></span>";
										echo "<span class='profile-position-star fa fa-star'></span>";
									}
									?>
									</div>
									</td>
								</tr>
                            </tbody>
                        </table>
                    </div>    
                </div>
                
                
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