<?php 
 
class M_mutasipenduduk extends CI_Model{
	function tampil_data(){
		$this->db->select('*');
		$this->db->from('penduduk');
		$this->db->join('mutasi', 'penduduk.nik = mutasi.nik');
		$query = $this->db->get();
		return $query->result();
	}
	function ambil_data(){
	return $this->db->get('penduduk');
	}

	function input_data($data,$table){
       $this->db->insert($table,$data);
	}

	function update_data($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_data($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_data($where,$table){		
	return $this->db->get_where($table,$where);
	}
}