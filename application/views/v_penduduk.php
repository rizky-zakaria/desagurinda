<!DOCTYPE html>
<html lang="en">

<head>
	<style type="text/css">
		.card-header {
			display: flex;
			justify-content: space-between;
			align-content: center;
		}
	</style>
	<?php $this->load->view("_partials/head.php");
	?>

	<?php $this->load->view("_partials/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("_partials/sidebar.php") ?>


		<div id="content-wrapper">
			<div class="container-fluid">
				<h1 class="mt-4">Data Penduduk</h1>
				<div class="card mb-3">
					<div class="card-header">
						<p><i class="fas fa-users pr-1 pb-0"></i>Data Penduduk</p>
						<div class="tambah">
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
								Import Data
							</button>
							<a href="<?= base_url("Penduduk"); ?>/exportToExcel" class="btn btn-success">Export To Excel</a>
							<a href="<?php echo base_url('penduduk/penambahan') ?>" class="nutton btn btn-success"><i class="fas fa-plus pr-1 pb-0"></i>Penduduk</a>
						</div>
					</div>

					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Dusun</th>
										<th>No. KK</th>
										<th>Alamat</th>
										<th>Nama Kepala Keluarga</th>
										<th>NIK</th>
										<th>Nama Anggota Keluarga</th>
										<th>Jenis Kelamin</th>
										<th>Hubungan</th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Usia</th>
										<th>Status</th>
										<th>Author</th>
										<th>Update At</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php

									$no = 1;
									foreach ($penduduk as $p) {
									?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php
												switch ($p->dusun) {
													case '1':
														echo 'Dusun I';
														break;
													case '2':
														echo 'Dusun II';
														break;

													case '3':
														echo 'Dusun III';
														break;

													default:
														echo 'Dusun IV';
														break;
												}
												?></td>
											<td><?php echo $p->no_kk ?></td>
											<td><?php echo $p->alamat ?></td>
											<td><?php

												$nama_kk = $this->m_penduduk->tampil_nama_kk($p->nik_kk);
												echo $nama_kk;
												?></td>
											<td><?php echo $p->nik ?></td>
											<td><?php echo $p->nama ?></td>
											<td><?php
												switch ($p->jenis_kelamin) {
													case 'l':
														echo 'Laki-Laki';
														break;
													default:
														echo 'Perempuan';
														break;
												}
												?></td>
											<td><?php echo $p->hubungan ?></td>
											<td><?php echo $p->tempat_lahir ?></td>
											<td><?php echo $p->tanggal_lahir ?></td>
											<td><?php
												$biday = new DateTime($p->tanggal_lahir);
												$today = new DateTime();
												$umur = $today->diff($biday);
												echo $umur->y;
												?></td>
											<td><?php
												switch ($p->status) {
													case '1':
														echo 'Menikah';
														break;
													default:
														echo 'Belum Menikah';
														break;
												}
												?></td>
											<td><?= $p->nama_pengguna; ?></td>
											<td><?= $p->update_at; ?></td>
											<td>
												<a class=" btn btn-sm btn-success text-light mb-1" href="<?php echo 'penduduk/edit/' . $p->nik ?>">Edit</a>
												<a class=" btn btn-sm btn-danger text-light mb-1" href="#" data-toggle="modal" data-target="<?php echo '#hapusModal' . $p->nik ?>">Hapus</a>
											</td>

										</tr>
										<!-- Hapus Modal-->
										<div class="modal fade" id="<?php echo 'hapusModal' . $p->nik ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
														<a class="btn btn-danger" href="<?php echo base_url('penduduk/hapus/' . $p->nik) ?>">Hapus</a>
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
	<!-- <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


	<script>
		$(function() {
			$("#dataTable").DataTable({
				"responsive": true,
				"lengthChange": false,
				"autoWidth": false,
				"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
			}).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');
			$('#dataTable').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
			});
		});
	</script> -->
	<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>penduduk/import_excel">
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<div class="input-group mb-3">
							<div class="custom-file mr-2">
								<input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
								<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	</body>

</html>
