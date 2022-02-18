<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ct_admin extends CI_Controller {
	

	function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('admin_email')!=FALSE){			
		}else { 
			$this->session->set_flashdata('errors','You have logged in first.');
			redirect('ct_admin_lr/index');
		}
		
	}
	
	//time (times ago)
	function timestamp($given_time){
        $current_time = time();
        if($current_time >= $given_time){
            $different_time = $current_time - $given_time;

            $seconds = $different_time;
            $minutes = round($different_time / (60));
            $hours   = round($different_time / (60*60));
            $days    = round($different_time / (60*60*24));
            $weeks   = round($different_time / (60*60*24*7));
            $months  = round($different_time / (60*60*24*7*4));
            $years   = round($different_time / (60*60*24*30*12));

            if($seconds <= 60){
				if($seconds <= 1){
					$time_ago = $seconds . "second ago.";
				}elseif($seconds <= 59){
					$time_ago = $seconds . "seconds ago.";
				}else{}
                
            }elseif($minutes <= 60){
				if($minutes <= 1){
					$time_ago = $minutes . " minute ago.";
				}elseif($minutes <= 59){
					$time_ago = $minutes . " minutes ago.";
				}else{}
            }elseif($hours <= 24){
				if($hours <= 1){
					$time_ago = $hours . " hour ago.";
				}elseif($hours <= 59){
					$time_ago = $hours . " hours ago.";
				}else{}
            }elseif($days <= 7){
				if($days <= 1){
					$time_ago = $days . " day ago.";
				}elseif($days <= 59){
					$time_ago = $days . " days ago.";
				}else{}
            }elseif($weeks <= 3){
				if($weeks <= 1){
					$time_ago = $weeks . " week ago.";
				}elseif($weeks <= 3){
					$time_ago = $weeks . " weeks ago.";
				}else{}
            }elseif($months <= 12){
				if($months <= 1){
					$time_ago = $months . " month ago.";
				}elseif($months <= 59){
					$time_ago = $months . " months ago.";
				}else{}
            }else{
				if($years <= 1){
					$time_ago = $years . " year ago.";
				}else{
					$time_ago = $years . " years ago.";
				}
            }
            return $time_ago;

        }else{
            return "A few seconds ago.";
           // return "The given time is grater than now.";
        }//count is the. whether time is valid.


    }//function

   /* $times_for_check = strtotime("11 March 1997");
    $calculate_time = timestamp($times_for_check);
    echo $calculate_time;
	echo"<br />";
	echo date("D-m-Y");*/
	
	//home page(Dashboard)
	public function index(){
		$data = array();
		
		$data['controller']     = $this;
		
		
		$this->load->model('md_admin');
		
		$data['total_opinion']  = $this->md_admin->total_opinion();
		$data['total_product']  = $this->md_admin->total_product();
		$data['total_category'] = $this->md_admin->total_category();
		$data['total_user']     = $this->md_admin->total_user();
		
		$this->load->view('admin/dashboard', $data);
	}
	
	
	//notice 
	public function add_notice_view(){
		$data = array();
		
		$data['controller'] = $this;
		
		$this->load->view('admin/add_notice', $data);
	}
	
	public function make_notice(){
		
		$this->form_validation->set_rules('notice_title', 'Notice Name', 'trim|required');		
		$this->form_validation->set_rules('notice_description', 'Notice Description', 'trim|required');		
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
			redirect('ct_admin/add_notice_view');
			
		}else{
			
			$data =$this -> input -> post();	
			unset($data['submit']);
			
			$this->load->model('md_admin');						
			$data = $this->security->xss_clean($data);
			$this->md_admin->make_notice($data);
			
			$this->session->set_flashdata('success','Successfully created notice.');			
			redirect('ct_admin/notice_list_view');
			
		}//if form validation success*/
				
	}			
	
	public function notice_list_view(){
		$data = array();
		
		$data['controller'] = $this;
		
		///notice_list
		$this->load->model('md_admin');
		$notice = $this->md_admin->notice_list();
		$data['notice_list'] = $notice;
		
		$this->load->view('admin/notice_list', $data);
	}		
	
	public function single_notice_edit_view($id){
		$data = array();
		
		$data['controller'] = $this;
		
		///update_notice_view
		$this->load->model('md_admin');
		$notice = $this->md_admin->single_notice_edit_view($id);
		$data['update_notice_view'] = $notice;
		
		if($data['update_notice_view'] != FALSE){
			$this->load->view('admin/update_notice_view', $data);
		}else{
			redirect('ct_admin');
		}
	}			
	
	public function single_notice_edit($id){
			
		$this->form_validation->set_rules('notice_title', 'Title', 'trim|required');
		$this->form_validation->set_rules('notice_description', 'Notice', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('errors', 'There is some errors.');
			$this->load->model('md_admin');
			$notice = $this->md_admin->single_notice_edit_view($id);
			$data['update_notice_view'] = $notice;		
			$this->load->view('admin/update_notice_view', $data);
		}else{
			$data =$this -> input -> post();
			unset($data['update']);
			$this->load->model('md_admin');
			$this->md_admin->single_notice_edit($id, $data);
			$this->session->set_flashdata('success', 'Successfully updated Notice');
			$notice = $this->md_admin->single_notice_edit_view($id);
			$data['update_notice_view'] = $notice;		
			$this->load->view('admin/update_notice_view', $data);
		}
	}		
	
	public function single_notice_delete($id){
				
		$this->load->model('md_admin');	
		$this->md_admin->single_notice_delete($id);
		$this->session->set_flashdata('errors','Successfully deleted notice.');		
		redirect('ct_admin/notice_list_view');			
	}	
	
	
	public function single_notice_view($id){
		$data = array();
		
		$data['controller'] = $this;
		
		$this->load->model('md_admin');
		$notice = $this->md_admin->single_notice_view($id);
		$data['single_notice_view'] = $notice;		
		
		if($data['single_notice_view'] != FALSE){
			$this->load->view('admin/notice_view', $data);
		}else{
			redirect('ct_admin');
		}
	}
	
	//help 
	public function add_help_view(){
		$data = array();
		
		$data['controller'] = $this;
		
		$this->load->view('admin/add_help', $data);
	}
	
	public function make_help(){
		
		$this->form_validation->set_rules('help_title', 'help Name', 'trim|required');		
		$this->form_validation->set_rules('help_description', 'help Description', 'trim|required');		
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
			redirect('ct_admin/add_help_view');
			
		}else{
			
			$data =$this -> input -> post();	
			unset($data['submit']);
			
			$this->load->model('md_admin');						
			$data = $this->security->xss_clean($data);
			$this->md_admin->make_help($data);
			
			$this->session->set_flashdata('success','Successfully created help.');			
			redirect('ct_admin/help_list_view');
			
		}//if form validation success*/
				
	}			
	
	public function help_list_view(){
		$data = array();
		
		$data['controller'] = $this;
		
		///help_list
		$this->load->model('md_admin');
		$help = $this->md_admin->help_list();
		$data['help_list'] = $help;
		
		$this->load->view('admin/help_list', $data);
	}		
	
	public function single_help_edit_view($id){
		$data = array();
		
		$data['controller'] = $this;
		
		///update_help_view
		$this->load->model('md_admin');
		$help = $this->md_admin->single_help_edit_view($id);
		$data['update_help_view'] = $help;
		
		if($data['update_help_view'] != FALSE){
			$this->load->view('admin/update_help_view', $data);
		}else{
			redirect('ct_admin');
		}
	}			
	
	public function single_help_edit($id){
			
		$this->form_validation->set_rules('help_title', 'Title', 'trim|required');
		$this->form_validation->set_rules('help_description', 'help', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('errors', 'There is some errors.');
			$this->load->model('md_admin');
			$help = $this->md_admin->single_help_edit_view($id);
			$data['update_help_view'] = $help;		
			$this->load->view('admin/update_help_view', $data);
		}else{
			$data =$this -> input -> post();
			unset($data['update']);
			$this->load->model('md_admin');
			$this->md_admin->single_help_edit($id, $data);
			$this->session->set_flashdata('success', 'Successfully updated help');
			$help = $this->md_admin->single_help_edit_view($id);
			$data['update_help_view'] = $help;		
			$this->load->view('admin/update_help_view', $data);
		}
	}		
	
	public function single_help_delete($id){
				
		$this->load->model('md_admin');	
		$this->md_admin->single_help_delete($id);
		$this->session->set_flashdata('errors','Successfully deleted help.');		
		redirect('ct_admin/help_list_view');			
	}
	
		
	
	public function single_help_view($id){
		$data = array();
		
		$data['controller'] = $this;
		
		$this->load->model('md_admin');
		$help = $this->md_admin->single_help_view($id);
		$data['single_help_view'] = $help;		
		
		if($data['single_help_view'] != FALSE){
			$this->load->view('admin/help_view', $data);
		}else{
			redirect('ct_admin');
		}
	}
	
	
	
	
	//product 
	public function product_view(){
		$data = array();
		
		$data['controller'] = $this;		
		
		$this->load->model('md_admin');
		
		///product pagination		
		$config = array(		
			'base_url' 		  => base_url('index.php/ct_admin/product_view'),
			'per_page' 		  => 6,
			'total_rows' 	  => $this->md_admin->total_product(),
			'full_tag_open'   => '<ul class="pagination justify-content-center">',
			'full_tag_close'  => '</ul>',
			'first_tag_open'  => '<li>',
			'first_tag_close' => '</li>',
			'last_tag_open'   => '<li>',
			'last_tag_close'  => '</li>',
			'next_tag_open'   => '<li>',
			'next_tag_close'  => '</li>',
			'prev_tag_open'   => '<li>',
			'prev_tag_close'  => '</li>',
			'num_tag_open'    => '<li>',
			'num_tag_close'   => '</li>',
			'cur_tag_open'    => '<li class="page-item active"><a href="#"  class="page-link">',
			'cur_tag_close'   => '</a></li>',
			'prev_link' 	  => '&laquo Previous',
			'next_link'		  => 'Next &raquo'
		);
		
		$limit = $config['per_page'];
		$offset = $this->uri->segment(3);		
		$this->pagination->initialize($config);		
		
		///product_list
		$this->load->model('md_admin');
		$product = $this->md_admin->product_list($limit,$offset);
		$data['product_list'] = $product;		
		
		$this->load->view('admin/product_list', $data);
	}
	
	public function single_product_view($id){
		$data = array();
		
		$data['controller'] = $this;
		
		///single_product_view
		$this->load->model('md_admin');
		$product = $this->md_admin->single_product_view($id);
		$data['single_product_view'] = $product;
		
		if($data['single_product_view'] != FALSE){
			$this->load->view('admin/product_view', $data);
		}else{
			redirect('ct_admin');
		}
	}	
	
	public function count_product_by_user($id){
		$this->load->model('md_admin');
		$query = $this->md_admin->count_product_by_user($id);
		return $query;
	}
	
	public function user_product_list($id){
		$data = array();
		
		$data['controller'] = $this;
		
		
		$this->load->model('md_admin');	
		
		///product pagination		
		$config = array(		
			'base_url' 		  => base_url('index.php/ct_admin/user_product_list/').$id,
			'per_page' 		  => 6,
			'total_rows' 	  => $this->md_admin->count_product_by_user($id),
			'full_tag_open'   => '<ul class="pagination justify-content-center">',
			'full_tag_close'  => '</ul>',
			'first_tag_open'  => '<li>',
			'first_tag_close' => '</li>',
			'last_tag_open'   => '<li>',
			'last_tag_close'  => '</li>',
			'next_tag_open'   => '<li>',
			'next_tag_close'  => '</li>',
			'prev_tag_open'   => '<li>',
			'prev_tag_close'  => '</li>',
			'num_tag_open'    => '<li>',
			'num_tag_close'   => '</li>',
			'cur_tag_open'    => '<li class="page-item active"><a href="#"  class="page-link">',
			'cur_tag_close'   => '</a></li>',
			'prev_link' 	  => '&laquo Previous',
			'next_link'		  => 'Next &raquo'
		);
		
		$limit = $config['per_page'];
		$offset = $this->uri->segment(4);		
		$this->pagination->initialize($config);	
		
		$this->load->model('md_admin');	
		$product = $this->md_admin->user_product_list($id,$limit,$offset);
		$data['user_product_list'] = $product;
		
		
		$user = $this->md_admin->user_view($id);
		$data['user_view'] = $user;
		
		if($data['user_view'] != FALSE){
			$this->load->view('admin/user_product_list', $data);
		}else{
			redirect('ct_admin');
		}
	}		
	
	public function single_product_edit_view($id){
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('md_admin');
		$menu = $this->md_admin->category_list();
		$data['main_menu'] = $menu;	
		
		///single_product_edit_view
		$this->load->model('md_admin');
		$product = $this->md_admin->single_product_edit_view($id);
		$data['update_product_view'] = $product;		
		
		if($data['update_product_view'] != FALSE){
			$this->load->view('admin/update_product_view', $data);
		}else{
			redirect('ct_admin');
		}
	}			
	
	public function single_product_edit($id){
		
		///if picture update/////////
		$image_set 		= $_FILES['product_thumbnail'];
		$image_set_name = $image_set['name'];
		if(!empty($image_set_name)){
			///////previous image delete		
			$this->load->model('md_admin');
			$image_address = $this->md_admin->single_product_view($id); 	
			$remove_image_address = $image_address->product_thumbnail;
			//echo $remove_image_address;
			@unlink('assest/images/product/'.$remove_image_address);			
			///////previous image delete	
		}else{}
			///////////////////
		
		
		
		$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required');
		$this->form_validation->set_rules('product_video_link', 'Video Link', 'trim|required');
		$this->form_validation->set_rules('product_live_preview_link', 'Product Live Preview', 'trim|required');
		$this->form_validation->set_rules('product_description', 'Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');
			redirect("ct_admin/single_product_edit_view/{$id}");			
		}else{
			
			$data =$this -> input -> post();	
			$this->load->model('md_admin');			
			$category_id = $data['category_id'];
			
			$category_name_q = $this->md_admin->single_category_data($category_id);
			$category_name = $category_name_q['category_name'];
			$data['category_name'] = $category_name;
			$data['product_visiblity'] = 1;
			
			if(!empty($data['product_bootstrap'])){
				$data['product_bootstrap'] = 1;	
			}else{
				$data['product_bootstrap'] = 0;				
			}
			
			if(!empty($data['product_responsive'])){
				$data['product_responsive'] = 1;	
			}else{
				$data['product_responsive'] = 0;				
			}
			
			if(!empty($data['product_admin_panel'])){
				$data['product_admin_panel'] = 1;	
			}else{
				$data['product_admin_panel'] = 0;				
			}
			
			if(!empty($data['product_seo'])){
				$data['product_seo'] = 1;	
			}else{
				$data['product_seo'] = 0;				
			}
			
			unset($data['submit']);
					
			
			///if picture update/////////
			$image_set 		= $_FILES['product_thumbnail'];
			$image_set_name = $image_set['name'];
			if(!empty($image_set_name)){
				
				$filename = md5(uniqid(rand(), true));
				$config = array(
					'upload_path' => 'assest/images/product',
					'allowed_types' => "gif|jpg|png|jpeg",
					'file_name' => $filename
				);
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('product_thumbnail'))
					{
					$file_data = $this->upload->data();
					$data['product_thumbnail'] = $file_data['file_name'];
					$this->load->model('md_admin');
					$this->md_admin->single_product_edit($id, $data);
					$this->session->set_flashdata('success', 'Successfully updated product');
					redirect("ct_admin/single_product_edit_view/{$id}");
					}
					else
					{
					 echo "uploaded faild";
					}
			}else{
				$this->load->model('md_admin');
				$this->md_admin->single_product_edit($id, $data);
				$this->session->set_flashdata('success', 'Successfully updated product');
				redirect("ct_admin/single_product_edit_view/{$id}");		
				}
			///////////////////
			
		}//if form validation success
		
	}		
	
	public function single_product_delete($id){
		
		///////previous image delete		
		$this->load->model('md_admin');
		$image_address = $this->md_admin->single_product_view($id);
		$remove_image_address = $image_address->product_thumbnail;
		//echo $remove_image_address;
		@unlink('assest/images/product/'.$remove_image_address);						
		///////previous image delete		
		
		///////zip delete	
		$zip_address = $this->md_admin->single_product_view($id);
		$remove_zip_address = $zip_address->product_download_link;
		//echo $remove_zip_address;
		@unlink('assest/product/zip/'.$remove_zip_address);						
		///////previous zip delete		
		
		$query = $this->md_admin->single_product_delete($id);
		$this->session->set_flashdata('errors', 'Successfully delete product');
		redirect('ct_admin/product_view');		
	}	
	
	
	public function single_product_approve($id){
		
		$data = array();
		$data['product_visiblity'] = 1;
		
		$this->load->model('md_admin');		
		$query = $this->md_admin->single_product_approve($id, $data);
		if($query == True){		
		$this->session->set_flashdata('success', 'Successfully approve product');
		redirect('ct_admin/product_view');			
		}else{
			redirect('ct_admin/product_view');
		}
	}	
	
	

	
	//category
	public function add_category_view(){
		$data = array();
		
		$data['controller'] = $this;
		
		$this->load->view('admin/add_category', $data);
	}		
	
	public function category_list_view(){
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('md_admin');
		$menu = $this->md_admin->category_list();
		$data['menu'] = $menu;	
		
		
		$this->load->view('admin/category_list', $data);
	}
	
	public function make_category(){
		
		$this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');		
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
			redirect('ct_admin/add_category_view');
			
		}else{
			
			$data =$this -> input -> post();	
			unset($data['submit']);
			
			$this->load->model('md_admin');						
			$data = $this->security->xss_clean($data);
			$this->md_admin->make_category($data);
			
			$this->session->set_flashdata('success','Successfully created category.');			
			redirect('ct_admin/category_list_view');
			
		}//if form validation success*/
				
	}	
	
	public function category_view($id){
		$data = array();
		
		$data['controller'] = $this;
		
		$this->load->model('md_admin');	
		
		///product pagination		
		$config = array(		
			'base_url' 		  => base_url('index.php/ct_admin/category_view/').$id,
			'per_page' 		  => 6,
			'total_rows' 	  => $this->md_admin->count_product_by_category($id),
			'full_tag_open'   => '<ul class="pagination justify-content-center">',
			'full_tag_close'  => '</ul>',
			'first_tag_open'  => '<li>',
			'first_tag_close' => '</li>',
			'last_tag_open'   => '<li>',
			'last_tag_close'  => '</li>',
			'next_tag_open'   => '<li>',
			'next_tag_close'  => '</li>',
			'prev_tag_open'   => '<li>',
			'prev_tag_close'  => '</li>',
			'num_tag_open'    => '<li>',
			'num_tag_close'   => '</li>',
			'cur_tag_open'    => '<li class="page-item active"><a href="#"  class="page-link">',
			'cur_tag_close'   => '</a></li>',
			'prev_link' 	  => '&laquo Previous',
			'next_link'		  => 'Next &raquo'
		);
		
		$limit = $config['per_page'];
		$offset = $this->uri->segment(4);		
		$this->pagination->initialize($config);	
		
		$this->load->model('md_admin');	
		$product = $this->md_admin->product_list_by_category($id,$limit,$offset);
		$data['product_list_by_category'] = $product;
		
		
		$category = $this->md_admin->category_view($id);
		$data['category_view'] = $category;
		
		if($data['category_view'] != FALSE){
			$this->load->view('admin/category', $data);
		}else{
			redirect('ct_admin');
		}
	}
	
	public function count_product_by_category($id){
		$this->load->model('md_admin');
		$query = $this->md_admin->count_product_by_category($id);
		return $query;
	}		
	
	public function single_category_edit_view($id){
		$data = array();
		
		$data['controller'] = $this;
		
		///update_category_view
		$this->load->model('md_admin');
		$category = $this->md_admin->single_category_edit_view($id);
		$data['update_category_view'] = $category;				
		
		if($data['update_category_view'] != FALSE){
			$this->load->view('admin/update_category_view', $data);
		}else{
			redirect('ct_admin');
		}
	}			
	
	public function single_category_edit($id){
			
		$this->form_validation->set_rules('category_name', 'Name', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('errors', 'There is some errors.');
			$this->load->model('md_admin');
			$category = $this->md_admin->single_category_edit_view($id);
			$data['update_category_view'] = $category;		
			$this->load->view('admin/update_category_view', $data);
		}else{
			$data =$this -> input -> post();
			unset($data['update']);
			$this->load->model('md_admin');
			$this->md_admin->single_category_edit($id, $data);
			$this->session->set_flashdata('success', 'Successfully updated category');
			$category = $this->md_admin->single_category_edit_view($id);
			$data['update_category_view'] = $category;		
			$this->load->view('admin/update_category_view', $data);
		}
	}		
	
	public function single_category_delete($id){
				
		$this->load->model('md_admin');	
		$this->md_admin->single_category_delete($id);
		$this->session->set_flashdata('errors','Successfully deleted category.');		
		redirect('ct_admin/category_list_view');			
	}
	
	
	//opinion
	public function opinion_view(){
		$data = array();
		
		$data['controller'] = $this;;
		
		///opinion_list
		$this->load->model('md_admin');
		$opinion = $this->md_admin->opinion_list();
		$data['opinion_list'] = $opinion;	
		
		$this->load->view('admin/opinion_list', $data);
	}			
	
	public function single_opinion_delete($id){
				
		$this->load->model('md_admin');	
		$this->md_admin->single_opinion_delete($id);
		$this->session->set_flashdata('errors','Successfully deleted opinion.');		
		redirect('ct_admin/opinion_view');			
	}	
	
	
	//user
	public function add_user_view(){
		$data = array();
		
		$data['controller'] = $this;
		
		$this->load->view('admin/add_user', $data);
	}		
	
	public function user_list_view(){
		$data = array();
		
		$data['controller'] = $this;
		
		///user_list
		$this->load->model('md_admin');
		$notice = $this->md_admin->user_list();
		$data['user_list'] = $notice;
		
		$this->load->view('admin/user_list', $data);
	}	
		
	public function user_view($id){
		$data = array();
		
		$data['controller'] = $this;
		
		$this->load->model('md_admin');
		$user = $this->md_admin->user_view($id);
		$data['user_view'] = $user;		
		
		if($data['user_view'] != FALSE){
			$this->load->view('admin/user_view', $data);
		}else{
			redirect('ct_admin');
		}
	}

	public function make_user(){
		
		$this->form_validation->set_rules('user_log_id', 'Login Id', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('user_password', 'New Password', 'trim|required|min_length[5]');	
		$this->form_validation->set_rules('user_name', 'Name', 'trim|required');	
		$this->form_validation->set_rules('user_number', 'Number', 'trim');	
		$this->form_validation->set_rules('user_email', 'Email', 'trim');	
		$this->form_validation->set_rules('user_link', 'Link', 'trim');	
		$this->form_validation->set_rules('user_about', 'About', 'trim');	
		$this->form_validation->set_rules('user_address', 'Address', 'trim');	
		
		if ($this->form_validation->run() == FALSE){
			
			$this->load->view('admin/add_user');
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');	
			
		}else{
			
			$data =$this -> input -> post();
			$data['user_password'] = base64_encode($data['user_password'].'emon#11six#199five!@$W@');			
			unset($data['user_dob_date']);
			unset($data['user_dob_month']);
			unset($data['user_dob_year']);			
			$dob_date=$this -> input -> post('user_dob_date');
			$dob_month=$this -> input -> post('user_dob_month');
			$dob_year=$this -> input -> post('user_dob_year');
			$data['user_birthday'] = $dob_date. $dob_month. $dob_year;	
			unset($data['submit']);
			
			$this->load->model('md_admin');
			$result = $this->md_admin->check_user_id_for_registeration($data);
			
			if($result == FALSE){
				
				$this->session->set_flashdata('errors','Sorry, this id is already taken.');
				$this->load->view('admin/add_user');
				
			}else{
				$this->session->set_flashdata('success','Successfully added user.');
				$this->load->view('admin/add_user');
			}
		} 
	}	
	
	
	public function user_edit_view($id){
		$data = array();
		
		$data['controller'] = $this;
		
		///update_notice_view
		$this->load->model('md_admin');
		$user = $this->md_admin->user_edit_view($id);
		$data['update_user_view'] = $user;
		
		
		if($data['update_user_view'] != FALSE){
			$this->load->view('admin/update_user_view', $data);
		}else{
			redirect('ct_admin');
		}		
		
	}	
	
	
	public function edit_user_profile($id){
		$data = array();		
		$data['controller'] = $this;
		
		//delete old user log id
		$this->load->model('md_admin');
		$user = $this->md_admin->user_view($id);
		$user_log_id = $user->user_log_id;
		$blank_user_log_id = $user_log_id;
		$blank_user_log_id = "";
		$this->md_admin->user_log_id_change_for_update($id, $blank_user_log_id);
		
		//input user log id check
		$data = $this->input->post();
		$input_user_log = $data['user_log_id'];		
		$this->load->model('md_admin');
		$result = $this->md_admin->check_user_id_for_update($input_user_log);
		
		if($result == TRUE){			
			$this->session->set_flashdata('errors','Sorry, this id is already taken.');
			$this->load->model('md_admin');
			$user = $this->md_admin->user_edit_view($id);
			$data['update_user_view'] = $user;
			$this->load->view('admin/update_user_view', $data);
		}else{		
			/*$this->session->set_flashdata('success','This id is available.');
			$this->load->model('md_admin');
			$user = $this->md_admin->user_edit_view($id);
			$data['update_user_view'] = $user;
			$this->load->view('admin/update_user_view', $data);*/				
		
			///if picture update/////////
			$image_set 		= $_FILES['user_image_address'];
			$image_set_name = $image_set['name'];
			if(!empty($image_set_name)){
				///////previous image delete		
				$this->load->model('md_admin');
				$image_address = $this->md_admin->user_view($id); 	
				$remove_image_address = $image_address->user_image_address;
				//echo $remove_image_address;
				@unlink('assest/images/user/'.$remove_image_address);			
				///////previous image delete	
			}else{}
				///////////////////	
								
			
			$this->form_validation->set_rules('user_name', 'Name', 'trim|required');
			$this->form_validation->set_rules('user_number', 'Number', 'trim|required');
			$this->form_validation->set_rules('user_email', 'Email', 'trim|required');
			$this->form_validation->set_rules('user_link', 'Link', 'trim|required');
			$this->form_validation->set_rules('user_about', 'About', 'trim|required');
			$this->form_validation->set_rules('user_address', 'Address', 'trim|required');
			
			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
				$this->load->model('md_admin');
				$user = $this->md_admin->user_edit_view($id);
				$data['update_user_view'] = $user;
				$this->load->view('admin/update_user_view', $data);				
			}else{				
				
				///if picture update/////////
				$image_set 		= $_FILES['user_image_address'];
				$image_set_name = $image_set['name'];				
				if(!empty($image_set_name)){					
					$filename = md5(uniqid(rand(), true));
					$config = array(
						'upload_path' => 'assest/images/user',
						'allowed_types' => "gif|jpg|png|jpeg",
						'file_name' => $filename
					);					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);					
					if($this->upload->do_upload('user_image_address')){
						$file_data = $this->upload->data();
						
						$data =$this -> input -> post();						
						$data['user_image_address'] = $file_data['file_name'];				
						$data['user_log_id'] = $input_user_log;
						$data['user_password'] = base64_encode($new_password.'emon#11six#199five!@$W@');
						
						unset($data['user_dob_date']);
						unset($data['user_dob_month']);
						unset($data['user_dob_year']);
						
						$dob_date=$this -> input -> post('user_dob_date');
						$dob_month=$this -> input -> post('user_dob_month');
						$dob_year=$this -> input -> post('user_dob_year');
						$data['user_birthday'] = $dob_date. $dob_month. $dob_year;	
						
						unset($data['submit']);
							
						$this->load->model('md_admin');			
						$data = $this->security->xss_clean($data);
						$update_profile_result = $this->md_admin->edit_user_profile($id, $data);
						
						if($update_profile_result == TRUE){
							$this->session->set_flashdata('success','Successfully edited.');
							redirect("ct_admin/user_edit_view/{$id}");
						}else{
							$this->session->set_flashdata('errors','There is some problem to updat! Please check later.');
							redirect("ct_admin/user_edit_view/{$id}");
						}
						
						}
						else{
						 echo "uploaded faild";
						}
				}else{
		
					$this->form_validation->set_rules('user_name', 'Name', 'trim|required');
					$this->form_validation->set_rules('user_number', 'Number', 'trim|required');
					$this->form_validation->set_rules('user_email', 'Email', 'trim|required');
					$this->form_validation->set_rules('user_link', 'Link', 'trim|required');
					$this->form_validation->set_rules('user_about', 'About', 'trim|required');
					$this->form_validation->set_rules('user_address', 'Address', 'trim|required');
					
					if ($this->form_validation->run() == FALSE){
						$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
						$this->load->model('md_admin');
						$user = $this->md_admin->user_edit_view($id);
						$data['update_user_view'] = $user;
						$this->load->view('admin/update_user_view', $data);	
					}else{
						$data =$this -> input -> post();			
						$data['user_log_id'] = $input_user_log;										
						$data['user_password'] = base64_encode($new_password.'emon#11six#199five!@$W@');
						
						unset($data['user_dob_date']);
						unset($data['user_dob_month']);
						unset($data['user_dob_year']);
						
						$dob_date=$this -> input -> post('user_dob_date');
						$dob_month=$this -> input -> post('user_dob_month');
						$dob_year=$this -> input -> post('user_dob_year');
						$data['user_birthday'] = $dob_date. $dob_month. $dob_year;	
						
						unset($data['submit']);
							
						$this->load->model('md_admin');			
						$data = $this->security->xss_clean($data);
						$update_profile_result = $this->md_admin->edit_user_profile($id, $data);
						
						if($update_profile_result == TRUE){
							$this->session->set_flashdata('success','Successfully edited.');
							redirect("ct_admin/user_edit_view/{$id}");
						}else{
							$this->session->set_flashdata('errors','There is some problem to updat! Please check later.');
							redirect("ct_admin/user_edit_view/{$id}");
						}
						
					}//if form validation success*/	
				}///////////////////
			}//if form validation success*/	
		}		
		
	}
	 
	public function user_delete($id){
		
		///////previous image delete		
		$this->load->model('md_admin');
		$image_address = $this->md_admin->user_view($id);
		$remove_image_address = $image_address->user_image_address;
		//echo $remove_image_address;
		@unlink('assest/images/user/'.$remove_image_address);						
		///////previous image delete		
		
		$query = $this->md_admin->user_delete($id);
		$this->session->set_flashdata('errors', 'Successfully delete user');
		redirect('ct_admin/user_list_view');		
	}
	
	
	//admin 
	public function admin_profile(){
		$data = array();
		
		$data['controller'] = $this;
		
		$this->load->view('admin/profile', $data);
	}
	
	public function update_profile($id){	
		
		$this->form_validation->set_rules('admin_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('admin_number', 'Number', 'trim|required');
		$this->form_validation->set_rules('admin_email', 'Email', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
			redirect('ct_admin/admin_setting_profile');
		}else{
			$data =$this -> input -> post();
			
			unset($data['admin_dob_date']);
			unset($data['admin_dob_month']);
			unset($data['admin_dob_year']);
			
			$dob_date=$this -> input -> post('admin_dob_date');
			$dob_month=$this -> input -> post('admin_dob_month');
			$dob_year=$this -> input -> post('admin_dob_year');
			$data['admin_birthday'] = $dob_date. $dob_month. $dob_year;	
			
			unset($data['submit']);
				
			$this->load->model('md_admin');			
			$data = $this->security->xss_clean($data);
			$update_profile_result = $this->md_admin->update_profile($id, $data);
			
			if($update_profile_result == TRUE){
				redirect('ct_admin/admin_profile');
			}
			
		}//if form validation success*/
	}		
	
	public function admin_setting(){
		$data = array();
		
		$data['controller'] = $this;
		
		$this->load->view('admin/setting', $data);
	}		
	
	public function admin_setting_picture(){
		$data = array();
		
		$data['controller'] = $this;
		
		$this->load->view('admin/upadate_picture', $data);
	}
	
	public function update_profile_picture($id){
		
		///if picture update/////////
		$image_set 		= $_FILES['admin_image_address'];
		$image_set_name = $image_set['name'];
		
		if(!empty($image_set_name)){
			///////previous image delete	
			$this->load->model('md_admin');
			$profile_image = $this->md_admin->admin_view($id);
			$remove_image_address = $profile_image->admin_image_address;
			//echo $remove_image_address;
			@unlink('assest/images/admin/'.$remove_image_address);			
			///////previous image delete	
		}else{}
			///////////////////
			
		
		$this->form_validation->set_rules('admin_image_address', 'Image', 'trim|required');		
		
		///if picture update/////////
		$image_set 		= $_FILES['admin_image_address'];
		$image_set_name = $image_set['name'];
		
		if(!empty($image_set_name)){
			
			$filename = md5(uniqid(rand(), true));
			$config = array(
				'upload_path' => 'assest/images/admin',
				'allowed_types' => "gif|jpg|png|jpeg",
				'file_name' => $filename
			);
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('admin_image_address'))
				{
				$file_data = $this->upload->data();
				$data['admin_image_address'] = $file_data['file_name'];
				$this->load->model('md_admin');
				$this->md_admin->update_profile_picture($id, $data);
				
				$this->session->set_flashdata('success', 'Successfully updated Profile Picture');
				redirect('ct_admin/admin_setting_picture');
				
				}
				else
				{
				 echo "uploaded faild";
				}
		}else{
			redirect('ct_admin/admin_setting_picture');		
			}
		///////////////////		
	}		
	
	public function admin_setting_profile(){
		$data = array();
		
		$data['controller'] = $this;
		
		$this->load->view('admin/update_profile', $data);
	}		
	
	public function admin_setting_password(){
		$data = array();
		
		$data['controller'] = $this;
		
		$this->load->view('admin/upadate_password', $data);
	}	
	
	
	public function update_password($id){	
		
		$old_password = $this -> input -> post('admin_old_password');
		$admin_old_password = base64_encode($old_password.'emon#11six#199five!@$W@');
		
		$this->load->model('md_admin');
		$pass = $this->md_admin->admin_view($id);
		$query_old_password = $pass->admin_password;
		
		if($admin_old_password == $query_old_password){	
		
			$this->form_validation->set_rules('admin_password', 'New Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('admin_re_password', 'Re Password', 'trim|required|min_length[6]|matches[admin_password]');
			
			if ($this->form_validation->run() == FALSE){			
				$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
				redirect('ct_admin/admin_setting_password');
			}else{
				$data =$this -> input -> post();
				
				unset($data['admin_old_password']);
				unset($data['admin_re_password']);
				unset($data['submit']);			
				
				$new_password = $data['admin_password'];
				$data['admin_password'] = base64_encode($new_password.'emon#11six#199five!@$W@');
				$this->load->model('md_admin');
				$update_password_result = $this->md_admin->update_password($id, $data);
				
				if($update_password_result == TRUE){
					$this->session->set_flashdata('success','Successfully updated password.');			
					redirect('ct_admin/admin_setting_password');
				}
				
			}//if form validation success*/
			
		}else{
			$this->session->set_flashdata('errors','Old password is not correct.');			
			redirect('ct_admin/admin_setting_password');
		}
		
	}
	
	///////////-----End-----//////////
	
	
	
}//end class
