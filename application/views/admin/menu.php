	
	
<?php
	$session_admin = $this->session->userdata();
	//echo"<pre>";
	//print_r($user);
	//echo"</pre>";
	$admin_id = $session_admin['admin_id'];
	$admin_name = $session_admin['admin_name'];
	$admin_number = $session_admin['admin_number'];
	$admin_email = $session_admin['admin_email'];
	$admin_gender = $session_admin['admin_gender'];
	$admin_birthday = $session_admin['admin_birthday'];
	$admin_image_address = $session_admin['admin_image_address'];	
	$admin_password = $session_admin['admin_password'];
	$admin_join = $session_admin['admin_join'];
	
	$site_title = "xChange mInd";
	
?>

<!--nav-->
<?php $uri = $this->uri->segment(2);?>
	<nav class="sticky-top row navbar navbar-expand-sm navbar-dark bg-dark">
		<div class="container">		
			<?php echo anchor("ct_admin/index", "<span class='fa fa-exchange-alt'></span> {$site_title}", ['class'=>'navbar navbar-brand']);?>
			<button class="navbar-toggler" data-toggle="collapse" data-target="#NavBar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="justify-content-end collapse navbar-collapse" id="NavBar">
				<ul class="navbar-nav">	
					
					<li class="nav-item">
						<?php if($uri == 'index' || $uri == ''){
							echo anchor("ct_admin/index", "<span class='fa fa-puzzle-piece'></span> Dashboard", ['class'=>'nav-link active']);
						}else{
							echo anchor("ct_admin/index", "<span class='fa fa-puzzle-piece'></span> Dashboard", ['class'=>'nav-link']);
						}?>
					</li>		
					
					<li class="nav-item">
						<?php
							echo anchor("ct_user/index", "<span class='fa fa-globe'></span> Our site", ['class'=>'nav-link', 'target'=>'_blank']);
						?>
					</li>
					
					
					<?php if($uri == 'add_help_view' || $uri == 'help_list_view' || $uri == 'single_help_view'){
						echo"<li class='nav-item dropdown active'>
							<a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'><span class='fa fa-info-circle'></span> help</a>
							<div class='dropdown-menu'>";
								echo anchor("ct_admin/add_help_view", "<span class='fa fa-plus'></span> Add help", ['class'=>'dropdown-item']);
								echo anchor("ct_admin/help_list_view", "<span class='fa fa-list'></span> help List", ['class'=>'dropdown-item']);			
								echo"</div>
						</li>";
								
							}else{
								echo"<li class='nav-item dropdown'>
							<a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'><span class='fa fa-info-circle'></span> help</a>
							<div class='dropdown-menu'>";
								echo anchor("ct_admin/add_help_view", "<span class='fa fa-plus'></span> Add help", ['class'=>'dropdown-item']);
								echo anchor("ct_admin/help_list_view", "<span class='fa fa-list'></span> help List", ['class'=>'dropdown-item']);
							echo"</div>
						</li>";
					}?>	
					
					
					<?php if($uri == 'add_notice_view' || $uri == 'notice_list_view' || $uri == 'single_notice_view'){
						echo"<li class='nav-item dropdown active'>
							<a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'><span class='fa fa-file'></span> Notice</a>
							<div class='dropdown-menu'>";
								echo anchor("ct_admin/add_notice_view", "<span class='fa fa-plus'></span> Add Notice", ['class'=>'dropdown-item']);
								echo anchor("ct_admin/notice_list_view", "<span class='fa fa-list'></span> Notice List", ['class'=>'dropdown-item']);			
								echo"</div>
						</li>";
								
							}else{
								echo"<li class='nav-item dropdown'>
							<a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'><span class='fa fa-file'></span> Notice</a>
							<div class='dropdown-menu'>";
								echo anchor("ct_admin/add_notice_view", "<span class='fa fa-plus'></span> Add Notice", ['class'=>'dropdown-item']);
								echo anchor("ct_admin/notice_list_view", "<span class='fa fa-list'></span> Notice List", ['class'=>'dropdown-item']);
							echo"</div>
						</li>";
					}?>
					
					<li class="nav-item">
						<?php if($uri == 'product_view' || $uri == 'single_product_view' || $uri == 'single_product_edit_view'){
							echo anchor("ct_admin/product_view", "<span class='fa fa-exchange-alt'></span> Product", ['class'=>'nav-link active']);
						}else{
							echo anchor("ct_admin/product_view", "<span class='fa fa-exchange-alt'></span> Product", ['class'=>'nav-link']);
						}?>
					</li>										
					
					<?php if($uri == 'add_category_view' || $uri == 'category_list_view' || $uri == 'category_view' || $uri == 'single_category_edit_view'){
						echo"<li class='nav-item dropdown active'>
							<a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'><span class='fa fa-feather'></span> Category</a>
							<div class='dropdown-menu'>";
								echo anchor("ct_admin/add_category_view", "<span class='fa fa-plus'></span> Add Category", ['class'=>'dropdown-item']);
								echo anchor("ct_admin/category_list_view", "<span class='fa fa-list'></span> Category List", ['class'=>'dropdown-item']);			
								echo"</div>
						</li>";
								
							}else{
								echo"<li class='nav-item dropdown'>
							<a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'><span class='fa fa-feather'></span> Category</a>
							<div class='dropdown-menu'>";
								echo anchor("ct_admin/add_category_view", "<span class='fa fa-plus'></span> Add Category", ['class'=>'dropdown-item']);
								echo anchor("ct_admin/category_list_view", "<span class='fa fa-list'></span> Category List", ['class'=>'dropdown-item']);		
							echo"</div>
						</li>";
					}?>
					
					<li class="nav-item">
						<?php if($uri == 'opinion_view'){
							echo anchor("ct_admin/opinion_view", "<span class='fa fa-comment'></span> Opinion", ['class'=>'nav-link active']);
						}else{
							echo anchor("ct_admin/opinion_view", "<span class='fa fa-comment'></span> Opinion", ['class'=>'nav-link']);
						}?>
					</li>	
					
					
					<?php if($uri == 'add_user_view' || $uri == 'user_list_view' || $uri == 'user_view' || $uri == 'user_product_list' || $uri == 'user_edit_view'){
						echo"<li class='nav-item dropdown active'>
							<a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'><span class='fa fa-user'></span> User</a>
							<div class='dropdown-menu'>";
								echo anchor("ct_admin/add_user_view", "<span class='fa fa-plus'></span> Add User", ['class'=>'dropdown-item']);
								echo anchor("ct_admin/user_list_view", "<span class='fa fa-list'></span> User List", ['class'=>'dropdown-item']);			
								echo"</div>
						</li>";
								
							}else{
								echo"<li class='nav-item dropdown'>
							<a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'><span class='fa fa-user'></span> User</a>
							<div class='dropdown-menu'>";
								echo anchor("ct_admin/add_user_view", "<span class='fa fa-plus'></span> Add User", ['class'=>'dropdown-item']);
								echo anchor("ct_admin/user_list_view", "<span class='fa fa-list'></span> User List", ['class'=>'dropdown-item']);		
							echo"</div>
						</li>";
					}?>
					
					
					<?php if($uri == 'admin_profile' || $uri == 'admin_setting' || $uri == 'admin_setting_picture' || $uri == 'admin_setting_profile' || $uri == 'admin_setting_password'){
						echo"<li class='nav-item dropdown active'>
							<a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'><span class='fa fa-user-tie'></span> Profile</a>
							<div class='dropdown-menu'>";
								echo anchor("ct_admin/admin_profile", "<span class='fa fa-user-secret'></span> Profile", ['class'=>'dropdown-item']);
								echo anchor("ct_admin/admin_setting", "<span class='fa fa-cog'></span> Setting", ['class'=>'dropdown-item']);
								echo anchor("ct_admin_lr/log_out", "<span class='fa fa-ban'></span> Loguout", ['class'=>'dropdown-item text-danger']);
							echo"</div>
						</li>";
								
							}else{
								echo"<li class='nav-item dropdown'>
							<a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'><span class='fa fa-user-tie'></span> Profile</a>
							<div class='dropdown-menu'>";
								echo anchor("ct_admin/admin_profile", "<span class='fa fa-user-secret'></span> Profile", ['class'=>'dropdown-item']);
								echo anchor("ct_admin/admin_setting", "<span class='fa fa-cog'></span> Setting", ['class'=>'dropdown-item']);
								echo anchor("ct_admin_lr/log_out", "<span class='fa fa-ban'></span> Loguout", ['class'=>'dropdown-item text-danger']);
							echo"</div>
						</li>";
					}?>
					
				</ul>				
			</div>
		</div>
	</nav>
<!--end nav-->