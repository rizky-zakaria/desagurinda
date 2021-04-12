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
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Agama</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <td>
                    Islam
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT agama, COUNT(*) AS jumlah FROM penduduk WHERE agama = 'Islam'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    Kristen
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT agama, COUNT(*) AS jumlah FROM penduduk WHERE agama = 'Kristen'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    Katholik
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT agama, COUNT(*) AS jumlah FROM penduduk WHERE agama = 'Katholik'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    Hindu
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT agama, COUNT(*) AS jumlah FROM penduduk WHERE agama = 'Hindu'");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah'];
                     ?>
                  </td>
                </tr>
                  <tr>
                  <td>
                    Budha
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT agama, COUNT(*) AS jumlah FROM penduduk WHERE agama = 'Budha'");
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