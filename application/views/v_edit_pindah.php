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
            <i class="fas fa-table pr-1 pb-0"></i>Edit Perpindahan
          </div>
          <div class="card-body">
            <form class="form-horizontal" action="<?php echo base_url('peristiwa/update_pindah') ?>" method="POST">

    <?php foreach($pindah as $p){ ?>

    <input type="hidden" name="kode_pindah" value="<?php echo $p->kode_pindah?>">
    

    <div class="form-group row">
      <h4 class="col-sm-3">Data Daerah Asal</h4>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Nomor Kartu Keluarga :</label>
      <div class="col-sm-4">
        <input type="text" name="no_kk" value="<?php echo $p->no_kk ?>" placeholder="Nomor Kartu Keluarga" class="form-control" required >
      </div>
    </div>

    <div class="form-group row">
      <h4 class="col-sm-3">Data Perpindahan</h4>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Alamat Sebelumnya :</label>
      <div class="col-sm-4">
        <input type="text" name="alamat" value="<?php echo $p->alamat ?>" placeholder="Alamat" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Alasan Pindah :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="alasan">
          <option <?php if($p->alasan == 'Pekerjaan') echo 'Selected' ?> value="Pekerjaan">Pekerjaan</option>
          <option <?php if($p->alasan == 'Pendidikan') echo 'Selected' ?> value="Pendidikan">Pendidikan</option>
          <option <?php if($p->alasan == 'Keamanan') echo 'Selected' ?> value="Keamanan">Keamanan</option>
          <option <?php if($p->alasan == 'Kesehatan') echo 'Selected' ?> value="Kesehatan">Kesehatan</option>
          <option <?php if($p->alasan == 'Perumahan') echo 'Selected' ?> value="Perumahan">Perumahan</option>
          <option <?php if($p->alasan == 'Keluarga') echo 'Selected' ?> value="Keluarga">Keluarga</option>
          <option <?php if($p->alasan == 'Lainnya') echo 'Selected' ?> value="Lainnya">Lainnya</option>
        </select>
      </div>
    </div>

  <div class="form-group row">
      <label class="col-sm-3 col-form-label">Alamat Tujuan :</label>
      <div class="col-sm-4">
        <input type="text" name="alamat_tujuan" value="<?php echo $p->alamat_tujuan ?>" placeholder="Alamat Tujuan" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Klasifikasi Pindah :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="klasifikasi">
          <option <?php if($p->klasifikasi == 'Dalam 1 Desa') echo 'Selected' ?> value="Dalam 1 Desa">Dalam 1 Desa</option>
          <option <?php if($p->klasifikasi == 'Antar Desa') echo 'Selected' ?>  value="Antar Desa">Antar Desa</option>
          <option <?php if($p->klasifikasi == 'Antar Kecamatan') echo 'Selected' ?>  value="Antar Kecamatan">Antar Kecamatan</option>
          <option <?php if($p->klasifikasi == 'Antar Kabupaten') echo 'Selected' ?>  value="Antar Kabupaten">Antar Kabupaten</option>
          <option <?php if($p->klasifikasi == 'Antar Provinsi') echo 'Selected' ?>  value="Antar Provinsi">Antar Provinsi</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Jenis Perpindahan :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="jenis_pindah">
          <option <?php if($p->jenis_pindah == 'Kepala Keluarga') echo 'Selected' ?>  value="Kepala Keluarga">Kepala Keluarga</option>
          <option <?php if($p->jenis_pindah == 'Kepala Keluarga dan Seluruh Anggota') echo 'Selected' ?> value="Kepala Keluarga dan Seluruh Anggota">Kepala Keluarga dan Seluruh Anggota</option>
          <option <?php if($p->jenis_pindah == 'Kep. Keluarga dan Sbg. Anggota') echo 'Selected' ?> value="Kep. Keluarga dan Sbg. Anggota">Kep. Keluarga dan Sbg. Anggota</option>
          <option <?php if($p->jenis_pindah == 'Anggota Keluarga') echo 'Selected' ?> value="Anggota Keluarga">Anggota Keluarga</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Status KK untuk yang tidak Pindah :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="stat_tidak_pindah">
          <option <?php if($p->stat_tidak_pindah == 'Menumpang KK') echo 'Selected' ?> value="Menumpang KK">Menumpang KK</option>
          <option <?php if($p->stat_tidak_pindah == 'Membuat KK Baru') echo 'Selected' ?> value="Membuat KK Baru">Membuat KK Baru</option>
          <option <?php if($p->stat_tidak_pindah == 'Tidak Ada Anggota Keluarga Yang Ditinggal') echo 'Selected' ?> value="Tidak Ada Anggota Keluarga Yang Ditinggal">Tidak Ada Anggota Keluarga Yang Ditinggal</option>
          <option <?php if($p->stat_tidak_pindah == 'Nomor KK Tetap') echo 'Selected' ?> value="Nomor KK Tetap">Nomor KK Tetap</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Status KK untuk yang Pindah :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="stat_pindah">
          <option <?php if($p->stat_pindah == 'Menumpang KK') echo 'Selected' ?> value="Menumpang KK">Menumpang KK</option>
          <option <?php if($p->stat_pindah == 'Membuat KK Baru') echo 'Selected' ?>  value="Membuat KK Baru">Membuat KK Baru</option>
          <option <?php if($p->stat_pindah == 'Nama Kep. Keluarga dan Nomor KK Tetap') echo 'Selected' ?>  value="Nama Kep. Keluarga dan Nomor KK Tetap">Nama Kep. Keluarga dan Nomor KK Tetap</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Rencana Tanggal Pindah :</label>
      <div class="col-sm-4">
        <input type="date"  name="tanggal_pindah" value="<?php echo $p->tanggal_pindah ?>" placeholder="" class="form-control" required>
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