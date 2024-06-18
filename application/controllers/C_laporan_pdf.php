<?php
Class C_laporan_pdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
      $this->load->model(array('user_model','m_laporan'));
    }
    
    function index(){
        $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'Daftar Nama Pejabat Pranata Komputer',0,1,'C');
        $pdf->SetFont('Arial','U',12);
        $pdf->Cell(190,7,'Pusdatin Kemhan',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0);
        $pdf->Cell(60,6,'Nama',1,0);
        $pdf->Cell(70,6,'GOL/NIP',1,0);
        $pdf->Cell(50,6,'Jabatan',1,1);
        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->m_laporan->rekap_personil();
        $p_utama = count($this->m_laporan->count_jabatan('KJA1')->result());
        $p_madya = count($this->m_laporan->count_jabatan('KJA2')->result());
        $p_muda = count($this->m_laporan->count_jabatan('KJA3')->result());
        $p_pertama= count($this->m_laporan->count_jabatan('KJA4')->result());
        $p_penyelia = count($this->m_laporan->count_jabatan('KJT1')->result());
        $p_pelaksanal = count($this->m_laporan->count_jabatan('KJT2')->result());
        $p_pelaksana = count($this->m_laporan->count_jabatan('KJT3')->result());
        $p_pelaksanap = count($this->m_laporan->count_jabatan('KJT4')->result());
        // echo "<pre>";print_r(count($jabatan->result()));
        $i = 1;
        foreach ($mahasiswa->result() as $row){
            $pdf->Cell(10,6,$i++,1,0);
            $pdf->Cell(60,6,$row->nama,1,0);
            $pdf->Cell(70,6,$row->nama_pangkat.' / '.$row->nip,1,0);
            $pdf->Cell(50,6,$row->nama_jabatan,1,1); 
        }
        // $jabatan = $this->m_laporan->count_jabatan();
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(70,8,'Jumlah : ' .$i .' Orang',1,1);
        
        $pdf->Cell(90,15,'Keterangan :',0,1,'L');
        $pdf->Cell(90,7,'1. Prakom Muda :'.$p_muda,0,1,'L');
        $pdf->Cell(90,7,'2. Prakom Pertama :'.$p_pertama,0,1,'L');
        $pdf->Cell(90,7,'2. Prakom Penyelia :'.$p_penyelia,0,1,'L');
        $pdf->Cell(90,7,'3. Prakom Laks Lanjutan :'.$p_pelaksanal,0,1,'L');
        $pdf->Cell(90,7,'4. Prakom Pelaksana :'.$p_pelaksana,0,1,'L');
        $pdf->Cell(90,8,'Jumlah : ' ,0,1,'L');

        $pdf->Output();
    }
}