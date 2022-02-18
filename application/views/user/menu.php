<?php
	$session_user = $this->session->userdata();
	//echo"<pre>";
	//print_r($user);
	//echo"</pre>";
	$user_id = $session_user['user_id'];
	$user_name = $session_user['user_name'];
	$user_number = $session_user['user_number'];
	$user_email = $session_user['user_email'];
	$user_log_id = $session_user['user_log_id'];
	$user_country = $session_user['user_country'];
	$user_profession = $session_user['user_profession'];
	$user_link = $session_user['user_link'];
	$user_gender = $session_user['user_gender'];
	$user_birthday = $session_user['user_birthday'];
	$user_about = $session_user['user_about'];
	$user_address = $session_user['user_address'];
	$user_image_address = $session_user['user_image_address'];	
	$user_password = $session_user['user_password'];
	$user_join = $session_user['user_join'];
	
?>

<!--header-->
        <div class="row my-3">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<a href="<?php echo site_url('ct_user/index');?>"><img src="<?php echo base_url('');?>assest/images/logo.png"></a></div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <p class="text-muted"><i class="fa fa-envelope"></i> <a href="mailto:iftekharemon33@gmail.com" class="text-muted">iftekharemon33@gmail.com</a></p>
                <p class="text-muted"><span class="fa fa-phone"></span> +8801946522456</p>
            </div>
        </div>

<?php $uri = $this->uri->segment(2);?>
        <!--navbar-->
        <nav class="sticky-top row navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container">
                <button class="navbar-toggler" data-toggle="collapse" data-target="#NavBar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="NavBar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
							<?php if($uri == 'index' || $uri == ''){
								echo anchor("ct_user/index", "<span class='fa fa-home'></span> Home", ['class'=>'nav-link active']);
							}else{
								echo anchor("ct_user/index", "<span class='fa fa-home'></span> Home", ['class'=>'nav-link']);
							}?>
                        </li>
                        <li class="nav-item">						
							<?php if($uri == 'add_product'){
								echo anchor("ct_user/add_product", "<span class='fa fa-plus'></span> Add Product", ['class'=>'nav-link active']);
							}else{
								echo anchor("ct_user/add_product", "<span class='fa fa-plus'></span> Add Product", ['class'=>'nav-link']);
							}?>
                        </li>
						
						<?php if($uri == 'category_view'){
							echo"<li class='nav-item dropdown active'>
								<a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>Category</a>
								<div class='dropdown-menu'>";
								
										if($main_menu):
											foreach($main_menu as $menu_item):
												echo anchor("ct_user/category_view/{$menu_item->category_id}", "{$menu_item->category_name} <span class='badge badge-dark'>{$controller->count_product_by_category($menu_item->category_id)}</span>", ['class'=>'dropdown-item']);
											endforeach;
										endif;
										
								echo"</div>
							</li>";	
						}else{
							echo"<li class='nav-item dropdown'>
								<a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>Category</a>
								<div class='dropdown-menu'>";
									
										if($main_menu):
											foreach($main_menu as $menu_item):
												echo anchor("ct_user/category_view/{$menu_item->category_id}", "{$menu_item->category_name} <span class='badge badge-dark'>{$controller->count_product_by_category($menu_item->category_id)}</span>", ['class'=>'dropdown-item']);
											endforeach;
										endif;
									
								echo"</div>
							</li>";	
							}?>
                        
                        <li class="nav-item">					
							<?php if($uri == 'add_Opinion'){
								echo anchor("ct_user/add_Opinion", "Opinion", ['class'=>'nav-link active']);
							}else{
								echo anchor("ct_user/add_Opinion", "Opinion", ['class'=>'nav-link']);
							}?>
                        </li>
						
						<?php if($uri == 'user_profile' || $uri == 'user_message' || $uri == 'user_setting' || $uri == 'user_setting_picture' || $uri == 'user_setting_profile' || $uri == 'user_setting_password'){
						echo"<li class='nav-item dropdown active'>
							<a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>Profile</a>
							<div class='dropdown-menu'>";
								echo anchor("ct_user/user_profile", "<span class='fa fa-user-secret'></span> Profile", ['class'=>'dropdown-item']);
								echo anchor("ct_user/user_setting", "<span class='fa fa-cog'></span> Setting", ['class'=>'dropdown-item']);
								echo anchor("ct_lr/log_out", "<span class='fa fa-ban'></span> Loguout", ['class'=>'dropdown-item text-danger']);
							echo"</div>
						</li>";
								
							}else{
								echo"<li class='nav-item dropdown'>
							<a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>Profile</a>
							<div class='dropdown-menu'>";
								echo anchor("ct_user/user_profile", "<span class='fa fa-user-secret'></span> Profile", ['class'=>'dropdown-item']);
								echo anchor("ct_user/user_setting", "<span class='fa fa-cog'></span> Setting", ['class'=>'dropdown-item']);
								echo anchor("ct_lr/log_out", "<span class='fa fa-ban'></span> Loguout", ['class'=>'dropdown-item text-danger']);
							echo"</div>
						</li>";
							}?>
							
						<li class="nav-item">
							<?php if($uri == 'help_list'){
								echo anchor("ct_user/help_list", "<span class='fa fa-info-circle'></span> Help", ['class'=>'nav-link active']);
							}else{
								echo anchor("ct_user/help_list", "<span class='fa fa-info-circle'></span> Help", ['class'=>'nav-link']);
							}?>
                        </li>	
						
                    </ul>
					<?php echo form_open('ct_user/search_product',['class'=>'form-inline my-2 my-lg-0']); ?> 
					<?php echo form_input(['name'=>'product_name', 'class'=>'form-control mr-2 my-2 my-lg-0', 'type'=>'text', 'placeholder'=>'Search']); ?>
                    <button class="btn btn-success"><span class='fa fa-search'></span></button>
                    <?php echo form_close(); ?> 
                </div>    
            </div>
        </nav>