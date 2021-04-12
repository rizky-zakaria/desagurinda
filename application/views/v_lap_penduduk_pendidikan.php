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
              <table class="table table-bordered"width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Jenjang Pendidikan</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <td>
                    Belum Tamat SD/Sederajat
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT pendidikan, COUNT(*) AS jumlah FROM penduduk WHERE pendidikan = 'Belum Tamat SD/Sederajat'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    SD/Sederajat
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT pendidikan, COUNT(*) AS jumlah FROM penduduk WHERE pendidikan = 'SD/Sederajat'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    SLTP/Sederajat
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT pendidikan, COUNT(*) AS jumlah FROM penduduk WHERE pendidikan = 'SLTP/Sederajat'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    SLTA/Sederajat
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT pendidikan, COUNT(*) AS jumlah FROM penduduk WHERE pendidikan = 'SLTA/Sederajat'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    Diploma/Sarjana
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT pendidikan, COUNT(*) AS jumlah FROM penduduk WHERE pendidikan = 'Diploma/Sarjana'");
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