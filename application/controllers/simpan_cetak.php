
	function kelahiran_id($id) {
		$phpWord = new PhpWord();
        $template = $phpWord->loadTemplate('templates/template-kelahiran.docx');

        $kelahiran = $this->m_penduduk->tampil_kelahiran_id($id)->row();

        $template->setValue('no_kk', $kelahiran->no_kk);
        $kk = $this->m_penduduk->tampil_kepala_keluarga_id($kelahiran->no_kk)->row();
        $template->setValue('nama_kk', $kk->nama);
        $template->setValue('nama', $kelahiran->nama);
        if($kelahiran->jenis_kelamin == 'l') $jenis_kelamin = 'Laki-Laki'; else $jenis_kelamin = 'Perempuan';
        $template->setValue('jenis_kelamin', $jenis_kelamin);
        $template->setValue('tempat_dilahirkan', $kelahiran->tempat_dilahirkan);
        $template->setValue('tempat_lahir', $kelahiran->tempat_lahir);
        $template->setValue('hari_lahir', $kelahiran->hari_lahir);
        $template->setValue('tanggal_lahir', date('d-m-Y', strtotime($kelahiran->tanggal_lahir)));
        $template->setValue('jam_lahir', $kelahiran->jam_lahir);
        $template->setValue('jenis_kelahiran', $kelahiran->jenis_kelahiran);
        $template->setValue('kelahiran_ke', $kelahiran->kelahiran_ke);
        $template->setValue('penolong', $kelahiran->penolong);
        $template->setValue('berat', $kelahiran->berat);
        $template->setValue('panjang', $kelahiran->panjang);

        $today = new DateTime();

        $ibu = $this->m_penduduk->tampil_penduduk_id($kelahiran->nik_ibu)->row();
        $template->setValue('nik_ibu', $ibu->nik);
        $template->setValue('nama_ibu', $ibu->nama);
        $template->setValue('tanggal_lahir_ibu', date('d-m-Y', strtotime($ibu->tanggal_lahir)));
		$biday_ibu = new DateTime($ibu->tanggal_lahir);
		$umur_ibu = $today->diff($biday_ibu);
        $template->setValue('umur_ibu', $umur_ibu->y);
        $template->setValue('alamat_ibu', $ibu->alamat);

        $ayah = $this->m_penduduk->tampil_penduduk_id($kelahiran->nik_ayah)->row();
        $template->setValue('nik_ayah', $ayah->nik);
        $template->setValue('nama_ayah', $ayah->nama);
		$biday_ayah = new DateTime($ayah->tanggal_lahir);
		$umur_ayah = $today->diff($biday_ayah);
        $template->setValue('umur_ayah', $umur_ayah->y);
        $template->setValue('pekerjaan_ayah', $ayah->pekerjaan);
        $template->setValue('alamat_ayah', $ayah->alamat);

        $template->setValue('nama_pelapor', $kelahiran->nama_pelapor);
        $template->setValue('nama_saksi1', $kelahiran->nama_saksi1);
        $template->setValue('nama_saksi2', $kelahiran->nama_saksi2);

        $temp_filename = 'Surat Kelahiran '.$kelahiran->nama.'.docx';
        ob_clean();
		$template->save($temp_filename);	

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$temp_filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($temp_filename));
        flush();
        readfile($temp_filename);
        unlink($temp_filename);
        exit;        
    }
    function kematian_id($id) {
		$phpWord = new PhpWord();
        $template = $phpWord->loadTemplate('templates/template-kematian.docx');

        $today = new DateTime();
        $kematian = $this->m_penduduk->tampil_kematian_id($id)->row();

        $template->setValue('no_kk', $kematian->no_kk);
        $kk = $this->m_penduduk->tampil_kepala_keluarga_id($kematian->no_kk)->row();
        $template->setValue('nama_kk', $kk->nama);

        $jenazah = $this->m_penduduk->tampil_penduduk_id($kematian->nik)->row();
        $template->setValue('nama', $jenazah->nama);
        if($jenazah->jenis_kelamin == 'l') $jenis_kelamin = 'Laki-Laki'; else $jenis_kelamin = 'Perempuan';
        $template->setValue('jenis_kelamin', $jenis_kelamin);
        $template->setValue('tempat_lahir', $jenazah->tempat_lahir);
        $template->setValue('tanggal_lahir', date('d-m-Y', strtotime($jenazah->tanggal_lahir)));
		$biday_jenazah = new DateTime($jenazah->tanggal_lahir);
		$umur = $today->diff($biday_jenazah);
        $template->setValue('umur', $umur->y);
        $template->setValue('agama', $jenazah->agama);
        $template->setValue('pekerjaan', $jenazah->pekerjaan);
        $template->setValue('alamat', $jenazah->alamat);
        $template->setValue('anak_ke', $kematian->anak_ke);
        $template->setValue('tanggal_kematian', $kematian->tanggal_kematian);
        $template->setValue('jam_kematian', $kematian->jam_kematian);
        $template->setValue('sebab', $kematian->sebab);
        $template->setValue('tempat_kematian', $kematian->tempat_kematian);
        $template->setValue('menerangkan', $kematian->menerangkan);


        $ibu = $this->m_penduduk->tampil_penduduk_id($kematian->nik_ibu)->row();
        $template->setValue('nik_ibu', $ibu->nik);
        $template->setValue('nama_ibu', $ibu->nama);
        $template->setValue('tanggal_lahir_ibu', date('d-m-Y', strtotime($ibu->tanggal_lahir)));
		$biday_ibu = new DateTime($ibu->tanggal_lahir);
		$umur_ibu = $today->diff($biday_ibu);
        $template->setValue('umur_ibu', $umur_ibu->y);
        $template->setValue('pekerjaan_ibu', $ibu->pekerjaan);
        $template->setValue('alamat_ibu', $ibu->alamat);

        $ayah = $this->m_penduduk->tampil_penduduk_id($kematian->nik_ayah)->row();
        $template->setValue('nik_ayah', $ayah->nik);
        $template->setValue('nama_ayah', $ayah->nama);
		$biday_ayah = new DateTime($ayah->tanggal_lahir);
		$umur_ayah = $today->diff($biday_ayah);
        $template->setValue('umur_ayah', $umur_ayah->y);
        $template->setValue('pekerjaan_ayah', $ayah->pekerjaan);
        $template->setValue('alamat_ayah', $ayah->alamat);

        $template->setValue('nama_pelapor', $kematian->nama_pelapor);
        $template->setValue('nama_saksi1', $kematian->nama_saksi1);
        $template->setValue('nama_saksi2', $kematian->nama_saksi2);

        $temp_filename = 'Surat Kematian '.$jenazah->nama.'.docx';
        ob_clean();
		$template->save($temp_filename);	

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$temp_filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($temp_filename));
        flush();
        readfile($temp_filename);
        unlink($temp_filename);
        exit;        
    }
    function pindah_id($id) {
		$phpWord = new PhpWord();
        $template = $phpWord->loadTemplate('templates/template-pindah.docx');

        $pindah = $this->m_penduduk->tampil_pindah_id($id)->row();

        $template->setValue('no_kk', $pindah->no_kk);
        $kk = $this->m_penduduk->tampil_kepala_keluarga_id($pindah->no_kk)->row();
        $template->setValue('nama_kk', $pindah->nama_kk);
        $template->setValue('alamat', $pindah->alamat);
        $template->setValue('alasan', $pindah->alasan);
        $template->setValue('alamat_tujuan', $pindah->alamat_tujuan);
        $template->setValue('klasifikasi', $pindah->klasifikasi);
        $template->setValue('jenis_pindah', $pindah->jenis_pindah);
        $template->setValue('stat_pindah', $pindah->stat_pindah);
        $template->setValue('stat_tidak_pindah', $pindah->stat_tidak_pindah);
        $template->setValue('tanggal_pindah', date('d-m-Y', strtotime($pindah->tanggal_pindah)));

        $temp_filename = 'Surat Pindah '.$pindah->nama_kk.'.docx';
        ob_clean();
		$template->save($temp_filename);	

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$temp_filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($temp_filename));
        flush();
        readfile($temp_filename);
        unlink($temp_filename);
        exit;        
    }
    function datang_id($id) {
		$phpWord = new PhpWord();
        $template = $phpWord->loadTemplate('templates/template-datang.docx');
        // $templateProcessor = new TemplateProcessor('Template.docx');

        $datang = $this->m_penduduk->tampil_datang_id($id)->row();

        $template->setValue('no_kk', $datang->no_kk);
        $template->setValue('nama_kk', $datang->nama_kk);
        $template->setValue('nik_kk', $datang->nik_kk);
        $template->setValue('stat_pindah', $datang->stat_pindah);
        $template->setValue('tanggal_datang', date('d-m-Y', strtotime($datang->tanggal_datang)));
        $template->setValue('alamat', $datang->alamat);
		
		$keluarga = $this->m_penduduk->tampil_penduduk_datang($id)->row();
		
		
		$data = array(
			'num' => $keluarga->nik,
			'nik' => $keluarga->nik,
			'nama' => $keluarga->nama
		);

		$template->cloneRow('pdk', $data);
        

        $temp_filename = 'Surat Datang '.$datang->nama_kk.'.docx';
        ob_clean();
        // $template->saveAs($temp_filename);

		$template->save($temp_filename);	

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$temp_filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($temp_filename));
        flush();
        readfile($temp_filename);
        unlink($temp_filename);
        exit;        
    }
    function test($id){
    	$keluarga = $this->m_penduduk->tampil_penduduk_datang($id)->row_array();
    	print_r($keluarga); 
    }
    function laporan_penduduk(){
    	$spreadsheet = new Spreadsheet();
    	// Set document properties
		$spreadsheet->getProperties()->setCreator('Desa Gurinda')
		->setLastModifiedBy('Desa Gurinda')
		->setTitle('Laporan Penduduk Desa Gurinda')
		->setDescription('Laporan Penduduk Desa Gurinda');

		$spreadsheet->getActiveSheet()->mergeCells('A1:M1');
		$spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Laporan Data Penduduk Desa Gurinda');
		foreach(range('A','M') as $columnID) {
		$spreadsheet->getActiveSheet()->getColumnDimension($columnID)
		        ->setAutoSize(true);
		}

		// Header Tabel
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A3', 'No')
		->setCellValue('B3', 'Dusun')
		->setCellValue('C3', 'No. KK')
		->setCellValue('D3', 'Alamat')
		->setCellValue('E3', 'Nama Kepala Keluarga')
		->setCellValue('F3', 'NIK')
		->setCellValue('G3', 'Nama Anggota Keluarga')
		->setCellValue('H3', 'Jenis Kelamin')
		->setCellValue('I3', 'Hubungan')
		->setCellValue('J3', 'Tempat Lahir')
		->setCellValue('K3', 'Tanggal Lahir')
		->setCellValue('L3', 'Usia')
		->setCellValue('M3', 'Status')
		;

		$konek = new mysqli('localhost','root','','desagurinda');
		$i=4; 
		$no=1; 
		$query = "SELECT * FROM penduduk INNER JOIN keluarga ON penduduk.nik = keluarga.nik WHERE status != '3' ORDER BY nik_kk DESC";
		$data = $konek->prepare($query);
		$data->execute();
		$hasil = $data->get_result();
		while ($row = $hasil->fetch_assoc()) {
		$query_penduduk = mysqli_query($konek,"SELECT nama FROM penduduk WHERE nik = '$row[nik_kk]' ");
		$row_penduduk = mysqli_fetch_assoc($query_penduduk);
		switch ($row['dusun']) {
                    case '1':
                      $dusun = 'Dusun I';
                      break;
                    case '2':
                      $dusun = 'Dusun II';
                      break;
                    
                    case '3':
                      $dusun = 'Dusun III';
                      break;
                    
                    default:
                      $dusun = 'Dusun IV';
                      break;
        } 
        switch ($row['jenis_kelamin']) {
                    case 'l':
                      $jenis_kelamin = 'Laki-Laki';
                      break;
                    default:
                      $jenis_kelamin = 'Perempuan';
                      break;
        } 
        switch ($row['status']) {
                    case '1':
                      $status = 'Menikah';
                      break;
                    default:
                      $status = 'Belum Menikah';
                      break;
        } 
            $biday = new DateTime($row['tanggal_lahir']);
            $today = new DateTime();
            $umur = $today->diff($biday);
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $no)
			->setCellValue('B'.$i, $dusun)
			->setCellValue('C'.$i, $row['no_kk'])
			->setCellValue('D'.$i, $row['alamat'])
			->setCellValue('E'.$i, $row_penduduk['nama'])
			->setCellValue('F'.$i, $row['nik'])
			->setCellValue('G'.$i, $row['nama'])
			->setCellValue('H'.$i, $jenis_kelamin)
			->setCellValue('I'.$i, $row['hubungan'])
			->setCellValue('J'.$i, $row['tempat_lahir'])
			->setCellValue('K'.$i, $row['tanggal_lahir'])
			->setCellValue('L'.$i, $umur->y)
			->setCellValue('M'.$i, $status);
			$i++; $no++;
		}


		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Laporan Penduduk '.date('d-m-Y H'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Laporan Data Penduduk Desa Gurinda.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

			$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');

    }
    function kematian(){
    	$spreadsheet = new Spreadsheet();
    	// Set document properties
		$spreadsheet->getProperties()->setCreator('Desa Gurinda')
		->setLastModifiedBy('Desa Gurinda')
		->setTitle('Laporan Kematian Desa Gurinda')
		->setDescription('Laporan Kematian Desa Gurinda');

		$spreadsheet->getActiveSheet()->mergeCells('A1:O1');
		$spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Laporan Data Kematian Desa Gurinda');
		foreach(range('A','O') as $columnID) {
		$spreadsheet->getActiveSheet()->getColumnDimension($columnID)
		        ->setAutoSize(true);
		}

		// Header Tabel
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A3', 'No')
		->setCellValue('B3', 'No. KK')
		->setCellValue('C3', 'NIK')
		->setCellValue('D3', 'Nama')
		->setCellValue('E3', 'Anak Ke')
		->setCellValue('F3', 'Tanggal Kematian')
		->setCellValue('G3', 'Jam Kematian')
		->setCellValue('H3', 'Sebab Kematian')
		->setCellValue('I3', 'Tempat Kematian')
		->setCellValue('J3', 'Yang Menerangkan')
		->setCellValue('K3', 'Nama Ibu')
		->setCellValue('L3', 'Nama Ayah')
		->setCellValue('M3', 'Nama Pelapor')
		->setCellValue('N3', 'Nama Saksi 1')
		->setCellValue('O3', 'Nama Saksi 2')
		;

		$konek = new mysqli('localhost','root','','desagurinda');
		$i=4; 
		$no=1; 
		$query = "SELECT * FROM kematian";
		$data = $konek->prepare($query);
		$data->execute();
		$hasil = $data->get_result();
		while ($row = $hasil->fetch_assoc()) {
		$query_jenazah = mysqli_query($konek,"SELECT nama FROM penduduk WHERE nik = '$row[nik]' ");
		$query_ayah = mysqli_query($konek,"SELECT nama FROM penduduk WHERE nik = '$row[nik_ayah]' ");
		$query_ibu = mysqli_query($konek,"SELECT nama FROM penduduk WHERE nik = '$row[nik_ibu]' ");
		$row_ibu = mysqli_fetch_assoc($query_ibu);
		$row_ayah = mysqli_fetch_assoc($query_ayah);
		$row_jenazah = mysqli_fetch_assoc($query_jenazah);
        	$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $no)
			->setCellValue('B'.$i, $row['no_kk'])
			->setCellValue('C'.$i, $row['nik'])
			->setCellValue('D'.$i, $row_jenazah['nama'])
			->setCellValue('E'.$i, $row['anak_ke'])
			->setCellValue('F'.$i, $row['tanggal_kematian'])
			->setCellValue('G'.$i, $row['jam_kematian'])
			->setCellValue('H'.$i, $row['sebab'])
			->setCellValue('I'.$i, $row['tempat_kematian'])
			->setCellValue('J'.$i, $row['menerangkan'])
			->setCellValue('K'.$i, $row_ayah['nama'])
			->setCellValue('L'.$i, $row_ibu['nama'])
			->setCellValue('M'.$i, $row['nama_pelapor'])
			->setCellValue('N'.$i, $row['nama_saksi1'])
			->setCellValue('O'.$i, $row['nama_saksi2'])
			;
			$i++; $no++;
		}


		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Laporan Kematian '.date('d-m-Y H'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Laporan Data Kematian Desa Gurinda.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

			$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
    }
    function kelahiran(){
    	$spreadsheet = new Spreadsheet();
    	// Set document properties
		$spreadsheet->getProperties()->setCreator('Desa Gurinda')
		->setLastModifiedBy('Desa Gurinda')
		->setTitle('Laporan Kelahiran Desa Gurinda')
		->setDescription('Laporan Kelahiran Desa Gurinda');

		$spreadsheet->getActiveSheet()->mergeCells('A1:S1');
		$spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Laporan Data Kelahiran Desa Gurinda');
		foreach(range('A','S') as $columnID) {
		$spreadsheet->getActiveSheet()->getColumnDimension($columnID)
		        ->setAutoSize(true);
		}

		// Header Tabel
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A3', 'No')
		->setCellValue('B3', 'No. KK')
		->setCellValue('C3', 'Nama')
		->setCellValue('D3', 'Jenis Kelamin')
		->setCellValue('E3', 'Tempat Dilahirkan')
		->setCellValue('F3', 'Tempat Lahir')
		->setCellValue('G3', 'Hari Lahir')
		->setCellValue('H3', 'Tanggal Lahir')
		->setCellValue('I3', 'Jam Lahir')
		->setCellValue('J3', 'Kelahiran Ke')
		->setCellValue('K3', 'Jenis Kelahiran')
		->setCellValue('L3', 'Penolong')
		->setCellValue('M3', 'Berat')
		->setCellValue('N3', 'Panjang')
		->setCellValue('O3', 'Nama Ibu')
		->setCellValue('P3', 'Nama Ayah')
		->setCellValue('Q3', 'Nama Pelapor')
		->setCellValue('R3', 'Nama Saksi 1')
		->setCellValue('S3', 'Nama Saksi 2')
		;

		$konek = new mysqli('localhost','root','','desagurinda');
		$i=4; 
		$no=1; 
		$query = "SELECT * FROM kelahiran";
		$data = $konek->prepare($query);
		$data->execute();
		$hasil = $data->get_result();
		while ($row = $hasil->fetch_assoc()) {
		$query_ayah = mysqli_query($konek,"SELECT nama FROM penduduk WHERE nik = '$row[nik_ayah]' ");
		$query_ibu = mysqli_query($konek,"SELECT nama FROM penduduk WHERE nik = '$row[nik_ibu]' ");
		$row_ibu = mysqli_fetch_assoc($query_ibu);
		$row_ayah = mysqli_fetch_assoc($query_ayah); 
        switch ($row['jenis_kelamin']) {
                    case 'l':
                      $jenis_kelamin = 'Laki-Laki';
                      break;
                    default:
                      $jenis_kelamin = 'Perempuan';
                      break;
        } 
        	$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $no)
			->setCellValue('B'.$i, $row['no_kk'])
			->setCellValue('C'.$i, $row['nama'])
			->setCellValue('D'.$i, $jenis_kelamin)
			->setCellValue('E'.$i, $row['tempat_dilahirkan'])
			->setCellValue('F'.$i, $row['tempat_lahir'])
			->setCellValue('G'.$i, $row['hari_lahir'])
			->setCellValue('H'.$i, $row['tanggal_lahir'])
			->setCellValue('I'.$i, $row['jam_lahir'])
			->setCellValue('J'.$i, $row['kelahiran_ke'])
			->setCellValue('K'.$i, $row['jenis_kelahiran'])
			->setCellValue('L'.$i, $row['penolong'])
			->setCellValue('M'.$i, $row['berat'])
			->setCellValue('N'.$i, $row['panjang'])
			->setCellValue('O'.$i, $row_ibu['nama'])
			->setCellValue('P'.$i, $row_ayah['nama'])
			->setCellValue('Q'.$i, $row['nama_pelapor'])
			->setCellValue('R'.$i, $row['nama_saksi1'])
			->setCellValue('S'.$i, $row['nama_saksi2'])
			;
			$i++; $no++;
		}


		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Laporan Kelahiran '.date('d-m-Y H'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Laporan Data Kelahiran Desa Gurinda.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

			$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
    }
    function pindah(){
    	$spreadsheet = new Spreadsheet();
    	// Set document properties
		$spreadsheet->getProperties()->setCreator('Desa Gurinda')
		->setLastModifiedBy('Desa Gurinda')
		->setTitle('Laporan Perpindahan Desa Gurinda')
		->setDescription('Laporan Perpindahan Desa Gurinda');

		$spreadsheet->getActiveSheet()->mergeCells('A1:K1');
		$spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Laporan Data Perpindahan Penduduk Desa Gurinda');
		foreach(range('A','K') as $columnID) {
		$spreadsheet->getActiveSheet()->getColumnDimension($columnID)
		        ->setAutoSize(true);
		}

		// Header Tabel
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A3', 'No')
		->setCellValue('B3', 'No. KK')
		->setCellValue('C3', 'Nama Kepala Keluarga')
		->setCellValue('D3', 'Alamat')
		->setCellValue('E3', 'Alasan Pindah')
		->setCellValue('F3', 'Alamat Tujuan')
		->setCellValue('G3', 'klasifikasi Perpindahan')
		->setCellValue('H3', 'Jenis Perpindahan')
		->setCellValue('I3', 'Status KK Anggota Keluarga yang Tidak Pindah')
		->setCellValue('J3', 'Status KK Anggota Keluarga yang Pindah')
		->setCellValue('K3', 'Rencana Tanggal Pindah')
		;

		$konek = new mysqli('localhost','root','','desagurinda');
		$i=4; 
		$no=1; 
		$query = "SELECT * FROM pindah";
		$data = $konek->prepare($query);
		$data->execute();
		$hasil = $data->get_result();
		while ($row = $hasil->fetch_assoc()) {
        	$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $no)
			->setCellValue('B'.$i, $row['no_kk'])
			->setCellValue('C'.$i, $row['nama_kk'])
			->setCellValue('D'.$i, $row['alamat'])
			->setCellValue('E'.$i, $row['alasan'])
			->setCellValue('F'.$i, $row['alamat_tujuan'])
			->setCellValue('G'.$i, $row['klasifikasi'])
			->setCellValue('H'.$i, $row['jenis_pindah'])
			->setCellValue('I'.$i, $row['stat_tidak_pindah'])
			->setCellValue('J'.$i, $row['stat_pindah'])
			->setCellValue('K'.$i, $row['tanggal_pindah'])
			;
			$i++; $no++;
		}


		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Laporan Pindah '.date('d-m-Y H'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Laporan Data Perpindahan Penduduk Desa Gurinda.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

			$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
    }
    function datang(){
    	$spreadsheet = new Spreadsheet();
    	// Set document properties
		$spreadsheet->getProperties()->setCreator('Desa Gurinda')
		->setLastModifiedBy('Desa Gurinda')
		->setTitle('Laporan Kedatangan Desa Gurinda')
		->setDescription('Laporan Kedatangan Desa Gurinda');

		$spreadsheet->getActiveSheet()->mergeCells('A1:G1');
		$spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Laporan Data Kedatangan Penduduk Desa Gurinda');
		foreach(range('A','G') as $columnID) {
		$spreadsheet->getActiveSheet()->getColumnDimension($columnID)
		        ->setAutoSize(true);
		}

		// Header Tabel
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A3', 'No')
		->setCellValue('B3', 'No. KK')
		->setCellValue('C3', 'Nama Kepala Keluarga')
		->setCellValue('D3', 'NIK Kepala Keluarga')
		->setCellValue('E3', 'Status KK')
		->setCellValue('F3', 'Tanggal Datang')
		->setCellValue('G3', 'Alamat')
		;

		$konek = new mysqli('localhost','root','','desagurinda');
		$i=4; 
		$no=1; 
		$query = "SELECT * FROM datang";
		$data = $konek->prepare($query);
		$data->execute();
		$hasil = $data->get_result();
		while ($row = $hasil->fetch_assoc()) {
        	$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $no)
			->setCellValue('B'.$i, $row['no_kk'])
			->setCellValue('C'.$i, $row['nama_kk'])
			->setCellValue('D'.$i, $row['nik_kk'])
			->setCellValue('E'.$i, $row['stat_pindah'])
			->setCellValue('F'.$i, $row['tanggal_datang'])
			->setCellValue('G'.$i, $row['alamat'])
			;
			$i++; $no++;
		}


		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Laporan Datang '.date('d-m-Y H'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Laporan Data Kedatangan Penduduk Desa Gurinda.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

			$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
    }