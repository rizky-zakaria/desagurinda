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

          <div class="card-body">
            <div class="table-responsive">
             <a class=" btn btn-sm btn-primary text-light mb-3" href="<?php echo 'penduduk/cetak' ?>" target="_blank"><i class="fa fa-fw fa-print"></i> Cetak Dokumen</a>
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                    <th>Pendidikan</th>
                    <th>Pekerjaan</th>
                    <th>Status Perkawinan</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                    <th>Pendidikan</th>
                    <th>Pekerjaan</th>
                    <th>Status Perkawinan</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php 
                $no = 1;
                foreach($penduduk as $p){ 
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $p->nik ?></td>
                  <td><?php echo $p->nama ?></td>
                  <td><?php echo $p->tempat_lahir ?></td>
                  <td><?php echo $p->tanggal_lahir ?></td>
                  <td><?php echo $p->jenis_kelamin ?></td>
                  <td><?php
                    $biday = new DateTime($p->tanggal_lahir);
                    $today = new DateTime();
                    $umur = $today->diff($biday);
                    echo $umur->y;
                  ?></td>
                  <td><?php echo $p->pendidikan ?></td>
                  <td><?php echo $p->pekerjaan ?></td>
                  <td><?php echo $p->status_perkawinan ?></td>
                  <td><?php echo $p->nama_ayah ?></td>
                  <td><?php echo $p->nama_ibu ?></td>
                </tr>
                <?php } ?>
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