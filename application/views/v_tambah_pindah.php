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
            <form class="form-horizontal" action='tambah_pindah_aksi' method="POST">

    <input type="hidden" name="kode_pindah" value="PDH<?php echo sprintf("%04s", $kode_pindah) ?>">
    

    <div class="form-group row">
      <h4 class="col-sm-3">Data Daerah Asal</h4>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Nomor Kartu Keluarga :</label>
      <div class="col-sm-4">
        <input type="text" name="no_kk" placeholder="Nomor Kartu Keluarga" class="form-control" required >
      </div>
    </div>

    <div class="form-group row">
      <h4 class="col-sm-3">Data Perpindahan</h4>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Alamat Sebelumnya :</label>
      <div class="col-sm-4">
        <input type="text" name="alamat" placeholder="Alamat" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Alasan Pindah :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="alasan">
          <option value="Pekerjaan">Pekerjaan</option>
          <option value="Pendidikan">Pendidikan</option>
          <option value="Keamanan">Keamanan</option>
          <option value="Kesehatan">Kesehatan</option>
          <option value="Perumahan">Perumahan</option>
          <option value="Keluarga">Keluarga</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </div>
    </div>

  <div class="form-group row">
      <label class="col-sm-3 col-form-label">Alamat Tujuan :</label>
      <div class="col-sm-4">
        <input type="text" name="alamat_tujuan" placeholder="Alamat Tujuan" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Klasifikasi Pindah :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="klasifikasi">
          <option value="Dalam 1 Desa">Dalam 1 Desa</option>
          <option value="Antar Desa">Antar Desa</option>
          <option value="Antar Kecamatan">Antar Kecamatan</option>
          <option value="Antar Kabupaten">Antar Kabupaten</option>
          <option value="Antar Provinsi">Antar Provinsi</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Jenis Perpindahan :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="jenis_pindah">
          <option value="Kepala Keluarga">Kepala Keluarga</option>
          <option value="Kepala Keluarga dan Seluruh Anggota">Kepala Keluarga dan Seluruh Anggota</option>
          <option value="Kep. Keluarga dan Sbg. Anggota">Kep. Keluarga dan Sbg. Anggota</option>
          <option value="Anggota Keluarga">Anggota Keluarga</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Status KK untuk yang tidak Pindah :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="stat_tidak_pindah">
          <option value="Menumpang KK">Menumpang KK</option>
          <option value="Membuat KK Baru">Membuat KK Baru</option>
          <option value="Tidak Ada Anggota Keluarga Yang Ditinggal">Tidak Ada Anggota Keluarga Yang Ditinggal</option>
          <option value="Nomor KK Tetap">Nomor KK Tetap</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Status KK untuk yang Pindah :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="stat_pindah">
          <option value="Menumpang KK">Menumpang KK</option>
          <option value="Membuat KK Baru">Membuat KK Baru</option>
          <option value="Nama Kep. Keluarga dan Nomor KK Tetap">Nama Kep. Keluarga dan Nomor KK Tetap</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Rencana Tanggal Pindah :</label>
      <div class="col-sm-4">
        <input type="date"  name="tanggal_pindah" placeholder="" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Jumlah Keluarga Yang Pindah (orang) :</label>
      <div class="col-sm-4">
        <input type="text" name="jumlah_pindah" placeholder="Jumlah Keluarga Yang Pindah" class="form-control" required>
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