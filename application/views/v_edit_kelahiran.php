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

    <h1 class="mt-4">Data Kelahiran</h1>
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table pr-1 pb-0"></i>Edit Kelahiran
          </div>
          <div class="card-body">
            <form class="form-horizontal" action="<?php echo base_url('peristiwa/update_kelahiran') ?>" method="POST">
    <?php foreach($kelahiran as $k){ ?>
    <input type="hidden" name="kode_kelahiran" value="<?php echo $k->kode_kelahiran ?>">
    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="No KK">Nomor Kartu Keluarga :</label>
      <div class="col-sm-4">
        <input type="text" id="id" name="no_kk"  value="<?php echo $k->no_kk ?>" placeholder="Nomor Kartu Keluarga" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <h4 class="col-sm-3">Bayi/Anak</h4>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Nama Lengkap">Nama Lengkap :</label>
      <div class="col-sm-4">
        <input type="text" name="nama"  value="<?php echo $k->nama ?>"placeholder="Nama Lengkap" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Jenis Kelamin">Jenis Kelamin :</label>
      <div class="col-sm-4">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_kelamin" <?php if($k->jenis_kelamin == 'l') echo 'checked' ?> value="l">
          <label class="form-check-label" for="Laki-Laki">Laki-Laki</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_kelamin" <?php if($k->jenis_kelamin == 'p') echo 'checked' ?> value="p">
          <label class="form-check-label" for="Perempuan">Perempuan</label>
        </div>
      </div>
    </div>

  <div class="form-group row">
      <label class="col-sm-3 col-form-label">Tempat Dilahirkan :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="tempat_dilahirkan">
          <option <?php if($k->tempat_dilahirkan == 'Rumah Sakit') echo 'Selected' ?> value="Rumah Sakit">Rumah Sakit</option>
          <option <?php if($k->tempat_dilahirkan == 'Puskesmas') echo 'Selected' ?> value="Puskesmas">Puskesmas</option>
          <option <?php if($k->tempat_dilahirkan == 'Polindes') echo 'Selected' ?> value="Polindes">Polindes</option>
          <option <?php if($k->tempat_dilahirkan == 'Rumah') echo 'Selected' ?> value="Rumah">Rumah</option>
          <option <?php if($k->tempat_dilahirkan == 'Lainnya') echo 'Selected' ?> value="Lainnya">Lainnya</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Tempat Lahir">Tempat Kelahiran :</label>
      <div class="col-sm-4">
        <input type="text" name="tempat_lahir"  value="<?php echo $k->tempat_lahir ?>"placeholder="Tempat Lahir" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Hari Lahir :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="hari_lahir">
          <option value="MINGGU">MINGGU </option>
          <option value="SENIN">SENIN </option>
          <option value="SELASA">SELASA </option>
          <option value="RABU">RABU </option>
          <option value="KAMIS">KAMIS </option>
          <option value="JUM'AT">JUM'AT </option>
          <option value="SABTU">SABTU </option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"  for="Tanggal Lahir">Tanggal Lahir :</label>
      <div class="col-sm-4">
        <input type="date" id="tanggal_lahir" name="tanggal_lahir"  value="<?php echo $k->tanggal_lahir ?>" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Pukul :</label>
      <div class="col-sm-4">
        <input type="time" name="jam_lahir" value="<?php echo $k->jam_lahir ?>" placeholder="" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Kelahiran Ke :</label>
      <div class="col-sm-4">
        <input type="text" name="kelahiran_ke" value="<?php echo $k->kelahiran_ke ?>" placeholder="Kelahiran Ke" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label" >Jenis Kelahiran :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="jenis_kelahiran">
          <option value="Tunggal">Tunggal</option>
          <option value="Kembar 2">Kembar 2</option>
          <option value="Kembar 3">Kembar 3</option>
          <option value="Kembar 4">Kembar 4</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Penolong Kelahiran :</label>
      <div class="col-sm-4">
        <select class="custom-select" name="penolong">
          <option value="Dokter">Dokter </option>
          <option value="Bidan/Perawat">Bidan/Perawat </option>
          <option value="Dukun">Dukun </option>
          <option value="Lainnya">Lainnya </option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Berat Bayi :</label>
      <div class="col-sm-4">
        <input type="text" name="berat"  value="<?php echo $k->berat ?>"placeholder="Berat Bayi" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Panjang Bayi :</label>
      <div class="col-sm-4">
        <input type="text" name="panjang" value="<?php echo $k->panjang ?>" placeholder="Panjang Bayi" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <h4 class="col-sm-3">IBU</h4>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">NIK Ibu :</label>
      <div class="col-sm-4">
        <input type="text" name="nik_ibu"  value="<?php echo $k->nik_ibu ?>"placeholder="Nomor Induk Kependudukan" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Tanggal Perkawinan :</label>
      <div class="col-sm-4">
        <input type="date" name="tanggal_perkawinan" value="<?php echo $k->tanggal_perkawinan ?>" placeholder="Nomor Induk Kependudukan" class="form-control" required>
      </div>
    </div>

    <div class="form-group row">
      <h4 class="col-sm-3">AYAH</h4>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">NIK Ayah :</label>
      <div class="col-sm-4">
        <input type="text" name="nik_ayah"  value="<?php echo $k->nik_ayah ?>"placeholder="Nomor Induk Kependudukan" class="form-control">
      </div>
    </div>

    <div class="form-group row">
      <h4 class="col-sm-3">PELAPOR</h4>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">NIK Pelapor :</label>
      <div class="col-sm-4">
        <input type="text" name="nik_pelapor"  value="<?php echo $k->nik_pelapor ?>"placeholder="Nomor Induk Kependudukan" class="form-control"  ">
      </div>
    </div>

    <div class="form-group row">
      <h4 class="col-sm-3">SAKSI I</h4>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">NIK Saksi I :</label>
      <div class="col-sm-4">
        <input type="text" name="nik_saksi1"  value="<?php echo $k->nik_saksi1 ?>"placeholder="Nomor Induk Kependudukan" class="form-control"  ">
      </div>
    </div>

    <div class="form-group row">
      <h4 class="col-sm-3">SAKSI 2</h4>
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label">NIK Saksi II :</label>
      <div class="col-sm-4">
        <input type="text" name="nik_saksi2" value="<?php echo $k->nik_saksi2 ?>" placeholder="Nomor Induk Kependudukan" class="form-control" ">
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