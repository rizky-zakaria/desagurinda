<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_penduduk extends CI_Controller {

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('m_penduduk');

        $this->load->helper('url');
        $this->load->library('pdf');
	}
	public function index()
	{
		$data['penduduk'] = $this->m_penduduk->tampil_data()->result();
		$this->load->view('v_lap_penduduk',$data);
	}

	public function pendidikan(){
		$this->load->view('v_lap_penduduk_pendidikan');
	}
	public function pekerjaan(){
		$this->load->view('v_lap_penduduk_pekerjaan');
	}
	public function agama(){
		$this->load->view('v_lap_penduduk_agama');
	}
	public function cetak(){
        $pdf = new FPDF('L','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(267,7,'DATA PENDUDUK DESA MOLINTOGUPOn',0,1,'C');
        $pdf->SetFont('Arial','B',7);
    	$pdf->setFillColor(124,185,232);
    	$pdf->Cell(6,6,'NO',1,0,'C',1);
        $pdf->Cell(28,6,'NAMA',1,0,'C',1);
        $pdf->SetFont('Arial','B',5);
        $pdf->Cell(17,6,'JENIS KELAMIN',1,0,'C',1);
        $pdf->SetFont('Arial','B',7);
        $pdf->Cell(25,6,'NOMOR KK',1,0,'C',1);
        $pdf->Cell(25,6,'NIK',1,0,'C',1);
        $pdf->SetFont('Arial','B',6);
        $pdf->Cell(20,6,'TEMPAT LAHIR',1,0,'C',1);
        $pdf->Cell(20,6,'TANGGAL LAHIR',1,0,'C',1);
        $pdf->SetFont('Arial','B',7);
        $pdf->Cell(10,6,'UMUR',1,0,'C',1);
        $pdf->Cell(22,6,'PENDIDIKAN',1,0,'C',1);
        $pdf->Cell(25,6,'PEKERJAAN',1,0,'C',1);
        $pdf->Cell(20,6,'STATUS',1,0,'C',1);
        $pdf->Cell(28,6,'AYAH',1,0,'C',1);
        $pdf->Cell(28,6,'IBU',1,0,'C',1);
        $pdf->SetFont('Arial','',7);
        $no = 1;
        $this->db->order_by('nomor_kk', 'asc');
        $penduduk = $this->db->get('penduduk')->result();
        foreach ($penduduk as $row){
        	$biday = new DateTime($row->tanggal_lahir);
                    $today = new DateTime();
                    $umury = $today->diff($biday);
                    $umur = $umury->y;
        	$pdf->Cell(10,6,'',0,1);
        	$pdf->Cell(6,6, $no++,1,0);
            $pdf->Cell(28,6,$row->nama,1,0);
            $pdf->Cell(17,6,$row->jenis_kelamin,1,0);
            $pdf->Cell(25,6,$row->nomor_kk,1,0);
            $pdf->Cell(25,6,$row->nik,1,0);
            $pdf->Cell(20,6,$row->tempat_lahir,1,0);
            $pdf->Cell(20,6,$row->tanggal_lahir,1,0);
            $pdf->Cell(10,6,$umur,1,0);
            $pdf->Cell(22,6,$row->pendidikan,1,0);
            $pdf->Cell(25,6,$row->pekerjaan,1,0);
            $pdf->Cell(20,6,$row->status_perkawinan,1,0);
            $pdf->Cell(28,6,$row->nama_ayah,1,0);
            $pdf->Cell(28,6,$row->nama_ibu,1,0);
            //footer
            $pdf->setX(120);
            $pdf->Cell(28,6,'AYAH',1,0,'C',1);
        }
        $pdf->Output('Data-Penduduk-Desa-Molintogupo.pdf', 'I');
	}	
}
