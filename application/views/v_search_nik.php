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
						<form class="form-horizontal" action='<?= base_url('Peristiwa/tambah_kematian'); ?>' method="POST">
							<div class="form-group row">
								<h4 class="col-sm-3">Jenazah</h4>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="NIK">Nomor Induk Kependudukan :</label>
								<div class="col-sm-4">
									<input type="text" name="nik" placeholder="Nomor Induk Kependudukan" class="form-control" required>
								</div>
							</div>
							<!-- Button -->
							<div class=" controls">
								<button type="submit" class="btn btn-success">Cari</button>
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
