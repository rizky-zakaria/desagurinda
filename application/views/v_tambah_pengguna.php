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

				<h1 class="mt-4">Data Pengguna</h1>
				<div class="card mb-3">
					<div class="card-header">
						<i class="fas fa-table pr-1 pb-0"></i>Tambah Pengguna
					</div>
					<div class="card-body">
						<form class="form-horizontal" action='aksiTambah' method="POST">

							<!-- <input type="hidden" name="kode_kelahiran" value="LHR<?php echo sprintf("%04s", $kode_kelahiran) ?>"> -->
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="No KK">ID Admin :</label>
								<div class="col-sm-4">
									<input type="text" id="id" name="id" placeholder="ID Admin" class="form-control" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="Nama Lengkap">Nama Lengkap :</label>
								<div class="col-sm-4">
									<input type="text" id="nama" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="Nama Lengkap">Nama Pengguna :</label>
								<div class="col-sm-4">
									<input type="text" id="pengguna" name="nama_pengguna" placeholder="Nama Pengguna" class="form-control" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="Kata Sandi">Kata Sandi :</label>
								<div class="col-sm-4">
									<input type="text" id="Sandi" name="sandi" placeholder="Kata Sandi" class="form-control" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="Jenis Kelamin">Jenis Kelamin :</label>
								<div class="col-sm-4">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="peran" id="peran" value="admin">
										<label class="form-check-label" for="Laki-Laki">Admin Desa</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="peran" id="peran" value="pimpinan">
										<label class="form-check-label" for="Perempuan">Pimpinan</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="peran" id="peran" value="dusun">
										<label class="form-check-label" for="Perempuan">Kepala Dusun</label>
									</div>
								</div>
							</div>
					</div>
				</div>
				<div class=" controls">
					<button type="submit" class="btn btn-success">Tambah</button>
					<button type="reset" class="btn btn-danger">Reset</button>
					<input type="button" value="Batal" class="btn btn-secondary" onclick="history.back(-1)" />
				</div>
			</div>
		</div>
		<!-- Button -->
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
