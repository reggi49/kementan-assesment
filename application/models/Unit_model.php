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

class Unit_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	public function list_unit($id=null,$par=null,$args=null){
		$this->db->select('a.*');
		$this->db->from('unit a');
		if(!empty($id)){ $this->db->where('unit_id',$id); }
		if(!empty($par)){ if($par=='y'){ $par=0; }$this->db->where('unit_parent',$par); }
		if(!empty($args) && is_array($args)){ $this->db->where_in('unit_id',$args); }
		$this->db->order_by('unit_id', 'ASC');
		return $this->db->get();
	}
	public function add_unit($data){
		return $this->db->insert('unit',$data);
	}
	public function edit_unit($param,$data){
		$this->db->where('unit_id',$param);
		return $this->db->update('unit',$data);
	}
	
	public function delete_unit($param){
		$this->db->where('unit_id',$param);
		return $this->db->delete('unit');
	}
}