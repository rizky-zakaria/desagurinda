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

    <h1 class="mt-4">Data Penduduk</h1>
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table pr-1 pb-0"></i>Tambah Penduduk
          </div>
          <div class="card-body">
            <form class="form-horizontal" action='tambah_aksi' method="POST">

    <input type="hidden" name="kode_keluarga" value="KEL<?php echo sprintf("%04s", $kode_keluarga) ?>">
    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="NIK">Nomor Induk Kependudukan :</label>
      <div class="col-sm-4">
        <input type="text" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" class="form-control" required maxlength="16">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="No KK">Nomor Kartu Keluarga :</label>
      <div class="col-sm-4">
        <input type="text" id="nomor_kk" name="no_kk" placeholder="Nomor Kartu Keluarga" class="form-control" required maxlength="16">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Nama Lengkap">Nama Lengkap :</label>
      <div class="col-sm-4">
        <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Jenis Kelamin">Jenis Kelamin :</label>
      <div class="col-sm-4">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="l">
          <label class="form-check-label" for="Laki-Laki">Laki-Laki</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="p">
          <label class="form-check-label" for="Perempuan">Perempuan</label>
        </div>
      </div>
    </div>

  <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Hubungan Keluarga">Hubungan Keluarga :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="hubungan">
          <option value="kepala_keluarga">Kepala Keluarga </option>
          <option value="anak_kandung">Anak </option>
          <option value="suami">Suami </option>
          <option value="istri">Istri </option>
          <option value="orang_tua">Orang Tua </option>
          <option value="famili_lain">Famili Lain </option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Tempat Lahir">Tempat Lahir :</label>
      <div class="col-sm-4">
        <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Tanggal Lahir">Tanggal Lahir :</label>
      <div class="col-sm-4">
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="" class="form-control" required>
      </div>
    </div>

  <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Golongan Darah">Golongan Darah :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="goldar">
          <option value="A">A </option>
          <option value="AB">AB </option>
          <option value="B">B </option>
          <option value="O">O </option>
          <option value="TT">Tidak Tahu </option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Alamat">Alamat :</label>
      <div class="col-sm-4">
        <input type="text" id="alamat" name="alamat" placeholder="Alamat" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Dusun">Dusun :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="dusun">
          <option value="1">Dusun I </option>
          <option value="2">Dusun II </option>
          <option value="3">Dusun III </option>
          <option value="4">Dusun IV </option>
        </select>
      </div>
    </div>

<div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Agama">Agama :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="agama">
          <option value="1">Islam </option>
          <option value="2">Kristen </option>
          <option value="3">Katholik </option>
          <option value="4">Hindu </option>
          <option value="5">Budha </option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Pendidikan">Pendidikan :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="pendidikan">
          <option value="Belum Tamat SD/Sederajat">Belum Tamat SD/Sederajat </option>
          <option value="SD/Sederajat">SD/Sederajat </option>
          <option value="SLTP/Sederajat">SLTP/Sederajat </option>
          <option value="SLTA/Sederajat">SLTA/Sederajat </option>
          <option value="Diploma/Sarjana">Diploma/Sarjana </option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Pekerjaan">Pekerjaan :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="pekerjaan">
          <option value="Tidak Bekerja">Tidak Bekerja </option>
          <option value="Mengurus Rumah Tangga">Mengurus Rumah Tangga </option>
          <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa </option>
          <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil </option>
          <option value="TNI/POLRI">TNI/POLRI </option>
          <option value="Pensiunan">Pensiunan </option>
          <option value="Karyawan Swasta">Karyawan Swasta </option>
          <option value="Wiraswasta">Wiraswasta </option>
          <option value="Petani/Peternak">Petani/Peternak </option>
          <option value="Buruh">Buruh </option>
          <option value="Lain-lain">Lain-lain </option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Status Perkawinan">Status Perkawinan :</label>
      <div class="col-sm-4">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" id="status_perkawinan" value="1">
          <label class="form-check-label" for="Kawin">Kawin</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" id="status_perkawinan" value="0">
          <label class="form-check-label" for="Belum Kawin">Belum Kawin</label>
        </div>
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
<?php $this->load->view("_partials/js.php") ?>
    
</body>
</html>