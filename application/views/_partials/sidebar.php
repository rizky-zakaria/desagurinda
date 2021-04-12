<!-- Sidebar -->
<ul class="sidebar navbar-nav ">
	<div class="border-bottom border-light mt-2">
		<p class="nav-header mb-1 ml-3 text-light">Menu Utama</p>
	</div>
	<li class="wow fadeInLeft nav-item <?php echo $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('dashboard') ?>">
			<i class="fas fa-fw fa-home"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<?php

	if ($this->session->userdata('peran') != "pimpinan") {
	?>
		<div class="border-bottom border-light mt-2">
			<p class="nav-header mb-1 ml-3 text-light">Data</p>
		</div>
		<li class="wow fadeInLeft nav-item <?php echo $this->uri->segment(1) == 'penduduk' ? 'active' : '' ?>">
			<a class="nav-link" href="<?php echo site_url('penduduk') ?>">
				<i class="fas fa-fw fa-users"></i>
				<span>Penduduk</span>
			</a>
		</li>
		<li class="wow fadeInLeft nav-item <?php echo $this->uri->segment(2) == 'kelahiran' ? 'active' : '' ?>">
			<a class="nav-link" href="<?php echo site_url('peristiwa/kelahiran') ?>">
				<i class="fas fa-fw fa-birthday-cake"></i>
				<span>Kelahiran</span>
			</a>
		</li>
		<li class="wow fadeInLeft nav-item <?php echo $this->uri->segment(2) == 'kematian' ? 'active' : '' ?>">
			<a class="nav-link" href="<?php echo site_url('peristiwa/kematian') ?>">
				<i class="fas fa-fw fa-users"></i>
				<span>Kematian</span>
			</a>
		</li>
		<li class="wow fadeInLeft nav-item <?php echo $this->uri->segment(2) == 'pindah' ? 'active' : '' ?>">
			<a class="nav-link" href="<?php echo site_url('peristiwa/pindah') ?>">
				<i class="fas fa-fw fa-arrow-right"></i>
				<span>Pindah</span>
			</a>
		</li>
		<li class="wow fadeInLeft nav-item <?php echo $this->uri->segment(2) == 'datang' ? 'active' : '' ?>">
			<a class="nav-link" href="<?php echo site_url('peristiwa/datang') ?>">
				<i class="fas fa-fw fa-arrow-left"></i>
				<span>Datang</span>
			</a>
		</li>
		<?php
		if ($this->session->userdata('peran') == 'admin') {
		?>
			<li class="wow fadeInLeft nav-item <?php echo $this->uri->segment(2) == 'datang' ? 'active' : '' ?>">
				<a class="nav-link" href="<?php echo site_url('pengguna') ?>">
					<i class="fas fa-fw fa-users"></i>
					<span>Pengguna</span>
				</a>
			</li>

		<?php
		}
		?>
	<?php } ?>
	<div class="border-bottom border-light mt-2">
		<p class="nav-header mb-1 ml-3 text-light">Laporan</p>
	</div>
	<li class="wow fadeInLeft nav-item  <?php echo $this->uri->segment(2) == 'laporan' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('peristiwa/laporan') ?>">
			<i class="fas fa-fw fa-print"></i>
			<span>Kependudukan</span>
		</a>
	</li>
	<div class="border-bottom border-light mt-2">
	</div>
	<li class="wow fadeInLeft nav-item active">
		<a class="nav-link" href="<?php echo site_url('penduduk') ?>" href="#" data-toggle="modal" data-target="#logoutModal">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span>Keluar</span>
		</a>
	</li>
</ul>
