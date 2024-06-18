<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CI_Controller {

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
		$this->load->model('system_model');
	}
	public function index(){
		if($this->user_model->getSecureSystem()) {
			$output['act'] = 'view';
			$this->load->view('elemen/header',$output);
			$this->load->view('elemen/nav');
			$this->load->view('privilege/menus');
			$this->load->view('elemen/footer');
		}else{
			$this->login();
		}	
	}
	public function edit($id){
		if($this->user_model->getSecureSystem()) {
			$output['act'] = 'edit';
			$output['val'] = $id;
			$this->load->view('elemen/header',$output);
			$this->load->view('elemen/nav');
			$this->load->view('privilege/menus');
			$this->load->view('elemen/footer');
		}else{
			$this->login();
		}	
	}
	public function insert()
	{
		if($this->user_model->getSecureSystem()){
			$data = array(
				"menu_name" => $_POST['nm'],
				"menu_icon" => $_POST['ico'],
				"menu_info" => $_POST['desc'],
				"menu_parent_id" => $_POST['par'],
				"menu_link" => $_POST['lnk'],
				"menu_order" => $_POST['order'],
				"enabled" => $_POST['yn']
			);
			$this->db->insert('menus', $data);
			redirect('menus');
		}else{
			$this->login();
		}
	}
	public function update()
	{
		if($this->user_model->getSecureSystem()){
			$data = array(
				"menu_name" => $_POST['nm'],
				"menu_icon" => $_POST['ico'],
				"menu_info" => $_POST['desc'],
				"menu_link" => $_POST['lnk'],
				"menu_order" => $_POST['order'],
				"enabled" => $_POST['yn']
			);
			$this->db->where('menu_id', $_POST['idm']);
			$this->db->update('menus', $data);
			redirect('menus');
		}else{
			$this->login();
		}
	}
	public function delete($id)
	{
		if($this->user_model->getSecureSystem()){
			$this->db->where('menu_id', $id);
			$this->db->delete('menus');
			redirect('menus');
		}else{
			$this->login();
		}
	}
	public function login() {
		$this->load->view('login');
	}
}