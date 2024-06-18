<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usergroup extends CI_Controller {

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
			$this->load->view('privilege/usergroup');
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
			$this->load->view('privilege/usergroup');
			$this->load->view('elemen/footer');
		}else{
			$this->login();
		}	
	}
	public function privilege($id){
		if($this->user_model->getSecureSystem()) {
			$output['act'] = 'privilege';
			$output['val'] = $id;
			$this->load->view('elemen/header',$output);
			$this->load->view('elemen/nav');
			$this->load->view('privilege/usergroup');
			$this->load->view('elemen/footer');
		}else{
			$this->login();
		}	
	}
	public function insert()
	{
		if($this->user_model->getSecureSystem()){
			$data = array(
				"group_name" => $_POST['nm'],
				"description" => $_POST['desc'],
				"ordering" => $_POST['order'],
				"enabled" => $_POST['yn']
			);
			$this->db->insert('tusergroup', $data);
			redirect('usergroup');
		}else{
			$this->login();
		}
	}
	public function update()
	{
		if($this->user_model->getSecureSystem()){
			$data = array(
				"group_name" => $_POST['nm'],
				"description" => $_POST['desc'],
				"ordering" => $_POST['order'],
				"enabled" => $_POST['yn']
			);
			$this->db->where('autono', $_POST['idm']);
			$this->db->update('tusergroup', $data);
			redirect('usergroup');
		}else{
			$this->login();
		}
	}
	public function delete($id)
	{
		if($this->user_model->getSecureSystem()){
			$this->db->where('autono', $id);
			$this->db->delete('tusergroup');
			redirect('usergroup');
		}else{
			$this->login();
		}
	}
	public function access($id)
	{
		if($this->user_model->getSecureSystem()){
			$ug = $_POST['usrg'];
			$permit = $_POST['permit'];
			$menu = $_POST['menu'];
			$um = $_POST['um'];
			$rr='';$ww='';$dd='';
			var_dump($permit);
			foreach($menu as $x){
				$rr = (isset($permit[$x]['r'])) ? $permit[$x]['r'] : 0;
				$ww = (isset($permit[$x]['w'])) ? $permit[$x]['w'] : 0;
				$dd = (isset($permit[$x]['d'])) ? $permit[$x]['d'] : 0;
				$aa = (isset($permit[$x]['a'])) ? $permit[$x]['a'] : 0;
				if(empty($um[$x])){
					$data = array(
						"grup_id" => $ug,
						"menu_id" => $x,
						"permission_r" => $rr,
						"permission_w" => $ww,
						"permission_d" => $dd,
						"permission_a" => $aa
					);
					$this->db->insert('tusermenu', $data);
				}else{
					$data = array(
						"grup_id" => $ug,
						"menu_id" => $x,
						"permission_r" => $rr,
						"permission_w" => $ww,
						"permission_d" => $dd,
						"permission_a" => $aa
					);
					$this->db->where('usermenu_id',$um[$x]);
					$this->db->update('tusermenu', $data);
				}
			}
			redirect('usergroup/privilege/'.$id);
		}else{
			$this->login();
		}
	}
	public function login() {
		$this->load->view('login');
	}
}