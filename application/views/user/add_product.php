<!DOCTYPE html>
<html lang="en">
<head>
    
    <!--header-->
	<?php include('header.php');?>
	<!--header-->



    <title>Add Product | <?php echo $site_title;?></title>
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
            <div class="row" style="margin-bottom: 200px;">

                <!--leftbar-->
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12 my-2">
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 border my-2 form-shadow">
                    <div class="m-4">						
                        <h3 class="text-secondary"><span class="fa fa-plus text-info"></span> Upload your product</h3>
                        <small class="text-muted row mb-2 ml-4">Add your product to exchange</small>
                        <br />
                        
                        <?php echo form_open_multipart('ct_user/make_product'); ?> 
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
                            
                            <?php echo form_input(['name'=>'user_id', 'type'=>'hidden', 'value'=>$user_id]); ?>
                            <?php echo form_input(['name'=>'user_name', 'type'=>'hidden', 'value'=>$user_name]); ?>
							
							<div class="form-group">
							<?php echo form_error('product_name', '<div class="text-danger">', '</div>');?>
							<?php echo form_label('Name');?>
							<?php echo form_input(['name'=>'product_name', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Name']); ?>
                            </div>	
							

                            <div class="form-group">
                            <?php echo form_error('product_thumbnail', '<div class="text-danger">', '</div>');?>
                            <?php echo form_label('Thumbnail');?>
                            <?php echo form_upload(['name'=>'product_thumbnail', 'id'=>'file-1', 'class'=>'file', 'ata-preview-file-type'=>'any', 'accept'=>'image/*', 'required'=>True]);?>
                                <small class="text-muted">Use 1200px*800px image.</small>
                            </div>	

                            <div class="form-group">
							<?php echo form_error('product_video_link', '<div class="text-danger">', '</div>');?>
							<?php echo form_label('Video Link');?>
							<?php echo form_input(['name'=>'product_video_link', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Video Link']); ?>
							<small class="text-muted">Optional</small>
                            </div>	
                            
                            <div class="form-group">
							<?php echo form_error('product_live_preview_link', '<div class="text-danger">', '</div>');?>
							<?php echo form_label('Live preview');?>
							<?php echo form_input(['name'=>'product_live_preview_link', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Live preview']); ?>
                                <small class="form-text text-muted text-capitalize">Based on HTML,CSS,JS</small>
                            </div>								
							

                            <div class="form-group">
                            <?php echo form_error('product_download_link', '<div class="text-danger">', '</div>');?>
                            <?php echo form_label('Product source');?>
                            <?php echo form_upload(['name'=>'product_download_link', 'id'=>'file-1', 'class'=>'file', 'ata-preview-file-type'=>'any', 'accept'=>'', 'required'=>True]);?>
                                <small class="text-muted">Use zip or rar file.</small>
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
							<?php echo form_textarea(['name'=>'product_description', 'class'=>'form-control', 'placeholder'=>'Description']); ?>
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
							<?php echo form_input(['name'=>'product_tag', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Tag']); ?>
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

                            <?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-outline-success', 'type'=>'submit', 'value'=>'Publish']);?>
                        <?php echo form_close(); ?> 
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 my-2">
                </div>
                <!--end leftbar-->  

                
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