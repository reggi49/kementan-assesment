<?php
  class M_user extends CI_model {
	  	public function __construct() {
			parent::__construct();
		}
		public function list_user($id=null) {  
			$this->db->select('*');
			$this->db->from('users');
			if(!empty($id)){ $this->db->where('user_id',$id); }
			return $this->db->get();
			
		}
		public function add_user($data){
			return $this->db->insert('users',$data);
		}
		public function edit_user($param,$data){
			$this->db->where('user_id',$param);
			return $this->db->update('users',$data);
		}
		
		public function delete_user($param){
			$this->db->where('user_id',$param);
			return $this->db->delete('users');
		}
  }
  
 
 