<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class md_user extends CI_Model {
	
	//notice
	public function notice_list(){	
		$this->db->from('tbl_notice');
		$this->db->order_by('notice_id', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}
	}
	
	
	//category
	public function single_category_data($id){
		$Data = array(
		'category_id' => $id);				
		$result = $this->db->get_where('tbl_category',$Data);	
		
		if ($result -> num_rows() == 1) {
			
			$category_data = array(
				'category_id' => $result -> row(0) -> category_id , 
				'category_name' => $result -> row(0) -> category_name
			);				
			
			return $category_data;
		}else{ 
			return FALSE; 
		}
	}
	
	public function category_list(){		
		$query = $this->db->get('tbl_category');
		
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}
	}
	
	public function category_view($id){	
		$query = $this->db->get('tbl_category');
		
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return FALSE;
		}
	}
	
	
	//product
	public function search_product($key){			
		$this->db->where('product_visiblity', 1);		
		$this->db->like('product_name', $key);
		$query = $this->db->get('tbl_product');
		
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}
	}
	
	public function user_product_list($id){
		$this->db->where('user_id', $id);		
		$this->db->where('product_visiblity', 1);	
		$this->db->order_by('product_id', 'desc');
		$query = $this->db->get('tbl_product');
		
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	
	}
	
	public function product_list_by_category($id,$limit,$offset){
		$this->db->where('category_id', $id);
		$this->db->where('product_visiblity', 1);
		$this->db->order_by('product_id', 'desc');
		$this->db->limit($limit,$offset);		
		$query = $this->db->get('tbl_product');
		
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	
	}
	
	public function count_product_by_user($user_id){		
		$this->db->from('tbl_product');
		$this->db->where('user_id', $user_id);
		$category = $this->db->get();
		return $category->num_rows();
	}
	
	public function count_product_by_category($category_id){		
		$this->db->from('tbl_product');
		$this->db->where('category_id', $category_id);
		$category = $this->db->get();
		return $category->num_rows();
	}
	
	public function product_list_for_home(){	
		$this->db->from('tbl_product');
		$this->db->where('product_visiblity', 1);
		$this->db->order_by('product_id', 'desc');
		$this->db->limit(10);		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}	
		
	}
	
	public function product_view($id){			
		$this->db->where('product_id', $id);		
		$this->db->where('product_visiblity', 1);	
		$query = $this->db->get('tbl_product');
		
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return FALSE;
		}
	}
	
	public function make_product($data){
		$this->db->insert('tbl_product',$data);
	}
	
	public function single_product_delete($id){
		$this->db->where('product_id', $id);
		$this->db->delete('tbl_product');
		return true;				
	}	
	
	
	
	//opinion
	public function make_opinion($data){
		$this->db->insert('tbl_opinion',$data);
	}
	
	
	
	//user
	public function user_view($id){			
		$this->db->where('user_id', $id);
		$query = $this->db->get('tbl_user');
		
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return FALSE;
		}
	}
	
	
	public function update_password($id, $data){
		$this->db->where('user_id', $id);
		$this->db->update('tbl_user', $data);	
		return true;				
	}
	
	
	public function update_profile($id, $data){
		$this->db->where('user_id', $id);
		$this->db->update('tbl_user', $data);	
		return true;				
	}
	
	
	public function update_profile_picture($id, $data){
		$this->db->where('user_id', $id);
		$this->db->update('tbl_user', $data);	
		return true;				
	}
	
	
	public function single_profile_data($id){
		$Data = array(
		'user_id' => $id);
		
		$result = $this->db->get_where('tbl_user',$Data);
		
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
			
			return $user_data;
		}else{ 
			return FALSE; 
		}
	}
	
	public function update_user_privacy_check($id){			
		$this->db->where('user_id', $id);
		$query = $this->db->get('tbl_user_privacy');
		
		if ($query->num_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function single_user_privacy($id){
		$this->db->where('user_id', $id);	
		$query = $this->db->get('tbl_user_privacy');
		
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return FALSE;
		}
	
	}
		
	public function update_user_privacy($id, $data){
		$this->db->where('user_id', $id);
		$this->db->update('tbl_user_privacy', $data);	
		return true;				
	}	
	
	public function insert_user_privacy($data){
		$this->db->insert('tbl_user_privacy',$data);
	}
	
	
	
	//help
	public function help_list(){	
		$this->db->from('tbl_help');
		$this->db->order_by('help_id', 'desc');
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}
	}
	
	
	
	
	
	
	//////--------End--------//////////

 }
?>