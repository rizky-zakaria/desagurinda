<!DOCTYPE html>
<html lang="en">

<head>
	<style type="text/css">
		.card-header {
			display: flex;
			justify-content: space-between;
		}
	</style>
	<?php $this->load->view("_partials/head.php");
	?>

<body id="page-top">

	<?php $this->load->view("_partials/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
				<h1 class="mt-4">Data Pengguna</h1>
				<div class="card mb-3">
					<div class="card-header">
						<p><i class="fas fa-table"></i>
							Data Pengguna</p>
						<a href="<?php echo base_url('pengguna/tambahPengguna') ?>" class="nutton btn btn-success"><i class="fas fa-plus pr-1 pb-0"></i>Pengguna</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Id</th>
										<th>Nama Lengkap</th>
										<th>Nama Pengguna</th>
										<th>Kata Sandi</th>
										<th>Peran</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Id</th>
										<th>Nama Lengkap</th>
										<th>Nama Pengguna</th>
										<th>Kata Sandi</th>
										<th>Peran</th>
										<th>Aksi</th>
									</tr>
								</tfoot>
								<tbody>
									<?php
									foreach ($pengguna as $k) {
									?>
										<tr>
											<td><?php echo $k['id_admin'] ?></td>
											<td><?php echo $k['nama_lengkap'] ?></td>
											<td><?php echo $k['nama_pengguna'] ?></td>
											<td><?php echo $k['kata_sandi'] ?></td>
											<td><?php echo $k['peran'] ?></td>
											<td><a href="<?= base_url("Pengguna/hapus/") . $k['id_admin']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a> </td>
										</tr>
										<!-- Hapus Modal-->
										<div class="modal fade" id="<?php echo 'hapusModal' . $k['id_admin'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Ingin Menghapus Data?</h5>
														<button class="close" type="button" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
													</div>
													<div class="modal-body">Tekan tombol "Hapus" di bawah jika anda benar-benar ingin menghapus data ini.</div>
													<div class="modal-footer">
														<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
														<a class="btn btn-danger" href="<?php echo base_url('peristiwa/hapus_kelahiran/' . $k['id_admin']) ?>">Hapus</a>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
								</tbody>
							</table>
						</div>
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
