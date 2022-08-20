<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<?php if (mdate('%H:%i') >= '00:01' && mdate('%H:%i') <= '10:00') : ?>
						<h1 class="m-0">Good Morning <?php echo ucwords($this->session->userdata('nama')) ?></h1>
					<?php elseif (mdate('%H:%i') >= '10:01' && mdate('%H:%i') <= '18:00') : ?>
						<h1 class="m-0">Good Afternoon <?php echo ucwords($this->session->userdata('nama')) ?></h1>
					<?php elseif (mdate('%H:%i') >= '18:01' && mdate('%H:%i') <= '23:59') : ?>
						<h1 class="m-0">Good Evening <?php echo ucwords($this->session->userdata('nama')) ?></h1>
					<?php endif ?>
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
						<a href="<?php echo base_url('listing/list/0') ?>" class="small-box-footer">More info
							<i class="fa fa-arrow-circle-right"></i></a>
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
						<a href="<?= base_url('listing/list/2') ?>" data-name="keyword" class="small-box-footer">More info
							<i class="fa fa-arrow-circle-right"></i></a>
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
						<a href="<?= base_url('listing/list/1') ?>" class="small-box-footer">More info
							<i class="fa fa-arrow-circle-right"></i></a>
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
						<a href="<?= base_url('listing/list/3') ?>" class="small-box-footer">More info
							<i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>

				<div class="col-md-4 col-sm-6 col-12">
					<div class="info-box shadow">
						<span class="info-box-icon bg-danger"><i class="fas fa-file-invoice"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Total Listing All</span>
							<span class="info-box-number"><?php echo $listing_all ?></span>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-6 col-12">
					<div class="info-box shadow">
						<span class="info-box-icon bg-secondary"><i class="fas fa-shopping-cart"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Total PO</span>
							<span class="info-box-number">0</span>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-6 col-12">
					<div class="info-box shadow">
						<span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Total Users</span>
							<span class="info-box-number"><?= $jumlah_pengguna ?></span>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="card card-outline card-info">
						<div class="card-header">
							<h3 class="card-title"><b>History Login</b></h3>
							<div class="card-tools">
								<button type="button" class="btn btn-xs btn-icon" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-xs btn-icon" data-card-widget="maximize">
									<i class="fas fa-expand"></i>
								</button>
								<button type="button" class="btn btn-xs btn-icon" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table id="index1" class="table table-hover table-sm">
								<thead class="thead-light text-center">
									<tr>
										<th width="6%">No</th>
										<th>Name</th>
										<th>Ip</th>
										<th>Os</th>
										<th>Browser</th>
										<th>Date</th>
									</tr>
								</thead>
								<?php $no = 1;
								foreach ($history_log as $log) { ?>
									<tr>
										<td class="text-center align-middle"><?= $no++ ?></td>
										<td class="align-middle"><?= $log->username ?></td>
										<td class="align-middle"><?= $log->ip ?></td>
										<td class="align-middle"><?= $log->os ?></td>
										<td class="align-middle"><?= $log->browser ?></td>
										<td class="align-middle"><?= $log->date ?></td>
									</tr>
								<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
	</section>
</div>