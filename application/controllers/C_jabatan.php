<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_jabatan extends CI_Controller {

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
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_jabatan'));
		$p = $this->system_model->getMenuId('C_jabatan');
		$this->d = $this->system_model->getPermission($this->session->role,$p);
		$this->pg = 'C_jabatan';
	}
	public function index(){
		if($this->user_model->getSecure()) {
			if($this->d['r']==1){
				$output['permit'] = $this->d;
				$this->load->view('elemen/header',$output);
				$this->load->view('elemen/nav');
				$this->load->view('v_jabatan/jabatan');
				$this->load->view('elemen/footer');
			}else{
				redirect('home');	
			}
		}else{
			$this->login();
		}	
	}
	public function edit($id){
		if($this->user_model->getSecure()) {
			if($this->d['w']==1){
				$output['res'] = $this->M_jabatan->list_jabatan($id);
				$this->load->view('elemen/header',$output);
				$this->load->view('elemen/nav');
				$this->load->view('v_jabatan/edit_jabatan');
				$this->load->view('elemen/footer');
			}else{
				redirect('home');	
			}
		}else{
			$this->login();
		}	
	}
	public function insert()
	{
		if($this->user_model->getSecure()){
			if($this->d['w']==1){
				$data = array(
					"kd_jabatan" => $_POST['kd'],
					"tingkat" => $_POST['tk'],
					"nama_jabatan" => $_POST['nm'],
				);
				$this->M_jabatan->add_jabatan($data);
				redirect($this->pg);
			}else{
				redirect('home/view');	
			}
		}else{
			$this->login();
		}
	}
	public function update()
	{
		if($this->user_model->getSecure()){
			if($this->d['w']==1){
				$data = array(
					"tingkat" => $_POST['tk'],
					"nama_jabatan" => $_POST['nm'],
				);
				$this->M_jabatan->edit_jabatan($_POST['idu'], $data);
				redirect($this->pg);
			}else{
				redirect('home');	
			}
		}else{
			$this->login();
		}
	}
	public function delete($id)
	{
		if($this->user_model->getSecure()){
			if($this->d['d']==1){
				$this->M_jabatan->delete_jabatan($id, $data);
				redirect($this->pg);
			}else{
				redirect('home');	
			}
		}else{
			$this->login();
		}
	}
	public function login() {
		$this->load->view('login');
	}
}