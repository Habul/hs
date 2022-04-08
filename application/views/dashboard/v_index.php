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
					<div class="small-box bg-light shadow">
						<div class="inner">
							<h3><?php echo $listing_na ?></h3>
							<p>Total Listing N/A</p>
						</div>
						<div class="icon">
							<i class="fas fa-file"></i>
						</div>
						<?php if ($this->session->userdata('level') != "guest") {  ?>
						<a href="<?php echo base_url('listing/listing') ?>" class="small-box-footer">More info
							<i class="fa fa-arrow-circle-right"></i></a>
						<?php } ?>
					</div>
				</div>

				<div class="col-lg-3 col-6">
					<div class="small-box bg-info shadow">
						<div class="inner">
							<h3><?php echo $listing_submit ?></h3>
							<p>Total Listing Submited</p>
						</div>
						<div class="icon">
							<i class="fas fa-bookmark"></i>
						</div>
						<?php if ($this->session->userdata('level') != "guest") {  ?>
						<a href=" <?php echo base_url('listing/listing') ?>" class="small-box-footer">More info
							<i class="fa fa-arrow-circle-right"></i></a>
						<?php } ?>
					</div>
				</div>

				<div class="col-lg-3 col-6">
					<div class="small-box bg-yellow shadow">
						<div class="inner">
							<h3><?php echo $listing_notice ?></h3>
							<p>Total Listing Notice</p>
						</div>
						<div class="icon">
							<i class="fas fa-bullhorn"></i>
						</div>
						<?php if ($this->session->userdata('level') != "guest") {  ?>
						<a href="<?php echo base_url('listing/listing') ?>" class="small-box-footer">More info
							<i class="fa fa-arrow-circle-right"></i></a>
						<?php } ?>
					</div>
				</div>

				<div class="col-lg-3 col-6">
					<div class="small-box bg-green shadow">
						<div class="inner">
							<h3><?php echo $listing_accept ?></h3>
							<p>Total Listing Accepted</p>
						</div>
						<div class="icon">
							<i class="fas fa-lock"></i>
						</div>
						<?php if ($this->session->userdata('level') != "guest") {  ?>
						<a href="<?php echo base_url('listing/listing') ?>" class="small-box-footer">More info
							<i class="fa fa-arrow-circle-right"></i></a>
						<?php } ?>
					</div>
				</div>

				<div class="col-lg-3 col-6">
					<div class="small-box bg-lime shadow">
						<div class="inner">
							<h3><?php echo $listing_all ?></h3>
							<p>Total Listing All</p>
						</div>
						<div class="icon">
							<i class="fas fa-file-alt"></i>
						</div>
						<?php if ($this->session->userdata('level') != "guest") {  ?>
						<a href="<?php echo base_url('listing/listing') ?>" class="small-box-footer">More info
							<i class="fa fa-arrow-circle-right"></i></a>
						<?php } ?>
					</div>
				</div>

				<div class="col-lg-3 col-6">
					<div class="small-box bg-red shadow">
						<div class="inner">
							<h3><?php echo $jumlah_pengguna ?></h3>
							<p>Total User</p>
						</div>
						<div class="icon">
							<i class="fas fa-users"></i>
						</div>
						<?php if ($this->session->userdata('level') != "guest") {  ?>
						<a href="<?php echo base_url('dashboard/pengguna') ?>" class="small-box-footer">More info
							<i class="fa fa-arrow-circle-right"></i></a>
						<?php } ?>
					</div>
				</div>
			</div>
	</section>
</div>
