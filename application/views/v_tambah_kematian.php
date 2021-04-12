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

				<h1 class="mt-4">Perisitwa Kematian</h1>
				<div class="card mb-3">
					<div class="card-header">
						<i class="fas fa-table pr-1 pb-0"></i>Tambah Kematian
					</div>
					<div class="card-body">
						<form class="form-horizontal" action='tambah_kematian_aksi' method="POST">
							<!-- <input type="hidden" name="kode_kematian" value="MAT<?php echo sprintf("%04s", $kode_kematian) ?>"> -->

							<div class="form-group row">
								<h4 class="col-sm-3">Jenazah</h4>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="NIK">Nomor Induk Kependudukan :</label>
								<div class="col-sm-4">
									<input type="text" name="nik" placeholder="Nomor Induk Kependudukan" class="form-control" value="<?= $get['nik']; ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="no_kk">Nomor KK :</label>
								<div class="col-sm-4">
									<input type="text" name="no_kk" placeholder="Nomor KK" class="form-control" value="<?= $kk['no_kk'] ?>" required>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Anak Ke :</label>
								<div class="col-sm-4">
									<input type="text" name="anak_ke" placeholder="Anak Ke" class="form-control" required>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="Tanggal Kematian">Tanggal Kematian :</label>
								<div class="col-sm-4">
									<input type="date" id="tanggal_kematian" name="tanggal_kematian" placeholder="" class="form-control" required>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Pukul :</label>
								<div class="col-sm-4">
									<input type="time" name="jam_kematian" placeholder="" class="form-control" required>
								</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Sebab Kematian :</label>
								<div class="col-sm-4">
									<select class="custom-select" name="sebab">
										<option value="Sakit Keras / Tua">Sakit Keras / Tua</option>
										<option value="Wabah Penyakit">Wabah Penyakit</option>
										<option value="Kriminalitas">Kriminalitas</option>
										<option value="Bunuh Diri">Bunuh Diri</option>
										<option value="Kecelakaan">Kecelakaan</option>
										<option value="Lainnya">Lainnya</option>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Tempat Kematian :</label>
								<div class="col-sm-4">
									<input type="text" name="tempat_kematian" placeholder="Tempat Kematian" class="form-control" required>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Yang Menerangkan :</label>
								<div class="col-sm-4">
									<select class="custom-select" name="menerangkan">
										<option value="Dokter">Dokter </option>
										<option value="Tenaga Kesehatan">Tenaga Kesehatan </option>
										<option value="Kepolisian">Kepolisian </option>
										<option value="Lainnya">Lainnya </option>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<h4 class="col-sm-3">IBU</h4>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">NIK Ibu :</label>
								<div class="col-sm-4">
									<input type="text" name="nik_ibu" class="form-control" value="<?= $get['nik_ibu']; ?>">
								</div>
							</div>

							<div class="form-group row">
								<h4 class="col-sm-3">AYAH</h4>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">NIK Ayah :</label>
								<div class="col-sm-4">
									<input type="text" name="nik_ayah" class="form-control" value="<?= $get['nik_ayah']; ?>">
								</div>
							</div>

							<div class="form-group row">
								<h4 class="col-sm-3">PELAPOR</h4>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">NIK Pelapor :</label>
								<div class="col-sm-4">
									<input type="text" name="nik_pelapor" placeholder="Nomor Induk Kependudukan" class="form-control">
								</div>
							</div>

							<div class=" form-group row">
								<h4 class="col-sm-3">SAKSI I</h4>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">NIK Saksi I :</label>
								<div class="col-sm-4">
									<input type="text" name="nik_saksi1" placeholder="Nomor Induk Kependudukan" class="form-control">
								</div>
							</div>

							<div class=" form-group row">
								<h4 class="col-sm-3">SAKSI 2</h4>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">NIK Saksi II :</label>
								<div class="col-sm-4">
									<input type="text" name="nik_saksi2" placeholder="Nomor Induk Kependudukan" class="form-control">
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
