<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'kependudukan');
$nik = $_GET['nomor_induk'];
$query = mysqli_query($koneksi, "select * from penduduk where nik='$nik'");
$penduduk = mysqli_fetch_array($query);
$data = array(
            'nama'      =>  $penduduk['nama'],);
 echo json_encode($data);
?>
