<!DOCTYPE html>
<html lang="en">
<head>

	<!--header-->
	<?php include('header.php');?>
	<!--header-->
	
    <title><?php echo $update_product_view->product_name;?> | <?php echo $site_title;?></title>
	
</head>
<body>
    <div class="container-fluid">
	

		
		<!--nav-->
			<?php include('menu.php');?>
		<!--end nav-->
		
		
		<div class="row bg-off-white">
			<div class="container">
				<div class="row p-3">

					
					
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
					
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 my-1">
						<div class="bg-white form-shadow p-5 my-2">
						<?php
							if($update_product_view):
						?>
							<?php echo form_open_multipart("ct_admin/single_product_edit/{$update_product_view->product_id}"); ?> 
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
                            
							
							<div class="form-group">
							<?php echo form_error('product_name', '<div class="text-danger">', '</div>');?>
							<?php echo form_label('Name');?>
							<?php echo form_input(['name'=>'product_name', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Name', 'value'=>$update_product_view->product_name]); ?>
                            </div>	
							
							<img src="<?php echo base_url('assest/images/product/').$update_product_view->product_thumbnail;?>" class="img-thumbnail mb-2" width="200">
                            <div class="form-group">
                            <?php echo form_error('product_thumbnail', '<div class="text-danger">', '</div>');?>
                            <?php echo form_label('Thumbnail');?>
                            <?php echo form_upload(['name'=>'product_thumbnail', 'id'=>'file-1', 'class'=>'file', 'ata-preview-file-type'=>'any', 'accept'=>'image/*']);?>
                                <small class="text-muted">Use 1200px*800px image.</small>
                            </div>	

                            <div class="form-group">
							<?php echo form_error('product_video_link', '<div class="text-danger">', '</div>');?>
							<?php echo form_label('Video Link');?>
							<?php echo form_input(['name'=>'product_video_link', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Video Link', 'value'=>$update_product_view->product_video_link]); ?>
							<small class="text-muted">Optional</small>
                            </div>	
                            
                            <div class="form-group">
							<?php echo form_error('product_live_preview_link', '<div class="text-danger">', '</div>');?>
							<?php echo form_label('Live preview');?>
							<?php echo form_input(['name'=>'product_live_preview_link', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Live preview', 'value'=>$update_product_view->product_live_preview_link]); ?>
                                <small class="form-text text-muted text-capitalize">Based on HTML,CSS,JS</small>
                            </div>
                            
                            <div class="form-group">
                                <label>Category</label>                                		
                                <select name="category_id" class="custom-select">
									<?php
										if($main_menu):
											foreach($main_menu as $menu_item):
												echo "<option value='$menu_item->category_id'>{$menu_item->category_name}</option>";
											endforeach;
										endif;
									?>
                                </select>
                            </div>
                            
                            <div class="form-group">
							<?php echo form_error('product_description', '<div class="text-danger">', '</div>');?>
							<?php echo form_label('Description');?>
							<?php echo form_textarea(['name'=>'product_description', 'class'=>'form-control', 'placeholder'=>'Description', 'value'=>$update_product_view->product_description]); ?>
                            </div>	

                            <div class="form-group">
                            <?php echo form_label('Type');?>

                                <div class="custom-control custom-radio">
								  <?php echo form_radio(['name'=>'product_type', 'id'=>'product_type1', 'class'=>'custom-control-input', 'value'=>'1', 'checked'=>TRUE]); ?>
								  <label class="custom-control-label" for="product_type1">Static</label>
								</div>
								
							
								<div class="custom-control custom-radio">
								  <?php echo form_radio(['name'=>'product_type', 'id'=>'product_type2', 'class'=>'custom-control-input', 'value'=>'2']); ?>
								  <label class="custom-control-label" for="product_type2">Dynamic</label>
								</div>

                            </div>		
                            
                            <div class="form-group">
							<?php echo form_error('product_tag', '<div class="text-danger">', '</div>');?>
							<?php echo form_label('Tag');?>
							<?php echo form_input(['name'=>'product_tag', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Tag', 'value'=>$update_product_view->product_tag]); ?>
                                <small class="form-text text-muted text-capitalize">use comma(,) and a single space after product's tag.</small>
                            </div>	

                            
                            <?php echo form_label('Feature');?>
							
							<label class="custom-control custom-checkbox">
								<?php echo form_checkbox(['name'=>'product_bootstrap', 'class'=>'custom-control-input', 'value'=>'1']); ?>
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description"> Bootstrap</span>
							</label>	
							
							<label class="custom-control custom-checkbox">
								<?php echo form_checkbox(['name'=>'product_responsive', 'class'=>'custom-control-input', 'value'=>'1']); ?>
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description"> Responsive</span>
							</label>	
							
							<label class="custom-control custom-checkbox">
								<?php echo form_checkbox(['name'=>'product_admin_panel', 'class'=>'custom-control-input', 'value'=>'1']); ?>
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description"> Admin Panel</span>
							</label>	
							
							<label class="custom-control custom-checkbox">
								<?php echo form_checkbox(['name'=>'product_seo', 'class'=>'custom-control-input', 'value'=>'1']); ?>
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description"> SEO</span>
							</label>
							<br />

                            <?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-outline-info', 'type'=>'submit', 'value'=>'Update']);?>
                        <?php echo form_close(); ?> 
							<?php endif; ?> 
						</div>
					</div>
					
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
						
					

				</div><br /><br /><br />
			</div>
		</div>

        
    </div>
    <!--container-fluid-->
	
	
</body>
</html>