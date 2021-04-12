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
            <i class="fas fa-table pr-1 pb-0"></i>Edit Kedatangan
          </div>
          <div class="card-body">
            <form class="form-horizontal" action="<?php echo base_url('peristiwa/update_datang') ?>" method="POST">

    <?php foreach($datang as $p){ ?>
    <input type="hidden" name="kode_datang" value="<?php echo $p->kode_datang?>">
    

    <div class="form-group row">
      <h4 class="col-sm-3">Data Penduduk Datang</h4>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Nomor Kartu Keluarga :</label>
      <div class="col-sm-4">
        <input type="text" name="no_kk" value="<?php echo $p->no_kk?>" placeholder="Nomor Kartu Keluarga" class="form-control" required >
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Nama Kepala Keluarga :</label>
      <div class="col-sm-4">
        <input type="text" name="nama_kk" value="<?php echo $p->nama_kk?>" placeholder="Nama Kepala Keluarga" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >NIK Kepala Keluarga :</label>
      <div class="col-sm-4">
        <input type="text" name="nik_kk"value="<?php echo $p->nik_kk?>" placeholder="NIK Kepala Keluarga" class="form-control" required >
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Status Nomor KK Bagi yang Pindah :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="stat_pindah">
          <option <?php if($p->stat_pindah == 'Menumpang KK') echo 'Selected' ?> value="Menumpang KK">Menumpang KK</option>
          <option <?php if($p->stat_pindah == 'Membuat KK Baru') echo 'Selected' ?> value="Membuat KK Baru">Membuat KK Baru</option>
          <option <?php if($p->stat_pindah == 'Nama Kepala keluarga dan Nomor KK tetap') echo 'Selected' ?> value="Nama Kepala keluarga dan Nomor KK tetap">Nama Kepala keluarga dan Nomor KK tetap</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Tanggal Kedatangan :</label>
      <div class="col-sm-4">
        <input type="date"  name="tanggal_datang" value="<?php echo $p->tanggal_datang?>" placeholder="" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Alamat :</label>
      <div class="col-sm-4">
        <input type="text" name="alamat" value="<?php echo $p->alamat?>" placeholder="Alamat" class="form-control" required>
      </div>
    </div>
  <?php } ?>
      <!-- Button -->
      <div class="controls">
        <button type="submit" class="btn btn-success">Simpan</button>
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