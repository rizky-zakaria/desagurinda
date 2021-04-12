<?php
$conn = mysqli_connect('localhost', 'root', '', 'kependudukan');
$query = mysqli_query($conn, "SELECT * FROM penduduk WHERE nik='".mysqli_escape_string($conn, $_POST['nik'])."'");
$data = mysqli_fetch_array($query);
 
echo json_encode($data);