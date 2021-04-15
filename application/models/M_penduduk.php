<?php

class M_penduduk extends CI_Model
{

	function cek_kk($no_kk)
	{
		return $query = $this->db->query("SELECT * FROM keluarga WHERE no_kk = '$no_kk' ");
	}

	function tampil_data()
	{
		return $query = $this->db->query("SELECT * FROM penduduk INNER JOIN keluarga INNER JOIN pengguna ON penduduk.nik = keluarga.nik AND penduduk.id_admin = pengguna.id_admin WHERE status != '3' ORDER BY nik_kk DESC ");
		// return $query = $this->db->query("SELECT * FROM penduduk INNER JOIN pengguna ON penduduk.id_admin = pengguna.id_admin WHERE status != '3'");
	}
	function tampil_penduduk_id($id)
	{
		return $query = $this->db->query("SELECT * FROM penduduk INNER JOIN keluarga ON penduduk.nik = keluarga.nik WHERE penduduk.nik = '$id' ");
	}
	function tampil_nik_pdatang($id)
	{
		return $query = $this->db - query("SELECT nik FROM penduduk_datang WHERE kode_datang = '$id' ");
	}
	function tampil_penduduk_datang($id)
	{
		return $query = $this->db->query("SELECT * FROM penduduk INNER JOIN penduduk_datang ON penduduk.nik = penduduk_datang.nik  WHERE kode_datang = '$id' AND status != '3' ");
	}
	function tampil_kepala_keluarga()
	{
		return $query = $this->db->query("SELECT * FROM penduduk INNER JOIN keluarga ON penduduk.nik = keluarga.nik_kk GROUP BY nik_kk");
	}
	function tampil_kepala_keluarga_id($id)
	{
		return $query = $this->db->query("SELECT nama FROM penduduk INNER JOIN keluarga ON penduduk.nik = keluarga.nik_kk WHERE hubungan = 'kepala_keluarga' AND no_kk = '$id' ");
	}
	function tampil_anggota_keluarga()
	{
		return $query = $this->db->query("SELECT * FROM penduduk INNER JOIN keluarga INNER JOIN pengguna ON penduduk.id_admin = pengguna.id_admin AND penduduk.nik = keluarga.nik WHERE penduduk.nik != keluarga.nik_kk ");
	}
	function tampil_data_kelahiran()
	{
		return $query = $this->db->query("SELECT * FROM kelahiran INNER JOIN pengguna ON kelahiran.id_pengguna = pengguna.id_admin");
	}
	function tampil_kelahiran_id($id)
	{

		return $query = $this->db->query("SELECT * FROM kelahiran WHERE kode_kelahiran = '$id' ");
	}
	function tampil_data_kematian()
	{
		return $query = $this->db->query("SELECT * FROM kematian JOIN pengguna ON kematian.id_admin = pengguna.id_admin");
	}
	function tampil_kematian_id($id)
	{

		return $query = $this->db->query("SELECT * FROM kematian WHERE kode_kematian = '$id' ");
	}
	function tampil_data_pindah()
	{

		return $query = $this->db->query("SELECT * FROM pindah JOIN pengguna ON pindah.id_admin = pengguna.id_admin");
	}
	function tampil_pindah_id($id)
	{

		return $query = $this->db->query("SELECT * FROM pindah WHERE kode_pindah = '$id' ");
	}
	function tampil_penduduk_pindah($id)
	{
		return $query = $this->db->query("SELECT * FROM penduduk INNER JOIN penduduk_pindah ON penduduk.nik = penduduk_pindah.nik  WHERE kode_pindah = '$id'");
	}
	function tampil_data_datang()
	{
		return $query = $this->db->query("SELECT * FROM datang JOIN pengguna ON datang.id_admin = pengguna.id_admin");
	}
	function tampil_datang_id($id)
	{

		return $query = $this->db->query("SELECT * FROM datang WHERE kode_datang = '$id' ");
	}

	function tampil_nik_kk($no_kk)
	{
		$query = $this->db->query("SELECT nik_kk from keluarga WHERE no_kk = $no_kk ");
		$hasil = $query->row();
		return $hasil->nik_kk;
	}

	function tampil_nama_kk($nik_kk)
	{
		$query = $this->db->query("SELECT nama from penduduk WHERE nik = '$nik_kk' ");
		$hasil = $query->row();
		if (empty($hasil)) return 'Tidak Diketahui';
		else return $hasil->nama;
	}

	function jumlah_keluarga()
	{
		$query = $this->db->query("SELECT MAX(kode_keluarga) as kode_keluarga from keluarga");
		$hasil = $query->row();
		return $hasil->kode_keluarga;
	}

	function jumlah_kelahiran()
	{
		$query = $this->db->query("SELECT MAX(kode_kelahiran) as kode_kelahiran from kelahiran");
		$hasil = $query->row();
		return $hasil->kode_kelahiran;
	}

	function jumlah_kematian()
	{
		$query = $this->db->query("SELECT MAX(kode_kematian) as kode_kematian from kematian");
		$hasil = $query->row();
		return $hasil->kode_kematian;
	}

	function jumlah_pindah()
	{
		$query = $this->db->query("SELECT MAX(kode_pindah) as kode_pindah from pindah");
		$hasil = $query->row();
		return $hasil->kode_pindah;
	}

	function jumlah_datang()
	{
		$query = $this->db->query("SELECT MAX(kode_datang) as kode_datang from datang");
		$hasil = $query->row();
		return $hasil->kode_datang;
	}

	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
}
