<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_import extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function import($arrData)
	{
		var_dump($arrData);
		die;
		foreach ($arrData as $each_data) {
			$data = array(
				'nik' => $each_data['1'],
				'nama' => $each_data['2'],
				'jenis_kelamin' => $each_data['3'],
				'tempat_lahir' => $each_data['4'],
				'tanggal_lahir' => $each_data['5'],
				'goldar' => $each_data['6'],
				'agama' => $each_data['7'],
				'hubungan' => $each_data['8'],
				'status' => $each_data['9'],
				'dusun' => $each_data['10'],
				'alamat' => $each_data['11'],
				'pendidikan' => $each_data['12'],
				'pekerjaan' => $each_data['13'],
				'kewarganegaraan' => $each_data['14'],
				'id_admin' => $this->session->userdata('id'),
				'update_at' => date('d-M-Y'),
			);
			$this->db->insert('penduduk', $data);
		}

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file ModelName.php */
