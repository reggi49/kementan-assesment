<?php
class Base_model extends CI_Model {
	public function __construct() {
		parent::__construct();		
	}
	public function setMessage($param,$message){
		$mg = '';
		if($param){
			$mg .= '<div class="alert alert-success">';
			$mg .= $message;
			$mg .= '</div>';
		}else{
			$mg .= '<div class="alert alert-danger">';
			$mg .= $message;
		$mg .= '</div>';
		}
		return $_SESSION['pesan'] = $mg;
	}
	public function getMessage(){
		if(isset($_SESSION['pesan'])){
			echo $_SESSION['pesan'];
			$_SESSION['pesan']='';
		}
	}	
  
		public function rnamef($s) {
			$acak  = date("Ymd");
			$acak2  = rand(00,99);
			$c = array (' ');
			$d = array ('-','/','\\',',','#',':',';','\'','"','[',']','{','}',')','(','|','~','!','@','%','$','^','&','*','=','?','+');
		
			$s = str_replace('\'', '`', $s);
			$s = str_replace($d, '', $s);  // Hilangkan karakter yang telah disebutkan di array $d
			
			$s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
			return $acak.'_'.$acak2.$s;
		}
	public function selunit(){
		$this->db->select('*');
		$this->db->from('personil');
		$this->db->where('personil_id!=',0);
		$this->db->order_by('personil_id','ASC');
		$res = $this->db->get();
		$sel[0] = '-unit-';
		foreach($res->result() as $r){
			$sel[$r->nip] = ''.$r->nama.'';
			/*$this->db->select('*');
			$this->db->from('unit');
			$this->db->where('unit_parent',$r->unit_id);
			$res = $this->db->get();
			foreach($res->result() as $r){
				$sel[$r->unit_id] = ' - '.$r->unit_name;
			}*/
		}
		return $sel;
	}
	public function selrole(){
		$this->db->select('*');
		$this->db->from('tusergroup');
		$res = $this->db->get();
		$sel[0] = '---';
		foreach($res->result() as $r){
			$sel[$r->autono] = $r->group_name;
		}
		return $sel;
	}
	public function primaryMenu(){
			$CI =& get_instance();
         	$CI->load->model('system_model');
			$role = $this->session->role;
			$sup = $CI->system_model->list_usermenu($role,'','1');
			if($sup->num_rows()>0){
				foreach($sup->result() as $ba){
					$args[] = $ba->menu_id;	
				}
			}elseif($role==1 || $role==2){
				$args=0;	
			}else{
				$args[] = 0;	
			}
					$mnu = $CI->system_model->list_menus('','y','Y',$args);
					foreach($mnu->result() as $m){
						$mnuchild = $CI->system_model->list_menus('',$m->menu_id,'Y',$args);
						$cls='';
						$child = '';
						$arrow = '';
						$lnk = base_url($m->menu_link);	
						if($mnuchild->num_rows() > 0){
							$cls = 'class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
							$arrow = '<span class="arrow"></span>';
							$child = '<ul class="sub-menu children dropdown-menu">';
							$lnk = 'javascript:;';
							foreach($mnuchild->result() as $mchild){
								$child .=  '<li><a href="'.base_url($mchild->menu_link).'">'.$mchild->menu_name.'</a></li>';
							}
							$child .= '</ul>';
						}
						echo'
						<li  class="menu-item-has-children dropdown">
						  <a href="'.$lnk.'" '.$cls.'><i class="'.$m->menu_icon.'"></i> <span>'.$m->menu_name.'</span>
							'.$arrow.'
						  </a>';
						echo $child;
						echo '
						</li>';
					}
		}

		public function seltgl($val=null,$start=1){
		$res ='<select name="tanggal" class="form-control col-md-3">
		                   <option value="">All</option>';
		for($i=1;$i<=31;$i++){
			if($i==$val){
				$res .= '<option selected>' .$i.'</option>';
			}else{
				$res .= '<option>' .$i.'</option>';
			}
		
		}
		$res .= '</select>';
		return $res;
	}

	public function selbulan($val=null){
		$bln = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		$res ='<select name="bulan" class="form-control col-md-3">';
		                   
		foreach($bln as $i=>$v){
			if($i==$val){
				$res .= '<option value="' .$i.'" selected>' .$v.' </option>';
				//$res .= '<option selected>' .$i.'</option>';
			}else{
				$res .= '<option value="' .$i.'">' .$v.'</option>';
			}
		
		}
		$res .= '</select>';
		return $res;
		
	}


	public function selTingkat($val=null){
		$tk = array('1'=>'Ahli','2'=>'Terampil');
		$res = '<select name="kd_tingkat" class="form-control">';
		foreach($tk as $i=>$v){
			if($val==$i){
				$res .= '<option value="'.$i.'" selected>'.$v.'</option>';
			}else{
				$res .= '<option value="'.$i.'">'.$v.'</option>';
			}
		}	
		$res .='</select>';
		return $res;
	}


	public function seltahun($val=null,$start=2016){
		$res ='<select name="tahun" class="form-control col-md-3">
		                   <option value="">All</option>';
		for($i=date('Y');$i>=$start;$i--){
			if($i==$val){
				$res .= '<option selected>' .$i.'</option>';
			}else{
				$res .= '<option>' .$i.'</option>';
			}
		
		}
		$res .= '</select>';
		return $res;
		
	}
	
	public function unitparent($sl){
			$this->db->select('*');
			$this->db->from('unit');
			$this->db->where('unit_parent',0);
			$res = $this->db->get();
			$sel = '<option value="0" selected>No Parent</option>';
			foreach($res->result() as $r){
				if($sl==$r->unit_id){
					$sel .= '<option value="'.$r->unit_id.'" selected>'.$r->unit_name.'</option>';
				}else{
					$sel .= '<option value="'.$r->unit_id.'">'.$r->unit_name.'</option>';
				}
			}
			return $sel;
		}

	public function gettingkat($val) {
		$tk = array('1'=>'Ahli','2'=>'Terampil');
		return $tk[$val];	
	}



		public function getnmtingkat($data){
			 $res = $this->db->get_where('jabatan',array('tingkat'=>$data));
			 $stk = '';
			 if($res->num_rows()>0){
				 foreach($res->result() as $v){
					$stk = $v->tingkat;
				 }
			 }else{
			 	$stk = 'none';
			 } 
			 return $stk;
		 }
	

	public function getnmpersonil($data){
			 $res = $this->db->get_where('personil',array('nip'=>$data));
			 $snm = '';
			 if($res->num_rows()>0){
				 foreach($res->result() as $v){
					$snm = $v->nip;
				 }
			 }else{
			 	$snm = 'none';
			 } 
			 return $snm;
		 }

		
		public function menuparent($sl){
			$this->db->select('*');
			$this->db->from('menus');
			$this->db->where('menu_parent_id',0);
			$res = $this->db->get();
			$sel = '<option value="0">No Parent</option>';
			foreach($res->result() as $r){
				if($sl==$r->menu_id){
					$sel .= '<option value="'.$r->menu_id.'" selected>'.$r->menu_name.'</option>';
				}else{
					$sel .= '<option value="'.$r->menu_id.'">'.$r->menu_name.'</option>';
				}
			}
			return $sel;
		}
	
	
		public function selPersonil($val=null,$attr=null){
			$this->db->select('nip,nama');
			$this->db->from('personil');
			$a=$this->db->get();
				$res = '<select name="personil" class="form-control" '.$attr.'><option value="0">---</option>';
				foreach($a->result() as $v){
				   if($v->kd_klinik==$val){
				   $res .= '<option value="'.$v->nip.'" selected>'.$v->nama.'</option>';
			       }else{
				$res .= '<option value="'.$v->nip.'">'.$v->nama.'</option>';
				}
				}
			$res .= '</select>';
			return $res;	
		}


		public function getjabatan($data){
			 $res = $this->db->get_where('jabatan',array('kd_jabatan'=>$data));
			 $stk = '';
			 if($res->num_rows()>0){
				 foreach($res->result() as $v){
					$stk = $v->nama_jabatan;
				 }
			 }else{
			 	$stk = 'none';
			 } 
			 return $stk;
		 }


		 public function getPersonil($data){
			 $res = $this->db->get_where('personil',array('nip'=>$data));
			 $stk = '';
			 if($res->num_rows()>0){
				 foreach($res->result() as $v){
					$stk = $v->nama;
				 }
			 }else{
			 	$stk = '';
			 } 
			 return $stk;
		 }
		
		function gettglindo($val=null){
			list($thn,$bln,$tgl) = explode('-',$val);
			return $tgl.'/'.$bln.'/'.$thn;	
		}

		
}