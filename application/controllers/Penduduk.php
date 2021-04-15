<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Penduduk extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));
		}
		$this->load->library('Excel'); //load librari excel
		$this->load->model('m_penduduk');
		$this->load->model('m_import');

		$this->load->helper('url');
		$this->load->library('pdf');
	}
	public function index()
	{
		$data['penduduk'] = $this->m_penduduk->tampil_data()->result();
		$data['anggota'] = $this->m_penduduk->tampil_anggota_keluarga()->result();


		$this->load->view('v_penduduk', $data);
	}

	public function penambahan()
	{
		$data_jumlah = $this->m_penduduk->jumlah_keluarga();
		$nourut = substr($data_jumlah, 3, 4);
		$kode_keluarga = $nourut + 1;
		$data = array('kode_keluarga' => $kode_keluarga);

		$this->load->view('v_tambahpenduduk', $data);
	}

	public function tambah_aksi()
	{
		$nik = $this->input->post('nik');
		$no_kk = $this->input->post('no_kk');
		$nama = $this->input->post('nama');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$hubungan = $this->input->post('hubungan');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$goldar = $this->input->post('goldar');
		$alamat = $this->input->post('alamat');
		$dusun = $this->input->post('dusun');
		$agama = $this->input->post('agama');
		$pendidikan = $this->input->post('pendidikan');
		$pekerjaan = $this->input->post('pekerjaan');
		$status = $this->input->post('status');
		$kode_keluarga = $this->input->post('kode_keluarga');

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
			'id_admmin' => $this->session->userdata('id'),
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
			'kode_keluarga' => $kode_keluarga,
			'no_kk' => $no_kk,
			'nik_kk' => $nik_kk,
			'nik' => $nik
		);
		$this->m_penduduk->input_data($data_penduduk, 'penduduk');
		$this->m_penduduk->input_data($data_keluarga, 'keluarga');
		redirect('penduduk');
	}

	public function edit($nik)
	{
		$where = array('nik' => $nik);
		$data['penduduk'] = $this->m_penduduk->edit_data($where, 'penduduk')->result();
		$this->load->view('v_edit_penduduk', $data);
	}

	public function update()
	{
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$hubungan = $this->input->post('hubungan');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$goldar = $this->input->post('goldar');
		$alamat = $this->input->post('alamat');
		$dusun = $this->input->post('dusun');
		$agama = $this->input->post('agama');
		$pendidikan = $this->input->post('pendidikan');
		$pekerjaan = $this->input->post('pekerjaan');
		$status = $this->input->post('status');
		$kode_keluarga = $this->input->post('kode_keluarga');

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
			'id_admin' => $this->session->userdata('id'),
			'update_at' => date('d-M-Y')
		);

		$where = array(
			'nik' => $nik
		);

		$this->m_penduduk->update_data($where, $data_penduduk, 'penduduk');
		redirect('penduduk');
	}

	public function hapus($nik)
	{
		$where = array('nik' => $nik);
		$this->m_penduduk->hapus_data($where, 'penduduk');
		redirect('penduduk');
	}

	public function detail($nik)
	{
		$where = array('nik' => $nik);
		$data['penduduk'] = $this->m_penduduk->edit_data($where, 'penduduk')->result();
		$this->load->view('v_detailpenduduk', $data);
	}

	public function cetak()
	{
		$pdf = new FPDF('L', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->setFillColor(124, 185, 232);
		$pdf->Cell(6, 6, 'NO', 1, 0, 'C', 1);
		$pdf->Cell(28, 6, 'NAMA', 1, 0, 'C', 1);
		$pdf->SetFont('Arial', 'B', 5);
		$pdf->Cell(17, 6, 'JENIS KELAMIN', 1, 0, 'C', 1);
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(25, 6, 'NOMOR KK', 1, 0, 'C', 1);
		$pdf->Cell(25, 6, 'NIK', 1, 0, 'C', 1);
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->Cell(20, 6, 'TEMPAT LAHIR', 1, 0, 'C', 1);
		$pdf->Cell(20, 6, 'TANGGAL LAHIR', 1, 0, 'C', 1);
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(10, 6, 'UMUR', 1, 0, 'C', 1);
		$pdf->Cell(22, 6, 'PENDIDIKAN', 1, 0, 'C', 1);
		$pdf->Cell(25, 6, 'PEKERJAAN', 1, 0, 'C', 1);
		$pdf->Cell(20, 6, 'STATUS', 1, 0, 'C', 1);
		$pdf->Cell(28, 6, 'AYAH', 1, 0, 'C', 1);
		$pdf->Cell(28, 6, 'IBU', 1, 0, 'C', 1);
		$pdf->SetFont('Arial', '', 7);
		$no = 1;
		$this->db->order_by('nomor_kk', 'asc');
		$penduduk = $this->db->get('penduduk')->result();
		foreach ($penduduk as $row) {
			$biday = new DateTime($row->tanggal_lahir);
			$today = new DateTime();
			$umury = $today->diff($biday);
			$umur = $umury->y;
			$pdf->Cell(10, 6, '', 0, 1);
			$pdf->Cell(6, 6, $no++, 1, 0);
			$pdf->Cell(28, 6, $row->nama, 1, 0);
			$pdf->Cell(17, 6, $row->jenis_kelamin, 1, 0);
			$pdf->Cell(25, 6, $row->nomor_kk, 1, 0);
			$pdf->Cell(25, 6, $row->nik, 1, 0);
			$pdf->Cell(20, 6, $row->tempat_lahir, 1, 0);
			$pdf->Cell(20, 6, $row->tanggal_lahir, 1, 0);
			$pdf->Cell(10, 6, $umur, 1, 0);
			$pdf->Cell(22, 6, $row->pendidikan, 1, 0);
			$pdf->Cell(25, 6, $row->pekerjaan, 1, 0);
			$pdf->Cell(20, 6, $row->status_perkawinan, 1, 0);
			$pdf->Cell(28, 6, $row->nama_ayah, 1, 0);
			$pdf->Cell(28, 6, $row->nama_ibu, 1, 0);
		}
		$pdf->SetFont('Arial', 'I', 6.5);
		$pdf->Cell(0, 30, 'Dicetak Tanggal : ' . date('d / m / Y'), 0, 1, 'R');


		$pdf->Output('Data-Penduduk-Desa-Molintogupo.pdf', 'I');
	}

	public function exportToExcel()
	{
		$spreadsheet = new Spreadsheet();
		$spreadsheet->getProperties()->setCreator('Gun Gun Priatna - re:code lab')
			->setLastModifiedBy('Gun Gun Priatna - re:code lab')
			->setTitle('Tes Export Excel')
			->setSubject('Tes Export Excel')
			->setDescription('Tes Export Excel')
			->setKeywords(' Tes Export Excel')
			->setCategory('Test export excel');

		//Add data
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'NIK')
			->setCellValue('B1', 'Nama')
			->setCellValue('C1', 'Jenis Kelamin')
			->setCellValue('D1', 'Tempat Lahir')
			->setCellValue('E1', 'Tanggal Lahir')
			->setCellValue('F1', 'Golongan Darah')
			->setCellValue('G1', 'Agama')
			->setCellValue('H1', 'Hubungan')
			->setCellValue('I1', 'Status')
			->setCellValue('J1', 'Dusun')
			->setCellValue('K1', 'Alamat')
			->setCellValue('L1', 'Pendidikan')
			->setCellValue('M1', 'Pekerjaan')
			->setCellValue('N1', 'Kewarganegaraan');

		$i = 2;

		$penduduk = $this->db->get('penduduk')->result_array();

		foreach ($penduduk as $row) {
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $i, $row['nik'])
				->setCellValue('B' . $i, $row['nama'])
				->setCellValue('C' . $i, $row['jenis_kelamin'])
				->setCellValue('D' . $i, $row['tempat_lahir'])
				->setCellValue('E' . $i, $row['tanggal_lahir'])
				->setCellValue('F' . $i, $row['goldar'])
				->setCellValue('G' . $i, $row['agama'])
				->setCellValue('H' . $i, $row['hubungan'])
				->setCellValue('I' . $i, $row['status'])
				->setCellValue('J' . $i, $row['dusun'])
				->setCellValue('K' . $i, $row['alamat'])
				->setCellValue('L' . $i, $row['pendidikan'])
				->setCellValue('M' . $i, $row['pekerjaan'])
				->setCellValue('N' . $i, $row['kewarganegaraan']);
			$i++;
		}

		$spreadsheet->getActiveSheet()->setTitle('Report Excel' . date('Y-m-d'));
		$spreadsheet->setActiveSheetIndex(0);


		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Report Excel.xlsx"');
		header('Cache-Control: max-age=0');

		header('Cache-Control: max-age=1');


		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	// import function
	public function import()
	{
		$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['file']['name']); //get file
			$extension = end($arr_file); //get file extension

			// select spreadsheet reader depends on file extension
			if ('csv' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else if ('xlsx') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			}

			//'Data' Table
			$dataList = array();
			$dataListArray = array();

			$reader->setReadDataOnly(true);

			//Get filename
			$objPHPExcel = $reader->load($_FILES['file']['tmp_name']);

			// $excel = PHPExcel_IOFactory::load($objPHPExcel);

			// foreach ($excel->getWorksheetIterator() as $value) {
			// 	$row = $value->getHighestRow();
			// 	$column = $value->getHighestColumn();

			// 	for ($i = 2; $i <= $row; $i++) {
			// 		$column_nik = $value->getCellByColumnAndRow(0, $i)->getValue();
			// 		$column_nama = $value->getCellByColumnAndRow(1, $i)->getValue();
			// 		$column_jenis_kelamin = $value->getCellByColumnAndRow(2, $i)->getValue();
			// 		$column_tempat_lahir = $value->getCellByColumnAndRow(3, $i)->getValue();
			// 		$column_tanggal_lahir = $value->getCellByColumnAndRow(4, $i)->getValue();
			// 		$column_goldar = $value->getCellByColumnAndRow(5, $i)->getValue();
			// 		$column_agama = $value->getCellByColumnAndRow(6, $i)->getValue();
			// 		$column_hubungan = $value->getCellByColumnAndRow(7, $i)->getValue();
			// 		$column_status = $value->getCellByColumnAndRow(8, $i)->getValue();
			// 		$column_dusun = $value->getCellByColumnAndRow(9, $i)->getValue();
			// 		$column_alamat = $value->getCellByColumnAndRow(10, $i)->getValue();
			// 		$column_pendidikan = $value->getCellByColumnAndRow(11, $i)->getValue();
			// 		$column_pekerjaan = $value->getCellByColumnAndRow(12, $i)->getValue();
			// 		$column_kewarganegaraan = $value->getCellByColumnAndRow(13, $i)->getValue();
			// 	}

			// 	$itu[] = [
			// 		'nik' => $column_nik,
			// 		'nama' => $column_nama,
			// 		'jenis_kelamin' => $column_jenis_kelamin,
			// 		'tempat_lahir' => $column_tempat_lahir,
			// 		'tanggal_lahir' => $column_tanggal_lahir,
			// 		'goldar' => $column_goldar,
			// 		'agama' => $column_agama,
			// 		'hubungan' => $column_hubungan,
			// 		'status' => $column_status,
			// 		'dusun' => $column_dusun,
			// 		'alamat' => $column_alamat,
			// 		'pendidikan' => $column_pendidikan,
			// 		'pekerjaan' => $column_pekerjaan,
			// 		'kewarganegaraan' => $column_kewarganegaraan,
			// 		'nik_ayah' => 998777,
			// 		'nik_ibu' => 8999888,
			// 		'id_admin' => $this->session->userdata('id'),
			// 		'update_at' => date('d-M-Y')
			// 	];
			// }

			// $this->db->insert_batch('penduduk', $itu);
			// redirect(base_url("Penduduk"));
			// die;

			//Get sheet by name
			$worksheet = $objPHPExcel->getSheetByName('City');

			$highestRow = $worksheet->getHighestRow(); // e.g. 12
			$highestColumn = $worksheet->getHighestColumn(); // e.g M'

			$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 7
			//Ignoring first row (As it contains column name)
			for ($row = 2; $row <= $highestRow; ++$row) {
				//A row selected
				for ($col = 1; $col <= $highestColumnIndex; ++$col) {
					// values till $cityList['1'] till $cityList['last_column_no'] 
					$dataList[$col] = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
				}
				array_push($dataListArray, $dataList);
				//next row, from top
			}

			var_dump($dataListArray);
			die;
			if ($this->m_import->import($dataListArray) == TRUE) {
				// what to do if import successfull
				redirect(base_url("Penduduk"));
			} else {
				// what to do if import failed
				redirect(base_url("Penduduk"));
			}
		}
	}

	public function import_excel()
	{
		if (isset($_FILES["file"]["name"])) {
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {
					$nik = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$nama = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$jenis_kelamin = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$tempat_lahir = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$tanggal_lahir = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$goldar = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$agama = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$hubungan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$status = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$dusun = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$alamat = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$pendidikan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$pekerjaan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$kewarganegaraan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$nik_ayah = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$nik_ibu = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$temp_data[] = array(
						'nik'	=> $nik,
						'nama'	=> $nama,
						'jenis_kelamin'	=> $jenis_kelamin,
						'tempat_lahir'	=> $tempat_lahir,
						'tanggal_lahir'	=> $tanggal_lahir,
						'goldar'	=> $goldar,
						'agama'	=> $agama,
						'hubungan'	=> $hubungan,
						'status'	=> $status,
						'dusun'	=> $dusun,
						'alamat'	=> $alamat,
						'pendidikan'	=> $pendidikan,
						'pekerjaan'	=> $pekerjaan,
						'kewarganegaraan'	=> $kewarganegaraan,
						'nik_ayah' => $nik_ayah,
						'nik_ibu' => $nik_ibu,
						'id_admin'	=> $this->session->userdata('id'),
						'update_at'	=> date('d-M-Y')
					);
				}
			}
			$this->load->model('ImportModel');
			$insert = $this->ImportModel->insert($temp_data);
			if ($insert) {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			echo "Tidak ada file yang masuk";
		}
	}
}
