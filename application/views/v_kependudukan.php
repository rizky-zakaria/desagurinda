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
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Data</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <td>
                    Jumlah Penduduk
                  </td>
                  <td>
                    <?php 
                      $query = mysqli_query($connection,"SELECT COUNT(*) AS jumlah FROM penduduk");
                      $result = mysqli_fetch_array($query);
                      echo $result['jumlah']," Orang";
                     ?>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
            

        <div class="row">
          <div class="col-lg-12">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Diagram Penduduk Berdasarkan Dusun</div>
              <div class="card-body">
                <canvas id="myBarChart" width="100%" height="50"></canvas>
              </div>
            </div>
          </div></div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-pie"></i>
                Umur</div>
              <div class="card-body">
                <canvas id="myPieChart2" width="100%" height="100"></canvas>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-pie"></i>
                Jenis Kelamin</div>
              <div class="card-body">
                <canvas id="myPieChart" width="100%" height="100"></canvas>
              </div>
            </div>
          </div>
        </div>

<script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Talanggila", "Baleya", "Batunobutao", "Bubatuno"],
    datasets: [{
      label: "",
        backgroundColor: ['#264653', '#2a9d8f', '#e9c46a', '#f4a261'],
      data: [
        <?php 
         $query = mysqli_query($connection,"SELECT dusun, COUNT(*) AS jumlah FROM penduduk WHERE dusun = 'Talanggila'");
         $result = mysqli_fetch_array($query);
         echo $result['jumlah'];
         ?>,
         <?php 
          $query = mysqli_query($connection,"SELECT dusun, COUNT(*) AS jumlah FROM penduduk WHERE dusun = 'Baleya'");
          $result = mysqli_fetch_array($query);
          echo $result['jumlah'];
          ?>,
          <?php 
           $query = mysqli_query($connection,"SELECT dusun, COUNT(*) AS jumlah FROM penduduk WHERE dusun = 'Batunobutao'");
           $result = mysqli_fetch_array($query);
           echo $result['jumlah'];
           ?>,
           <?php 
            $query = mysqli_query($connection,"SELECT dusun, COUNT(*) AS jumlah FROM penduduk WHERE dusun = 'Bubatuno'");
            $result = mysqli_fetch_array($query);
            echo $result['jumlah'];
            ?>],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero:true
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Laki-Laki", "Perempuan"],
    datasets: [{
      data: [
        <?php 
         $query = mysqli_query($connection,"SELECT jenis_kelamin, COUNT(*) AS jumlah FROM penduduk WHERE jenis_kelamin = 'Laki-Laki'");
         $result = mysqli_fetch_array($query);
         echo $result['jumlah'];
         ?>,
         <?php 
          $query = mysqli_query($connection,"SELECT jenis_kelamin, COUNT(*) AS jumlah FROM penduduk WHERE jenis_kelamin = 'Perempuan'");
          $result = mysqli_fetch_array($query);
          echo $result['jumlah'];
          ?>],
      backgroundColor: ['#264653', '#2a9d8f'],
    }],
  },
});


var ctx = document.getElementById("myPieChart2");
var myPieChart2 = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["0 - 20 Tahun", "21 - 40 Tahun", "41 - 60 Tahun", "61 - 80 Tahun", "81 - 100 Tahun", "Diatas 100 Tahun"],
    datasets: [{
      data: [
      <?php
      $query = mysqli_query($connection,"SELECT COUNT(*) AS jumlah FROM penduduk WHERE YEAR(CURDATE())-YEAR(tanggal_lahir) BETWEEN 0 AND 20 ORDER BY 'usia' ASC");
      $result = mysqli_fetch_array($query);
      echo $result['jumlah']
      ?>,
      <?php
      $query = mysqli_query($connection,"SELECT COUNT(*) AS jumlah FROM penduduk WHERE YEAR(CURDATE())-YEAR(tanggal_lahir) BETWEEN 21 AND 40 ORDER BY 'usia' ASC");
      $result = mysqli_fetch_array($query);
      echo $result['jumlah']
      ?>,
      <?php
      $query = mysqli_query($connection,"SELECT COUNT(*) AS jumlah FROM penduduk WHERE YEAR(CURDATE())-YEAR(tanggal_lahir) BETWEEN 41 AND 60 ORDER BY 'usia' ASC");
      $result = mysqli_fetch_array($query);
      echo $result['jumlah']
      ?>,
      <?php
      $query = mysqli_query($connection,"SELECT COUNT(*) AS jumlah FROM penduduk WHERE YEAR(CURDATE())-YEAR(tanggal_lahir) BETWEEN 61 AND 80 ORDER BY 'usia' ASC");
      $result = mysqli_fetch_array($query);
      echo $result['jumlah']
      ?>,
      <?php
      $query = mysqli_query($connection,"SELECT COUNT(*) AS jumlah FROM penduduk WHERE YEAR(CURDATE())-YEAR(tanggal_lahir) BETWEEN 81 AND 100 ORDER BY 'usia' ASC");
      $result = mysqli_fetch_array($query);
      echo $result['jumlah']
      ?>,
      <?php
      $query = mysqli_query($connection,"SELECT COUNT(*) AS jumlah FROM penduduk WHERE YEAR(CURDATE())-YEAR(tanggal_lahir) BETWEEN 100 AND 150 ORDER BY 'usia' ASC");
      $result = mysqli_fetch_array($query);
      echo $result['jumlah']
      ?>],
      backgroundColor: ['#264653', '#2a9d8f', '#e9c46a', '#f4a261', '#e76f51'],
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