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

    <h1 class="mt-4">Peristiwa Kedatangan</h1>
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table pr-1 pb-0"></i>Tambah Kedatangan
          </div>
          <div class="card-body">
            <form class="form-horizontal" action='tambah_datang_aksi' method="POST">

    <input type="hidden" name="kode_datang" value="DTG<?php echo sprintf("%04s", $kode_datang) ?>">
    

    <div class="form-group row">
      <h4 class="col-sm-3">Data Penduduk Datang</h4>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Nomor Kartu Keluarga :</label>
      <div class="col-sm-4">
        <input type="text" name="no_kk" placeholder="Nomor Kartu Keluarga" class="form-control" required >
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Status Nomor KK Bagi yang Pindah :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="stat_pindah">
          <option value="Menumpang KK">Menumpang KK</option>
          <option value="Membuat KK Baru">Membuat KK Baru</option>
          <option value="Nama Kepala keluarga dan Nomor KK tetap">Nama Kepala keluarga dan Nomor KK tetap</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Tanggal Kedatangan :</label>
      <div class="col-sm-4">
        <input type="date"  name="tanggal_datang" placeholder="" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Alamat :</label>
      <div class="col-sm-4">
        <input type="text" name="alamat" placeholder="Alamat" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Jumlah Keluarga Yang Datang (orang) :</label>
      <div class="col-sm-4">
        <input type="text" name="jumlah_datang" placeholder="Jumlah Keluarga Yang Datang" class="form-control" required>
      </div>
    </div>

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