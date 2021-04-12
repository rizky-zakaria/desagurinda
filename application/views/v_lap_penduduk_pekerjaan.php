<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("_partials/sidebar.php") ?>


  <div id="content-wrapper">

    <div class="container-fluid">
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table pr-1 pb-0"></i>Data Penduduk
          </div>
          <?php

$servername = "localhost";
$username = "root"; //kslungco_sikdes
$password = ""; //qwerty
$dbname = "kependudukan"; //kslungco_simdes

          $connection = mysqli_connect($servername, $username, $password, $dbname);
           ?>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Jenis Pekerjaan</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <td>
                    Tidak Bekerja
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Tidak Bekerja'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    Mengurus Rumah Tangga
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Mengurus Rumah Tangga'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    Pelajar/Mahasiswa
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Pelajar/Mahasiswa'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    Pegawai Negeri Sipil
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Pegawai Negeri Sipil'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    TNI/POLRI
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'TNI/POLRI'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    Pensiunan
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Pensiunan'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    Karyawan Swasta
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Karyawan Swasta'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    Wiraswasta
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Wiraswasta'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    Petani/Peternak
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Petani/Peternak'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    Buruh
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Buruh'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    Lain-lain
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Lain-lain'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("_partials/scrolltop.php") ?>
<?php $this->load->view("_partials/modal.php") ?>
<?php $this->load->view("_partials/js.php") ?>
    
</body>
</html>