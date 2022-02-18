<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class md_admin_lr extends CI_Model {
	
	
	public function check_email_for_login($data){
		
		$LogData = array(
		'admin_email' => $data['admin_email'],			
		'admin_password' => base64_encode($data['admin_password'].'emon#11six#199five!@$W@')
		);
		
		$result = $this->db->get_where('tbl_admin',$LogData);
		
		if ($result -> num_rows() == 1) {
			$admin_data = array(
				'admin_id' => $result -> row(0) -> admin_id , 
				'admin_name' => $result -> row(0) -> admin_name,
				'admin_number' => $result -> row(0) -> admin_number,
				'admin_email' => $result -> row(0) -> admin_email,
				'admin_gender' => $result -> row(0) -> admin_gender,
				'admin_birthday' => $result -> row(0) -> admin_birthday,
				'admin_image_address' => $result -> row(0) -> admin_image_address,
				'admin_password' => $result -> row(0) -> admin_password,
				'admin_join' => $result -> row(0) -> admin_join
			);		
			
			$this -> session -> set_userdata($admin_data);
			return TRUE;
		}else{ 
			return FALSE; 
		}
	}
	

 }
?>