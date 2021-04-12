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
            <form class="form-horizontal" action="<?php echo base_url('penduduk/update') ?>"" method="POST">

    <?php foreach($penduduk as $p){ ?>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="NIK">Nomor Induk Kependudukan :</label>
      <div class="col-sm-4">
        <input type="text" value="<?php echo $p->nik ?>" name="nik" placeholder="Nomor Induk Kependudukan" class="form-control" required maxlength="16">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Nama Lengkap">Nama Lengkap :</label>
      <div class="col-sm-4">
        <input type="text" value="<?php echo $p->nama ?>" name="nama" placeholder="Nama Lengkap" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Jenis Kelamin">Jenis Kelamin :</label>
      <div class="col-sm-4">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_kelamin" <?php if($p->jenis_kelamin == 'l') echo 'checked' ?> value="l">
          <label class="form-check-label" for="Laki-Laki">Laki-Laki</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_kelamin" <?php if($p->jenis_kelamin == 'p') echo 'checked' ?> value="p">
          <label class="form-check-label" for="Perempuan">Perempuan</label>
        </div>
      </div>
    </div>

  <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Hubungan Keluarga">Hubungan Keluarga :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="hubungan">
          <option <?php if($p->hubungan == 'kepala_keluarga') echo 'Selected' ?> value="kepala_keluarga">Kepala Keluarga </option>
          <option <?php if($p->hubungan == 'anak') echo 'Selected' ?> value="anak_kandung">Anak </option>
          <option <?php if($p->hubungan == 'suami') echo 'Selected' ?>  value="suami">Suami </option>
          <option <?php if($p->hubungan == 'istri') echo 'Selected' ?>  value="istri">Istri </option>
          <option <?php if($p->hubungan == 'orang_tua') echo 'Selected' ?>  value="orang_tua">Orang Tua </option>
          <option <?php if($p->hubungan == 'famili_lain') echo 'Selected' ?>  value="famili_lain">Famili Lain </option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Tempat Lahir">Tempat Lahir :</label>
      <div class="col-sm-4">
        <input type="text" value="<?php echo $p->tempat_lahir ?>" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Tanggal Lahir">Tanggal Lahir :</label>
      <div class="col-sm-4">
        <input type="date" value="<?php echo $p->tanggal_lahir ?>" name="tanggal_lahir" placeholder="" class="form-control" required>
      </div>
    </div>

  <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Golongan Darah">Golongan Darah :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="goldar">
          <option <?php if($p->goldar == 'A') echo 'Selected' ?> value="A">A </option>
          <option <?php if($p->goldar == 'AB') echo 'Selected' ?> value="AB">AB </option>
          <option <?php if($p->goldar == 'B') echo 'Selected' ?> value="B">B </option>
          <option <?php if($p->goldar == 'O') echo 'Selected' ?> value="O">O </option>
          <option <?php if($p->goldar == 'TT') echo 'Selected' ?> value="TT">Tidak Tahu </option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Alamat">Alamat :</label>
      <div class="col-sm-4">
        <input type="text" value="<?php echo $p->alamat ?>" name="alamat" placeholder="Alamat" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Dusun">Dusun :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="dusun">
          <option <?php if($p->dusun == '1') echo 'Selected' ?> value="1">Dusun I </option>
          <option <?php if($p->dusun == '2') echo 'Selected' ?> value="2">Dusun II </option>
          <option <?php if($p->dusun == '3') echo 'Selected' ?> value="3">Dusun III </option>
          <option  <?php if($p->dusun == '4') echo 'Selected' ?>value="4">Dusun IV </option>
        </select>
      </div>
    </div>

<div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Agama">Agama :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="agama">
          <option <?php if($p->agama == '1') echo 'Selected' ?> value="1">Islam </option>
          <option <?php if($p->agama == '2') echo 'Selected' ?> value="2">Kristen </option>
          <option <?php if($p->agama == '3') echo 'Selected' ?> value="3">Katholik </option>
          <option <?php if($p->agama == '4') echo 'Selected' ?> value="4">Hindu </option>
          <option <?php if($p->agama == '5') echo 'Selected' ?> value="5">Budha </option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Pendidikan">Pendidikan :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="pendidikan">
          <option <?php if($p->pendidikan == 'Belum Tamat SD/Sederajat') echo 'Selected' ?> value="Belum Tamat SD/Sederajat">Belum Tamat SD/Sederajat </option>
          <option <?php if($p->pendidikan == 'SD/Sederajat') echo 'Selected' ?> value="SD/Sederajat">SD/Sederajat </option>
          <option <?php if($p->pendidikan == 'SLTP/Sederajat') echo 'Selected' ?> value="SLTP/Sederajat">SLTP/Sederajat </option>
          <option <?php if($p->pendidikan == 'SLTA/Sederajat') echo 'Selected' ?> value="SLTA/Sederajat">SLTA/Sederajat </option>
          <option <?php if($p->pendidikan == 'Diploma/Sarjana') echo 'Selected' ?> value="Diploma/Sarjana">Diploma/Sarjana </option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Pekerjaan">Pekerjaan :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="pekerjaan">
          <option <?php if($p->pekerjaan == 'Tidak Bekerja') echo 'Selected' ?> value="Tidak Bekerja">Tidak Bekerja </option>
          <option <?php if($p->pekerjaan == 'Mengurus Rumah Tangga') echo 'Selected' ?> value="Mengurus Rumah Tangga">Mengurus Rumah Tangga </option>
          <option <?php if($p->pekerjaan == 'Pelajar/Mahasiswa') echo 'Selected' ?> value="Pelajar/Mahasiswa">Pelajar/Mahasiswa </option>
          <option <?php if($p->pekerjaan == 'Pegawai Negeri Sipil') echo 'Selected' ?> value="Pegawai Negeri Sipil">Pegawai Negeri Sipil </option>
          <option <?php if($p->pekerjaan == 'TNI/POLRI') echo 'Selected' ?> value="TNI/POLRI">TNI/POLRI </option>
          <option <?php if($p->pekerjaan == 'Pensiunan') echo 'Selected' ?> value="Pensiunan">Pensiunan </option>
          <option <?php if($p->pekerjaan == 'Karyawan Swasta') echo 'Selected' ?> value="Karyawan Swasta">Karyawan Swasta </option>
          <option <?php if($p->pekerjaan == 'Wiraswasta') echo 'Selected' ?> value="Wiraswasta">Wiraswasta </option>
          <option <?php if($p->pekerjaan == 'Petani/Peternak') echo 'Selected' ?> value="Petani/Peternak">Petani/Peternak </option>
          <option <?php if($p->pekerjaan == 'Buruh') echo 'Selected' ?> value="Buruh">Buruh </option>
          <option <?php if($p->pekerjaan == 'Lain-lain') echo 'Selected' ?> value="Lain-lain">Lain-lain </option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Status Perkawinan">Status Perkawinan :</label>
      <div class="col-sm-4">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" <?php if($p->status == '1') echo 'checked' ?> value="1">
          <label class="form-check-label" for="Kawin">Kawin</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" <?php if($p->status == '0') echo 'checked' ?> value="0">
          <label class="form-check-label" for="Belum Kawin">Belum Kawin</label>
        </div>
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
<?php $this->load->view("_partials/js.php") ?>
    
</body>
</html>