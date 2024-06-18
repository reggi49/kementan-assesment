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
 * @since Agustus 2018, 
 * @version 
 * @modifiedby 
 * @lastmodified	
 *
 *
 */

class M_angka_kredit extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	public function list_angka_kredit($id=null,$par=null,$args=null){
		$this->db->select('id,nip,tahun,format(periode1,0) ak1,format(periode2,0) ak2,format(total,0) jumlah');
		$this->db->from('master_pranata a');
		$this->db->order_by('id','desc');
		if(!empty($id)){ $this->db->where('id',$id); }
		if(!empty($par)){ if($par=='y'){ $par=0; }$this->db->where('unit_parent',$par); }
		if(!empty($args) && is_array($args)){ $this->db->where_in('id',$args); }
		$this->db->order_by('id', 'ASC');
		return $this->db->get();
	}
	public function add_angka_kredit($data){
		return $this->db->insert('master_pranata',$data);
	}
	public function edit_angka_kredit($param,$data){
		$this->db->where('id',$param);
		return $this->db->update('master_pranata',$data);
	}
	
	public function delete_angka_kredit($param){
		$this->db->where('id',$param);
		return $this->db->delete('master_pranata');
	}
}