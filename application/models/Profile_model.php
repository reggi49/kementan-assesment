<?php
  class Profile_model extends CI_model {
	  	public function __construct() {
			parent::__construct();
		}
		public function data_profile($nip=null) {
			$data = array(
		    		'00001'=>array(
					         'nama'=>'Fulan',
							 'umur'=>'24'
							 ),
					'00002'=>array(
					         'nama'=>'Adi',
							 'umur'=>'23'
							 )
					); 
			return $data[$nip];
		}
  }
  
 
 