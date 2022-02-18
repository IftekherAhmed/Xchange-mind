<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title><?php echo $this->session->userdata('admin_name') ;?> | <?php echo $site_title;?></title>
	
</head>
<body>
    <div class="container-fluid">
	

		
		<!--nav-->
			<?php include('menu.php');?>
		<!--end nav-->
		
		
		<div class="row">
			<div class="container">
				<div class="row p-3">
				
				
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="p-1">
							<img src="<?php echo base_url('assest/images/admin/').$admin_image_address;?>" class="img-thumbnail mb-2">

							<div class="bg-off-white border p-3">                          
								<span class="label label-large label-yellow arrowed-in pl-4 pr-3"><?php echo $admin_name;?></span><br /><br />								
								<p class="text-secondary"><span class="fa fa-clock"></span> <?php echo date('g:i a', strtotime($admin_join));?></p>
								<p class="text-secondary"><span class="fa fa-calendar"></span> <?php echo date('j F Y ', strtotime($admin_join));?></p>								
							</div>
						</div>
					</div>

					<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<div class="mb-2">
							<table class="table border">
								<tbody>
									<tr>
										<td width="16%" class="bg-light-info"><span class="fa fa-user"></span> Name</td>
										<td><?php echo $admin_name;?></td>
									</tr>
									<tr>
										<td class="bg-light-info"><span class="fa fa-phone"></span> Number</td>
										<td><?php echo $admin_number;?></td>
									</tr>
									<tr>
										<td class="bg-light-info"><span class="fa fa-envelope"></span> Email</td>
										<td><?php echo $admin_email;?></td>
									</tr>
									<tr>
										<td class="bg-light-info"><span class="fa fa-male"></span> Gender</td>
										<td><?php echo $admin_gender;?></td>
									</tr>
									<tr>
										<td class="bg-light-info"><span class="fa fa-child"></span> Birthday</td>
										<td><?php echo $admin_birthday;?></td>
									</tr>
								</tbody>
							</table>
						</div>    
					</div>
		

	

				</div>
			</div>
		</div>

        
    </div>
    <!--container-fluid-->
	
	
</body>
</html>