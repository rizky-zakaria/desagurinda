<!DOCTYPE html>
<html lang="en">
<head>

<?php $this->load->view("_partials/js.php") ?>

<?php $this->load->view("_partials/head.php") ?>

<?php $this->load->view("_partials/navbar.php") ?>
<div id="wrapper">

  <?php $this->load->view("_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">

    <h1 class="mt-4">Peristiwa Perpindahan</h1>
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table pr-1 pb-0"></i>Tambah Perpindahan
          </div>
          <div class="card-body">
            <form class="form-horizontal" action='tambah_ppindah_aksi' method="POST">

    <input type="hidden" name="kode_pindah" value="<?php echo $kode_pindah ?>">
    <input type="hidden" name="jumlah_pindah" value="<?php echo $jumlah_pindah ?>">
    
    <?php for($i=1;$i<=$jumlah_pindah;$i++) { ?>

    <div class="form-group row">
      <h4 class="col-sm-3">Penduduk <?php echo $i ?></h4>
    </div>
    
    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Nomor Induk Kependudukan :</label>
      <div class="col-sm-4">
        <input type="text" name="<?php echo 'nik'.$i ?>" placeholder="Nomor Induk Kependudukan" class="form-control" required >
      </div>
    </div>

  <?php } ?>

      <!-- Button -->
      <div class="controls">
        <button type="submit" class="btn btn-success">Tambah</button>
        <button type="reset" class="btn btn-danger">Reset</button>
        <input type="button" value="Batal" class="btn btn-secondary" onclick="history.back(-1)" />
      </div>
    </div>
    </form>
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
    
</body>
</html>