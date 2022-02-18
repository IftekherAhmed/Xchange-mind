<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class md_admin extends CI_Model {	
	
	//count
	public function total_opinion(){		
		$this->db->from('tbl_opinion');
		$total_opinion = $this->db->get();
		return $total_opinion->num_rows();
	}
	
	public function total_product(){		
		$this->db->from('tbl_product');
		$total_product = $this->db->get();
		return $total_product->num_rows();
	}
	
	public function total_category(){		
		$this->db->from('tbl_category');
		$total_category = $this->db->get();
		return $total_category->num_rows();
	}
	
	public function total_user(){		
		$this->db->from('tbl_user');
		$total_user = $this->db->get();
		return $total_user->num_rows();
	}
	
	public function count_product_by_category($category_id){		
		$this->db->from('tbl_product');
		$this->db->where('category_id', $category_id);
		$category = $this->db->get();
		return $category->num_rows();
	}
	
	public function count_product_by_user($user_id){		
		$this->db->from('tbl_product');
		$this->db->where('user_id', $user_id);
		$category = $this->db->get();
		return $category->num_rows();
	}
	

	//category
	public function make_category($data){
		$this->db->insert('tbl_category',$data);
	}
	
	public function category_list(){		
		$query = $this->db->get('tbl_category');
		
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}
	}
	
	public function category_view($id){			
		$this->db->where('category_id', $id);
		$query = $this->db->get('tbl_category');
		
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return FALSE;
		}
	}
	
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
	
	public function single_category_edit_view($id){	
		$this->db->from('tbl_category');
		$this->db->where('category_id', $id);
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{}
	}
	
	public function single_category_edit($id, $data){	
		$this->db->where('category_id', $id);
		$this->db->update('tbl_category', $data);	
		return true;				
	}
	
	public function single_category_delete($id){	
		$this->db->where('category_id', $id);
		$this->db->delete('tbl_category');	
		return true;				
	}
	
	
	//notice

	public function make_notice($data){
		$this->db->insert('tbl_notice',$data);
	}
	public function notice_list(){	
		$this->db->from('tbl_notice');
		$this->db->order_by('notice_id', 'desc');
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}
	}
	
	public function single_notice_edit_view($id){	
		$this->db->from('tbl_notice');
		$this->db->where('notice_id', $id);
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{}
	}
	
	public function single_notice_edit($id, $data){	
		$this->db->where('notice_id', $id);
		$this->db->update('tbl_notice', $data);	
		return true;				
	}
	
	public function single_notice_delete($id){	
		$this->db->where('notice_id', $id);
		$this->db->delete('tbl_notice');	
		return true;				
	}
	
	public function single_notice_view($id){	
		$this->db->from('tbl_notice');
		$this->db->where('notice_id', $id);
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{}
	}
	
	
	//help

	public function make_help($data){
		$this->db->insert('tbl_help',$data);
	}
	public function help_list(){	
		$this->db->from('tbl_help');
		$this->db->order_by('help_id', 'desc');
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}
	}
	
	public function single_help_edit_view($id){	
		$this->db->from('tbl_help');
		$this->db->where('help_id', $id);
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{}
	}
	
	public function single_help_edit($id, $data){	
		$this->db->where('help_id', $id);
		$this->db->update('tbl_help', $data);	
		return true;				
	}
	
	public function single_help_delete($id){	
		$this->db->where('help_id', $id);
		$this->db->delete('tbl_help');	
		return true;				
	}
	
	public function single_help_view($id){	
		$this->db->from('tbl_help');
		$this->db->where('help_id', $id);
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{}
	}
	
	//product
	public function product_list($limit,$offset){	
		$this->db->from('tbl_product');
		$this->db->limit($limit,$offset);		
		$this->db->order_by('product_id', 'desc');
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}
	}
	
	public function single_product_view($id){	
		$this->db->from('tbl_product');
		$this->db->where('product_id', $id);
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{}
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
	
	public function user_product_list($id,$limit,$offset){
		$this->db->where('user_id', $id);
		$this->db->where('product_visiblity', 0);
		$this->db->order_by('product_id', 'desc');
		$this->db->limit($limit,$offset);		
		$query = $this->db->get('tbl_product');
		
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	
	}
	
	public function single_product_edit_view($id){	
		$this->db->from('tbl_product');
		$this->db->where('product_id', $id);
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{}
	}
	
	public function single_product_edit($id, $data){	
		$this->db->where('product_id', $id);
		$this->db->update('tbl_product', $data);	
		return true;				
	}
	
	public function single_product_delete($id){
		$this->db->where('product_id', $id);
		$this->db->delete('tbl_product');
		return true;				
	}	
	
	public function single_product_approve($id, $data){
		$this->db->where('product_id', $id);
		$this->db->update('tbl_product', $data);	
		return true;				
	}
	
	
	//opinion
	
	public function opinion_list(){	
		$this->db->from('tbl_opinion');
		$this->db->order_by('opinion_id', 'desc');
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}
	}
	
	public function single_opinion_delete($id){	
		$this->db->where('opinion_id', $id);
		$this->db->delete('tbl_opinion');	
		return true;				
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
	
	public function check_user_id_for_registeration($data){
				
		$this->db->where('user_log_id', $data['user_log_id']);
		$query = $this->db->get('tbl_user');
		
		
		if ($query->num_rows() == 1) {			
			return FALSE;				
		}else{
			$this->db->insert('tbl_user',$data);	
			return TRUE;			
		}
	}
	
	public function user_list(){		
		$query = $this->db->get('tbl_user');
		
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{}
	}
	
	public function user_edit_view($id){			
		$this->db->where('user_id', $id);
		$query = $this->db->get('tbl_user');
		
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return FALSE;
		}
	}
	
	public function user_log_id_change_for_update($id, $blank_user_log_id){	
		$this->db->where('user_id', $id);
		$this->db->update('tbl_user', ['user_log_id'=>$blank_user_log_id]);	
		return true;				
	}
	
	public function check_user_id_for_update($data){					
		$this->db->where('user_log_id', $data);
		$query = $this->db->get('tbl_user');		
		if ($query->num_rows() == 1) {			
			return TRUE;				
		}else{
			return FALSE;			
		}
	}
	
	public function edit_user_profile($id, $data){
		$this->db->where('user_id', $id);
		$this->db->update('tbl_user', $data);	
		return true;				
	}
	
	public function user_delete($id){	
		$this->db->where('user_id', $id);
		$this->db->delete('tbl_user');	
		return true;				
	}
	
	//admin	
	
	public function admin_view($id){			
		$this->db->where('admin_id', $id);
		$query = $this->db->get('tbl_admin');
		
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return FALSE;
		}
	}
	
	public function update_profile_picture($id, $data){
		$this->db->where('admin_id', $id);
		$this->db->update('tbl_admin', $data);	
		return true;				
	}
	
	
	public function update_password($id, $data){
		$this->db->where('admin_id', $id);
		$this->db->update('tbl_admin', $data);	
		return true;				
	}
	
	
	public function update_profile($id, $data){
		$this->db->where('admin_id', $id);
		$this->db->update('tbl_admin', $data);	
		return true;				
	}
	
	
	
	

 }
?>