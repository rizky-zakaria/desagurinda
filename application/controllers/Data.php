<?php

class Data extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		
	}

	public function index()
	{
        $this->load->view("v_data");
	}

	public function kependudukan()
	{
        $this->load->view("v_kependudukan");
	}

	public function pendidikan()
	{
        $this->load->view("v_pendidikan");
	}

	public function pekerjaan()
	{
        $this->load->view("v_pekerjaan");
	}
	public function agama()
	{
        $this->load->view("v_agama");
	}
}