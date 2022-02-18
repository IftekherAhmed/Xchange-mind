<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class md_lr extends CI_Model {
	
	public function check_id_for_registeration($data){
		
		$RegData = array('user_log_id' => $data['reg_user_log_id']);		
		$result = $this -> db -> get_where('tbl_user', $RegData );
		
		if ($result->num_rows() == 1) {	
		
			return FALSE;			
			
		}else{
			
			$RegData = array(
			'user_log_id' => $data['reg_user_log_id'],			
			'user_password' => base64_encode($data['reg_user_password'].'emon#11six#199five!@$W@')
			);
			$this->db->insert('tbl_user',$RegData);	
			$this ->session ->set_userdata($RegData);
			return TRUE;			
		}
	}
	
	public function check_id_for_login($data){
		
		$LogData = array(
		'user_log_id' => $data['user_log_id'],			
		'user_password' => base64_encode($data['user_password'].'emon#11six#199five!@$W@')
		);
		
		$result = $this->db->get_where('tbl_user',$LogData);
		
		if ($result -> num_rows() == 1) {
			$user_data = array(
				'user_id' => $result -> row(0) -> user_id , 
				'user_name' => $result -> row(0) -> user_name,
				'user_number' => $result -> row(0) -> user_number,
				'user_email' => $result -> row(0) -> user_email,
				'user_log_id' => $result -> row(0) -> user_log_id,
				'user_country' => $result -> row(0) -> user_country,
				'user_profession' => $result -> row(0) -> user_profession,
				'user_link' => $result -> row(0) -> user_link,
				'user_gender' => $result -> row(0) -> user_gender,
				'user_birthday' => $result -> row(0) -> user_birthday,
				'user_about' => $result -> row(0) -> user_about,
				'user_address' => $result -> row(0) -> user_address,
				'user_image_address' => $result -> row(0) -> user_image_address,
				'user_password' => $result -> row(0) -> user_password,
				'user_join' => $result -> row(0) -> user_join
			);		
			
			$this -> session -> set_userdata($user_data);
			return TRUE;
		}else{ 
			return FALSE; 
		}
	}
	

 }
?>