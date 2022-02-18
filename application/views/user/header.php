
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo base_url('');?>assest/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('');?>assest/css/bootstrap-alpha.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('');?>assest/css/grid.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('');?>assest/font/font.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('');?>assest/plugins/fontawesome/css/all.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('');?>assest/css/custome.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('');?>assest/plugins/arrow_label/arrow_label.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('');?>assest/plugins/fileinput_master/css/fileinput.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('');?>assest/plugins/data_table/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('');?>assest/plugins/data_table/buttons/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('');?>assest/plugins/data_table/datatables.css" rel="stylesheet" type="text/css" />
    
    

    <script src="<?php echo base_url('');?>assest/js/bootstrap.js"></script>
    <script src="<?php echo base_url('');?>assest/js/popper.min.js"></script>
    <script src="<?php echo base_url('');?>assest/js/jquery.min.js"></script>
    <script src="<?php echo base_url('');?>assest/js/custome.js"></script>
    <script src="<?php echo base_url('');?>assest/plugins/tinymce_master/plugin/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('');?>assest/plugins/tinymce_master/plugin/tinymce/init-tinymce.js" type="text/javascript"></script>
    <script src="<?php echo base_url('');?>assest/plugins/fileinput_master/js/fileinput.js" type="text/javascript"></script>
    <script src="<?php echo base_url('');?>assest/plugins/data_table/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('');?>assest/plugins/data_table/js/jquery.dataTables.min.js" type="text/javascript"></script>  
    <script src="<?php echo base_url('');?>assest/plugins/data_table/buttons/js/buttons.bootstrap4.min.js" type="text/javascript"></script>  
    <script src="<?php echo base_url('');?>assest/plugins/data_table/datatables.js" type="text/javascript"></script>   
	<script src="<?php echo base_url('');?>assest/plugins/password_visibility/bootstrap-password-toggler.js" type="text/javascript"></script>  
	<script type="text/javascript">
		//data table
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
					responsive: true
			});
		});	
    </script>
	
	<script>
	window.addEventListener("load", function(){
		var load_screen = document.getElementById("load_screen");
		document.body.removeChild(load_screen);
	});
	</script>
	
	<?php
	$site_title = "xChange iDea";
	?>
