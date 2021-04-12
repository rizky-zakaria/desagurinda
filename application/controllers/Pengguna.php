<?php
class Pengguna extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));
		}

		$this->load->helper('url');
	}

	public function index()
	{
		$data['pengguna'] = $this->db->get('pengguna')->result_array();
		// var_dump($data);
		// die;
		$this->load->view('v_pengguna', $data);
	}

	public function tambahPengguna()
	{
		$this->load->view('v_tambah_pengguna');
	}

	public function aksiTambah()
	{
		$post =  $this->input->post();
		$data = array(
			'id_admin' => $post['id'],
			'nama_lengkap' => $post['nama_lengkap'],
			'nama_pengguna' => $post['nama_pengguna'],
			'kata_sandi' => md5($post['sandi']),
			'peran' => $post['peran'],
		);
		// var_dump($data);/
		$this->db->insert('pengguna', $data);
		redirect(base_url('Pengguna'));
	}

	public function hapus($id)
	{
		$this->db->where('id_admin', $id);
		$this->db->delete('pengguna');
		redirect(base_url("Pengguna"));
	}
}
