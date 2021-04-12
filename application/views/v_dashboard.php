<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("_partials/head.php") ?>

	<?php $this->load->view("_partials/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("_partials/sidebar.php") ?>

		<div id="content-wrapper">
			<section class="container-fluid">
				<h1 class="mt-4">Dashboard</h1>
				<?php
				$connection = mysqli_connect('localhost', 'admin', 'admin', 'desagurinda');
				?>
				<div class="row">
					<div class="col-lg-6">
						<div class="card mb-3">
							<div class="card-header">
								<i class="fas fa-chart-bar"></i>
								Diagram Penduduk Berdasarkan Dusun
							</div>
							<div class="card-body">
								<canvas id="myBarChart" width="100%" height="50"></canvas>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card mb-3">
							<div class="card-header">
								<i class="fas fa-chart-bar"></i>
								Diagram Penduduk Berdasarkan Umur
							</div>
							<div class="card-body">
								<canvas id="chart_umur" width="100%" height="50"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="card mb-3">
							<div class="card-header">
								<i class="fas fa-chart-pie"></i>
								Diagram Penduduk Berdasarkan Pendidikan
							</div>
							<div class="card-body">
								<canvas id="chart_pendidikan" width="100%" height="50"></canvas>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card mb-3">
							<div class="card-header">
								<i class="fas fa-chart-pie"></i>
								Diagram Penduduk Berdasarkan Jenis Kelamin
							</div>
							<div class="card-body">
								<canvas id="myPieChart" width="100%" height="50"></canvas>
							</div>
						</div>
					</div>
				</div>
			</section>


			<script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>
			<script>
				// Set new default font family and font color to mimic Bootstrap's default styling
				Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
				Chart.defaults.global.defaultFontColor = '#292b2c';

				// Bar Chart Example
				var ctx = document.getElementById("myBarChart");
				var myLineChart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: ["DUSUN I", "DUSUN II", "DUSUN III", "DUSUN IV"],
						datasets: [{
							label: "",
							backgroundColor: ['#264653', '#2a9d8f', '#e9c46a', '#f4a261'],
							data: [
								<?php
								$query = mysqli_query($connection, "SELECT dusun, COUNT(*) AS jumlah FROM penduduk WHERE dusun = '1' AND status != '3' ");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah'];
								?>,
								<?php
								$query = mysqli_query($connection, "SELECT dusun, COUNT(*) AS jumlah FROM penduduk WHERE dusun = '2' AND status != '3' ");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah'];
								?>,
								<?php
								$query = mysqli_query($connection, "SELECT dusun, COUNT(*) AS jumlah FROM penduduk WHERE dusun = '3' AND status != '3' ");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah'];
								?>,
								<?php
								$query = mysqli_query($connection, "SELECT dusun, COUNT(*) AS jumlah FROM penduduk WHERE dusun = '4' AND status != '3' ");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah'];
								?>
							],
						}],
					},
					options: {
						scales: {
							xAxes: [{
								time: {
									unit: ''
								},
								gridLines: {
									display: false
								},
								ticks: {
									maxTicksLimit: 6
								}
							}],
							yAxes: [{
								ticks: {
									beginAtZero: true
								},
								gridLines: {
									display: true
								}
							}],
						},
						legend: {
							display: false
						}
					}
				});

				var ctx = document.getElementById("myPieChart");
				var myPieChart = new Chart(ctx, {
					type: 'pie',
					data: {
						labels: ["Laki-Laki", "Perempuan"],
						datasets: [{
							data: [
								<?php
								$query = mysqli_query($connection, "SELECT jenis_kelamin, COUNT(*) AS jumlah FROM penduduk WHERE jenis_kelamin = 'l' AND status != '3' ");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah'];
								?>,
								<?php
								$query = mysqli_query($connection, "SELECT jenis_kelamin, COUNT(*) AS jumlah FROM penduduk WHERE jenis_kelamin = 'p' AND status != '3' ");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah'];
								?>
							],
							backgroundColor: ['#264653', '#2a9d8f'],
						}],
					},
				});

				var ctx = document.getElementById("chart_umur");
				var myPieChart2 = new Chart(ctx, {
					type: 'pie',
					data: {
						labels: ["0 - 20 Tahun", "21 - 40 Tahun", "41 - 60 Tahun", "61 - 80 Tahun", "81 - 100 Tahun", "Diatas 100 Tahun"],
						datasets: [{
							data: [
								<?php
								$query = mysqli_query($connection, "SELECT COUNT(*) AS jumlah FROM penduduk WHERE YEAR(CURDATE())-YEAR(tanggal_lahir) BETWEEN 0 AND 20  AND status != '3' ORDER BY 'usia' ASC");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah']
								?>,
								<?php
								$query = mysqli_query($connection, "SELECT COUNT(*) AS jumlah FROM penduduk WHERE YEAR(CURDATE())-YEAR(tanggal_lahir) BETWEEN 21 AND 40  AND status != '3' ORDER BY 'usia' ASC");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah']
								?>,
								<?php
								$query = mysqli_query($connection, "SELECT COUNT(*) AS jumlah FROM penduduk WHERE YEAR(CURDATE())-YEAR(tanggal_lahir) BETWEEN 41 AND 60  AND status != '3' ORDER BY 'usia' ASC");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah']
								?>,
								<?php
								$query = mysqli_query($connection, "SELECT COUNT(*) AS jumlah FROM penduduk WHERE YEAR(CURDATE())-YEAR(tanggal_lahir) BETWEEN 61 AND 80  AND status != '3' ORDER BY 'usia' ASC");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah']
								?>,
								<?php
								$query = mysqli_query($connection, "SELECT COUNT(*) AS jumlah FROM penduduk WHERE YEAR(CURDATE())-YEAR(tanggal_lahir) BETWEEN 81 AND 100  AND status != '3' ORDER BY 'usia' ASC");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah']
								?>,
								<?php
								$query = mysqli_query($connection, "SELECT COUNT(*) AS jumlah FROM penduduk WHERE YEAR(CURDATE())-YEAR(tanggal_lahir) BETWEEN 100 AND 150  AND status != '3' ORDER BY 'usia' ASC");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah']
								?>
							],
							backgroundColor: ['#264653', '#2a9d8f', '#e9c46a', '#f4a261', '#e76f51'],
						}],
					},
				});


				var ctx = document.getElementById("chart_pendidikan");
				var myPieChart2 = new Chart(ctx, {
					type: 'pie',
					data: {
						labels: ["Belum Tamat SD/Sederajat", "SD/Sederajat", "SLTP/Sederajat", "SLTA/Sederajat", "Diploma/Sarjana"],
						datasets: [{
							data: [
								<?php
								$query = mysqli_query($connection, "SELECT COUNT(*) AS jumlah FROM penduduk WHERE pendidikan = 'Belum Tamat SD/Sederajat' AND status != '3'  ");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah']
								?>,
								<?php
								$query = mysqli_query($connection, "SELECT COUNT(*) AS jumlah FROM penduduk WHERE pendidikan = 'SD/Sederajat' AND status != '3'  ");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah']
								?>,
								<?php
								$query = mysqli_query($connection, "SELECT COUNT(*) AS jumlah FROM penduduk WHERE pendidikan = 'SLTP/Sederajat' AND status != '3'  ");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah']
								?>,
								<?php
								$query = mysqli_query($connection, "SELECT COUNT(*) AS jumlah FROM penduduk WHERE pendidikan = 'SLTA/Sederajat' AND status != '3'  ");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah']
								?>,
								<?php
								$query = mysqli_query($connection, "SELECT COUNT(*) AS jumlah FROM penduduk WHERE pendidikan = 'Diploma/Sarjana' AND status != '3'  ");
								$result = mysqli_fetch_array($query);
								echo $result['jumlah']
								?>
							],
							backgroundColor: ['#264653', '#2a9d8f', '#e9c46a', '#f4a261'],
						}],
					},
				});
			</script>

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
