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

class M_pangkat extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	public function list_pangkat($id=null,$par=null,$args=null){
		$this->db->select('a.*');
		$this->db->from('pangkat a');
		if(!empty($id)){ $this->db->where('kd_pangkat',$id); }
		if(!empty($par)){ if($par=='y'){ $par=0; }$this->db->where('unit_parent',$par); }
		if(!empty($args) && is_array($args)){ $this->db->where_in('kd_pangkat',$args); }
		$this->db->order_by('kd_pangkat', 'ASC');
		return $this->db->get();
	}
	public function add_pangkat($data){
		return $this->db->insert('pangkat',$data);
	}
	public function edit_pangkat($param,$data){
		$this->db->where('kd_pangkat',$param);
		return $this->db->update('pangkat',$data);
	}
	
	public function delete_pangkat($param){
		$this->db->where('kd_pangkat',$param);
		return $this->db->delete('pangkat');
	}
}