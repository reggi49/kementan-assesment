<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_angka_kredit extends CI_Controller {

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
		$this->load->model(array('M_angka_kredit'));
		$p = $this->system_model->getMenuId('C_angka_kredit');
		$this->d = $this->system_model->getPermission($this->session->role,$p);
		$this->pg = 'C_angka_kredit';
	}
	public function index(){
		if($this->user_model->getSecure()) {
			if($this->d['r']==1){
				$output['permit'] = $this->d;
				$this->load->view('elemen/header',$output);
				$this->load->view('elemen/nav');
				$this->load->view('v_masterpranata/angka_kredit');
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
				$output['res'] = $this->M_angka_kredit->list_angka_kredit($id);
				$this->load->view('elemen/header',$output);
				$this->load->view('elemen/nav');
				$this->load->view('v_masterpranata/edit_angka_kredit');
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
					"id" => $_POST['id'],
					"nip" => $_POST['nip'],
					"tahun" => $_POST['thn'],
					"periode1" => $_POST['pd1'],
					"periode2" => $_POST['pd2'],
					"total" => $_POST['ttl'],
				);
				$this->M_angka_kredit->add_angka_kredit($data);
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
					"tahun" => $_POST['tahun'],
					"periode1" => $_POST['pd1'],
					"periode2" => $_POST['pd2'],
					"total" => $_POST['ttl'],
				);
				$this->M_angka_kredit->edit_angka_kredit($_POST['idu'], $data);
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
				$this->M_angka_kredit->delete_angka_kredit($id, $data);
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