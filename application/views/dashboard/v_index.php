<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Welcome back, <?php echo ucwords($this->session->userdata('nama')) ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div class="small-box bg-info shadow">
						<div class="inner">
							<h3><?php echo $jumlah_SJ ?></h3>
							<p>Total Surat Jalan</p>
						</div>
						<div class="icon">
							<i class="ion ion-android-list"></i>
						</div>
						<?php if ($this->session->userdata('level') != "guest") {  ?>
						<a href="<?php echo base_url('sj/sj') ?>" class="small-box-footer">More info <i
								class="fa fa-arrow-circle-right"></i></a>
						<?php } ?>
					</div>
				</div>

				<div class="col-lg-3 col-6">
					<div class="small-box bg-yellow shadow">
						<div class="inner">
							<h3><?php echo $listing_all ?></h3>
							<p>Total Qoutation</p>
						</div>
						<div class="icon">
							<i class="ion ion-android-document"></i>
						</div>
						<?php if ($this->session->userdata('level') != "guest") {  ?>
						<a href="<?php echo base_url('listing/listing') ?>" class="small-box-footer">More info <i
								class="fa fa-arrow-circle-right"></i></a>
						<?php } ?>
					</div>
				</div>

				<div class="col-lg-3 col-6">
					<div class="small-box bg-green shadow">
						<div class="inner">
							<h3><?php echo $listing_ok ?></h3>
							<p>Total Qoutation Clear</p>
						</div>
						<div class="icon">
							<i class="ion ion-ios-briefcase"></i>
						</div>
						<?php if ($this->session->userdata('level') != "guest") {  ?>
						<a href="<?php echo base_url('listing/listing') ?>" class="small-box-footer">More info <i
								class="fa fa-arrow-circle-right"></i></a>
						<?php } ?>
					</div>
				</div>

				<div class="col-lg-3 col-6">
					<div class="small-box bg-red shadow">
						<div class="inner">
							<h3><?php echo $jumlah_pengguna ?></h3>
							<p>Total Pengguna</p>
						</div>
						<div class="icon">
							<i class="fas fa-users"></i>
						</div>
						<?php if ($this->session->userdata('level') != "guest") {  ?>
						<a href="<?php echo base_url('dashboard/pengguna') ?>" class="small-box-footer">More info <i
								class="fa fa-arrow-circle-right"></i></a>
						<?php } ?>
					</div>
				</div>
			</div>
	</section>
</div>
