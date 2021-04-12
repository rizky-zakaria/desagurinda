<?php

class Tentang extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		
	}

	public function index()
	{
        $this->load->view("v_tentang");
	}

	public function visimisi()
	{
        $this->load->view("v_visimisi");
	}

	public function sejarah()
	{
        $this->load->view("v_sejarah");
	}

	public function galeri()
	{
        $this->load->view("v_galeri");
	}

	public function pelayanan(){
	$this->load->view("v_pelayanan");
	}

	public function kritiksaran(){
	$this->load->view("v_krisar");
	}

	public function struktur(){
	$this->load->view("v_struktur");
	}
	
	public function tambah_aksi(){
		$id_komentar = $this->input->post('id_komentar');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$komentar = $this->input->post('komentar');
 
		$data = array(
			'id_komentar' => $id_komentar,
			'nama' => $nama,
			'email' => $email,
			'komentar' => $komentar
			);
		$this->m_komentar->input_data($data,'komentar');
		redirect('pelayanan/kritiksaran');		
	}
}