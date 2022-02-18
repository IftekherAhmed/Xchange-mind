<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ct_admin_lr extends CI_Controller {
	
	public function index(){
		
		if(isset($_COOKIE['admin_email']) && isset($_COOKIE['admin_password'])){	
		
			// Verify admin data
			$data = array();
			$data['admin_email'] = $_COOKIE['admin_email'];
			$data['admin_password'] = $_COOKIE['admin_password'];
			
			$this->load->model('md_admin_lr');
			$result = $this->md_admin_lr->check_email_for_login($data);
			
			if($result == TRUE){
				redirect('ct_admin');				
			}else{
				$this->load->view('admin/login');
			}
		}else{
				$this->load->view('admin/login');
			}
	}
	
	public function login_admin(){	
	
		$this->form_validation->set_rules('admin_email', 'Email', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('admin_password', 'Password', 'trim|required|min_length[5]');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->load->view('admin/login');
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');	
			
		}else{
			
			$data =$this -> input -> post();
			//unset($data['remember_me']);
			$this->load->model('md_admin_lr');
			$result = $this->md_admin_lr->check_email_for_login($data);
			
			if($result == TRUE){
				if($data['remember_me'] == 1){
					
					$log_admin_email = $data['admin_email'];
					$log_admin_password = $data['admin_password'];
					
					setcookie('admin_email', $log_admin_email, time() + (86400 * 30), "/");
					setcookie('admin_password', $log_admin_password, time() + (86400 * 30), "/");
					
					redirect('ct_admin');
				}else{
					redirect('ct_admin');
				}
			}else{
				$this->session->set_flashdata('errors','Email or password was wrong.');
				$this->load->view('admin/login');
			}
		} 
	}


	public function log_out(){		
	
		setcookie('admin_email', "", 0, "/");
		setcookie('admin_password', "", 0, "/");
		
		$this->session->unset_userdata('admin_email');
		$this->session->set_flashdata('success','You have successfully logged out.');
		redirect('ct_admin_lr/index');
		
	}

	
}
