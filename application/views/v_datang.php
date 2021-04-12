<!DOCTYPE html>
<html lang="en">

<head>
	<style type="text/css">
		.card-header {
			display: flex;
			justify-content: space-between;
		}
	</style>
	<?php $this->load->view("_partials/head.php") ?>

<body id="page-top">

	<?php $this->load->view("_partials/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
				<h1 class="mt-4">Data Pendatang</h1>
				<div class="card mb-3">
					<div class="card-header">
						<p><i class="fas fa-table"></i>
							Data Kedatangan</p>
						<a href="<?php echo base_url('peristiwa/tambah_datang') ?>" class="nutton btn btn-success"><i class="fas fa-plus pr-1 pb-0"></i>Datang</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Status Pindah</th>
										<th>Nomor KK</th>
										<!-- <th>Nama</th> -->
										<th>Tanggal Datang</th>
										<th>Alamat</th>
										<th>Author</th>
										<th>Update At</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Status Pindah</th>
										<th>Nomor KK</th>
										<!-- <th>Nama</th> -->
										<th>Tanggal Datang</th>
										<th>Alamat</th>
										<th>Author</th>
										<th>Update At</th>
										<th>Aksi</th>
									</tr>
								</tfoot>
								<tbody>
									<?php
									$no = 1;
									foreach ($datang as $d) {
									?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $d->stat_pindah ?></td>
											<td><?php echo $d->no_kk ?></td>
											<!-- <td><?php
														echo $d->nama_kk;
														?></td> -->
											<td><?php echo $d->tanggal_datang ?></td>
											<td><?php echo $d->alamat ?></td>
											<td><?php echo $d->nama_pengguna ?></td>
											<td><?php echo $d->update_at ?></td>
											<td>
												<a class=" btn btn-sm btn-primary text-light mb-1" href="<?php echo base_url('peristiwa/detail_datang/' . $d->kode_datang) ?>">Detail</a>
												<a class=" btn btn-sm btn-success text-light mb-1" href="<?php echo 'edit_datang/' . $d->kode_datang ?>">Edit</a>
												<a class=" btn btn-sm btn-danger text-light mb-1" href="#" data-toggle="modal" data-target="<?php echo '#hapusModal' . $d->kode_datang ?>">Hapus</a>
											</td>
										</tr><!-- Hapus Modal-->
										<div class="modal fade" id="<?php echo 'hapusModal' . $d->kode_datang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
														<a class="btn btn-danger" href="<?php echo base_url('peristiwa/hapus_datang/' . $d->kode_datang) ?>">Hapus</a>
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
