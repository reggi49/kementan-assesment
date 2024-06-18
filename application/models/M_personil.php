<?php	if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * PHP 5
 *
 * Application System Environment (X-ASE)
 * laxono :  Rapid Development Framework (http://www.laxono.us)
 * Copyright 2011-2015.
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource system_model.php
 * @copyright Copyright 2011-2015, laxono.us.
 * @author blx
 * @package 
 * @subpackage	
 * @since January 14, 2015
 * @version 
 * @modifiedby 
 * @lastmodified	
 *
 *
 */

class M_personil extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	public function list_personil($id=null,$par=null,$args=null){
		$this->db->select('a.*');
		$this->db->from('personil a');
		if(!empty($id)){ $this->db->where('nip',$id); }
		if(!empty($par)){ if($par=='y'){ $par=0; }$this->db->where('unit_parent',$par); }
		if(!empty($args) && is_array($args)){ $this->db->where_in('nip',$args); }
		$this->db->order_by('nip', 'ASC');
		return $this->db->get();
	}
	public function add_personil($data){
		return $this->db->insert('personil',$data);
	}
	public function edit_personil($param,$data){
		$this->db->where('nip',$param);
		return $this->db->update('personil',$data);
	}
	
	public function delete_personil($param){
		$this->db->where('nip',$param);
		return $this->db->delete('personil');
	}
}