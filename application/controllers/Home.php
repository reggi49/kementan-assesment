<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
			$this->load->model(array('profile_model','user_model','M_laporan'));
	}	
	public function index()
	{
		$this->beranda();
	}
	public function beranda() {
		if($this->user_model->getSecure()) {
			
			$this->load->view('elemen/header');
			$this->load->view('elemen/nav');
			$this->load->view('home');
			$this->load->view('elemen/footer');
		}else{
		$this->login();
		}
	}
	public function pensiun() {
		if($this->user_model->getSecure()) {
			$output['res'] = $this->M_laporan->rekap_pensiun();
			$this->load->view('elemen/header',$output);
			$this->load->view('elemen/nav');
			$this->load->view('pensiun');
			$this->load->view('elemen/footer');
		}else{
		$this->login();
		}
	}
	public function login() {
		$this->load->view('login');
	}
	
    public function profile($nip)
	{		
		$output['profile'] = $this->
		profile_model->data_profile($nip);
		$output['nip'] = $nip;
		//echo '<h1>'.$nip.'</h1>';
		//echo 'Nama   :   '.$data[$nip]['nama'].'<br>';
		//echo '<hr>';
		//echo 'Umur   :   '.$data[$nip]['umur'].' Tahun<br>';
		$this->load->view('profile',$output);
	}
	
}
