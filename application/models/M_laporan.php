<?php

class M_laporan extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
   
   public function rekap_personil()
  {	
		$this->db->select('a.nip,nama,nama_pangkat,a.kd_jabatan,a.kd_pangkat,nama_jabatan');
		$this->db->from('jabatan b ,pangkat c,personil a');
		$this->db->where('a.kd_jabatan=b.kd_jabatan and a.kd_jabatan NOT IN ("PR")');
		$this->db->where('a.kd_pangkat=c.kd_pangkat and a.kd_pangkat NOT IN ("PR")');
		
		return $this->db->get('');
   }
	public function count_jabatan($name){
		$this->db->select('a.nip,nama,nama_pangkat,a.kd_jabatan,a.kd_pangkat,nama_jabatan');
		$this->db->from('jabatan b ,pangkat c,personil a');		
		$this->db->where('a.kd_jabatan=b.kd_jabatan and a.kd_jabatan NOT IN ("PR")');
		$this->db->where('a.kd_pangkat=c.kd_pangkat and a.kd_pangkat NOT IN ("PR")');
		$this->db->where("a.kd_jabatan = '$name'");		
		
		return $this->db->get('');
	}
   public function rekap_angka_kredit()
  {	
		$this->db->select('tahun,a.nip,nama,nama_pangkat,a.kd_jabatan,a.kd_pangkat,nama_jabatan,format(periode1,0) ak1,format(periode2,0) ak2,format(total,0) jumlah');
		$this->db->from('jabatan b ,pangkat c,personil a, master_pranata d');
		$this->db->where('a.kd_jabatan=b.kd_jabatan and a.kd_jabatan NOT IN ("PR")');
		$this->db->where('a.kd_pangkat=c.kd_pangkat and a.kd_pangkat NOT IN ("PR")');
		$this->db->where('a.nip=d.nip and a.nip NOT IN ("PR")');
		$this->db->group_by('jumlah,ak2,ak1');
		$this->db->order_by('nama ASC');
		return $this->db->get('');
   }
   
   public function ahli()
   {
   	$this->db->select('a.nip,nama,tgl_lahir,a.kd_jabatan,nama_jabatan,tingkat');
   	$this->db->from('jabatan b ,personil a');
   	$this->db->where('a.kd_jabatan=b.kd_jabatan and a.kd_jabatan NOT IN ("PR")');
   	$this->db->where('tingkat="Ahli" ');
   	return $this->db->get('');
   }

   public function terampil()
   {
   	$this->db->select('a.nip,nama,tgl_lahir,a.kd_jabatan,nama_jabatan,tingkat');
   	$this->db->from('jabatan b ,personil a');
   	$this->db->where('a.kd_jabatan=b.kd_jabatan and a.kd_jabatan NOT IN ("PR")');
   	$this->db->where('tingkat="Terampil" ');
   	return $this->db->get('');
   }

  public function rekap_pranata(){
  	$this->db->select('tahun,tingkat,count(tingkat)jumlah');
  	$this->db->from('personil a, jabatan b, master_pranata c');
  	$this->db->where('a.kd_jabatan=b.kd_jabatan and a.nip=c.nip');
  	$this->db->group_by('tingkat');
  	return $this->db->get('');
  }
   
   public function rekap_tingkat(){
		$this->db->select('b.tingkat,count(tingkat) as jumlah');
		$this->db->from('personil a, jabatan b, pangkat c');
		$this->db->where('a.kd_jabatan=b.kd_jabatan');
		//$this->db->where('a.kd_pangkat=b.kd_pangkat and a.kd_pangkat NOT IN ("PR"');
		$this->db->group_by('tingkat');
		return $this->db->get('');	
	}


	
	public function dashboard_rekap_tingkat(){
		$a = $this->rekap_tingkat();
		$nmpk = array('Ahli'=>'Ahli','Terampil'=>'Terampil');
		$n=1;
		$data='[';
		
		foreach($a->result() as $val){
			if($n>1) {$data.=',';}
			$data .= '{ 
					name:\''.$nmpk[$val->tingkat].'\',
					y:'.$val->jumlah.'
					}';
			$n++;
		}
		$data .= ']';
		return $data;		
	  }

	 public function rekap_pensiun()
  {	
		$this->db->select('*');
		$this->db->from('personil');
		
		return $this->db->get('');
   }

	
}