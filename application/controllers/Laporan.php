<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// use PhpOffice\PhpWord\PhpWord;
// use PhpOffice\PhpWord\Writer\Word2007;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
require_once 'assets/PHPWord_CloneRow-master/PHPWord.php';
require_once 'vendor/autoload.php';

class Laporan extends CI_Controller {


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
    function pindah(){

    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [330, 215],'margin_left' => 14,'margin_right' => 14,'margin_top' => 5,'margin_bottom' => 5,'margin_header' => 10,'margin_footer' => 10],['orientation' => 'L']);

    $mpdf->use_kwt = true;
    $mpdf->charset_in='UTF-8';

    $pindah = $this->m_penduduk->tampil_data_pindah()->result();;

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
<style>
</style>
</head>
<body>
    <div class="header">
    <h3>LAPORAN PINDAH PENDUDUK</h3>
    <h4>Desa Gurinda</h4>
    </div>
    <table class="tabel-laporan" autosize="1">
        <thead >
            <tr style="background-color: lightskyblue;">
            <td>NO</td>
            <td>No. KK</td>
            <td width="30%">Nama Kepala Keluarga</td>
            <td>Alamat Sebelumnya</td>
            <td>Alamat Tujuan</td>
            <td>Alasan Pindah</td>
            <td>Rencana Tanggal Pindah</td>
            </tr>
        </thead>
        <tbody>';
        $no = 1;
        foreach($pindah as $k){
            $html .= '<tr>
                <td>'.$no.'</td>
                <td>'.$k->no_kk.'</td>';
                $nama_kk = $this->m_penduduk->tampil_kepala_keluarga_id($k->no_kk)->row();
                $html .= '<td>'.$nama_kk->nama.'</td>
                <td>'.$k->alamat.'</td>
                <td>'.$k->alamat_tujuan.'</td>
                <td>'.$k->alasan.'</td>
                <td>'.tanggal_indo($k->tanggal_pindah).'</td>
            </tr>';
        $no++;
        }
        $html .= '</tbody>
    </table>

    <div class="col12">
        <div class="col6" style="width:200px;">
        </div>
        <div class="col6" style="text-align:left;float:right;">
        <p>Gurinda, '. tanggal_indo(date('Y-m-d')).'</p>
        <p>Kepala Desa Gurinda</p>
        <p class="ttd_bawah">RUHDIN</p>
        </div>
    </div>
</body>
</html>
    ';
    $stylesheet = file_get_contents(base_url('style-laporan.css'));
    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

    // $mpdf->Output();
    ob_clean();
    $mpdf->Output('LAPORAN DATA PINDAH'.$pindah->no_kk.'.pdf', 'D');;
    }    
    function datang(){

    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [330, 215],'margin_left' => 14,'margin_right' => 14,'margin_top' => 5,'margin_bottom' => 5,'margin_header' => 10,'margin_footer' => 10],['orientation' => 'L']);

    $mpdf->use_kwt = true;
    $mpdf->charset_in='UTF-8';

    $datang = $this->m_penduduk->tampil_data_datang()->result();;

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
<style>
</style>
</head>
<body>
    <div class="header">
    <h3>LAPORAN KEDATANGAN PENDUDUK</h3>
    <h4>Desa Gurinda</h4>
    </div>
    <table class="tabel-laporan" autosize="1">
        <thead >
            <tr style="background-color: lightskyblue;">
            <td>NO</td>
            <td>Status Pindah</td>
            <td>No. KK</td>
            <td width="30%">Nama Kepala Keluarga</td>
            <td>Alamat</td>
            <td>Tanggal Datang</td>
            </tr>
        </thead>
        <tbody>';
        $no = 1;
        foreach($datang as $k){
            $html .= '<tr>
                <td>'.$no.'</td>
                <td>'.$k->stat_pindah.'</td>
                <td>'.$k->no_kk.'</td>';
                $nama_kk = $this->m_penduduk->tampil_kepala_keluarga_id($k->no_kk)->row();
                $html .= '<td>'.$nama_kk->nama.'</td>
                <td>'.$k->alamat.'</td>
                <td>'.tanggal_indo($k->tanggal_datang).'</td>
            </tr>';
        $no++;
        }
        $html .= '</tbody>
    </table>
    <div class="col12">
        <div class="col6" style="width:200px;">
        </div>
        <div class="col6" style="text-align:left;float:right;">
        <p>Gurinda, '. tanggal_indo(date('Y-m-d')).'</p>
        <p>Kepala Desa Gurinda</p>
        <p class="ttd_bawah">RUHDIN</p>
        </div>
    </div>
</body>
</html>
    ';
    $stylesheet = file_get_contents(base_url('style-laporan.css'));
    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

    // $mpdf->Output();
    ob_clean();
    $mpdf->Output('LAPORAN DATA DATANG'.$pindah->no_kk.'.pdf', 'D');;
    }
    function kematian(){

    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [330, 215],'margin_left' => 14,'margin_right' => 14,'margin_top' => 5,'margin_bottom' => 5,'margin_header' => 10,'margin_footer' => 10],['orientation' => 'L']);

    $mpdf->use_kwt = true;
    $mpdf->charset_in='UTF-8';

    $kematian = $this->m_penduduk->tampil_data_kematian()->result();

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
<style>
</style>
</head>
<body>
    <div class="header">
    <h3>LAPORAN KEMATIAN PENDUDUK</h3>
    <h4>Desa Gurinda</h4>
    </div>
    <table class="tabel-laporan" autosize="1">
        <thead >
            <tr style="background-color: lightskyblue;">
            <td>NO</td>
            <td width="30%">Nama</td>
            <td>Tanggal Kematian</td>
            <td>Tempat Kematian</td>
            <td>Sebab Kematian</td>
            <td width="10%">Nama Ibu</td>
            <td width="10%">Nama Ayah</td>
            </tr>
        </thead>
        <tbody>';
        $no = 1;
        foreach($kematian as $k){
            $html .= '<tr>
                <td>'.$no.'</td>';
                  $nama_jenazah = $this->m_penduduk->tampil_nama_kk($k->nik);
                $html .= '<td>'.$nama_jenazah.'</td>
                <td>'.tanggal_indo($k->tanggal_kematian).'</td>
                <td>'.$k->tempat_kematian.'</td>
                <td>'.$k->sebab.'</td>';
                  $nama_ibu = $this->m_penduduk->tampil_nama_kk($k->nik_ibu);
                $html .= '<td>'.$nama_ibu.'</td>';
                  $nama_ayah = $this->m_penduduk->tampil_nama_kk($k->nik_ayah);
                $html .= '<td>'.$nama_ayah.'</td>
            </tr>';
        $no++;
        }
        $html .= '</tbody>
    </table>
    <div class="col12">
        <div class="col6" style="width:200px;">
        </div>
        <div class="col6" style="text-align:left;float:right;">
        <p>Gurinda, '. tanggal_indo(date('Y-m-d')).'</p>
        <p>Kepala Desa Gurinda</p>
        <p class="ttd_bawah">RUHDIN</p>
        </div>
    </div>
</body>
</html>
    ';
    $stylesheet = file_get_contents(base_url('style-laporan.css'));
    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

    // $mpdf->Output();
    ob_clean();
    $mpdf->Output('LAPORAN DATA KEMATIAN'.$pindah->no_kk.'.pdf', 'D');;
    }    
    function kelahiran(){

    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [330, 215],'margin_left' => 14,'margin_right' => 14,'margin_top' => 5,'margin_bottom' => 5,'margin_header' => 10,'margin_footer' => 10],['orientation' => 'L']);

    $mpdf->use_kwt = true;
    $mpdf->charset_in='UTF-8';

    $kelahiran = $this->m_penduduk->tampil_data_kelahiran()->result();

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
<style>
</style>
</head>
<body>
    <div class="header">
    <h3>LAPORAN DATA KELAHIRAN</h3>
    <h4>Desa Gurinda</h4>
    </div>
    <table class="tabel-laporan" autosize="1">
        <thead >
            <tr style="background-color: lightskyblue;">
            <td>NO</td>
            <td>No. KK</td>
            <td width="30%">Nama Bayi</td>
            <td>Jenis Kelamin</td>
            <td>Tanggal Lahir</td>
            <td>Berat</td>
            <td>Panjang</td>
            <td width="10%">Nama Ibu</td>
            <td width="10%">Nama Ayah</td>
            </tr>
        </thead>
        <tbody>';
        $no = 1;
        foreach($kelahiran as $k){
            $html .= '<tr>
                <td>'.$no.'</td>
                <td>'.$k->no_kk.'</td>
                <td>'.$k->nama.'</td>';
                  switch ($k->jenis_kelamin) {
                    case 'l':
                      $jenis_kelamin = 'Laki-Laki';
                      break;
                    default:
                      $jenis_kelamin = 'Perempuan';
                      break;
                  } 
                $html .= '<td>'.$jenis_kelamin.'</td>
                <td>'.tanggal_indo($k->tanggal_lahir).'</td>
                <td>'.$k->berat.' Kg</td>
                <td>'.$k->panjang.' Cm</td>';
                  $nama_ibu = $this->m_penduduk->tampil_nama_kk($k->nik_ibu);
                $html .= '<td>'.$nama_ibu.'</td>';
                  $nama_ayah = $this->m_penduduk->tampil_nama_kk($k->nik_ayah);
                $html .= '<td>'.$nama_ayah.'</td>
            </tr>';
        $no++;
        }
        $html .= '</tbody>
    </table>
    <div class="col12">
        <div class="col6" style="width:200px;">
        </div>
        <div class="col6" style="text-align:left;float:right;">
        <p>Gurinda, '. tanggal_indo(date('Y-m-d')).'</p>
        <p>Kepala Desa Gurinda</p>
        <p class="ttd_bawah">RUHDIN</p>
        </div>
    </div>
</body>
</html>
    ';
    $stylesheet = file_get_contents(base_url('style-laporan.css'));
    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

    // $mpdf->Output();
    ob_clean();
    $mpdf->Output('LAPORAN DATA KELAHIRAN'.$pindah->no_kk.'.pdf', 'D');;
    }    
    function penduduk(){

    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [330, 215],'margin_left' => 14,'margin_right' => 14,'margin_top' => 5,'margin_bottom' => 5,'margin_header' => 10,'margin_footer' => 10],['orientation' => 'L']);

    $mpdf->use_kwt = true;
    $mpdf->charset_in='UTF-8';

    $penduduk = $this->m_penduduk->tampil_data()->result();

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
<style>
</style>
</head>
<body>
    <div class="header">
    <h3>LAPORAN DATA PENDUDUK</h3>
    <h4>Desa Gurinda</h4>
    </div>
    <table class="tabel-laporan" autosize="1">
        <thead >
            <tr style="background-color: lightskyblue;">
            <td>NO</td>
            <td>Dusun</td>
            <td>No. KK</td>
            <td>Alamat</td>
            <td>Nama Kepala Keluarga</td>
            <td>NIK</td>
            <td>Nama Anggota Keluarga</td>
            <td>Jenis Kelamin</td>
            <td>Hubungan</td>
            <td>Tempat Lahir</td>
            <td>Tanggal Lahir</td>
            <td>Usia</td>
            <td>Status</td>
            </tr>
        </thead>
        <tbody>';
        $no = 1;
        foreach($penduduk as $p){
            $html .= '<tr>
                <td>'.$no.'</td>';
                  switch ($p->dusun) {
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
                $html.='<td>'.$dusun.'</td>
                <td>'.$p->no_kk.'</td>
                <td>'.$p->alamat.'</td>';
                  $nama_kk = $this->m_penduduk->tampil_nama_kk($p->nik_kk);
                $html .= '<td>'.$nama_kk.'</td>
                <td>'.$p->nik.'</td>
                <td>'.$p->nama.'</td>';

                  switch ($p->jenis_kelamin) {
                    case 'l':
                      $jenis_kelamin = 'Laki-Laki';
                      break;
                    default:
                      $jenis_kelamin = 'Perempuan';
                      break;
                  } 
                $html .= '<td>'.$jenis_kelamin.'</td>
                <td>'.$p->hubungan.'</td>
                <td>'.$p->tempat_lahir.'</td>
                <td>'.tanggal_indo($p->tanggal_lahir).'</td>';
                    $biday = new DateTime($p->tanggal_lahir);
                    $today = new DateTime();
                    $umur = $today->diff($biday);
                $html .= '<td>'.$umur->y.'</td>';

                  switch ($p->status) {
                    case '1':
                      $status = 'Menikah';
                      break;
                    default:
                      $status = 'Belum Menikah';
                      break;
                  } 
                $html .= '<td>'.$status.'</td>
            </tr>';
        $no++;
        }
        $html .= '</tbody>
    </table>
    <div class="col12">
        <div class="col6" style="width:200px;">
        </div>
        <div class="col6" style="text-align:left;float:right;">
        <p>Gurinda, '. tanggal_indo(date('Y-m-d')).'</p>
        <p>Kepala Desa Gurinda</p>
        <p class="ttd_bawah">RUHDIN</p>
        </div>
    </div>
</body>
</html>
    ';
    $stylesheet = file_get_contents(base_url('style-laporan.css'));
    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

    // $mpdf->Output();
    ob_clean();
    $mpdf->Output('LAPORAN DATA PENDUDUK'.$pindah->no_kk.'.pdf', 'D');;
    }    
}
