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

				<h1 class="mt-4">Peristiwa Kelahiran</h1>
				<div class="card mb-3">
					<div class="card-header">
						<i class="fas fa-table pr-1 pb-0"></i>Tambah Kelahiran
					</div>
					<div class="card-body">
						<form class="form-horizontal" action='tambah_kelahiran_aksi' method="POST">

							<input type="hidden" name="kode_kelahiran" value="LHR<?php echo sprintf("%04s", $kode_kelahiran) ?>">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="No KK">Nomor Kartu Keluarga :</label>
								<div class="col-sm-4">
									<input type="text" id="id" name="no_kk" placeholder="Nomor Kartu Keluarga" class="form-control" required onchange="isi_otomatis()">
								</div>
							</div>

							<div class="form-group row">
								<h4 class="col-sm-3">Bayi/Anak</h4>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="Nama Lengkap">Nama Lengkap :</label>
								<div class="col-sm-4">
									<input type="text" id="nama" name="nama" placeholder="Nama Lengkap" class="form-control" required>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="Jenis Kelamin">Jenis Kelamin :</label>
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
								<label class="col-sm-3 col-form-label">Tempat Dilahirkan :</label>
								<div class="col-sm-4">
									<select class="custom-select" name="tempat_dilahirkan">
										<option value="Rumah Sakit">Rumah Sakit</option>
										<option value="Puskesmas">Puskesmas</option>
										<option value="Polindes">Polindes</option>
										<option value="Rumah">Rumah</option>
										<option value="Lainnya">Lainnya</option>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="Tempat Lahir">Tempat Kelahiran :</label>
								<div class="col-sm-4">
									<input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" required>
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
								<label class="col-sm-3 col-form-label" for="Tanggal Lahir">Tanggal Lahir :</label>
								<div class="col-sm-4">
									<input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="" class="form-control" required>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Pukul :</label>
								<div class="col-sm-4">
									<input type="time" name="jam_lahir" placeholder="" class="form-control" required>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Kelahiran Ke :</label>
								<div class="col-sm-4">
									<input type="text" name="kelahiran_ke" placeholder="Kelahiran Ke" class="form-control">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Jenis Kelahiran :</label>
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
									<input type="text" name="berat" placeholder="Berat Bayi" class="form-control">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Panjang Bayi :</label>
								<div class="col-sm-4">
									<input type="text" name="panjang" placeholder="Panjang Bayi" class="form-control">
								</div>
							</div>

							<div class="form-group row">
								<h4 class="col-sm-3">IBU</h4>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">NIK Ibu :</label>
								<div class="col-sm-4">
									<input type="text" name="nik_ibu" placeholder="Nomor Induk Kependudukan" class="form-control">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Tanggal Perkawinan :</label>
								<div class="col-sm-4">
									<input type="date" name="tanggal_perkawinan" placeholder="Nomor Induk Kependudukan" class="form-control">
								</div>
							</div>

							<div class="form-group row">
								<h4 class="col-sm-3">AYAH</h4>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">NIK Ayah :</label>
								<div class="col-sm-4">
									<input type="text" name="nik_ayah" placeholder="Nomor Induk Kependudukan" class="form-control">
								</div>
							</div>

							<div class="form-group row">
								<h4 class="col-sm-3">PELAPOR</h4>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">NIK Pelapor :</label>
								<div class="col-sm-4">
									<input type="text" name="nik_pelapor" placeholder="Nomor Induk Kependudukan" class="form-control" ">
      </div>
    </div>

    <div class=" form-group row">
									<h4 class="col-sm-3">SAKSI I</h4>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">NIK Saksi I :</label>
									<div class="col-sm-4">
										<input type="text" name="nik_saksi1" placeholder="Nomor Induk Kependudukan" class="form-control" ">
      </div>
    </div>

    <div class=" form-group row">
										<h4 class="col-sm-3">SAKSI 2</h4>
									</div>

									<div class="form-group row">
										<label class="col-sm-3 col-form-label">NIK Saksi II :</label>
										<div class="col-sm-4">
											<input type="text" name="nik_saksi2" placeholder="Nomor Induk Kependudukan" class="form-control" ">
      </div>
    </div>
      <!-- Button -->
      <div class=" controls">
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
