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
            <i class="fas fa-table pr-1 pb-0"></i>Edit Penduduk
          </div>
          <div class="card-body">
            <?php foreach($penduduk as $p){ ?>
            <form class="form-horizontal" action='<?php echo base_url(). 'penduduk/update'; ?>' method="POST">

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="NIK">Nomor Induk Kependudukan :</label>
      <div class="col-sm-4">
        <input type="text" value="<?php echo $p->nik ?>" id="nik" name="nik" class="form-control" minlength="16" maxlength="16">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="No KK">Nomor Kartu Keluarga :</label>
      <div class="col-sm-4">
        <input type="text" id="nomor_kk" name="nomor_kk" value="<?php echo $p->nomor_kk ?>" class="form-control" minlength="16" maxlength="16">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Nama Lengkap">Nama Lengkap :</label>
      <div class="col-sm-4">
        <input type="text" id="nama" name="nama" value="<?php echo $p->nama ?>" class="form-control">
      </div>
    </div>

  <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Hubungan Keluarga">Hubungan Keluarga :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="hubungan_keluarga">
          <option value="Kepala Keluarga"<?php if($p->hubungan_keluarga == 'Kepala Keluarga'){echo 'selected';} ?>>Kepala Keluarga </option>
          <option value="Anak"<?php if($p->hubungan_keluarga == 'Anak'){echo 'selected';} ?>>Anak </option>
          <option value="Istri"<?php if($p->hubungan_keluarga == 'Istri'){echo 'selected';} ?>>Istri </option>
          <option value="Suami"<?php if($p->hubungan_keluarga == 'Suami'){echo 'selected';} ?>>Suami </option>
          <option value="Orang Tua"<?php if($p->hubungan_keluarga == 'Orang Tua'){echo 'selected';} ?>>Orang Tua </option>
          <option value="Famili Lain"<?php if($p->hubungan_keluarga == 'Famili Lain'){echo 'selected';} ?>>Famili Lain </option>
          <option value="Lainnya"<?php if($p->hubungan_keluarga == 'Lainnya'){echo 'selected';} ?>>Lainnya </option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Tempat Lahir">Tempat Lahir :</label>
      <div class="col-sm-4">
        <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?php echo $p->tempat_lahir ?>" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Tanggal Lahir">Tanggal Lahir :</label>
      <div class="col-sm-4">
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $p->tanggal_lahir ?>" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Jenis Kelamin" >Jenis Kelamin :</label>
      <div class="col-sm-4">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-Laki" <?php if($p->jenis_kelamin == 'Laki-Laki'){echo 'checked';} ?> />
          <label class="form-check-label" for="Laki-Laki">Laki-Laki</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" <?php if($p->jenis_kelamin == 'Perempuan'){echo 'checked';} ?> />
          <label class="form-check-label" for="Perempuan">Perempuan</label>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Alamat">Alamat :</label>
      <div class="col-sm-4">
        <input type="text" id="alamat" name="alamat" placeholder="Alamat" value="<?php echo $p->alamat ?>" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Dusun">Dusun :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="dusun">
          <option value="Talanggila"<?php if($p->dusun == 'Talanggila'){echo 'selected';} ?>>Talanggila </option>
          <option value="Baleya"<?php if($p->dusun == 'Baleya'){echo 'selected';} ?>>Baleya </option>
          <option value="Batunobutao"<?php if($p->dusun == 'Batunobutao'){echo 'selected';} ?>>Batunobutao </option>
          <option value="Bubatuno"<?php if($p->dusun == 'Bubatuno'){echo 'selected';} ?>>Bubatuno </option>
        </select>
      </div>
    </div>

  <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Agama">Agama :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="agama">
          <option value="Islam"<?php if($p->agama == 'Islam'){echo 'selected';} ?>>Islam </option>
          <option value="Kristen"<?php if($p->agama == 'Kristen'){echo 'selected';} ?>>Kristen </option>
          <option value="Katholik"<?php if($p->agama == 'Katholik'){echo 'selected';} ?>>Katholik </option>
          <option value="Hindu"<?php if($p->agama == 'Hindu'){echo 'selected';} ?>>Hindu </option>
          <option value="Budha"<?php if($p->agama == 'Budha'){echo 'selected';} ?>>Budha </option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Pendidikan">Pendidikan :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="pendidikan">
          <option selected>-Pilih Salah Satu-</option>
          <option value="Belum Tamat SD/Sederajat" <?php if($p->pendidikan == 'Belum Tamat SD/Sederajat'){echo 'selected';} ?> >Belum Tamat SD/Sederajat </option>
          <option value="SD/Sederajat" <?php if($p->pendidikan == 'SD/Sederajat'){echo 'selected';} ?> >SD/Sederajat </option>
          <option value="SLTP/Sederajat" <?php if($p->pendidikan == 'SLTP/Sederajat'){echo 'selected';} ?> >SLTP/Sederajat </option>
          <option value="SLTA/Sederajat" <?php if($p->pendidikan == 'SLTA/Sederajat'){echo 'selected';} ?> >SLTA/Sederajat </option>
          <option value="Diploma/Sarjana" <?php if($p->pendidikan == 'Diploma/Sarjana'){echo 'selected';} ?> >Diploma/Sarjana </option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Pekerjaan">Pekerjaan :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="pekerjaan">
          <option value="Tidak Bekerja" <?php if($p->pekerjaan == 'Tidak Bekerja'){echo 'selected';} ?>>Tidak Bekerja </option>
          <option value="Mengurus Rumah Tangga" <?php if($p->pekerjaan == 'Mengurus Rumah Tangga'){echo 'selected';} ?>>Mengurus Rumah Tangga </option>
          <option value="Pelajar/Mahasiswa" <?php if($p->pekerjaan == 'Pelajar/Mahasiswa'){echo 'selected';} ?>>Pelajar/Mahasiswa </option>
          <option value="Pegawai Negeri Sipil <?php if($p->pekerjaan == 'Pegawai Negeri Sipil'){echo 'selected';} ?>">Pegawai Negeri Sipil </option>
          <option value="TNI/POLRI" <?php if($p->pekerjaan == 'TNI/POLRI'){echo 'selected';} ?>>TNI/POLRI </option>
          <option value="Pensiunan" <?php if($p->pekerjaan == 'Pensiunan'){echo 'selected';} ?>>Pensiunan </option>
          <option value="Karyawan Swasta" <?php if($p->pekerjaan == 'Karyawan Swasta'){echo 'selected';} ?>>Karyawan Swasta </option>
          <option value="Wiraswasta" <?php if($p->pekerjaan == 'Wiraswasta'){echo 'selected';} ?>>Wiraswasta </option>
          <option value="Petani/Peternak" <?php if($p->pekerjaan == 'Petani/Peternak'){echo 'selected';} ?>>Petani/Peternak </option>
          <option value="Buruh" <?php if($p->pekerjaan == 'Buruh'){echo 'selected';} ?>>Buruh </option>
          <option value="Lain-lain" <?php if($p->pekerjaan == 'Lain-lain'){echo 'selected';} ?>>Lain-lain </option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Status Perkawinan value="<?php echo $p->status_perkawinan ?> ">Status Perkawinan :</label>
      <div class="col-sm-4">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status_perkawinan" id="status_perkawinan" value="Kawin" <?php if($p->status_perkawinan == 'Kawin'){echo 'checked';} ?> >
          <label class="form-check-label" for="Kawin">Kawin</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status_perkawinan" id="status_perkawinan" value="Belum Kawin" <?php if($p->status_perkawinan == 'Belum Kawin'){echo 'checked';} ?> >
          <label class="form-check-label" for="Belum Kawin">Belum Kawin</label>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Nama Ayah">Nama Ayah :</label>
      <div class="col-sm-4">
        <input type="text" id="nama_ayah" name="nama_ayah" value="<?php echo $p->nama_ayah ?>" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Nama Ibu">Nama Ibu :</label>
      <div class="col-sm-4">
        <input type="text" id="nama_ibu" name="nama_ibu"value="<?php echo $p->nama_ibu ?>" class="form-control">
      </div>
    </div>
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success" type="submit" value="Simpan">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
        <input type="button" value="Batal" class="btn btn-secondary" onclick="history.back(-1)" />
      </div>
    </div>
    </form><?php } ?>
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