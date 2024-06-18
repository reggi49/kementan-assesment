<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct() {
		parent::__construct();
			
	}	
	public function otentikasi()
	{
		$this->load->model('User_model');
		$cek = $this->User_model->ceklogin($this->input->post('username'),$this->input->post('password'));
		if($cek['respon']==1){

			$this->session->set_userdata($cek);
			redirect(base_url('home/beranda'));
		}else{
				
		   redirect(base_url('home/login'));
		}
    }
	public function logout(){
		$data = array('respon','idu','user','role','picture','units');
		$this->session->unset_userdata($data);
		redirect(base_url());
	}
}
		