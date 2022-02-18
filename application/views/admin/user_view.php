<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->	

    <title><?php echo $user_view->user_name;?> | <?php echo $site_title;?></title>
	
</head>
<body>
    <div class="container-fluid">
	

		
		<!--nav-->
			<?php include('menu.php');?>
		<!--end nav-->
		
		
		<div class="row bg-off-white">
			<div class="container">
				<div class="row p-3">

					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="p-1">
							
							<?php 
								if(!empty($user_view->user_image_address)){
							?>
								<img src="<?php echo base_url('assest/images/user/').$user_view->user_image_address;?>" class="img-thumbnail mb-2">
							<?php	
							}else{
								echo"<div class='img-thumbnail mb-2 p-5 text-danger'>No image uploaded!</div>";
							}
							?>
						
							<div class="bg-off-white border p-3"> 
								<span class="label label-large label-yellow arrowed-in pl-4 pr-3 font-openSans-Regular"><?php echo $user_view->user_name;?></span><br /><br />	
								<p><?php echo anchor("http://{$user_view->user_link}", "<span class='fa fa-globe'> {$user_view->user_link}</span>",['class'=>'text-info']); ?></p>
								
								<p class="text-secondary"><span class="fa fa-calendar"></span> <?php echo $controller->timestamp(strtotime($user_view->user_join));?></p>  
								
							</div>
						</div>
					</div>

					<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<div class="mb-2">
							<table class="table border">
								<tbody>
									<tr>
										<td width="16%" class="bg-light-info"><span class="fa fa-user"></span> Name</td>
										<td><?php echo $user_view->user_name;?></td>
									</tr>
									<tr>
										<td class="bg-light-info"><span class="fa fa-phone"></span> Number</td>
										<td><?php echo $user_view->user_number;?></td>
									</tr>
									<tr>
										<td class="bg-light-info"><span class="fa fa-envelope"></span> Email</td>
										<td><?php echo $user_view->user_email;?></td>
									</tr>
									<tr>
										<td class="bg-light-info"><span class="fa fa-globe-asia"></span> Country</td>
										<td><?php echo $user_view->user_country;?></td>
									</tr>
									<tr>
										<td class="bg-light-info"><span class="fa fa-life-ring"></span> Profession</td>
										<td><?php echo $user_view->user_profession;?></td>
									</tr>
									<tr>
										<td class="bg-light-info"><span class="fa fa-male"></span> Gender</td>
										<td><?php echo $user_view->user_gender;?></td>
									</tr>
									<tr>
										<td class="bg-light-info"><span class="fa fa-child"></span> Birthday</td>
										<td><?php echo $user_view->user_birthday;?></td>
									</tr>
									<tr>
										<td class="bg-light-info"><span class="fa fa-plug"></span> Product</td>
										<td>
										<?php 
										echo anchor("ct_admin/user_product_list/{$user_view->user_id}", "<span class='badge badge-dark'>{$controller->count_product_by_user($user_view->user_id)}</span>");
										?>
										</td>
									</tr>
									<tr>
										<td class="bg-light-info"><span class="fa fa-lightbulb"></span> About</td>
										<td><?php echo $user_view->user_about;?></td>
									</tr>
									<tr>
										<td class="bg-light-info"><span class="fa fa-map-marker-alt"></span> Address</td>
										<td><?php echo $user_view->user_address;?></td>
									</tr>
								
								<tr>
									<td class="bg-light-info"><span class="fa fa-splotch"></span> Position</td>
									<td>
									<div class="profile-position">
									<?php 
									$user_position      = $controller->count_product_by_user($user_view->user_id);
									
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
						
					

				</div><br /><br /><br />
			</div>
		</div>

        
    </div>
    <!--container-fluid-->
	
	
</body>
</html>