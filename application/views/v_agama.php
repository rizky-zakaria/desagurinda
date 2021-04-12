<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("_partials/headhome.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("_partials/navbarhome.php") ?>
</section><section class="mbr-section content4 cid-rjtv9KzZ3z" id="content4-a">
    <br>
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
               <?php

          $servername = "localhost";
          $username = "root"; //kslungco_sikdes
          $password = ""; //qwerty
          $dbname = "kependudukan"; //kslungco_simdes

          $connection = mysqli_connect($servername, $username, $password, $dbname);
           ?>
        <div class="row">
          <div class="col-lg-12">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Agama</div>
              <div class="card-body">
                <canvas id="myPieChart" width="100%" height="50"></canvas>
              </div>
            </div>
          </div>
        </div>

<script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Islam", "Kristen", "Katholik", "Hindu", "Budha"],
    datasets: [{
      data: [
        <?php 
         $query = mysqli_query($connection,"SELECT agama, COUNT(*) AS jumlah FROM penduduk WHERE agama = 'Islam'");
         $result = mysqli_fetch_array($query);
         echo $result['jumlah'];
         ?>,
         <?php 
          $query = mysqli_query($connection,"SELECT agama, COUNT(*) AS jumlah FROM penduduk WHERE agama = 'Kristen'");
          $result = mysqli_fetch_array($query);
          echo $result['jumlah'];
          ?>,
          <?php 
           $query = mysqli_query($connection,"SELECT agama, COUNT(*) AS jumlah FROM penduduk WHERE agama = 'Katholik'");
           $result = mysqli_fetch_array($query);
           echo $result['jumlah'];
           ?>,
           <?php 
            $query = mysqli_query($connection,"SELECT agama, COUNT(*) AS jumlah FROM penduduk WHERE agama = 'Hindu'");
            $result = mysqli_fetch_array($query);
            echo $result['jumlah'];
            ?>,
            <?php 
             $query = mysqli_query($connection,"SELECT agama, COUNT(*) AS jumlah FROM penduduk WHERE agama = 'Budha'");
             $result = mysqli_fetch_array($query);
             echo $result['jumlah'];
             ?>],
      backgroundColor: ['#264653', '#2a9d8f', '#e9c46a', '#f4a261', '#e76f51'],
    }],
  },
});


var ctx = document.getElementById("myPieChart2");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["0 - 20 Tahun", "21 - 40 Tahun", "41 - 60 Tahun", "61 - 80 Tahun", "81 - 100 Tahun", "Diatas 100 Tahun"],
    datasets: [{
      data: [
      ],
      backgroundColor: ['#007bff', '#dc3545'],
    }],
  },
});

</script>
</section>

<!-- /#wrapper -->
<?php $this->load->view("_partials/footerhome.php") ?>
<?php $this->load->view("_partials/js.php") ?>
    
</body>
</html>