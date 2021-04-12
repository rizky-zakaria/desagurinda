<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peristiwa extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));
		}
		$this->load->model('m_penduduk');

		$this->load->helper('url');
		$this->load->library('pdf');
	}
	public function index()
	{

		$this->load->view('v_kelahiran');
	}
	public function laporan()
	{
		$this->load->view('v_laporan_peristiwa');
	}
	public function datang()
	{
		$data['datang'] = $this->m_penduduk->tampil_data_datang()->result();
		// var_dump($data);
		// die;
		$this->load->view('v_datang', $data);
	}
	public function detail_datang($id)
	{
		$data['datang'] = $this->m_penduduk->tampil_datang_id($id)->row();
		$data['penduduk'] = $this->m_penduduk->tampil_penduduk_datang($id)->result();
		$this->load->view('v_detail_datang', $data);
	}
	public function tambah_datang()
	{

		$data_jumlah = $this->m_penduduk->jumlah_datang();
		$nourut = substr($data_jumlah, 3, 4);
		$kode_datang = $nourut + 1;
		$data = array('kode_datang' => $kode_datang);
		$this->load->view('v_tambah_datang', $data);
	}
	public function tambah_datang_aksi()
	{
		$kode_datang = $this->input->post('kode_datang');
		$no_kk = $this->input->post('no_kk');
		$stat_pindah = $this->input->post('stat_pindah');
		$tanggal_datang = $this->input->post('tanggal_datang');
		$alamat = $this->input->post('alamat');
		$jumlah_datang = $this->input->post('jumlah_datang');
		$data_jumlah = $this->m_penduduk->jumlah_keluarga();
		$nourut = substr($data_jumlah, 3, 4);
		$kode_keluarga = $nourut + 1;

		$data_lanjut = array(
			'kode_datang' => $kode_datang,
			'jumlah_datang' => $jumlah_datang,
			'stat_pindah' => $stat_pindah,
			'no_kk' => $no_kk,
			'kode_keluarga' => $kode_keluarga
		);

		$data_simpan = array(
			'kode_datang' => $kode_datang,
			'no_kk' => $no_kk,
			'stat_pindah' => $stat_pindah,
			'tanggal_datang' => $tanggal_datang,
			'alamat' => $alamat,
			'id_admin' => $this->session->userdata('id'),
			'update_at' => date('d-M-Y')
		);

		$cek_kk = $this->m_penduduk->cek_kk($no_kk)->row();
		if ($stat_pindah == 'Menumpang KK' && $cek_kk->no_kk == '') {
			echo "<script>alert('Nomor KK tidak terdaftar!');history.go(-1);</script>";
		} else {
			$this->m_penduduk->input_data($data_simpan, 'datang');
			$this->load->view('v_tambah_pdatang', $data_lanjut);
		}
	}
	public function tambah_pdatang_aksi()
	{
		$kode_datang = $this->input->post('kode_datang');
		$jumlah_datang = $this->input->post('jumlah_datang');
		$stat_pindah = $this->input->post('stat_pindah');
		$no_kk = $this->input->post('no_kk');
		$kode_keluarga = $this->input->post('kode_keluarga');
		for ($i = 1; $i <= $jumlah_datang; $i++) {
			${'nik' . $i} = $this->input->post('nik' . $i);
			${'nama' . $i} = $this->input->post('nama' . $i);
			${'jenis_kelamin' . $i} = $this->input->post('jenis_kelamin' . $i);
			${'hubungan' . $i} = $this->input->post('hubungan' . $i);
			${'tempat_lahir' . $i} = $this->input->post('tempat_lahir' . $i);
			${'tanggal_lahir' . $i} = $this->input->post('tanggal_lahir' . $i);
			${'goldar' . $i} = $this->input->post('goldar' . $i);
			${'alamat' . $i} = $this->input->post('alamat' . $i);
			${'dusun' . $i} = $this->input->post('dusun' . $i);
			${'agama' . $i} = $this->input->post('agama' . $i);
			${'pendidikan' . $i} = $this->input->post('pendidikan' . $i);
			${'pekerjaan' . $i} = $this->input->post('pekerjaan' . $i);
			${'status' . $i} = $this->input->post('status' . $i);
		}

		for ($i = 1; $i <= $jumlah_datang; $i++) {
			$nik = ${'nik' . $i};
			$nama = ${'nama' . $i};
			$hubungan = ${'hubungan' . $i};
			$tempat_lahir = ${'tempat_lahir' . $i};
			$tanggal_lahir = ${'tanggal_lahir' . $i};
			$jenis_kelamin = ${'jenis_kelamin' . $i};
			$goldar = ${'goldar' . $i};
			$alamat = ${'alamat' . $i};
			$dusun = ${'dusun' . $i};
			$agama = ${'agama' . $i};
			$pendidikan = ${'pendidikan' . $i};
			$pekerjaan = ${'pekerjaan' . $i};
			$status = ${'status' . $i};
			$kode = 'KEL' . sprintf("%04s", $kode_keluarga + $i);

			$data_pdatang = array(
				'kode_datang' => $kode_datang,
				'nik' => $nik,
				'nama' => $nama,
			);
			$data_penduduk = array(
				'nik' => $nik,
				'nama' => $nama,
				'hubungan' => $hubungan,
				'tempat_lahir' => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'jenis_kelamin' => $jenis_kelamin,
				'goldar' => $goldar,
				'alamat' => $alamat,
				'dusun' => $dusun,
				'agama' => $agama,
				'pendidikan' => $pendidikan,
				'pekerjaan' => $pekerjaan,
				'status' => $status,
				'kewarganegaraan' => 'Warga Negara Indonesia',
				'nik_ayah' => '',
				'nik_ibu' => '',
				'id_admin' => $this->session->userdata('id'),
				'update_at' => date('d-M-Y')
			);

			if ($hubungan == 'kepala_keluarga') {
				$nik_kk = $nik;
				$data_kk = array('nik_kk' => $nik_kk);
				$where  = array('no_kk' => $no_kk);
				$this->m_penduduk->update_data($where, $data_kk, 'keluarga');
			} else $nik_kk = '0';

			if ($this->m_penduduk->tampil_nik_kk($no_kk) != null) {
				$nik_kk = $this->m_penduduk->tampil_nik_kk($no_kk);
				$data_kk = array('nik_kk' => $nik_kk);
				$where  = array('no_kk' => $no_kk);
				$this->m_penduduk->update_data($where, $data_kk, 'keluarga');
			}
			$data_keluarga = array(
				'kode_keluarga' => $kode,
				'no_kk' => $no_kk,
				'nik_kk' => $nik_kk,
				'nik' => $nik
			);
			$this->m_penduduk->input_data($data_keluarga, 'keluarga');
			$this->m_penduduk->input_data($data_penduduk, 'penduduk');
			$this->m_penduduk->input_data($data_pdatang, 'penduduk_datang');
		}

		redirect('peristiwa/datang');
	}
	public function hapus_datang($kode)
	{
		$where = array('kode_datang' => $kode);
		$this->m_penduduk->hapus_data($where, 'datang');
		$this->m_penduduk->hapus_data($where, 'penduduk_datang');
		redirect('peristiwa/datang');
	}
	public function edit_datang($kode)
	{
		$where = array('kode_datang' => $kode);
		$data['datang'] = $this->m_penduduk->edit_data($where, 'datang')->result();
		$this->load->view('v_edit_datang', $data);
	}
	public function update_datang()
	{

		$kode_datang = $this->input->post('kode_datang');
		$no_kk = $this->input->post('no_kk');
		$nama_kk = $this->input->post('nama_kk');
		$nik_kk = $this->input->post('nik_kk');
		$stat_pindah = $this->input->post('stat_pindah');
		$tanggal_datang = $this->input->post('tanggal_datang');
		$alamat = $this->input->post('alamat');
		$jumlah_datang = $this->input->post('jumlah_datang');

		$data = array(
			'no_kk' => $no_kk,
			'nama_kk' => $nama_kk,
			'nik_kk' => $nik_kk,
			'stat_pindah' => $stat_pindah,
			'tanggal_datang' => $tanggal_datang,
			'alamat' => $alamat,
			'id_admin' => $this->session->userdata('id'),
			'update_at' => date('d-M-Y')
		);
		$where = array(
			'kode_datang' => $kode_datang
		);
		$this->m_penduduk->update_data($where, $data, 'datang');
		redirect('peristiwa/datang');
	}
	public function pindah()
	{
		$data['pindah'] = $this->m_penduduk->tampil_data_pindah()->result();
		$this->load->view('v_pindah', $data);
	}
	public function tambah_pindah()
	{

		$data_jumlah = $this->m_penduduk->jumlah_pindah();
		$nourut = substr($data_jumlah, 3, 4);
		$kode_pindah = $nourut + 1;
		$data = array('kode_pindah' => $kode_pindah);
		$this->load->view('v_tambah_pindah', $data);
	}
	public function tambah_pindah_aksi()
	{
		$kode_pindah = $this->input->post('kode_pindah');
		$no_kk = $this->input->post('no_kk');
		$alamat = $this->input->post('alamat');
		$alasan = $this->input->post('alasan');
		$alamat_tujuan = $this->input->post('alamat_tujuan');
		$klasifikasi = $this->input->post('klasifikasi');
		$jenis_pindah = $this->input->post('jenis_pindah');
		$stat_tidak_pindah = $this->input->post('stat_tidak_pindah');
		$stat_pindah = $this->input->post('stat_pindah');
		$tanggal_pindah = $this->input->post('tanggal_pindah');
		$jumlah_pindah = $this->input->post('jumlah_pindah');

		$data_lanjut = array(
			'kode_pindah' => $kode_pindah,
			'jumlah_pindah' => $jumlah_pindah
		);

		$data_simpan = array(
			'kode_pindah' => $kode_pindah,
			'no_kk' => $no_kk,
			'alamat' => $alamat,
			'alasan' => $alasan,
			'alamat_tujuan' => $alamat_tujuan,
			'klasifikasi' => $klasifikasi,
			'jenis_pindah' => $jenis_pindah,
			'stat_tidak_pindah' => $stat_tidak_pindah,
			'stat_pindah' => $stat_pindah,
			'tanggal_pindah' => $tanggal_pindah,
			'id_admin' => $this->session->userdata('id'),
			'update_at' => date('d-M-Y')
		);
		$this->m_penduduk->input_data($data_simpan, 'pindah');
		$this->load->view('v_tambah_ppindah', $data_lanjut);
	}
	public function tambah_ppindah_aksi()
	{
		$kode_pindah = $this->input->post('kode_pindah');
		$jumlah_pindah = $this->input->post('jumlah_pindah');
		for ($i = 1; $i <= $jumlah_pindah; $i++) {
			${'nik' . $i} = $this->input->post('nik' . $i);
		}
		for ($i = 1; $i <= $jumlah_pindah; $i++) {
			$nik = ${'nik' . $i};
			$nama = ${'nama' . $i};
			$data = array(
				'kode_pindah' => $kode_pindah,
				'nik' => $nik
			);

			$where = array(
				'nik' => $nik
			);
			$data_update = array(
				'status' => '3'
			);
			$this->m_penduduk->update_data($where, $data_update, 'penduduk');


			$this->m_penduduk->input_data($data, 'penduduk_pindah');
		}

		redirect('peristiwa/pindah');
	}
	public function hapus_pindah($kode)
	{
		$where = array('kode_pindah' => $kode);
		$this->m_penduduk->hapus_data($where, 'pindah');
		$this->m_penduduk->hapus_data($where, 'penduduk_pindah');
		redirect('peristiwa/pindah');
	}
	public function edit_pindah($kode)
	{
		$where = array('kode_pindah' => $kode);
		$data['pindah'] = $this->m_penduduk->edit_data($where, 'pindah')->result();
		$this->load->view('v_edit_pindah', $data);
	}
	public function update_pindah()
	{

		$kode_pindah = $this->input->post('kode_pindah');
		$no_kk = $this->input->post('no_kk');
		$alamat = $this->input->post('alamat');
		$alasan = $this->input->post('alasan');
		$alamat_tujuan = $this->input->post('alamat_tujuan');
		$klasifikasi = $this->input->post('klasifikasi');
		$jenis_pindah = $this->input->post('jenis_pindah');
		$stat_tidak_pindah = $this->input->post('stat_tidak_pindah');
		$stat_pindah = $this->input->post('stat_pindah');
		$tanggal_pindah = $this->input->post('tanggal_pindah');
		$data = array(
			'no_kk' => $no_kk,
			'alamat' => $alamat,
			'alasan' => $alasan,
			'alamat_tujuan' => $alamat_tujuan,
			'klasifikasi' => $klasifikasi,
			'jenis_pindah' => $jenis_pindah,
			'stat_tidak_pindah' => $stat_tidak_pindah,
			'stat_pindah' => $stat_pindah,
			'tanggal_pindah' => $tanggal_pindah,
			'id_admin' => $this->session->userdata('id'),
			'update_at' => date('d-M-Y')
		);
		$where = array(
			'kode_pindah' => $kode_pindah
		);
		$this->m_penduduk->update_data($where, $data, 'pindah');
		redirect('peristiwa/pindah');
	}


	public function kematian()
	{
		$data['kematian'] = $this->m_penduduk->tampil_data_kematian()->result();
		$this->load->view('v_kematian', $data);
	}

	public function getByNik()
	{
		$this->load->view('v_search_nik');
	}

	public function tambah_kematian()
	{
		$nik = $this->input->post('nik');
		$data['get'] = $this->db->get_where('penduduk', array('nik' => $nik))->row_array();
		$data['kk'] = $this->db->get_where('keluarga', array('nik' => $nik))->row_array();
		// var_dump($get);
		if ($data['get'] == null) {
			redirect(base_url("Peristiwa/getByNik"));
		} else {
			$data_jumlah = $this->m_penduduk->jumlah_kematian();
			$nourut = substr($data_jumlah, 3, 4);
			$kode_kematian = $nourut + 1;
			$data['data'] = array('kode_kematian' => $kode_kematian);
			$this->load->view('v_tambah_kematian', $data);
		}
		// die;
	}
	public function tambah_kematian_aksi()
	{
		// $kode_kematian = $this->input->post('kode_kematian');
		$nik = $this->input->post('nik');
		$no_kk = $this->input->post('no_kk');
		// var_dump($nik);
		// die;
		$anak_ke = $this->input->post('anak_ke');
		$tanggal_kematian = $this->input->post('tanggal_kematian');
		$jam_kematian = $this->input->post('jam_kematian');
		$sebab = $this->input->post('sebab');
		$tempat_kematian = $this->input->post('tempat_kematian');
		$menerangkan = $this->input->post('menerangkan');
		$nik_ibu = $this->input->post('nik_ibu');
		$nik_ayah = $this->input->post('nik_ayah');
		$nik_pelapor = $this->input->post('nik_pelapor');
		$nik_saksi1 = $this->input->post('nik_saksi1');
		$nik_saksi2 = $this->input->post('nik_saksi2');

		$data_kematian = array(
			'nik' => $nik,
			'no_kk' => $no_kk,
			'anak_ke' => $anak_ke,
			'tanggal_kematian' => $tanggal_kematian,
			'jam_kematian' => $jam_kematian,
			'sebab' => $sebab,
			'tempat_kematian' => $tempat_kematian,
			'menerangkan' => $menerangkan,
			'nik_ibu' => $nik_ibu,
			'nik_ayah' => $nik_ayah,
			'nik_pelapor' => $nik_pelapor,
			'nik_saksi1' => $nik_saksi1,
			'nik_saksi2' => $nik_saksi2,
			'id_admin' => $this->session->userdata('id'),
			'update_at' => date('d-M-Y')
		);
		$where = array(
			'nik' => $nik
		);
		$data_update = array(
			'status' => '3'
		);
		$this->m_penduduk->input_data($data_kematian, 'kematian');
		$this->m_penduduk->update_data($where, $data_update, 'penduduk');
		redirect('peristiwa/kematian');
	}
	public function hapus_kematian($kode)
	{
		$where = array('kode_kematian' => $kode);
		$this->m_penduduk->hapus_data($where, 'kematian');
		redirect('peristiwa/kematian');
	}
	public function edit_kematian($kode)
	{
		$where = array('kode_kematian' => $kode);
		$data['kematian'] = $this->m_penduduk->edit_data($where, 'kematian')->result();
		$this->load->view('v_edit_kematian', $data);
	}
	public function update_kematian()
	{

		$kode_kematian = $this->input->post('kode_kematian');
		$nik = $this->input->post('nik');
		$anak_ke = $this->input->post('anak_ke');
		$tanggal_kematian = $this->input->post('tanggal_kematian');
		$jam_kematian = $this->input->post('jam_kematian');
		$sebab = $this->input->post('sebab');
		$tempat_kematian = $this->input->post('tempat_kematian');
		$menerangkan = $this->input->post('menerangkan');
		$nik_ibu = $this->input->post('nik_ibu');
		$nik_ayah = $this->input->post('nik_ayah');
		$nik_pelapor = $this->input->post('nik_pelapor');
		$nik_saksi1 = $this->input->post('nik_saksi1');
		$nik_saksi2 = $this->input->post('nik_saksi2');

		$data = array(
			'nik' => $nik,
			'anak_ke' => $anak_ke,
			'tanggal_kematian' => $tanggal_kematian,
			'jam_kematian' => $jam_kematian,
			'sebab' => $sebab,
			'tempat_kematian' => $tempat_kematian,
			'menerangkan' => $menerangkan,
			'nik_ibu' => $nik_ibu,
			'nik_ayah' => $nik_ayah,
			'nik_pelapor' => $nik_pelapor,
			'nik_saksi1' => $nik_saksi1,
			'nik_saksi2' => $nik_saksi2,
			'id_admin' => $this->session->userdata('id'),
			'update_at' => date('d-M-Y')
		);
		$where = array(
			'kode_kematian' => $kode_kematian
		);
		$this->m_penduduk->update_data($where, $data, 'kematian');
		redirect('peristiwa/kematian');
	}

	public function kelahiran()
	{
		$data['kelahiran'] = $this->m_penduduk->tampil_data_kelahiran()->result();
		// var_dump($data);
		// die;
		$this->load->view('v_kelahiran', $data);
	}

	public function tambah_kelahiran()
	{

		$data_jumlah = $this->m_penduduk->jumlah_kelahiran();
		$nourut = substr($data_jumlah, 3, 4);
		$kode_kelahiran = $nourut + 1;
		$data = array('kode_kelahiran' => $kode_kelahiran);
		$this->load->view('v_tambah_kelahiran', $data);
	}

	public function tambah_kelahiran_aksi()
	{
		$kode_kelahiran = $this->input->post('kode_kelahiran');
		$no_kk = $this->input->post('no_kk');
		$nama = $this->input->post('nama');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_dilahirkan = $this->input->post('tempat_dilahirkan');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$hari_lahir = $this->input->post('hari_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jam_lahir = $this->input->post('jam_lahir');
		$kelahiran_ke = $this->input->post('kelahiran_ke');
		$jenis_kelahiran = $this->input->post('jenis_kelahiran');
		$penolong = $this->input->post('penolong');
		$berat = $this->input->post('berat');
		$panjang = $this->input->post('panjang');
		$tanggal_perkawinan = $this->input->post('tanggal_perkawinan');
		$nik_ibu = $this->input->post('nik_ibu');
		$nik_ayah = $this->input->post('nik_ayah');
		$nik_pelapor = $this->input->post('nik_pelapor');
		$nik_saksi1 = $this->input->post('nik_saksi1');
		$nik_saksi2 = $this->input->post('nik_saksi2');

		$data = array(
			'kode_kelahiran' => $kode_kelahiran,
			'no_kk' => $no_kk,
			'nama' => $nama,
			'jenis_kelamin' => $jenis_kelamin,
			'tempat_dilahirkan' => $tempat_dilahirkan,
			'tempat_lahir' => $tempat_lahir,
			'hari_lahir' => $hari_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jam_lahir' => $jam_lahir,
			'kelahiran_ke' => $kelahiran_ke,
			'jenis_kelahiran' => $jenis_kelahiran,
			'penolong' => $penolong,
			'berat' => $berat,
			'panjang' => $panjang,
			'nik_ibu' => $nik_ibu,
			'nik_ayah' => $nik_ayah,
			'nik_pelapor' => $nik_pelapor,
			'nik_saksi1' => $nik_saksi1,
			'nik_saksi2' => $nik_saksi2,
			'id_pengguna' => $this->session->userdata('id'),
			'update_at' => date('d-M-Y')
		);
		$this->m_penduduk->input_data($data, 'kelahiran');
		redirect('peristiwa/kelahiran');
	}
	public function hapus_kelahiran($kode)
	{
		$where = array('kode_kelahiran' => $kode);
		$this->m_penduduk->hapus_data($where, 'kelahiran');
		redirect('peristiwa/kelahiran');
	}
	public function edit_kelahiran($kode)
	{
		$where = array('kode_kelahiran' => $kode);
		$data['kelahiran'] = $this->m_penduduk->edit_data($where, 'kelahiran')->result();
		$this->load->view('v_edit_kelahiran', $data);
	}
	public function update_kelahiran()
	{
		$kode_kelahiran = $this->input->post('kode_kelahiran');
		$no_kk = $this->input->post('no_kk');
		$nama = $this->input->post('nama');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_dilahirkan = $this->input->post('tempat_dilahirkan');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$hari_lahir = $this->input->post('hari_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jam_lahir = $this->input->post('jam_lahir');
		$kelahiran_ke = $this->input->post('kelahiran_ke');
		$jenis_kelahiran = $this->input->post('jenis_kelahiran');
		$penolong = $this->input->post('penolong');
		$berat = $this->input->post('berat');
		$panjang = $this->input->post('panjang');
		$tanggal_perkawinan = $this->input->post('tanggal_perkawinan');
		$nik_ibu = $this->input->post('nik_ibu');
		$nik_ayah = $this->input->post('nik_ayah');
		$nik_pelapor = $this->input->post('nik_pelapor');
		$nik_saksi1 = $this->input->post('nik_saksi1');
		$nik_saksi2 = $this->input->post('nik_saksi2');

		$data = array(
			'no_kk' => $no_kk,
			'nama' => $nama,
			'jenis_kelamin' => $jenis_kelamin,
			'tempat_dilahirkan' => $tempat_dilahirkan,
			'tempat_lahir' => $tempat_lahir,
			'hari_lahir' => $hari_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jam_lahir' => $jam_lahir,
			'kelahiran_ke' => $kelahiran_ke,
			'jenis_kelahiran' => $jenis_kelahiran,
			'penolong' => $penolong,
			'berat' => $berat,
			'panjang' => $panjang,
			'tanggal_perkawinan' => $tanggal_perkawinan,
			'nik_ibu' => $nik_ibu,
			'nik_ayah' => $nik_ayah,
			'nik_pelapor' => $nik_pelapor,
			'nik_saksi1' => $nik_saksi1,
			'nik_saksi2' => $nik_saksi2,
			'id_pengguna' => $this->session->userdata('id'),
			'update_at' => date('d-M-Y')
		);
		$where = array(
			'kode_kelahiran' => $kode_kelahiran
		);
		$this->m_penduduk->update_data($where, $data, 'kelahiran');
		redirect('peristiwa/kelahiran');
	}
	public function cetak()
	{
		$pdf = new FPDF('L', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Image('assets/images/provgo.png', 20, 11, 17);


		// Arial bold 12
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(267, 7, 'LAPORAN DATA KEPENDUDUKAN', 0, 1, 'C');
		$pdf->Cell(267, 7, 'DESA MOLINTOGUPO', 0, 1, 'C');
		$pdf->SetFont('Arial', 'I', 9);
		$pdf->Cell(267, 5, 'Kecamatan Suwawa Selatan, Kabupaten Bone Bolango', 0, 1, 'C');

		$pdf->Image('assets/images/bonbol-192x225.png', 257, 11, 15);
		$pdf->Cell(274, 1, '', 'B', 1, 'L');
		$pdf->Cell(274, 1, '', 'B', 0, 'L');
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->setFillColor(124, 185, 232);
		$pdf->Cell(6, 6, 'NO', 1, 0, 'C', 1);
		$pdf->Cell(28, 6, 'NAMA', 1, 0, 'C', 1);
		$pdf->SetFont('Arial', 'B', 5);
		$pdf->Cell(17, 6, 'JENIS KELAMIN', 1, 0, 'C', 1);
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(25, 6, 'NOMOR KK', 1, 0, 'C', 1);
		$pdf->SetFont('Arial', '', 7);
		$no = 1;
		//$query = $this->db->get('mutasi')->result();

		$this->db->select('*')
			->from('penduduk')
			->join('mutasi', 'penduduk.nik = mutasi.nik');
		$result = $this->db->get();
		foreach ($result as $row) {
			$pdf->Cell(10, 6, '', 0, 1);
			$pdf->Cell(6, 6, $no++, 1, 0);
			$pdf->Cell(28, 6, $row->nik, 1, 0);
		}
		$pdf->Output('Data-Mutasi-Penduduk-Desa-Molintogupo.pdf', 'I');
	}
}
