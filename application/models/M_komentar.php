<?php 
 
class M_komentar extends CI_Model{
	function tampil_data(){
		return $this->db->get('komentar');
	}
	function input_data($data,$table){
       $this->db->insert($table,$data);
	}
	function hapus_data($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}