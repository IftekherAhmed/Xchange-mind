<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ct_lr extends CI_Controller {
	
	public function login_view(){
		
		if(isset($_COOKIE['user_log_id']) && isset($_COOKIE['user_password'])){	
		
			// Verify user data
			$data = array();
			$data['user_log_id'] = $_COOKIE['user_log_id'];
			$data['user_password'] = $_COOKIE['user_password'];
			
			$this->load->model('md_lr');
			$result = $this->md_lr->check_id_for_login($data);
			
			if($result == TRUE){
				redirect('ct_user');				
			}else{
				$this->load->view('user/login');
			}
		}else{
				$this->load->view('user/login');
			}
	}
	
	public function login_user(){	
	
		$this->form_validation->set_rules('user_log_id', 'Login Id', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[5]');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->load->view('user/login');
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');	
			
		}else{
			
			$data =$this -> input -> post();
			//unset($data['remember_me']);
			$this->load->model('md_lr');
			$result = $this->md_lr->check_id_for_login($data);
			
			if($result == TRUE){
				if($data['remember_me'] == 1){
					
					$log_user_log_id = $data['user_log_id'];
					$log_user_password = $data['user_password'];
					
					setcookie('user_log_id', $log_user_log_id, time() + (86400 * 30), "/");
					setcookie('user_password', $log_user_password, time() + (86400 * 30), "/");
					
					redirect('ct_user');
				}else{
					redirect('ct_user');
				}
			}else{
				$this->session->set_flashdata('errors','ID or password was wrong.');
				$this->load->view('user/login');
			}
		} 
	}
	
	public function register_view(){
		$this->load->view('user/registeration');
	}
	
	public function register_user(){
		
		$this->form_validation->set_rules('reg_user_log_id', 'Login Id', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('reg_user_password', 'New Password', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('reg_user_re_password', 'Confirm', 'trim|required|min_length[5]|matches[reg_user_password]');		
		
		if ($this->form_validation->run() == FALSE){
			
			$this->load->view('user/registeration');
			$this->session->set_flashdata('errors','Validation faild! Please fill correctly.');	
			
		}else{
			
			$data =$this -> input -> post();
			$this->load->model('md_lr');
			$result = $this->md_lr->check_id_for_registeration($data);
			
			if($result == FALSE){
				
				$this->session->set_flashdata('errors','Sorry, this id is already taken.');
				$this->load->view('user/registeration');
				
			}else{
				redirect('ct_lr/login_view');
			}
		} 
	}


	public function log_out(){		
	
		setcookie('user_log_id', "", 0, "/");
		setcookie('user_password', "", 0, "/");
		
		$this->session->unset_userdata('user_log_id');
		$this->session->set_flashdata('success','You have successfully logged out.');
		redirect('ct_lr/login_view');
		
	}

	
}
