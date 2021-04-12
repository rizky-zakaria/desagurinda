<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">
  .card-header {
    display: flex;
    justify-content: space-between;
  }
</style>
  <?php $this->load->view("_partials/head.php") ?>
<body id="page-top">

<?php $this->load->view("_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">
    <h1 class="mt-4">Laporan Kependudukan</h1>
    <div class="card mb-3">
          <div class="card-header">
            <p><i class="fas fa-table"></i>
            Laporan Kependudukan</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis Laporan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>1</td>
                      <td>Data Penduduk</td>
                      <td>
                      <a class=" btn btn-sm btn-primary text-light mb-1" href="<?php echo base_url('laporan/penduduk/') ?>">Cetak</a>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Data Kelahiran</td>
                      <td>
                      <a class=" btn btn-sm btn-primary text-light mb-1" href="<?php echo base_url('laporan/kelahiran/') ?>">Cetak</a>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Data Kematian</td>
                      <td>
                      <a class=" btn btn-sm btn-primary text-light mb-1" href="<?php echo base_url('laporan/kematian/') ?>">Cetak</a>
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Data Pindah</td>
                      <td>
                      <a class=" btn btn-sm btn-primary text-light mb-1" href="<?php echo base_url('laporan/pindah/') ?>">Cetak</a>
                      </td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Data Pendatang</td>
                      <td>
                      <a class=" btn btn-sm btn-primary text-light mb-1" href="<?php echo base_url('laporan/datang/') ?>">Cetak</a>
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