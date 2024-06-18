<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_personil extends CI_Controller {

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
		$this->load->model(array('M_personil'));
		$p = $this->system_model->getMenuId('C_personil');
		$this->d = $this->system_model->getPermission($this->session->role,$p);
		$this->pg = 'C_personil';
	}
	public function index(){
		if($this->user_model->getSecure()) {
			if($this->d['r']==1){
				$output['permit'] = $this->d;
				$this->load->view('elemen/header',$output);
				$this->load->view('elemen/nav');
				$this->load->view('v_personil/personil');
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
				$output['res'] = $this->M_personil->list_personil($id);
				$this->load->view('elemen/header',$output);
				$this->load->view('elemen/nav');
				$this->load->view('v_personil/edit_personil');
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
				    "nip" => $_POST['nip'],
					"nama" => $_POST['nm'],
					"tgl_lahir" => $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'],
					"kd_pangkat" => $_POST['kdp'],
					"kd_jabatan" => $_POST['kd'],
					"bidang" => $_POST['bdg'],
				);
				$this->M_personil->add_personil($data);
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
					"nama" => $_POST['nm'],
					"tgl_lahir" => $_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal'],
					"kd_pangkat" => $_POST['kdp'],
					"kd_jabatan" => $_POST['kd'],
					"bidang" => $_POST['bdg'],
				);
				$this->M_personil->edit_personil($_POST['idu'], $data);
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
				$this->M_personil->delete_personil($id, $data);
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