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
                   Diagram Penduduk Berdasarkan Pekerjaan</div>
                 <div class="card-body">
                   <canvas id="myBarChart" width="100%" height="50"></canvas>
                 </div>
               </div>
             </div></div>
   
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
       labels: ["Tidak Bekerja", "Mengurus Rumah Tangga", "Pelajar/Mahasiswa", "Pegawai Negeri Sipil", "TNI/POLRI", "Pensiunan", "Karyawan Swasta", "Wiraswasta", "Petani/Peternak", "Buruh", "Lain-lain"],
       datasets: [{
         label: "",
           backgroundColor: ['#264653', '#2a9d8f', '#e9c46a', '#f4a261','#264653', '#2a9d8f', '#e9c46a', '#f4a261','#264653', '#2a9d8f', '#e9c46a'],
         data: [
           <?php 
            $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Tidak Bekerja'");
            $result = mysqli_fetch_array($query);
            echo $result['jumlah'];
            ?>,
            <?php 
             $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Mengurus Rumah Tangga'");
             $result = mysqli_fetch_array($query);
             echo $result['jumlah'];
             ?>,
             <?php 
              $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Pelajar/Mahasiswa'");
              $result = mysqli_fetch_array($query);
              echo $result['jumlah'];
              ?>,
              <?php 
               $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Pegawai Negeri Sipil'");
               $result = mysqli_fetch_array($query);
               echo $result['jumlah'];
               ?>,
               <?php 
                $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'TNI/POLRI'");
                $result = mysqli_fetch_array($query);
                echo $result['jumlah'];
                ?>,
                <?php 
                 $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Pensiunan'");
                 $result = mysqli_fetch_array($query);
                 echo $result['jumlah'];
                 ?>,
                 <?php 
                  $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Karyawan Swasta'");
                  $result = mysqli_fetch_array($query);
                  echo $result['jumlah'];
                  ?>,
                  <?php 
                   $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Wiraswasta'");
                   $result = mysqli_fetch_array($query);
                   echo $result['jumlah'];
                   ?>,
                   <?php 
                    $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Petani/Peternak'");
                    $result = mysqli_fetch_array($query);
                    echo $result['jumlah'];
                    ?>,
                    <?php 
                     $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Buruh'");
                     $result = mysqli_fetch_array($query);
                     echo $result['jumlah'];
                     ?>,
                     <?php 
                      $query = mysqli_query($connection,"SELECT pekerjaan, COUNT(*) AS jumlah FROM penduduk WHERE pekerjaan = 'Lain-lain'");
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
   </script>
            </div>
        </div>
    </div>
</section>
<!-- /#wrapper -->
<?php $this->load->view("_partials/footerhome.php") ?>
<?php $this->load->view("_partials/js.php") ?>
    
</body>
</html>