<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	function index()
	{
		$this->load->view('v_login');
	}

	function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'nama_pengguna' => $username,
			'kata_sandi' => md5($password)
		);
		$cek = $this->m_login->cek_login('pengguna', $where)->row();
		if ($cek) {

			$data_session = array(
				'id' => $cek->id_admin,
				'nama' => $username,
				'peran' => $cek->peran,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);

			redirect(base_url('dashboard'));
		} else {
			echo "<script>window.alert('Username atau Password anda salah.');
					window.location='../login';</script>";
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
