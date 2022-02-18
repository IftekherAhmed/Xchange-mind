<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ct_user extends CI_Controller {
	

	function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('user_log_id')!=FALSE){			
		}else { 
			$this->session->set_flashdata('errors','You have logged in first.');
			redirect('ct_lr/login_view');
		}
		
	}
	

	//time ago
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

	
	//home page
	public function index(){
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('md_user');
		$menu = $this->md_user->category_list();
		$data['main_menu'] = $menu;		
		
		///notice
		$this->load->model('md_user');
		$notice = $this->md_user->notice_list();
		$data['notice'] = $notice;		
		
		////product	
		$product = $this->md_user->product_list_for_home();
		$data['product_list_for_home'] = $product;
		
		$this->load->view('user/home', $data);
	}	
	
	
	
	//product
	public function search_product(){	
	
		$data = array();
		
		$key = $this->input->post('product_name');
		
		$security = $this->security->xss_clean($key );		
		$this->load->model('md_user');
		$product = $this->md_user->search_product($security);
		$data['search_product'] = $product;	
		$data['search_product_title'] = $security;	
		
		$data['controller'] = $this;
		
		$this->load->view('user/search', $data);
		
	}
	
	public function add_product(){
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('md_user');
		$menu = $this->md_user->category_list();
		$data['main_menu'] = $menu;	
		
		$this->load->view('user/add_product', $data);
	}
		
	public function product_view($id){
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('md_user');
		$menu = $this->md_user->category_list();
		$data['main_menu'] = $menu;	
		
		$product = $this->md_user->product_view($id);
		$data['product_view'] = $product;
		
		if($data['product_view'] != FALSE){
			$this->load->view('user/product', $data);
		}else{
			redirect('ct_user');
		}
		
	}
	
	public function make_product(){
		
		$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required');
		$this->form_validation->set_rules('product_video_link', 'Video Link', 'trim|required');
		$this->form_validation->set_rules('product_live_preview_link', 'Product Live Preview', 'trim|required');
		$this->form_validation->set_rules('product_description', 'Description', 'trim|required');
		
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
			redirect('ct_user/add_product');
			
		}else{
			$data =$this -> input -> post();	
			$this->load->model('md_user');			
			$category_id = $data['category_id'];
			
			$category_name_q = $this->md_user->single_category_data($category_id);
			$category_name = $category_name_q['category_name'];
			$data['category_name'] = $category_name;
			$data['product_visiblity'] = 0;
			
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
			
			//for thumbnail
			$filename = md5(uniqid(rand(), true));
			$config = array(
				'upload_path' => 'assest/images/product',
				'allowed_types' => "gif|jpg|png|jpeg",
				'file_name' => $filename
			);
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			//for product_download_link
			$filename1 = md5(uniqid(rand(), true));
			$config1 = array(
				'upload_path' => 'assest/product/zip',
				'allowed_types' => "zip|rar",
				'file_name' => $filename1
			);
			$this->upload->do_upload('product_thumbnail');
			$file_data = $this->upload->data();
			$data['product_thumbnail'] = $file_data['file_name'];
			
			
			$this->load->library('upload', $config1);
			$this->upload->initialize($config1);
			$this->upload->do_upload('product_download_link');
			$file_data1 = $this->upload->data();
			$data['product_download_link'] = $file_data1['file_name'];
			
			$this->load->model('md_user');
			//$data = $this->security->xss_clean($data); this security is omited for video link support poperly
			$this->md_user->make_product($data);
			$this->session->set_flashdata('success', 'Successfully added Product');
			redirect('ct_user/add_product');
			
		}//if form validation success*/
				
	}

	
	public function count_product_by_user($id){
		$this->load->model('md_user');
		$query = $this->md_user->count_product_by_user($id);
		return $query;
	}

	
	public function count_product_by_category($id){
		$this->load->model('md_user');
		$query = $this->md_user->count_product_by_category($id);
		return $query;
	}	
		
	public function user_product_list($id){
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('md_user');
		$menu = $this->md_user->category_list();
		$data['main_menu'] = $menu;
		
		$this->load->model('md_user');	
		$product = $this->md_user->user_product_list($id);
		$data['user_product_list'] = $product;
		
		
		$user = $this->md_user->user_view($id);
		$data['user_view'] = $user;
		
		if($data['user_view'] != FALSE){
			$this->load->view('user/user_product_list', $data);
		}else{
			redirect('ct_user');
		}
	}		
	
	public function single_product_delete($id){
		
		///////previous image delete		
		$this->load->model('md_user');
		$image_address = $this->md_user->product_view($id);
		$remove_image_address = $image_address->product_thumbnail;
		//echo $remove_image_address;
		@unlink('assest/images/product/'.$remove_image_address);						
		///////previous image delete	
		
		
		///////zip delete	
		$zip_address = $this->md_user->product_view($id);
		$remove_zip_address = $zip_address->product_download_link;
		//echo $remove_zip_address;
		@unlink('assest/product/zip/'.$remove_zip_address);						
		///////previous zip delete				
		
		$query = $this->md_user->single_product_delete($id);
		$this->session->set_flashdata('errors', 'Successfully delete product');
		redirect("ct_user/index");		
	}	
		
		
		
	//category	
	public function category_view($id){
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('md_user');
		$menu = $this->md_user->category_list();
		$data['main_menu'] = $menu;		
		
		///product pagination		
		$config = array(		
			'base_url' 		  => base_url('index.php/ct_user/category_view/').$id,
			'per_page' 		  => 8,
			'total_rows' 	  => $this->md_user->count_product_by_category($id),
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
		
		$this->load->model('md_user');	
		$product = $this->md_user->product_list_by_category($id,$limit,$offset);
		$data['product_list_by_category'] = $product;
		
		
		$category = $this->md_user->category_view($id);
		$data['category_view'] = $category;
		
		if($data['category_view'] != FALSE){
			$this->load->view('user/category', $data);
		}else{
			redirect('ct_user');
		}
	}
	
	
	
	//opinion
	public function add_Opinion(){
		$data = array();		
		$data['controller'] = $this;	
		
		///category
		$this->load->model('md_user');
		$menu = $this->md_user->category_list();
		$data['main_menu'] = $menu;			
		
		$this->load->view('user/Opinion', $data);
	}
	
	public function make_opinion(){
		
		$this->form_validation->set_rules('opinion_description', 'Opinion', 'trim|required');		
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
			redirect('ct_user/add_Opinion');
			
		}else{
			
			$data =$this -> input -> post();	
			unset($data['submit']);
			
			$this->load->model('md_user');						
			$data = $this->security->xss_clean($data);
			$this->md_user->make_opinion($data);
			
			$this->session->set_flashdata('success','Thanks for giving your valuable opinion.');			
			redirect('ct_user/add_Opinion');
			
		}//if form validation success*/
				
	}
	
	
	//user
	public function user_profile(){
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('md_user');
		$menu = $this->md_user->category_list();
		$data['main_menu'] = $menu;	
		
		$this->load->view('user/profile', $data);
	}
		
	public function user_view($id){
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('md_user');
		$menu = $this->md_user->category_list();
		$data['main_menu'] = $menu;	
		
		$this->load->model('md_user');
		$privacy = $this->md_user->update_user_privacy_check($id);
		
		if($privacy == TRUE){
			///privacy
			$this->load->model('md_user');
			$privacy = $this->md_user->single_user_privacy($id);
			$data['privacy'] = $privacy;
			
			$user = $this->md_user->user_view($id);
			$data['user_view'] = $user;		
			
			if($data['user_view'] != FALSE){
			$this->load->view('user/user_view_with_privacy', $data);
			}else{
				redirect('ct_user');
			}
		}else{
			$user = $this->md_user->user_view($id);
			$data['user_view'] = $user;		
			
			if($data['user_view'] != FALSE){
			$this->load->view('user/user_view', $data);
			}else{
				redirect('ct_user');
			}
		}
		
		
			
		
	}
	
	public function user_setting(){
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('md_user');
		$menu = $this->md_user->category_list();
		$data['main_menu'] = $menu;	
		
		$this->load->view('user/setting', $data);
	}
	
	public function user_setting_profile(){
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('md_user');
		$menu = $this->md_user->category_list();
		$data['main_menu'] = $menu;	
		
		$this->load->view('user/upadate_profile', $data);
	}
	
	public function update_profile($id){	
		
		$this->form_validation->set_rules('user_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('user_number', 'Number', 'trim|required');
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required');
		$this->form_validation->set_rules('user_link', 'Link', 'trim|required');
		$this->form_validation->set_rules('user_about', 'About', 'trim|required');
		$this->form_validation->set_rules('user_address', 'Address', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
			redirect('ct_user/user_setting_profile');
		}else{
			$data =$this -> input -> post();
			
			unset($data['user_dob_date']);
			unset($data['user_dob_month']);
			unset($data['user_dob_year']);
			
			$dob_date=$this -> input -> post('user_dob_date');
			$dob_month=$this -> input -> post('user_dob_month');
			$dob_year=$this -> input -> post('user_dob_year');
			$data['user_birthday'] = $dob_date. $dob_month. $dob_year;	
			
			unset($data['submit']);
				
			$this->load->model('md_user');			
			$data = $this->security->xss_clean($data);
			$update_profile_result = $this->md_user->update_profile($id, $data);
			
			if($update_profile_result == TRUE){
				redirect('ct_user/user_profile');
			}
			
		}//if form validation success*/
	}
	
	public function user_setting_password(){
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('md_user');
		$menu = $this->md_user->category_list();
		$data['main_menu'] = $menu;	
		
		$this->load->view('user/upadate_password', $data);
	}
	
	
	
	public function update_password($id){	
		
		$old_password = $this -> input -> post('user_old_password');
		$user_old_password = base64_encode($old_password.'emon#11six#199five!@$W@');
		
		$this->load->model('md_user');
		$menu = $this->md_user->single_profile_data($id);
		$query_old_password = $menu['user_password'];
		
		if($user_old_password == $query_old_password){	
		
			$this->form_validation->set_rules('user_password', 'New Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('user_re_password', 'Re Password', 'trim|required|min_length[6]|matches[user_password]');
			
			if ($this->form_validation->run() == FALSE){			
				$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');			
				redirect('ct_user/user_setting_password');
			}else{
				$data =$this -> input -> post();
				
				unset($data['user_old_password']);
				unset($data['user_re_password']);
				unset($data['submit']);			
				
				$new_password = $data['user_password'];
				$data['user_password'] = base64_encode($new_password.'emon#11six#199five!@$W@');
				$this->load->model('md_user');
				$update_password_result = $this->md_user->update_password($id, $data);
				
				if($update_password_result == TRUE){
					$this->session->set_flashdata('success','Successfully updated password.');			
					redirect('ct_user/user_setting_password');
				}
				
			}//if form validation success*/
			
		}else{
			$this->session->set_flashdata('errors','Old password is not correct.');			
					redirect('ct_user/user_setting_password');
		}
		
	}
	
	
	public function user_setting_picture(){
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('md_user');
		$menu = $this->md_user->category_list();
		$data['main_menu'] = $menu;	
		
		$this->load->view('user/upadate_picture', $data);
	}
	
	
	public function update_profile_picture($id){	
		
		
		///if picture update/////////
		$image_set 		= $_FILES['user_image_address'];
		$image_set_name = $image_set['name'];
		
		if(!empty($image_set_name)){
			///////previous image delete	
			$this->load->model('md_user');
			$profile_image = $this->md_user->single_profile_data($id);
			$remove_image_address = $profile_image['user_image_address'];
			//echo $remove_image_address;
			@unlink('assest/images/user/'.$remove_image_address);			
			///////previous image delete	
		}else{}
			///////////////////
			
		
		$this->form_validation->set_rules('user_image_address', 'Image', 'trim|required');		
		
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
			
			if($this->upload->do_upload('user_image_address'))
				{
				$file_data = $this->upload->data();
				$data['user_image_address'] = $file_data['file_name'];
				$this->load->model('md_user');
				$this->md_user->update_profile_picture($id, $data);
				
				$this->session->set_flashdata('success', 'Successfully updated Profile Picture');
				redirect('ct_user/user_setting_picture');
				
				}
				else
				{
				 echo "uploaded faild";
				}
		}else{
			redirect('ct_user/user_setting_picture');		
			}
		///////////////////		
	}
	
	
	
	public function user_setting_privacy(){
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('md_user');
		$menu = $this->md_user->category_list();
		$data['main_menu'] = $menu;	
		
		$this->load->view('user/upadate_privacy', $data);
	}
	
	
	
	public function update_user_privacy($id){	
		
		$this->load->model('md_user');
		$privacy = $this->md_user->update_user_privacy_check($id);
		
		if($privacy == TRUE){	
			$data =$this -> input -> post();
			unset($data['submit']);		
			$this->load->model('md_user');
			$this->md_user->update_user_privacy($id, $data);
			
			///category
			$this->load->model('md_user');
			$menu = $this->md_user->category_list();
			$data['main_menu'] = $menu;	
			$this->session->set_flashdata('success', 'Successfully updated Profile Privacy');
			redirect('ct_user/user_setting_privacy');
		}else{
			$data = $this -> input -> post();
			unset($data['submit']);					
			$data['user_id'] = $id;			
			$this->load->model('md_user');
			$this->md_user->insert_user_privacy($data);	
			
			///category
			$this->load->model('md_user');
			$menu = $this->md_user->category_list();
			$data['main_menu'] = $menu;	
			$this->session->set_flashdata('success', 'Successfully updated Profile Privacy');
			redirect('ct_user/user_setting_privacy');	
		}
	}
	
	//help
	
	public function help_list(){
		$data = array();
		
		$data['controller'] = $this;
		
		///category
		$this->load->model('md_user');
		$menu = $this->md_user->category_list();
		$data['main_menu'] = $menu;	
		
		///help_list
		$this->load->model('md_user');
		$help = $this->md_user->help_list();
		$data['help_list'] = $help;
		
		$this->load->view('user/help_list', $data);
	}
	
	
	
	
	/////////---End---/////////
	
}//end class
