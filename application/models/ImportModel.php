<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ImportModel extends CI_Model
{

	public function insert($data)
	{
		$insert = $this->db->insert_batch('penduduk', $data);
		if ($insert) {
			return true;
		}
	}
	public function getData()
	{
		$this->db->select('*');
		return $this->db->get('penduduk')->result_array();
	}
}
