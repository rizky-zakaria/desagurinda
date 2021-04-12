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
	$this->load->view("_partials/head.php");
	$konek = mysqli_connect('localhost', 'admin', 'admin', 'desagurinda');
	?>

<body id="page-top">

	<?php $this->load->view("_partials/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
				<h1 class="mt-4">Data Kematian</h1>
				<div class="card mb-3">
					<div class="card-header">
						<p><i class="fas fa-table"></i>
							Data Kematian</p>
						<a href="<?php echo base_url('peristiwa/getByNik') ?>" class="nutton btn btn-success"><i class="fas fa-plus pr-1 pb-0"></i>Kematian</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Tanggal Kematian</th>
										<th>Jam Kematian</th>
										<th>Tempat Kematian</th>
										<th>Author</th>
										<th>Update At</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Tanggal Kematian</th>
										<th>Jam Kematian</th>
										<th>Tempat Kematian</th>
										<th>Author</th>
										<th>Update At</th>
										<th>Aksi</th>
									</tr>
								</tfoot>
								<tbody>
									<?php
									$no = 1;
									foreach ($kematian as $k) {
									?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php
												$query = mysqli_query($konek, "SELECT nama FROM penduduk WHERE nik = $k->nik ");
												$row = mysqli_fetch_assoc($query);
												echo $row['nama'];
												?></td>
											<td><?php echo $k->tanggal_kematian ?></td>
											<td><?php echo $k->jam_kematian ?></td>
											<td><?php echo $k->tempat_kematian ?></td>
											<td><?php echo $k->nama_pengguna ?></td>
											<td><?php echo $k->update_at ?></td>
											<td>
												<a class=" btn btn-sm btn-primary text-light mb-1" href="<?php echo base_url('cetak/kematian/' . $k->kode_kematian) ?>">Cetak</a>
												<a class=" btn btn-sm btn-success text-light mb-1" href="<?php echo 'edit_kematian/' . $k->kode_kematian ?>">Edit</a>
												<a class=" btn btn-sm btn-danger text-light mb-1" href="#" data-toggle="modal" data-target="<?php echo '#hapusModal' . $k->kode_kematian ?>">Hapus</a>
											</td>
										</tr>
										<!-- Hapus Modal-->
										<div class="modal fade" id="<?php echo 'hapusModal' . $k->kode_kematian ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
														<a class="btn btn-danger" href="<?php echo base_url('peristiwa/hapus_kematian/' . $k->kode_kematian) ?>">Hapus</a>
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
