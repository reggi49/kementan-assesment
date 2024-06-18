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

class M_jabatan extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	public function list_jabatan($id=null,$par=null,$args=null){
		$this->db->select('a.*');
		$this->db->from('jabatan a');
		$this->db->order_by('kd_jabatan','desc');
		if(!empty($id)){ $this->db->where('kd_jabatan',$id); }
		if(!empty($par)){ if($par=='y'){ $par=0; }$this->db->where('unit_parent',$par); }
		if(!empty($args) && is_array($args)){ $this->db->where_in('kd_jabatan',$args); }
		$this->db->order_by('kd_jabatan', 'ASC');
		return $this->db->get();
	}
	public function add_jabatan($data){
		return $this->db->insert('jabatan',$data);
	}
	public function edit_jabatan($param,$data){
		$this->db->where('kd_jabatan',$param);
		return $this->db->update('jabatan',$data);
	}
	
	public function delete_jabatan($param){
		$this->db->where('kd_jabatan',$param);
		return $this->db->delete('jabatan');
	}
}