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
            <i class="fas fa-table pr-1 pb-0"></i>Detail Penduduk
          </div>
          <div class="card-body">
            <?php foreach($penduduk as $p){ ?>
            <form class="form-horizontal" method="POST">
    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="NIK">Nomor Induk Kependudukan : <?php echo $p->nik ?></label>
    </div>

    <div class="form-group row">
     <label class="col-sm-3 col-form-label"  for="No KK">Nomor Kartu Keluarga : <?php echo $p->nomor_kk ?></label>
    </div>

    <div class="form-group row">
      <label class="col-sm-5 col-form-label"  for="Nama Lengkap">Nama Lengkap : <?php echo $p->nama ?></label>
    </div>

    <div class="form-group row">
      <label class="col-sm-5 col-form-label"  for="Hubungan Dalam Keluarga">Hubungan Dalam Keluarga : <?php echo $p->hubungan_keluarga ?></label>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Tempat Lahir">Tempat Lahir : <?php echo $p->tempat_lahir ?></label>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Tanggal Lahir">Tanggal Lahir : <?php echo $p->tanggal_lahir ?></label>
    </div>
<?php
                    $biday = new DateTime($p->tanggal_lahir);
                    $today = new DateTime();
                    $umur = $today->diff($biday); ?>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Umur">Umur : <?php echo $umur->y; ?></label>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Jenis Kelamin" >Jenis Kelamin : <?php echo $p->jenis_kelamin ?></label>
    </div>

    <div class="form-group row">
      <label class="col-sm-5 col-form-label"  for="Agama">Agama : <?php echo $p->agama ?></label>
    </div>
    
    <div class="form-group row">
      <label class="col-sm-5 col-form-label"  for="Alamat">Alamat : <?php echo $p->alamat ?></label>
    </div>
    
    <div class="form-group row">
      <label class="col-sm-5 col-form-label"  for="Dusun">Dusun : <?php echo $p->dusun ?></label>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Pendidikan">Pendidikan : <?php echo $p->pendidikan ?></label>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Pekerjaan">Pekerjaan : <?php echo $p->pekerjaan ?></label>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Status Perkawinan">Status Perkawinan : <?php echo $p->status_perkawinan ?></label>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Nama Ayah">Nama Ayah : <?php echo $p->nama_ayah ?></label>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Nama Ibu">Nama Ibu : <?php echo $p->nama_ibu ?></label>
    </div>
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <input type="button" value="Kembali" class="btn btn-secondary" onclick="history.back(-1)" />
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