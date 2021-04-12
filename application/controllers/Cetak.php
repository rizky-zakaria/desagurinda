<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// use PhpOffice\PhpWord\PhpWord;
// use PhpOffice\PhpWord\Writer\Word2007;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
require_once 'assets/PHPWord_CloneRow-master/PHPWord.php';
require_once 'vendor/autoload.php';

class Cetak extends CI_Controller {


	function __construct(){
		parent::__construct();

	$this->load->model('m_penduduk');
	}

	public function index()
	{
		$phpWord = new PhpWord();
		$section = $phpWord->addSection();
		$section->addText('Hello World !');
		
		$writer = new Word2007($phpWord);
		
		$filename = 'simple';
		
		header('Content-Type: application/msword');
        	header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
		header('Cache-Control: max-age=0');
		
		$writer->save('php://output');
	}
    function pindah($id){
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [215, 330],'margin_left' => 14,'margin_right' => 14,'margin_top' => 3,'margin_bottom' => 0,'margin_header' => 0,'margin_footer' => 0]);

    $desa = 'GURINDA';
    $kec = 'MEPANGA';
    $kab = 'PARIGI MOUTONG';
    $prov = 'SULAWESI TENGAH';
    $today = new DateTime();

    $pindah = $this->m_penduduk->tampil_pindah_id($id)->row();
    $kk = $this->m_penduduk->tampil_kepala_keluarga_id($pindah->no_kk)->row();
    $ppindah = $this->m_penduduk->tampil_penduduk_pindah($id)->result();

    function pecah_string($string){
        $data = str_split($string);
        return $data;
    }
    function tanggal_indo($tanggal){
        $bulan = array (1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
        }

        $html = '
    <!DOCTYPE html>
<html>
<head>
</head>
<body>
    <div class="kode">Kode . F-1.08</div>
    <table>
        <tr>
            <td class="label">Pemerintah Desa/Kelurahan</td>
            <td>:</td>
            <td>DESA GURINDA</td>
        </tr>
        <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td>MEPANGA</td>
        </tr>
        <tr>
            <td>Kabupaten/Kota</td>
            <td>:</td>
            <td>PARIGI MOUTONG</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">Kode Wilayah</td>
            <td>:</td>
            <td class="kotak">7</td>
            <td class="kotak">2</td>
            <td class="kotak">0</td>
            <td class="kotak">8</td>
            <td class="kotak">1</td>
            <td class="kotak">2</td>
            <td class="kotak">0</td>
            <td class="kotak">0</td>
            <td class="kotak">1</td>
            <td class="kotak">7</td>
        </tr>
    </table>
    <h4>SURAT PINDAH DATANG WNI</h4>
    <h5>DATA DAERAH ASAL</h5>
    <table>
        <tr>

            <td class="label">1. Nomor Kartu Keluarga</td>
            <td>:</td></td>';
            $no_kk = pecah_string($pindah->no_kk);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<16) {
            for($i=$i;$i<16;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
        <tr>
            <td class="label">2. Nama Kepala Keluarga</td>
            <td>:</td>';
            $nama_kk = pecah_string($kk->nama);
            $i = 0;
            foreach($nama_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<21) {
            for($i=$i;$i<21;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">3. Alamat</td>
            <td style="width:6px;">:</td>
            <td class="kotak left" style="width:470px">'.$pindah->alamat.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">a. Desa/Kelurahan</td>
            <td class="kotak left" style="width:130px"> GURINDA</td>
            <td style="width:80px">c. Kab/Kota</td>
            <td class="kotak left" style="width:138px">PARIGI MOUTONG</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">b. Kecamatan</td>
            <td class="kotak left" style="width:130px">MEPANGA</td>
            <td style="width:80px">d. Provinsi</td>
            <td class="kotak left" style="width:138px">SULAWESI TENGAH</td>
        </tr>
    </table>
    <h5>DATA KEPINDAHAN</h5>
    <table>
        <tr>
            <td class="label">1. Alasan Pindah</td>
            <td style="width:6px;">:</td>';

            if($pindah->alasan == 'Pekerjaan') $alasan = '1'; 
            elseif($pindah->alasan == 'Pendidikan') $alasan = '2';
            elseif($pindah->alasan == 'Keamanan') $alasan = '3';
            elseif($pindah->alasan == 'Kesehatan') $alasan = '4';
            elseif($pindah->alasan == 'Perumahan') $alasan = '5';
            elseif($pindah->alasan == 'Keluarga') $alasan = '6';
            elseif($pindah->alasan == 'Lainnya') $alasan = '7';
            else $alasan = '';
            $html .= '<td class="kotak">'.$alasan.'</td>';
            $html .= '<td style="width:100">1. Pekerjaan</td>
            <td style="width:100">3. Keamanan</td>
            <td style="width:100">5. Perumahan</td>
            <td style="width:80">7. Lainnya</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:20"></td>
            <td style="width:100">2. Pendidikan</td>
            <td style="width:100">4. Kesehatan</td>
            <td style="width:100">6. Keluarga</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">2. Alamat Tujuan Pindah</td>
            <td style="width:6px;">:</td>
            <td class="kotak left" style="width:470px">'.$pindah->alamat_tujuan.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">a. Desa/Kelurahan</td>
            <td class="kotak left" style="width:130px"> GURINDA</td>
            <td style="width:80px">c. Kab/Kota</td>
            <td class="kotak left" style="width:138px">PARIGI MOUTONG</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">b. Kecamatan</td>
            <td class="kotak left" style="width:130px">MEPANGA</td>
            <td style="width:80px">d. Provinsi</td>
            <td class="kotak left" style="width:138px">SULAWESI TENGAH</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">3. Klasifikasi Pindah</td>
            <td style="width:6px;">:</td>';

            if($pindah->klasifikasi == 'Dalam 1 Desa') $klasifikasi = '1'; 
            elseif($pindah->klasifikasi == 'Antar Desa') $klasifikasi = '2';
            elseif($pindah->klasifikasi == 'Antar Kecamatan') $klasifikasi = '3';
            elseif($pindah->klasifikasi == 'Antar Kabupaten') $klasifikasi = '4';
            elseif($pindah->klasifikasi == 'Antar Provinsi') $klasifikasi = '5';
            else $klasifikasi = '';
            $html .= '<td class="kotak">'.$klasifikasi.'</td>';
            $html .= '<td style="width:100">1. Dalam 1 Desa</td>
            <td style="width:100">3. Antar Kecamatan</td>
            <td style="width:100">5. Antar Provinsi</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:20"></td>
            <td style="width:100">2. Antar Desa</td>
            <td style="width:100">4. Antar Kabupaten</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">4. Jenis Pindah</td>
            <td style="width:6px;">:</td>';

            if($pindah->jenis_pindah == 'Kepala Keluarga') $jenis_pindah = '1'; 
            elseif($pindah->jenis_pindah == 'Kepala Keluarga dan Seluruh Anggota') $jenis_pindah = '2';
            elseif($pindah->jenis_pindah == 'Kep. Keluarga dan Sbg. Anggota') $jenis_pindah = '3';
            elseif($pindah->jenis_pindah == 'Anggota Keluarga') $jenis_pindah = '4';
            else $jenis_pindah = '';
            $html .= '<td class="kotak">'.$jenis_pindah.'</td>';
            $html .= '<td style="width:240">1. Kepala Keluarga</td>
            <td style="width:240">3. Kep. Keluarga dan Sbg. Anggota</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:20"></td>
            <td style="width:240">2. Kepala Keluarga dan Seluruh Anggota</td>
            <td style="width:240">4. Anggota Keluarga</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">5. Status KK untuk yang tidak Pindah</td>
            <td style="width:6px;">:</td>';

            if($pindah->stat_tidak_pindah == 'Menumpang KK') $stat_tidak_pindah = '1'; 
            elseif($pindah->stat_tidak_pindah == 'Membuat KK Baru') $stat_tidak_pindah = '2';
            elseif($pindah->stat_tidak_pindah == 'Tidak Ada Anggota Keluarga Yang Ditinggal') $stat_tidak_pindah = '3';
            elseif($pindah->stat_tidak_pindah == 'Nomor KK Tetap') $stat_tidak_pindah = '4';
            else $stat_tidak_pindah = '';
            $html .= '<td class="kotak">'.$stat_tidak_pindah.'</td>';
            $html .= '<td style="width:130">1. Menumpang KK</td>
            <td style="width:250">3. Tidak Ada Anggota Keluarga Yang Ditinggal</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:20"></td>
            <td style="width:130">2. Membuat KK Baru</td>
            <td style="width:180">4. Nomor KK Tetap</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">6. Status KK untuk yang Pindah</td>
            <td style="width:6px;">:</td>';

            if($pindah->stat_pindah == 'Menumpang KK') $stat_pindah = '1'; 
            elseif($pindah->stat_pindah == 'Membuat KK Baru') $stat_pindah = '2';
            elseif($pindah->stat_pindah == 'Nama Kep. Keluarga dan Nomor KK Tetap') $stat_pindah = '3';
            else $stat_pindah = '';
            $html .= '<td class="kotak">'.$stat_pindah.'</td>';
            $html .= '<td style="width:130">1. Menumpang KK</td>
            <td style="width:250">3. Nama Kep. Keluarga dan Nomor KK Tetap</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:20"></td>
            <td style="width:130">2. Membuat KK Baru</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">7. Rencana Tgl Pindah</td>
            <td style="width:6px;">:</td>';
            $html .= '<td style="width:30.5;">Tgl</td>';
            $no_kk = pecah_string(date('d',strtotime($pindah->tanggal_pindah)));
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30.5">Bln</td>';
            $no_kk = pecah_string(date('m',strtotime($pindah->tanggal_pindah)));
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30.5">Thn</td>';
            $no_kk = pecah_string(date('Y',strtotime($pindah->tanggal_pindah)));
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">8. Keluarga Yang Pindah</td>
            <td style="width:6px;">:</td>
        </tr>
    </table>
    <table class="tabel-penduduk" style="text-align:center;">
    <tr>
        <td width="5%">NO</td>
        <td colspan="16">NIK</td>
        <td width="22%">NAMA</td>
        <td width="14%">SHDK</td>
    </tr>';
    $no = 1;
    foreach($ppindah as $p){
    $html .= '<tr>
        <td>'.$no.'</td>';
        $no++;
        $no_kk = pecah_string($p->nik);
        $i = 0;
        foreach($no_kk as $n_k){
        $html .= '<td class="kotak">'.$n_k.'</td>';
        $i++;
        }
        if($i<16) {
        for($i=$i;$i<16;$i++){
        $html .= '<td class="kotak"></td>';
        }}
        if($p->hubungan == 'kepala_keluarga') $hubungan = 'Kepala Keluarga';
        elseif($p->hubungan == 'anak_kandung') $hubungan = 'Anak';
        elseif($p->hubungan == 'suami') $hubungan = 'Suami';
        elseif($p->hubungan == 'istri') $hubungan = 'Istri';
        elseif($p->hubungan == 'orang_tua') $hubungan = 'Orang Tua';
        elseif($p->hubungan == 'famili_lain') $hubungan = 'Famili Lain';
        else $hubungan = '';
        $html .= '<td>'.$p->nama.'</td>
        <td>'.$hubungan.'</td>';
    }
    $html .= '</tr>
    </table>
    <div class="col12">
        <div class="col6">
        <p>Mengetahui :</p>
        <p>CAMAT MEPANGA</p>
        <p class="ttd_bawah">ASMADI.S.H</p>
        <p>Nip. 19690401 1991 03 1 016</p>

        </div>
        <div class="col6" style="text-align:left;">
        <p>Gurinda, '. tanggal_indo(date('Y-m-d')).'</p>
        <p>Kepala Desa Gurinda</p>
        <p class="ttd_bawah">RUHDIN</p>
        </div>
    </div>

    <h5 style="margin-top:30px;">DATA DAERAH TUJUAN</h5>
    <table>
        <tr>
            <td class="label">1. Nomor Kartu Keluarga</td>
            <td>:</td></td>';
            for($i=0;$i<16;$i++){
            $html .= '<td class="kotak"></td>';
                }
    $html .= '</tr>
        <tr>
            <td class="label">2. Nama Kepala Keluarga</td>
            <td>:</td>';
            for($i=0;$i<21;$i++){
            $html .= '<td class="kotak"></td>';
                }
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">3. NIK Kepala Keluarga</td>
            <td style="width:6px;">:</td>';
            for($i=0;$i<16;$i++){
            $html .= '<td class="kotak"></td>';
                }
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">4. Status KK bagi yang Pindah</td>
            <td style="width:6px;">:</td>
            <td class="kotak"></td>
            <td style="width:130">1. Menumpang KK</td>
            <td style="width:250">3. Nama Kep. Keluarga dan Nomor KK Tetap</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:20"></td>
            <td style="width:130">2. Membuat KK Baru</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">5. Tanggal Kedatangan</td>
            <td style="width:6px;">:</td>';
            $html .= '<td style="width:30.5;">Tgl</td>';
            for($i=0;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }
            $html .= '<td style="width:30.5">Bln</td>';
            for($i=0;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }
            $html .= '<td style="width:30.5">Thn</td>';
            for($i=0;$i<4;$i++){
            $html .= '<td class="kotak"></td>';
                }
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">6. Alamat</td>
            <td style="width:6px;">:</td>
            <td class="kotak left" style="width:470px"></td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">a. Desa/Kelurahan</td>
            <td class="kotak left" style="width:130px"></td>
            <td style="width:80px">c. Kab/Kota</td>
            <td class="kotak left" style="width:138px"></td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">b. Kecamatan</td>
            <td class="kotak left" style="width:130px"></td>
            <td style="width:80px">d. Provinsi</td>
            <td class="kotak left" style="width:138px"></td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">8. Keluarga Yang Datang</td>
            <td style="width:6px;">:</td>
        </tr>
    </table>
    <table class="tabel-penduduk" style="text-align:center;">
    <tr>
        <td width="5%">NO</td>
        <td colspan="16">NIK</td>
        <td width="22%">NAMA</td>
        <td width="14%">SHDK</td>
    </tr>';
    $no = 1;
    foreach($ppindah as $p){
    $html .= '<tr>
        <td>'.$no.'</td>';
        $no++;
        for($i=0;$i<16;$i++){
        $html .= '<td class="kotak"></td>';
        }
        $html .= '<td></td>
        <td></td>';
    }
    $html .= '</tr>
    </table>
    <div class="col12">
        <div class="col6">
        <p>Mengetahui :</p>
        <p>CAMAT</p>
        <p class="ttd_bawah">(..................................)</p>

        </div>
        <div class="col6" style="text-align:left;">
        <p>............,............. 20.....</p>
        <p>Kepala Desa / Kelurahan</p>
        <p class="ttd_bawah">(..................................)</p>
        </div>
    </div>
</body>
</html>
    ';
    $stylesheet = file_get_contents(base_url('style.css'));
    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

    // $mpdf->Output();
    ob_clean();
    $mpdf->Output('SURAT PINDAH DATANG WNI - '.$pindah->no_kk.'.pdf', 'D');;
    }

    function kematian($id){
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [215, 330],'margin_left' => 14,'margin_right' => 14,'margin_top' => 3,'margin_bottom' => 0,'margin_header' => 0,'margin_footer' => 0]);

    $desa = 'GURINDA';
    $kec = 'MEPANGA';
    $kab = 'PARIGI MOUTONG';
    $prov = 'SULAWESI TENGAH';
    $kebang = 'INDONESIA';
    $today = new DateTime();

    $kematian = $this->m_penduduk->tampil_kematian_id($id)->row();
    $jenazah = $this->m_penduduk->tampil_penduduk_id($kematian->nik)->row();
    $kk = $this->m_penduduk->tampil_kepala_keluarga_id($kematian->no_kk)->row();
    $ibu = $this->m_penduduk->tampil_penduduk_id($kematian->nik_ibu)->row();
    $ayah = $this->m_penduduk->tampil_penduduk_id($kematian->nik_ayah)->row();
    $pelapor = $this->m_penduduk->tampil_penduduk_id($kematian->nik_pelapor)->row();
    $saksi1 = $this->m_penduduk->tampil_penduduk_id($kematian->nik_saksi1)->row();
    $saksi2 = $this->m_penduduk->tampil_penduduk_id($kematian->nik_saksi2)->row();

    if(empty($ibu)){
        $ibu = new \stdClass();
        $ibu->nama = '';
        $ibu->pekerjaan = '';
        $ibu->alamat = '';
        $ibu->kewarganegaraan = '';
    }
    if(empty($ayah)){
        $ayah = new \stdClass();
        $ayah->nama = '';
        $ayah->tanggal_lahir = '';
        $ayah->pekerjaan = '';
        $ayah->alamat = '';
        $ayah->kewarganegaraan = '';
    }
    if(empty($pelapor)){
        $pelapor = new \stdClass();
        $pelapor->nama = '';
        $pelapor->tanggal_lahir = '';
        $pelapor->pekerjaan = '';
        $pelapor->alamat = '';
        $pelapor->kewarganegaraan = '';
    }
    if(empty($saksi1)){
        $saksi1 = new \stdClass();
        $saksi1->nama = '';
        $saksi1->tanggal_lahir = '';
        $saksi1->pekerjaan = '';
        $saksi1->alamat = '';
        $saksi1->kewarganegaraan = '';
    }
    if(empty($saksi2)){
        $saksi2 = new \stdClass();
        $saksi2->nama = '';
        $saksi2->tanggal_lahir = '';
        $saksi2->pekerjaan = '';
        $saksi2->alamat = '';
        $saksi2->kewarganegaraan = '';
    }

    function pecah_string($string){
        $data = str_split($string);
        return $data;
    }
    function tanggal_indo($tanggal){
        $bulan = array (1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
        }

        $html = '
    <!DOCTYPE html>
<html>
<head>
</head>
<body>
    <div class="kode">Kode . F-2.29</div>
    <table>
        <tr>
            <td class="label">Pemerintah Desa/Kelurahan</td>
            <td>:</td>
            <td>DESA GURINDA</td>
        </tr>
        <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td>MEPANGA</td>
        </tr>
        <tr>
            <td>Kabupaten/Kota</td>
            <td>:</td>
            <td>PARIGI MOUTONG</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">Kode Wilayah</td>
            <td>:</td>
            <td class="kotak">7</td>
            <td class="kotak">2</td>
            <td class="kotak">0</td>
            <td class="kotak">8</td>
            <td class="kotak">1</td>
            <td class="kotak">2</td>
            <td class="kotak">0</td>
            <td class="kotak">0</td>
            <td class="kotak">1</td>
            <td class="kotak">7</td>
        </tr>
    </table>
    <h4>SURAT KETERANGAN KEMATIAN</h4>
    <table>
        <tr>
            <td class="label">Nama Kepala Keluarga</td>
            <td>:</td>';
            $nama_kk = pecah_string($kk->nama);
            $i = 0;
            foreach($nama_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<21) {
            for($i=$i;$i<21;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
        <tr>
            <td class="label">Nomor Kartu Keluarga</td>
            <td>:</td></td>';
            $no_kk = pecah_string($kematian->no_kk);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<16) {
            for($i=$i;$i<16;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <div class="bingkai">
    <h5>JENAZAH</h5>
    <table>
        <tr>
            <td class="label">1. NIK</td>
            <td>:</td>';
            $no_kk = pecah_string($kematian->nik);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<16) {
            for($i=$i;$i<16;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">2. Nama Lengkap</td>
            <td>:</td>';
            $no_kk = pecah_string($jenazah->nama);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<32) {
            for($i=$i;$i<32;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">3. Jenis Kelamin</td>
            <td>:</td>';

            if($jenazah->jenis_kelamin == 'l') $jenis_kelamin = '1'; else $jenis_kelamin = '2';
            $html .= '<td class="kotak">'.$jenis_kelamin.'</td>';
            $html .= '<td style="width:100">1. Laki-Laki</td>
            <td>2. Perempuan</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">4. Tanggal Lahir / Umur</td>
            <td>:</td>';
            $html .= '<td style="width:30.5;">Tgl</td>';
            $no_kk = pecah_string(date('d',strtotime($jenazah->tanggal_lahir)));
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30.5">Bln</td>';
            $no_kk = pecah_string(date('m',strtotime($jenazah->tanggal_lahir)));
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30.5">Thn</td>';
            $no_kk = pecah_string(date('Y',strtotime($jenazah->tanggal_lahir)));
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30.5">Umur</td>';
            $biday_jenazah = new DateTime($jenazah->tanggal_lahir);
            $umur_jenazah = $today->diff($biday_jenazah);
            $no_kk = pecah_string($umur_jenazah->y);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<3) {
            for($i=$i;$i<3;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">5. Tempat Lahir</td>
            <td>:</td>';
            $no_kk = pecah_string($jenazah->tempat_lahir);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<20) {
            for($i=$i;$i<20;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">6. Agama</td>
            <td>:</td>
            <td class="kotak">'.$jenazah->agama.'</td>';
            $html .= '<td style="width:100">1. Islam</td>
            <td style="width:100">2. Kristen</td>
            <td style="width:100">3. Katholik</td>
            <td style="width:100">4. Hindu</td>
            <td>5. Budha</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">7. Pekerjaan</td>
            <td>:</td>';
            if($jenazah->pekerjaan == 'Tidak Bekerja') $jenazah_pekerjaan = '1'; 
            elseif($jenazah->pekerjaan == 'Mengurus Rumah Tangga') $jenazah_pekerjaan = '2';
            elseif($jenazah->pekerjaan == 'Pelajar/Mahasiswa') $jenazah_pekerjaan = '3';
            elseif($jenazah->pekerjaan == 'Pegawai Negeri Sipil') $jenazah_pekerjaan = '4';
            elseif($jenazah->pekerjaan == 'TNI/POLRI') $jenazah_pekerjaan = '5';
            elseif($jenazah->pekerjaan == 'Pensiunan') $jenazah_pekerjaan = '6';
            elseif($jenazah->pekerjaan == 'Karyawan Swasta') $jenazah_pekerjaan = '7';
            elseif($jenazah->pekerjaan == 'Wiraswasta') $jenazah_pekerjaan = '8';
            elseif($jenazah->pekerjaan == 'Petani/Peternak') $jenazah_pekerjaan = '9';
            elseif($jenazah->pekerjaan == 'Buruh') $jenazah_pekerjaan = '10';
            elseif($jenazah->pekerjaan == 'Lain-Lain') $jenazah_pekerjaan = '11';
            $html .= '<td class="kotak">'.$jenazah_pekerjaan.'</td>';
            if ($jenazah_pekerjaan<2) $html .= '<td class="kotak"></td>';
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">8. Alamat</td>
            <td>:</td>
            <td class="kotak left" style="width:470px">'.$jenazah->alamat.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">a. Desa/Kelurahan</td>
            <td class="kotak left" style="width:130px"> GURINDA</td>
            <td style="width:80px">c. Kab/Kota</td>
            <td class="kotak left" style="width:130px">PARIGI MOUTONG</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">b. Kecamatan</td>
            <td class="kotak left" style="width:130px">MEPANGAN</td>
            <td style="width:80px">d. Provinsi</td>
            <td class="kotak left" style="width:130px">SULAWESI TENGAH</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">9. Anak ke</td>
            <td>:</td>
            <td class="kotak">'.$kematian->anak_ke.'</td>
            <td style="width:20">1.</td>
            <td style="width:20">2.</td>
            <td style="width:20">3.</td>
            <td style="width:20">4.</td>
            <td style="width:20">.....</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">10. Tanggal Kematian</td>
            <td>:</td>';
            $html .= '<td style="width:30.5;">Tgl</td>';
            $no_kk = pecah_string(date('d',strtotime($kematian->tanggal_kematian)));
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30.5">Bln</td>';
            $no_kk = pecah_string(date('m',strtotime($kematian->tanggal_kematian)));
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30.5">Thn</td>';
            $no_kk = pecah_string(date('Y',strtotime($kematian->tanggal_kematian)));
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">11. Pukul</td>
            <td>:</td>';
            $no_kk = pecah_string(date('Hi',strtotime($kematian->jam_kematian)));
            $i = 0;
            foreach($no_kk as $n_k){
            if($i==2) $html .= '<td>:</td>';
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<4) {
            for($i=$i;$i<4;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">12. Sebab Kematian</td>
            <td>:</td>';

            if($kematian->sebab == 'Sakit Keras / Tua') $sebab = '1'; 
            elseif($kematian->sebab == 'Wabah Penyakit') $sebab = '2';
            elseif($kematian->sebab == 'Kriminalitas') $sebab = '3';
            elseif($kematian->sebab == 'Bunuh Diri') $sebab = '4';
            elseif($kematian->sebab == 'Kecelakaan') $sebab = '5';
            elseif($kematian->sebab == 'Lainnya') $sebab = '6';
            $html .= '<td class="kotak">'.$sebab.'</td>';
            $html .= '<td style="width:100">1. Sakit Keras / Tua</td>
            <td style="width:100">2. Wabah Penyakit</td>
            <td style="width:100">3. Kriminalitas</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:20"></td>
            <td style="width:100">4. Bunuh Diri</td>
            <td style="width:100">5. Kecelakaan</td>
            <td style="width:100">6. Lainnya</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">13. Tempat Kematian</td>
            <td>:</td>';
            $no_kk = pecah_string($kematian->tempat_kematian);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<20) {
            for($i=$i;$i<20;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">14. Yang Menerangkan</td>
            <td>:</td>';

            if($kematian->menerangkan == 'Dokter') $menerangkan = '1'; 
            elseif($kematian->menerangkan == 'Tenaga Kesehatan') $menerangkan = '2';
            elseif($kematian->menerangkan == 'Kepolisian') $menerangkan = '3';
            elseif($kematian->menerangkan == 'Lainnya') $menerangkan = '4';
            $html .= '<td class="kotak">'.$menerangkan.'</td>';
            $html .= '<td style="width:100">1. Dokter</td>
            <td style="width:120">2. Tenaga Kesehatan</td>
            <td style="width:100">3. Kepolisian</td>
            <td style="width:100">4. Lainnya</td>
        </tr>
    </table>
    </div>
    <div class="bingkai">
    <h5>IBU</h5>
    <table>
        <tr>
            <td class="label">1. NIK</td>
            <td>:</td>';
            $no_kk = pecah_string($kematian->nik_ibu);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<16) {
            for($i=$i;$i<16;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">2. Nama Lengkap</td>
            <td>:</td>';
            $nama_kk = pecah_string($ibu->nama);
            $i = 0;
            foreach($nama_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<32) {
            for($i=$i;$i<32;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">3. Tanggal Lahir / Umur</td>
            <td>:</td>';
            $html .= '<td style="width:30.5;">Tgl</td>';
            if(!empty($ibu->tanggal_lahir)){
            $no_kk = pecah_string(date('d',strtotime($ibu->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Bln</td>';
            if(!empty($ibu->tanggal_lahir)){
            $no_kk = pecah_string(date('m',strtotime($ibu->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Thn</td>';
            if(!empty($ibu->tanggal_lahir)){
            $no_kk = pecah_string(date('Y',strtotime($ibu->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<4) {
            for($i=$i;$i<4;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Umur</td>';
            if(!empty($ibu->tanggal_lahir)){
            $biday_ibu = new DateTime($ibu->tanggal_lahir);
            $umur_ibu = $today->diff($biday_ibu);
            $no_kk = pecah_string($umur_ibu->y);}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<3) {
            for($i=$i;$i<3;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">4. Pekerjaan</td>
            <td>:</td>';
            if($ibu->pekerjaan == 'Tidak Bekerja') $ibu_pekerjaan = '1'; 
            elseif($ibu->pekerjaan == 'Mengurus Rumah Tangga') $ibu_pekerjaan = '2';
            elseif($ibu->pekerjaan == 'Pelajar/Mahasiswa') $ibu_pekerjaan = '3';
            elseif($ibu->pekerjaan == 'Pegawai Negeri Sipil') $ibu_pekerjaan = '4';
            elseif($ibu->pekerjaan == 'TNI/POLRI') $ibu_pekerjaan = '5';
            elseif($ibu->pekerjaan == 'Pensiunan') $ibu_pekerjaan = '6';
            elseif($ibu->pekerjaan == 'Karyawan Swasta') $ibu_pekerjaan = '7';
            elseif($ibu->pekerjaan == 'Wiraswasta') $ibu_pekerjaan = '8';
            elseif($ibu->pekerjaan == 'Petani/Peternak') $ibu_pekerjaan = '9';
            elseif($ibu->pekerjaan == 'Buruh') $ibu_pekerjaan = '10';
            elseif($ibu->pekerjaan == 'Lain-Lain') $ibu_pekerjaan = '11';
            else $ibu_pekerjaan = '';
            $html .= '<td class="kotak">'.$ibu_pekerjaan.'</td>';
            if ($ibu_pekerjaan<2) $html .= '<td class="kotak"></td>';
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">5. Alamat</td>
            <td>:</td>
            <td class="kotak left" style="width:470px">'.$ibu->alamat.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">a. Desa/Kelurahan</td>';
            if($ibu->alamat == '') $temp_desa = '';
            else $temp_desa = $desa;
            $html .='<td class="kotak left" style="width:130px">'.$temp_desa.'</td>
            <td style="width:80px">c. Kab/Kota</td>';
            if($ibu->alamat == '') $temp_kab = '';
            else $temp_kab = $kab;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kab.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">b. Kecamatan</td>';
            if($ibu->alamat == '') $temp_kec = '';
            else $temp_kec = $kec;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kec.'</td>
            <td style="width:80px">d. Provinsi</td>';
            if($ibu->alamat == '') $temp_prov = '';
            else $temp_prov = $prov;
            $html .='<td class="kotak left" style="width:130px">'.$temp_prov.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">6. Kewarganegaraan</td>
            <td>:</td>';
            if($ibu->kewarganegaraan=='Warga Negara Indonesia') $ibu_kewarganegaraan = '1';
            else $ibu_kewarganegaraan = '';
            $html .= '<td class="kotak">'.$ibu_kewarganegaraan.'</td>
            <td>1. WNI 2. WNA</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">7. Kebangsaan</td>
            <td>:</td>';
            if($ibu->alamat == '') $temp_kebang = '';
            else $temp_kebang = $kebang;
            $html .='<td class="kotak left" style="width:181px">'.$temp_kebang.'</td>
        </tr>
    </table>';
    $html .= '</div>
    <div class="bingkai">
    <h5>AYAH</h5>
    <table>
        <tr>
            <td class="label">1. NIK</td>
            <td>:</td>';
            $no_kk = pecah_string($kematian->nik_ayah);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<16) {
            for($i=$i;$i<16;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">2. Nama Lengkap</td>
            <td>:</td>';
            $nama_kk = pecah_string($ayah->nama);
            $i = 0;
            foreach($nama_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<32) {
            for($i=$i;$i<32;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">3. Tanggal Lahir / Umur</td>
            <td>:</td>';
            $html .= '<td style="width:30.5;">Tgl</td>';
            if ($ayah->tanggal_lahir){
            $no_kk = pecah_string(date('d',strtotime($ayah->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Bln</td>';
            if ($ayah->tanggal_lahir){
            $no_kk = pecah_string(date('m',strtotime($ayah->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Thn</td>';
            if(!empty($ayah->tanggal_lahir)){
            $no_kk = pecah_string(date('Y',strtotime($ayah->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<4) {
            for($i=$i;$i<4;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Umur</td>';
            if(!empty($ayah->tanggal_lahir)){
            $biday_ayah = new DateTime($ayah->tanggal_lahir);
            $umur_ayah = $today->diff($biday_ayah);
            $no_kk = pecah_string($umur_ayah->y);}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<3) {
            for($i=$i;$i<3;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">4. Pekerjaan</td>
            <td>:</td>';
            if($ayah->pekerjaan == 'Tidak Bekerja') $ayah_pekerjaan = '1'; 
            elseif($ayah->pekerjaan == 'Mengurus Rumah Tangga') $ayah_pekerjaan = '2';
            elseif($ayah->pekerjaan == 'Pelajar/Mahasiswa') $ayah_pekerjaan = '3';
            elseif($ayah->pekerjaan == 'Pegawai Negeri Sipil') $ayah_pekerjaan = '4';
            elseif($ayah->pekerjaan == 'TNI/POLRI') $ayah_pekerjaan = '5';
            elseif($ayah->pekerjaan == 'Pensiunan') $ayah_pekerjaan = '6';
            elseif($ayah->pekerjaan == 'Karyawan Swasta') $ayah_pekerjaan = '7';
            elseif($ayah->pekerjaan == 'Wiraswasta') $ayah_pekerjaan = '8';
            elseif($ayah->pekerjaan == 'Petani/Peternak') $ayah_pekerjaan = '9';
            elseif($ayah->pekerjaan == 'Buruh') $ayah_pekerjaan = '10';
            elseif($ayah->pekerjaan == 'Lain-Lain') $ayah_pekerjaan = '11';
            else $ayah_pekerjaan = '';
            $html .= '<td class="kotak">'.$ayah_pekerjaan.'</td>';
            if ($ayah_pekerjaan<2) $html .= '<td class="kotak"></td>';
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">5. Alamat</td>
            <td>:</td>
            <td class="kotak left" style="width:470px">'.$ayah->alamat.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">a. Desa/Kelurahan</td>';
            if($ayah->alamat == '') $temp_desa = '';
            else $temp_desa = $desa;
            $html .='<td class="kotak left" style="width:130px">'.$temp_desa.'</td>
            <td style="width:80px">c. Kab/Kota</td>';
            if($ayah->alamat == '') $temp_kab = '';
            else $temp_kab = $kab;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kab.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">b. Kecamatan</td>';
            if($ayah->alamat == '') $temp_kec = '';
            else $temp_kec = $kec;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kec.'</td>
            <td style="width:80px">d. Provinsi</td>';
            if($ayah->alamat == '') $temp_prov = '';
            else $temp_prov = $prov;
            $html .='<td class="kotak left" style="width:130px">'.$temp_prov.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">6. Kewarganegaraan</td>
            <td>:</td>';
            if($ayah->kewarganegaraan=='Warga Negara Indonesia') $ayah_kewarganegaraan = '1';
            else $ayah_kewarganegaraan = '';
            $html .= '<td class="kotak">'.$ayah_kewarganegaraan.'</td>
            <td>1. WNI 2. WNA</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">7. Kebangsaan</td>
            <td>:</td>';
            if($ayah->alamat == '') $temp_kebang = '';
            else $temp_kebang = $kebang;
            $html .='<td class="kotak left" style="width:181px">'.$temp_kebang.'</td>
        </tr>
    </table>
    </div>
    
    <div class="bingkai">
    <h5>PELAPOR</h5>
    <table>
        <tr>
            <td class="label">1. NIK</td>
            <td>:</td>';
            $no_kk = pecah_string($kematian->nik_pelapor);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<16) {
            for($i=$i;$i<16;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">2. Nama Lengkap</td>
            <td>:</td>';
            $nama_kk = pecah_string($pelapor->nama);
            $i = 0;
            foreach($nama_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<32) {
            for($i=$i;$i<32;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">3. Tanggal Lahir / Umur</td>
            <td>:</td>';
            $html .= '<td style="width:30.5;">Tgl</td>';
            if ($pelapor->tanggal_lahir){
            $no_kk = pecah_string(date('d',strtotime($pelapor->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Bln</td>';
            if ($pelapor->tanggal_lahir){
            $no_kk = pecah_string(date('m',strtotime($pelapor->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Thn</td>';
            if(!empty($pelapor->tanggal_lahir)){
            $no_kk = pecah_string(date('Y',strtotime($pelapor->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<4) {
            for($i=$i;$i<4;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Umur</td>';
            if(!empty($pelapor->tanggal_lahir)){
            $biday_pelapor = new DateTime($pelapor->tanggal_lahir);
            $umur_pelapor = $today->diff($biday_pelapor);
            $no_kk = pecah_string($umur_pelapor->y);}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<3) {
            for($i=$i;$i<3;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">4. Pekerjaan</td>
            <td>:</td>';
            if($pelapor->pekerjaan == 'Tidak Bekerja') $pelapor_pekerjaan = '1'; 
            elseif($pelapor->pekerjaan == 'Mengurus Rumah Tangga') $pelapor_pekerjaan = '2';
            elseif($pelapor->pekerjaan == 'Pelajar/Mahasiswa') $pelapor_pekerjaan = '3';
            elseif($pelapor->pekerjaan == 'Pegawai Negeri Sipil') $pelapor_pekerjaan = '4';
            elseif($pelapor->pekerjaan == 'TNI/POLRI') $pelapor_pekerjaan = '5';
            elseif($pelapor->pekerjaan == 'Pensiunan') $pelapor_pekerjaan = '6';
            elseif($pelapor->pekerjaan == 'Karyawan Swasta') $pelapor_pekerjaan = '7';
            elseif($pelapor->pekerjaan == 'Wiraswasta') $pelapor_pekerjaan = '8';
            elseif($pelapor->pekerjaan == 'Petani/Peternak') $pelapor_pekerjaan = '9';
            elseif($pelapor->pekerjaan == 'Buruh') $pelapor_pekerjaan = '10';
            elseif($pelapor->pekerjaan == 'Lain-Lain') $pelapor_pekerjaan = '11';
            else $pelapor_pekerjaan = '';
            $html .= '<td class="kotak">'.$pelapor_pekerjaan.'</td>';
            if ($pelapor_pekerjaan<2) $html .= '<td class="kotak"></td>';
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">5. Alamat</td>
            <td>:</td>
            <td class="kotak left" style="width:470px">'.$pelapor->alamat.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">a. Desa/Kelurahan</td>';
            if($pelapor->alamat == '') $temp_desa = '';
            else $temp_desa = $desa;
            $html .='<td class="kotak left" style="width:130px">'.$temp_desa.'</td>
            <td style="width:80px">c. Kab/Kota</td>';
            if($pelapor->alamat == '') $temp_kab = '';
            else $temp_kab = $kab;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kab.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">b. Kecamatan</td>';
            if($pelapor->alamat == '') $temp_kec = '';
            else $temp_kec = $kec;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kec.'</td>
            <td style="width:80px">d. Provinsi</td>';
            if($pelapor->alamat == '') $temp_prov = '';
            else $temp_prov = $prov;
            $html .='<td class="kotak left" style="width:130px">'.$temp_prov.'</td>
        </tr>
    </table>
    </div>
    <div class="bingkai">
    <h5>SAKSI I</h5>
    <table>
        <tr>
            <td class="label">1. NIK</td>
            <td>:</td>';
            $no_kk = pecah_string($kematian->nik_saksi1);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<16) {
            for($i=$i;$i<16;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">2. Nama Lengkap</td>
            <td>:</td>';
            $nama_kk = pecah_string($saksi1->nama);
            $i = 0;
            foreach($nama_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<32) {
            for($i=$i;$i<32;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">3. Tanggal Lahir / Umur</td>
            <td>:</td>';
            $html .= '<td style="width:30.5;">Tgl</td>';
            if ($saksi1->tanggal_lahir){
            $no_kk = pecah_string(date('d',strtotime($saksi1->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Bln</td>';
            if ($saksi1->tanggal_lahir){
            $no_kk = pecah_string(date('m',strtotime($saksi1->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Thn</td>';
            if(!empty($saksi1->tanggal_lahir)){
            $no_kk = pecah_string(date('Y',strtotime($saksi1->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<4) {
            for($i=$i;$i<4;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Umur</td>';
            if(!empty($saksi1->tanggal_lahir)){
            $biday_saksi1 = new DateTime($saksi1->tanggal_lahir);
            $umur_saksi1 = $today->diff($biday_saksi1);
            $no_kk = pecah_string($umur_saksi1->y);}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<3) {
            for($i=$i;$i<3;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">4. Pekerjaan</td>
            <td>:</td>';
            if($saksi1->pekerjaan == 'Tidak Bekerja') $saksi1_pekerjaan = '1'; 
            elseif($saksi1->pekerjaan == 'Mengurus Rumah Tangga') $saksi1_pekerjaan = '2';
            elseif($saksi1->pekerjaan == 'Pelajar/Mahasiswa') $saksi1_pekerjaan = '3';
            elseif($saksi1->pekerjaan == 'Pegawai Negeri Sipil') $saksi1_pekerjaan = '4';
            elseif($saksi1->pekerjaan == 'TNI/POLRI') $saksi1_pekerjaan = '5';
            elseif($saksi1->pekerjaan == 'Pensiunan') $saksi1_pekerjaan = '6';
            elseif($saksi1->pekerjaan == 'Karyawan Swasta') $saksi1_pekerjaan = '7';
            elseif($saksi1->pekerjaan == 'Wiraswasta') $saksi1_pekerjaan = '8';
            elseif($saksi1->pekerjaan == 'Petani/Peternak') $saksi1_pekerjaan = '9';
            elseif($saksi1->pekerjaan == 'Buruh') $saksi1_pekerjaan = '10';
            elseif($saksi1->pekerjaan == 'Lain-Lain') $saksi1_pekerjaan = '11';
            else $saksi1_pekerjaan = '';
            $html .= '<td class="kotak">'.$saksi1_pekerjaan.'</td>';
            if ($saksi1_pekerjaan<2) $html .= '<td class="kotak"></td>';
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">5. Alamat</td>
            <td>:</td>
            <td class="kotak left" style="width:470px">'.$saksi1->alamat.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">a. Desa/Kelurahan</td>';
            if($saksi1->alamat == '') $temp_desa = '';
            else $temp_desa = $desa;
            $html .='<td class="kotak left" style="width:130px">'.$temp_desa.'</td>
            <td style="width:80px">c. Kab/Kota</td>';
            if($saksi1->alamat == '') $temp_kab = '';
            else $temp_kab = $kab;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kab.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">b. Kecamatan</td>';
            if($saksi1->alamat == '') $temp_kec = '';
            else $temp_kec = $kec;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kec.'</td>
            <td style="width:80px">d. Provinsi</td>';
            if($saksi1->alamat == '') $temp_prov = '';
            else $temp_prov = $prov;
            $html .='<td class="kotak left" style="width:130px">'.$temp_prov.'</td>
        </tr>
    </table>
    </div>
    <div class="bingkai">
    <h5>SAKSI II</h5>
    <table>
        <tr>
            <td class="label">1. NIK</td>
            <td>:</td>';
            $no_kk = pecah_string($kematian->nik_saksi2);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<16) {
            for($i=$i;$i<16;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">2. Nama Lengkap</td>
            <td>:</td>';
            $nama_kk = pecah_string($saksi2->nama);
            $i = 0;
            foreach($nama_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<32) {
            for($i=$i;$i<32;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">3. Tanggal Lahir / Umur</td>
            <td>:</td>';
            $html .= '<td style="width:30.5;">Tgl</td>';
            if ($saksi2->tanggal_lahir){
            $no_kk = pecah_string(date('d',strtotime($saksi2->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Bln</td>';
            if ($saksi2->tanggal_lahir){
            $no_kk = pecah_string(date('m',strtotime($saksi2->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Thn</td>';
            if(!empty($saksi2->tanggal_lahir)){
            $no_kk = pecah_string(date('Y',strtotime($saksi2->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<4) {
            for($i=$i;$i<4;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Umur</td>';
            if(!empty($saksi2->tanggal_lahir)){
            $biday_saksi2 = new DateTime($saksi2->tanggal_lahir);
            $umur_saksi2 = $today->diff($biday_saksi2);
            $no_kk = pecah_string($umur_saksi2->y);}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<3) {
            for($i=$i;$i<3;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">4. Pekerjaan</td>
            <td>:</td>';
            if($saksi2->pekerjaan == 'Tidak Bekerja') $saksi2_pekerjaan = '1'; 
            elseif($saksi2->pekerjaan == 'Mengurus Rumah Tangga') $saksi2_pekerjaan = '2';
            elseif($saksi2->pekerjaan == 'Pelajar/Mahasiswa') $saksi2_pekerjaan = '3';
            elseif($saksi2->pekerjaan == 'Pegawai Negeri Sipil') $saksi2_pekerjaan = '4';
            elseif($saksi2->pekerjaan == 'TNI/POLRI') $saksi2_pekerjaan = '5';
            elseif($saksi2->pekerjaan == 'Pensiunan') $saksi2_pekerjaan = '6';
            elseif($saksi2->pekerjaan == 'Karyawan Swasta') $saksi2_pekerjaan = '7';
            elseif($saksi2->pekerjaan == 'Wiraswasta') $saksi2_pekerjaan = '8';
            elseif($saksi2->pekerjaan == 'Petani/Peternak') $saksi2_pekerjaan = '9';
            elseif($saksi2->pekerjaan == 'Buruh') $saksi2_pekerjaan = '10';
            elseif($saksi2->pekerjaan == 'Lain-Lain') $saksi2_pekerjaan = '11';
            else $saksi2_pekerjaan = '';
            $html .= '<td class="kotak">'.$saksi2_pekerjaan.'</td>';
            if ($saksi2_pekerjaan<2) $html .= '<td class="kotak"></td>';
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">5. Alamat</td>
            <td>:</td>
            <td class="kotak left" style="width:470px">'.$saksi2->alamat.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">a. Desa/Kelurahan</td>';
            if($saksi2->alamat == '') $temp_desa = '';
            else $temp_desa = $desa;
            $html .='<td class="kotak left" style="width:130px">'.$temp_desa.'</td>
            <td style="width:80px">c. Kab/Kota</td>';
            if($saksi2->alamat == '') $temp_kab = '';
            else $temp_kab = $kab;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kab.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">b. Kecamatan</td>';
            if($saksi2->alamat == '') $temp_kec = '';
            else $temp_kec = $kec;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kec.'</td>
            <td style="width:80px">d. Provinsi</td>';
            if($saksi2->alamat == '') $temp_prov = '';
            else $temp_prov = $prov;
            $html .='<td class="kotak left" style="width:130px">'.$temp_prov.'</td>
        </tr>
    </table>
    </div>
    <div class="col12">
        <div class="col6">
        <p>Mengetahui :</p>
        <p>Kepala Desa/Lurah :</p>
        <p class="ttd_bawah">( RUHDIN )</p>
        </div>
        <div class="col6" style="text-align:left;">
        <p>Gurinda, '. tanggal_indo(date('Y-m-d')).'</p>
        <p>Pelapor</p>
        <p class="ttd_bawah">( '.$pelapor->nama.' )</p>
        </div>
    </div>
</body>
</html>
    ';
    $stylesheet = file_get_contents(base_url('style.css'));
    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

    // $mpdf->Output();
    ob_clean();
    $mpdf->Output('SURAT KEMATIAN - '.$jenazah->nama.'.pdf', 'D');;
    }

    function kelahiran($id){
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [215, 330],'margin_left' => 14,'margin_right' => 14,'margin_top' => 3,'margin_bottom' => 0,'margin_header' => 0,'margin_footer' => 0]);

    $desa = 'GURINDA';
    $kec = 'MEPANGA';
    $kab = 'PARIGI MOUTONG';
    $prov = 'SULAWESI TENGAH';
    $kebang = 'INDONESIA';
    $today = new DateTime();

    $kelahiran = $this->m_penduduk->tampil_kelahiran_id($id)->row();
    $kk = $this->m_penduduk->tampil_kepala_keluarga_id($kelahiran->no_kk)->row();
    $ibu = $this->m_penduduk->tampil_penduduk_id($kelahiran->nik_ibu)->row();
    $ayah = $this->m_penduduk->tampil_penduduk_id($kelahiran->nik_ayah)->row();
    $pelapor = $this->m_penduduk->tampil_penduduk_id($kelahiran->nik_pelapor)->row();
    $saksi1 = $this->m_penduduk->tampil_penduduk_id($kelahiran->nik_saksi1)->row();
    $saksi2 = $this->m_penduduk->tampil_penduduk_id($kelahiran->nik_saksi2)->row();

    if(empty($ibu)){
        $ibu = new \stdClass();
        $ibu->nama = '';
        $ibu->pekerjaan = '';
        $ibu->alamat = '';
        $ibu->kewarganegaraan = '';
    }
    if(empty($ayah)){
        $ayah = new \stdClass();
        $ayah->nama = '';
        $ayah->tanggal_lahir = '';
        $ayah->pekerjaan = '';
        $ayah->alamat = '';
        $ayah->kewarganegaraan = '';
    }
    if(empty($pelapor)){
        $pelapor = new \stdClass();
        $pelapor->nama = '';
        $pelapor->tanggal_lahir = '';
        $pelapor->pekerjaan = '';
        $pelapor->alamat = '';
        $pelapor->kewarganegaraan = '';
    }
    if(empty($saksi1)){
        $saksi1 = new \stdClass();
        $saksi1->nama = '';
        $saksi1->tanggal_lahir = '';
        $saksi1->pekerjaan = '';
        $saksi1->alamat = '';
        $saksi1->kewarganegaraan = '';
    }
    if(empty($saksi2)){
        $saksi2 = new \stdClass();
        $saksi2->nama = '';
        $saksi2->tanggal_lahir = '';
        $saksi2->pekerjaan = '';
        $saksi2->alamat = '';
        $saksi2->kewarganegaraan = '';
    }
    
    function pecah_string($string){
        $data = str_split($string);
        return $data;
    }
    function tanggal_indo($tanggal){
        $bulan = array (1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }

    $html = '
    <!DOCTYPE html>
<html>
<head>
</head>
<body>
    <div class="kode">Kode . F-2.01</div>
    <table>
        <tr>
            <td class="label">Pemerintah Desa/Kelurahan</td>
            <td>:</td>
            <td>DESA GURINDA</td>
        </tr>
        <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td>MEPANGA</td>
        </tr>
        <tr>
            <td>Kabupaten/Kota</td>
            <td>:</td>
            <td>PARIGI MOUTONG</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">Kode Wilayah</td>
            <td>:</td>
            <td class="kotak">7</td>
            <td class="kotak">2</td>
            <td class="kotak">0</td>
            <td class="kotak">8</td>
            <td class="kotak">1</td>
            <td class="kotak">2</td>
            <td class="kotak">0</td>
            <td class="kotak">0</td>
            <td class="kotak">1</td>
            <td class="kotak">7</td>
        </tr>
    </table>
    <h4>SURAT KETERANGAN KELAHIRAN</h4>
    <table>
        <tr>
            <td class="label">Nama Kepala Keluarga</td>
            <td>:</td>';
            $nama_kk = pecah_string($kk->nama);
            $i = 0;
            foreach($nama_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<21) {
            for($i=$i;$i<21;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
        <tr>
            <td class="label">Nomor Kartu Keluarga</td>
            <td>:</td></td>';
            $no_kk = pecah_string($kelahiran->no_kk);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<16) {
            for($i=$i;$i<16;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <div class="bingkai">
    <h5>BAYI / ANAK</h5>
    <table>
        <tr>
            <td class="label">1. Nama</td>
            <td>:</td>';
            $no_kk = pecah_string($kelahiran->nama);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<32) {
            for($i=$i;$i<32;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">2. Jenis Kelamin</td>
            <td>:</td>';

            if($kelahiran->jenis_kelamin == 'l') $jenis_kelamin = '1'; else $jenis_kelamin = '2';
            $html .= '<td class="kotak">'.$jenis_kelamin.'</td>';
            $html .= '<td style="width:100">1. Laki-Laki</td>
            <td>2. Perempuan</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">3. Tempat Dilahirkan</td>
            <td>:</td>';
            if($kelahiran->tempat_dilahirkan == 'Rumah Sakit') $tempat_dilahirkan = '1'; 
            elseif($kelahiran->tempat_dilahirkan == 'Puskesmas') $tempat_dilahirkan = '2';
            elseif($kelahiran->tempat_dilahirkan == 'Polindes') $tempat_dilahirkan = '3';
            elseif($kelahiran->tempat_dilahirkan == 'Rumah') $tempat_dilahirkan = '4';
            elseif($kelahiran->tempat_dilahirkan == 'Lainnya') $tempat_dilahirkan = '5';
            $html .= '<td class="kotak">'.$tempat_dilahirkan.'</td>';
            $html .= '<td style="width:100">1. RS/RB</td>
            <td style="width:100">2. Puskesmas</td>
            <td style="width:100">3. Polindes</td>
            <td style="width:100">4. Rumah</td>
            <td>5. Lainnya</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">4. Tempat Kelahiran</td>
            <td>:</td>';
            $no_kk = pecah_string($kelahiran->tempat_lahir);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<20) {
            for($i=$i;$i<20;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">5. Hari dan Tanggal Lahir</td>
            <td>:</td>
            <td style="width:30.5;">Hari</td>';
            $no_kk = pecah_string($kelahiran->hari_lahir);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<6) {
            for($i=$i;$i<6;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30.5;">Tgl</td>';
            $no_kk = pecah_string(date('d',strtotime($kelahiran->tanggal_lahir)));
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30.5">Bln</td>';
            $no_kk = pecah_string(date('m',strtotime($kelahiran->tanggal_lahir)));
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30.5">Thn</td>';
            $no_kk = pecah_string(date('Y',strtotime($kelahiran->tanggal_lahir)));
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">6. Pukul</td>
            <td>:</td>';
            $no_kk = pecah_string(date('Hi',strtotime($kelahiran->jam_lahir)));
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<4) {
            for($i=$i;$i<4;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">7. Jenis Kelahiran</td>
            <td>:</td>';
            if($kelahiran->jenis_kelahiran == 'Tunggal') $jenis_kelahiran = '1'; 
            elseif($kelahiran->jenis_kelahiran == 'Kembar 2') $jenis_kelahiran = '2';
            elseif($kelahiran->jenis_kelahiran == 'Kembar 3') $jenis_kelahiran = '3';
            elseif($kelahiran->jenis_kelahiran == 'Kembar 4') $jenis_kelahiran = '4';
            $html .= '<td class="kotak">'.$jenis_kelahiran.'</td>';
            $html .= '<td style="width:100">1. Tunggal</td>
            <td style="width:100">2. Kembar 2</td>
            <td style="width:100">3. Kembar 3</td>
            <td style="width:100">4. Kembar 4</td>
            <td >5. Lainnya</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">8. Kelahiran ke</td>
            <td>:</td>
            <td class="kotak">'.$kelahiran->kelahiran_ke.'</td>
            <td style="width:20">1.</td>
            <td style="width:20">2.</td>
            <td style="width:20">3.</td>
            <td style="width:20">4.</td>
            <td style="width:20">.....</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">9. Penolong Kelahiran</td>
            <td>:</td>';

            if($kelahiran->penolong == 'Dokter') $penolong = '1'; 
            elseif($kelahiran->penolong == 'Bidan/Perawat') $penolong = '2';
            elseif($kelahiran->penolong == 'Dukun') $penolong = '3';
            elseif($kelahiran->penolong == 'Lainnya') $penolong = '4';
            $html .= '<td class="kotak">'.$penolong.'</td>';
            $html .= '<td style="width:100">1. Dokter</td>
            <td style="width:100">2. Bidan/Perawat</td>
            <td style="width:100">3. Dukun</td>
            <td style="width:100">4. Lainnya</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">10. Berat Bayi</td>
            <td>:</td>
            <td class="kotak left" style="width:30px">'.$kelahiran->berat.'</td>
            <td>Kg</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">11. Panjang Bayi</td>
            <td>:</td>';
            $no_kk = pecah_string($kelahiran->panjang);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
         $html .= '<td>Cm</td>
        </tr>
    </table>
    </div>
    <div class="bingkai">
    <h5>IBU</h5>
    <table>
        <tr>
            <td class="label">1. NIK</td>
            <td>:</td>';
            $no_kk = pecah_string($kelahiran->nik_ibu);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<16) {
            for($i=$i;$i<16;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">2. Nama Lengkap</td>
            <td>:</td>';
            $nama_kk = pecah_string($ibu->nama);
            $i = 0;
            foreach($nama_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<32) {
            for($i=$i;$i<32;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">3. Tanggal Lahir / Umur</td>
            <td>:</td>';
            $html .= '<td style="width:30.5;">Tgl</td>';
            if(!empty($ibu->tanggal_lahir)){
            $no_kk = pecah_string(date('d',strtotime($ibu->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Bln</td>';
            if(!empty($ibu->tanggal_lahir)){
            $no_kk = pecah_string(date('m',strtotime($ibu->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Thn</td>';
            if(!empty($ibu->tanggal_lahir)){
            $no_kk = pecah_string(date('Y',strtotime($ibu->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<4) {
            for($i=$i;$i<4;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Umur</td>';
            if(!empty($ibu->tanggal_lahir)){
            $biday_ibu = new DateTime($ibu->tanggal_lahir);
            $umur_ibu = $today->diff($biday_ibu);
            $no_kk = pecah_string($umur_ibu->y);}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<3) {
            for($i=$i;$i<3;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">4. Pekerjaan</td>
            <td>:</td>';
            if($ibu->pekerjaan == 'Tidak Bekerja') $ibu_pekerjaan = '1'; 
            elseif($ibu->pekerjaan == 'Mengurus Rumah Tangga') $ibu_pekerjaan = '2';
            elseif($ibu->pekerjaan == 'Pelajar/Mahasiswa') $ibu_pekerjaan = '3';
            elseif($ibu->pekerjaan == 'Pegawai Negeri Sipil') $ibu_pekerjaan = '4';
            elseif($ibu->pekerjaan == 'TNI/POLRI') $ibu_pekerjaan = '5';
            elseif($ibu->pekerjaan == 'Pensiunan') $ibu_pekerjaan = '6';
            elseif($ibu->pekerjaan == 'Karyawan Swasta') $ibu_pekerjaan = '7';
            elseif($ibu->pekerjaan == 'Wiraswasta') $ibu_pekerjaan = '8';
            elseif($ibu->pekerjaan == 'Petani/Peternak') $ibu_pekerjaan = '9';
            elseif($ibu->pekerjaan == 'Buruh') $ibu_pekerjaan = '10';
            elseif($ibu->pekerjaan == 'Lain-Lain') $ibu_pekerjaan = '11';
            else $ibu_pekerjaan = '';
            $html .= '<td class="kotak">'.$ibu_pekerjaan.'</td>';
            if ($ibu_pekerjaan<2) $html .= '<td class="kotak"></td>';
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">5. Alamat</td>
            <td>:</td>
            <td class="kotak left" style="width:470px">'.$ibu->alamat.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">a. Desa/Kelurahan</td>';
            if($ibu->alamat == '') $temp_desa = '';
            else $temp_desa = $desa;
            $html .='<td class="kotak left" style="width:130px">'.$temp_desa.'</td>
            <td style="width:80px">c. Kab/Kota</td>';
            if($ibu->alamat == '') $temp_kab = '';
            else $temp_kab = $kab;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kab.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">b. Kecamatan</td>';
            if($ibu->alamat == '') $temp_kec = '';
            else $temp_kec = $kec;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kec.'</td>
            <td style="width:80px">d. Provinsi</td>';
            if($ibu->alamat == '') $temp_prov = '';
            else $temp_prov = $prov;
            $html .='<td class="kotak left" style="width:130px">'.$temp_prov.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">6. Kewarganegaraan</td>
            <td>:</td>';
            if($ibu->kewarganegaraan=='Warga Negara Indonesia') $ibu_kewarganegaraan = '1';
            else $ibu_kewarganegaraan = '';
            $html .= '<td class="kotak">'.$ibu_kewarganegaraan.'</td>
            <td>1. WNI 2. WNA</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">7. Kebangsaan</td>
            <td>:</td>';
            if($ibu->alamat == '') $temp_kebang = '';
            else $temp_kebang = $kebang;
            $html .='<td class="kotak left" style="width:181px">'.$temp_kebang.'</td>
        </tr>
    </table>';
    if($ibu->nama != ''){
    $html .= '<table>
        <tr>
            <td class="label">8. Tgl Pencatatan Perkawinan</td>
            <td>:</td>';
            $html .= '<td style="width:30.5;">Tgl</td>';
            $no_kk = pecah_string(date('d',strtotime($kelahiran->tanggal_perkawinan)));
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30.5">Bln</td>';
            $no_kk = pecah_string(date('m',strtotime($kelahiran->tanggal_perkawinan)));
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30.5">Thn</td>';
            $no_kk = pecah_string(date('Y',strtotime($kelahiran->tanggal_perkawinan)));
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '</tr>
    </table>';
    }
    $html .= '</div>
    <div class="bingkai">
    <h5>AYAH</h5>
    <table>
        <tr>
            <td class="label">1. NIK</td>
            <td>:</td>';
            $no_kk = pecah_string($kelahiran->nik_ayah);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<16) {
            for($i=$i;$i<16;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">2. Nama Lengkap</td>
            <td>:</td>';
            $nama_kk = pecah_string($ayah->nama);
            $i = 0;
            foreach($nama_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<32) {
            for($i=$i;$i<32;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">3. Tanggal Lahir / Umur</td>
            <td>:</td>';
            $html .= '<td style="width:30.5;">Tgl</td>';
            if ($ayah->tanggal_lahir){
            $no_kk = pecah_string(date('d',strtotime($ayah->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Bln</td>';
            if ($ayah->tanggal_lahir){
            $no_kk = pecah_string(date('m',strtotime($ayah->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Thn</td>';
            if(!empty($ayah->tanggal_lahir)){
            $no_kk = pecah_string(date('Y',strtotime($ayah->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<4) {
            for($i=$i;$i<4;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Umur</td>';
            if(!empty($ayah->tanggal_lahir)){
            $biday_ayah = new DateTime($ayah->tanggal_lahir);
            $umur_ayah = $today->diff($biday_ayah);
            $no_kk = pecah_string($umur_ayah->y);}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<3) {
            for($i=$i;$i<3;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">4. Pekerjaan</td>
            <td>:</td>';
            if($ayah->pekerjaan == 'Tidak Bekerja') $ayah_pekerjaan = '1'; 
            elseif($ayah->pekerjaan == 'Mengurus Rumah Tangga') $ayah_pekerjaan = '2';
            elseif($ayah->pekerjaan == 'Pelajar/Mahasiswa') $ayah_pekerjaan = '3';
            elseif($ayah->pekerjaan == 'Pegawai Negeri Sipil') $ayah_pekerjaan = '4';
            elseif($ayah->pekerjaan == 'TNI/POLRI') $ayah_pekerjaan = '5';
            elseif($ayah->pekerjaan == 'Pensiunan') $ayah_pekerjaan = '6';
            elseif($ayah->pekerjaan == 'Karyawan Swasta') $ayah_pekerjaan = '7';
            elseif($ayah->pekerjaan == 'Wiraswasta') $ayah_pekerjaan = '8';
            elseif($ayah->pekerjaan == 'Petani/Peternak') $ayah_pekerjaan = '9';
            elseif($ayah->pekerjaan == 'Buruh') $ayah_pekerjaan = '10';
            elseif($ayah->pekerjaan == 'Lain-Lain') $ayah_pekerjaan = '11';
            else $ayah_pekerjaan = '';
            $html .= '<td class="kotak">'.$ayah_pekerjaan.'</td>';
            if ($ayah_pekerjaan<2) $html .= '<td class="kotak"></td>';
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">5. Alamat</td>
            <td>:</td>
            <td class="kotak left" style="width:470px">'.$ayah->alamat.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">a. Desa/Kelurahan</td>';
            if($ayah->alamat == '') $temp_desa = '';
            else $temp_desa = $desa;
            $html .='<td class="kotak left" style="width:130px">'.$temp_desa.'</td>
            <td style="width:80px">c. Kab/Kota</td>';
            if($ayah->alamat == '') $temp_kab = '';
            else $temp_kab = $kab;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kab.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">b. Kecamatan</td>';
            if($ayah->alamat == '') $temp_kec = '';
            else $temp_kec = $kec;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kec.'</td>
            <td style="width:80px">d. Provinsi</td>';
            if($ayah->alamat == '') $temp_prov = '';
            else $temp_prov = $prov;
            $html .='<td class="kotak left" style="width:130px">'.$temp_prov.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">6. Kewarganegaraan</td>
            <td>:</td>';
            if($ayah->kewarganegaraan=='Warga Negara Indonesia') $ayah_kewarganegaraan = '1';
            else $ayah_kewarganegaraan = '';
            $html .= '<td class="kotak">'.$ayah_kewarganegaraan.'</td>
            <td>1. WNI 2. WNA</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label">7. Kebangsaan</td>
            <td>:</td>';
            if($ayah->alamat == '') $temp_kebang = '';
            else $temp_kebang = $kebang;
            $html .='<td class="kotak left" style="width:181px">'.$temp_kebang.'</td>
        </tr>
    </table>
    </div>
    
    <div class="bingkai">
    <h5>PELAPOR</h5>
    <table>
        <tr>
            <td class="label">1. NIK</td>
            <td>:</td>';
            $no_kk = pecah_string($kelahiran->nik_pelapor);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<16) {
            for($i=$i;$i<16;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">2. Nama Lengkap</td>
            <td>:</td>';
            $nama_kk = pecah_string($pelapor->nama);
            $i = 0;
            foreach($nama_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<32) {
            for($i=$i;$i<32;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">3. Tanggal Lahir / Umur</td>
            <td>:</td>';
            $html .= '<td style="width:30.5;">Tgl</td>';
            if ($pelapor->tanggal_lahir){
            $no_kk = pecah_string(date('d',strtotime($pelapor->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Bln</td>';
            if ($pelapor->tanggal_lahir){
            $no_kk = pecah_string(date('m',strtotime($pelapor->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Thn</td>';
            if(!empty($pelapor->tanggal_lahir)){
            $no_kk = pecah_string(date('Y',strtotime($pelapor->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<4) {
            for($i=$i;$i<4;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Umur</td>';
            if(!empty($pelapor->tanggal_lahir)){
            $biday_pelapor = new DateTime($pelapor->tanggal_lahir);
            $umur_pelapor = $today->diff($biday_pelapor);
            $no_kk = pecah_string($umur_pelapor->y);}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<3) {
            for($i=$i;$i<3;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">4. Pekerjaan</td>
            <td>:</td>';
            if($pelapor->pekerjaan == 'Tidak Bekerja') $pelapor_pekerjaan = '1'; 
            elseif($pelapor->pekerjaan == 'Mengurus Rumah Tangga') $pelapor_pekerjaan = '2';
            elseif($pelapor->pekerjaan == 'Pelajar/Mahasiswa') $pelapor_pekerjaan = '3';
            elseif($pelapor->pekerjaan == 'Pegawai Negeri Sipil') $pelapor_pekerjaan = '4';
            elseif($pelapor->pekerjaan == 'TNI/POLRI') $pelapor_pekerjaan = '5';
            elseif($pelapor->pekerjaan == 'Pensiunan') $pelapor_pekerjaan = '6';
            elseif($pelapor->pekerjaan == 'Karyawan Swasta') $pelapor_pekerjaan = '7';
            elseif($pelapor->pekerjaan == 'Wiraswasta') $pelapor_pekerjaan = '8';
            elseif($pelapor->pekerjaan == 'Petani/Peternak') $pelapor_pekerjaan = '9';
            elseif($pelapor->pekerjaan == 'Buruh') $pelapor_pekerjaan = '10';
            elseif($pelapor->pekerjaan == 'Lain-Lain') $pelapor_pekerjaan = '11';
            else $pelapor_pekerjaan = '';
            $html .= '<td class="kotak">'.$pelapor_pekerjaan.'</td>';
            if ($pelapor_pekerjaan<2) $html .= '<td class="kotak"></td>';
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">5. Alamat</td>
            <td>:</td>
            <td class="kotak left" style="width:470px">'.$pelapor->alamat.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">a. Desa/Kelurahan</td>';
            if($pelapor->alamat == '') $temp_desa = '';
            else $temp_desa = $desa;
            $html .='<td class="kotak left" style="width:130px">'.$temp_desa.'</td>
            <td style="width:80px">c. Kab/Kota</td>';
            if($pelapor->alamat == '') $temp_kab = '';
            else $temp_kab = $kab;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kab.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">b. Kecamatan</td>';
            if($pelapor->alamat == '') $temp_kec = '';
            else $temp_kec = $kec;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kec.'</td>
            <td style="width:80px">d. Provinsi</td>';
            if($pelapor->alamat == '') $temp_prov = '';
            else $temp_prov = $prov;
            $html .='<td class="kotak left" style="width:130px">'.$temp_prov.'</td>
        </tr>
    </table>
    </div>
    <div class="bingkai">
    <h5>SAKSI I</h5>
    <table>
        <tr>
            <td class="label">1. NIK</td>
            <td>:</td>';
            $no_kk = pecah_string($kelahiran->nik_saksi1);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<16) {
            for($i=$i;$i<16;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">2. Nama Lengkap</td>
            <td>:</td>';
            $nama_kk = pecah_string($saksi1->nama);
            $i = 0;
            foreach($nama_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<32) {
            for($i=$i;$i<32;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">3. Tanggal Lahir / Umur</td>
            <td>:</td>';
            $html .= '<td style="width:30.5;">Tgl</td>';
            if ($saksi1->tanggal_lahir){
            $no_kk = pecah_string(date('d',strtotime($saksi1->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Bln</td>';
            if ($saksi1->tanggal_lahir){
            $no_kk = pecah_string(date('m',strtotime($saksi1->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Thn</td>';
            if(!empty($saksi1->tanggal_lahir)){
            $no_kk = pecah_string(date('Y',strtotime($saksi1->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<4) {
            for($i=$i;$i<4;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Umur</td>';
            if(!empty($saksi1->tanggal_lahir)){
            $biday_saksi1 = new DateTime($saksi1->tanggal_lahir);
            $umur_saksi1 = $today->diff($biday_saksi1);
            $no_kk = pecah_string($umur_saksi1->y);}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<3) {
            for($i=$i;$i<3;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">4. Pekerjaan</td>
            <td>:</td>';
            if($saksi1->pekerjaan == 'Tidak Bekerja') $saksi1_pekerjaan = '1'; 
            elseif($saksi1->pekerjaan == 'Mengurus Rumah Tangga') $saksi1_pekerjaan = '2';
            elseif($saksi1->pekerjaan == 'Pelajar/Mahasiswa') $saksi1_pekerjaan = '3';
            elseif($saksi1->pekerjaan == 'Pegawai Negeri Sipil') $saksi1_pekerjaan = '4';
            elseif($saksi1->pekerjaan == 'TNI/POLRI') $saksi1_pekerjaan = '5';
            elseif($saksi1->pekerjaan == 'Pensiunan') $saksi1_pekerjaan = '6';
            elseif($saksi1->pekerjaan == 'Karyawan Swasta') $saksi1_pekerjaan = '7';
            elseif($saksi1->pekerjaan == 'Wiraswasta') $saksi1_pekerjaan = '8';
            elseif($saksi1->pekerjaan == 'Petani/Peternak') $saksi1_pekerjaan = '9';
            elseif($saksi1->pekerjaan == 'Buruh') $saksi1_pekerjaan = '10';
            elseif($saksi1->pekerjaan == 'Lain-Lain') $saksi1_pekerjaan = '11';
            else $saksi1_pekerjaan = '';
            $html .= '<td class="kotak">'.$saksi1_pekerjaan.'</td>';
            if ($saksi1_pekerjaan<2) $html .= '<td class="kotak"></td>';
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">5. Alamat</td>
            <td>:</td>
            <td class="kotak left" style="width:470px">'.$saksi1->alamat.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">a. Desa/Kelurahan</td>';
            if($saksi1->alamat == '') $temp_desa = '';
            else $temp_desa = $desa;
            $html .='<td class="kotak left" style="width:130px">'.$temp_desa.'</td>
            <td style="width:80px">c. Kab/Kota</td>';
            if($saksi1->alamat == '') $temp_kab = '';
            else $temp_kab = $kab;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kab.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">b. Kecamatan</td>';
            if($saksi1->alamat == '') $temp_kec = '';
            else $temp_kec = $kec;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kec.'</td>
            <td style="width:80px">d. Provinsi</td>';
            if($saksi1->alamat == '') $temp_prov = '';
            else $temp_prov = $prov;
            $html .='<td class="kotak left" style="width:130px">'.$temp_prov.'</td>
        </tr>
    </table>
    </div>
    <div class="bingkai">
    <h5>SAKSI II</h5>
    <table>
        <tr>
            <td class="label">1. NIK</td>
            <td>:</td>';
            $no_kk = pecah_string($kelahiran->nik_saksi2);
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<16) {
            for($i=$i;$i<16;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">2. Nama Lengkap</td>
            <td>:</td>';
            $nama_kk = pecah_string($saksi2->nama);
            $i = 0;
            foreach($nama_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<32) {
            for($i=$i;$i<32;$i++){
            $html .= '<td class="kotak"></td>';
                }}
    $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">3. Tanggal Lahir / Umur</td>
            <td>:</td>';
            $html .= '<td style="width:30.5;">Tgl</td>';
            if ($saksi2->tanggal_lahir){
            $no_kk = pecah_string(date('d',strtotime($saksi2->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Bln</td>';
            if ($saksi2->tanggal_lahir){
            $no_kk = pecah_string(date('m',strtotime($saksi2->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<2) {
            for($i=$i;$i<2;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Thn</td>';
            if(!empty($saksi2->tanggal_lahir)){
            $no_kk = pecah_string(date('Y',strtotime($saksi2->tanggal_lahir)));}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<4) {
            for($i=$i;$i<4;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '<td style="width:30">Umur</td>';
            if(!empty($saksi2->tanggal_lahir)){
            $biday_saksi2 = new DateTime($saksi2->tanggal_lahir);
            $umur_saksi2 = $today->diff($biday_saksi2);
            $no_kk = pecah_string($umur_saksi2->y);}
            else $no_kk = pecah_string('');
            $i = 0;
            foreach($no_kk as $n_k){
            $html .= '<td class="kotak">'.$n_k.'</td>';
            $i++;
            }
            if($i<3) {
            for($i=$i;$i<3;$i++){
            $html .= '<td class="kotak"></td>';
                }}
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">4. Pekerjaan</td>
            <td>:</td>';
            if($saksi2->pekerjaan == 'Tidak Bekerja') $saksi2_pekerjaan = '1'; 
            elseif($saksi2->pekerjaan == 'Mengurus Rumah Tangga') $saksi2_pekerjaan = '2';
            elseif($saksi2->pekerjaan == 'Pelajar/Mahasiswa') $saksi2_pekerjaan = '3';
            elseif($saksi2->pekerjaan == 'Pegawai Negeri Sipil') $saksi2_pekerjaan = '4';
            elseif($saksi2->pekerjaan == 'TNI/POLRI') $saksi2_pekerjaan = '5';
            elseif($saksi2->pekerjaan == 'Pensiunan') $saksi2_pekerjaan = '6';
            elseif($saksi2->pekerjaan == 'Karyawan Swasta') $saksi2_pekerjaan = '7';
            elseif($saksi2->pekerjaan == 'Wiraswasta') $saksi2_pekerjaan = '8';
            elseif($saksi2->pekerjaan == 'Petani/Peternak') $saksi2_pekerjaan = '9';
            elseif($saksi2->pekerjaan == 'Buruh') $saksi2_pekerjaan = '10';
            elseif($saksi2->pekerjaan == 'Lain-Lain') $saksi2_pekerjaan = '11';
            else $saksi2_pekerjaan = '';
            $html .= '<td class="kotak">'.$saksi2_pekerjaan.'</td>';
            if ($saksi2_pekerjaan<2) $html .= '<td class="kotak"></td>';
            $html .= '</tr>
    </table>
    <table>
        <tr>
            <td class="label">5. Alamat</td>
            <td>:</td>
            <td class="kotak left" style="width:470px">'.$saksi2->alamat.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">a. Desa/Kelurahan</td>';
            if($saksi2->alamat == '') $temp_desa = '';
            else $temp_desa = $desa;
            $html .='<td class="kotak left" style="width:130px">'.$temp_desa.'</td>
            <td style="width:80px">c. Kab/Kota</td>';
            if($saksi2->alamat == '') $temp_kab = '';
            else $temp_kab = $kab;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kab.'</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="label"></td>
            <td style="width:8px;"></td>
            <td style="width:120px">b. Kecamatan</td>';
            if($saksi2->alamat == '') $temp_kec = '';
            else $temp_kec = $kec;
            $html .='<td class="kotak left" style="width:130px">'.$temp_kec.'</td>
            <td style="width:80px">d. Provinsi</td>';
            if($saksi2->alamat == '') $temp_prov = '';
            else $temp_prov = $prov;
            $html .='<td class="kotak left" style="width:130px">'.$temp_prov.'</td>
        </tr>
    </table>
    </div>
    <div class="col12">
        <div class="col6">
        <p>Mengetahui :</p>
        <p>Kepala Desa/Lurah :</p>
        <p class="ttd_bawah">( RUHDIN )</p>
        </div>
        <div class="col6" style="text-align:left;">
        <p>Gurinda, '. tanggal_indo(date('Y-m-d')).'</p>
        <p>Pelapor</p>
        <p class="ttd_bawah">( '.$pelapor->nama.' )</p>
        </div>
    </div>
</body>
</html>
    ';
    $stylesheet = file_get_contents(base_url('style.css'));
    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

    // $mpdf->Output();
    ob_clean();
    $mpdf->Output('SURAT KELAHIRAN - '.$kelahiran->nama.'.pdf', 'D');;
    }
    
}
