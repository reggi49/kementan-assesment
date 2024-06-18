<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

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
		$this->load->model(array('user_model','m_user'));
			
	}	
	public function index()
	{
		if($this->user_model->getSecure()) {
			$output['res'] = $this->m_user->list_user();  //res = ambil dari view obat m_obat ambil dari model dengan function list obat
			$this->load->view('elemen/header');
			$this->load->view('v_user/user',$output);
			$this->load->view('elemen/footer');
		}else{
		$this->login();
		}
	}
	public function edit($id=null) {
		if($this->user_model->getSecure()){
			$output['res'] = $this->m_user->list_user($id);
			$this->load->view('elemen/header');
			$this->load->view('v_user/edit',$output);
			$this->load->view('elemen/footer');
		}else{
			$this->login();
		}	
    }
	public function insert() {
		if($this->user_model->getSecure()){
			$data = array(
						'user_name'=>$this->input->post('user'),	
						'user_fullname'=>$this->input->post('fullname'),
						'user_password'=>md5($this->input->post('passwd')),
						'unit_id'=>$this->input->post('unit'),
						'gender'=>$this->input->post('gender'),
						'notelp'=>$this->input->post('telp'),
						'alamat'=>$this->input->post('alamat'),
						'email'=>$this->input->post('email'),
						'created_id'=>$this->session->idu
					);		
					
			if($this->m_user->add_user($data)){
				$this->base_model->setMessage(1,'User Berhasil ditambahkan');
				redirect(base_url('c_user'));
			}else{
				$this->base_model->setMessage(0,'User gagal ditambahkan');
				redirect(base_url('c_user'));
			}
			}else{
				$this->login();	
			}
					
		}
	public function update(){
		if($this->user_model->getSecure()){
			$data = array(
						'user_name'=>$this->input->post('user'),	
						'user_fullname'=>$this->input->post('fullname'),
						'user_password'=>md5($this->input->post('passwd')),
						'unit_id'=>$this->input->post('unit'),
						'gender'=>$this->input->post('gender'),
						'notelp'=>$this->input->post('telp'),
						'alamat'=>$this->input->post('alamat'),
						'email'=>$this->input->post('email')						
						);
			if($this->m_user->edit_user($this->input->post('id'),$data)){
				$this->base_model->setMessage(1,'Data Berhasil diubah');
			}
			redirect(base_url('c_user'));
		}
	}
	
	public function delete($id){
	if($this->user_model->getSecure()){
			if($this->m_user->delete_user($id)){
				$this->base_model->setMessage(1,'Data Berhasil dihapus');
			}
			redirect(base_url('c_user'));
		}
	}
	
	
	public function login(){
		$this->load->view('login');
		
	}
}
		