<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_laporan extends CI_Controller {

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
	  {parent::__construct();
	  $this->load->helper('url');
	  $this->load->model(array('user_model','m_laporan'));
	  }
	  
	
	public function rekap_personil($id=null)
	{
	  if($this->user_model->getSecure())
		  { $output['res'] =$this->m_laporan->rekap_personil(); 
			$this->load->view('elemen/header',$output);
			$this->load->view('elemen/nav');
			$this->load->view('v_laporan/rekap_personil');
		    $this->load->view('elemen/footer');
		  } else
		  { $this->login();
		  }	
	}

	public function rekap_angka_kredit($id=null)
	{
	  if($this->user_model->getSecure())
		  { $output['res'] =$this->m_laporan->rekap_angka_kredit(); 
			$this->load->view('elemen/header',$output);
			$this->load->view('elemen/nav');
			$this->load->view('v_laporan/rekap_angka_kredit');
		    $this->load->view('elemen/footer');
		  } else
		  { $this->login();
		  }	
	}
		
	 public function rekap_pranata($id=null)
	{
	  if($this->user_model->getSecure())
		  { $output['res'] =$this->m_laporan->rekap_pranata(); 
			$this->load->view('elemen/header',$output);
			$this->load->view('elemen/nav');
			$this->load->view('v_laporan/rekap_pranata');
		    $this->load->view('elemen/footer');
		  } else
		  { $this->login();
		  }	
	}
	public function ahli()
	{
	  if($this->user_model->getSecure())
		  {
			$output['res'] =$this->m_laporan->ahli(); 
			$this->load->view('elemen/header',$output);
			$this->load->view('elemen/nav');
		    $this->load->view('v_laporan/ahli');
		    $this->load->view('elemen/footer');
		  } else
		  { $this->login();
		  }	
	}


	public function terampil()
	{
	  if($this->user_model->getSecure())
		  {
			$output['res'] =$this->m_laporan->terampil(); 
			$this->load->view('elemen/header',$output);
			$this->load->view('elemen/nav');
		    $this->load->view('v_laporan/terampil');
		    $this->load->view('elemen/footer');
		  } else
		  { $this->login();
		  }	
	}



	public function login()
	  {
		$this->load->view('login');
	  }
}