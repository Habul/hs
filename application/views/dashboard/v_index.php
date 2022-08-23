<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Dashboard</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
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
							<h3><?= $listing_na ?></h3>
							<p>Total Listing N/A</p>
						</div>
						<div class="icon">
							<i class="fas fa-file"></i>
						</div>
						<?php $id0 = urlencode($this->encrypt->encode('0')) ?>
						<a href="<?= base_url('listing/list/?id=' . $id0) ?>" class="small-box-footer">More info
							<i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>

				<div class="col-lg-3 col-6">
					<div class="small-box bg-info shadow">
						<div class="inner">
							<h3><?= $listing_submit ?></h3>
							<p>Total Listing Submited</p>
						</div>
						<div class="icon">
							<i class="fas fa-bookmark"></i>
						</div>
						<?php $id2 = urlencode($this->encrypt->encode('2')) ?>
						<a href="<?= base_url('listing/list/?id=' . $id2) ?>" data-name="keyword" class="small-box-footer">More info
							<i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>

				<div class="col-lg-3 col-6">
					<div class="small-box bg-yellow shadow">
						<div class="inner">
							<h3><?= $listing_notice ?></h3>
							<p>Total Listing Notice</p>
						</div>
						<div class="icon">
							<i class="fas fa-bullhorn"></i>
						</div>
						<?php $id1 = urlencode($this->encrypt->encode('1')) ?>
						<a href="<?= base_url('listing/list/?id=' . $id1) ?>" class="small-box-footer">More info
							<i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>

				<div class="col-lg-3 col-6">
					<div class="small-box bg-green shadow">
						<div class="inner">
							<h3><?= $listing_accept ?></h3>
							<p>Total Listing Accepted</p>
						</div>
						<div class="icon">
							<i class="fas fa-lock"></i>
						</div>
						<?php $id3 = urlencode($this->encrypt->encode('3')) ?>
						<a href="<?= base_url('listing/list/?id=' . $id3) ?>" class="small-box-footer">More info
							<i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>

				<div class="col-md-4 col-sm-6 col-12">
					<div class="info-box shadow">
						<span class="info-box-icon bg-danger"><i class="fas fa-file-invoice"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Total Listing All</span>
							<span class="info-box-number"><?= $listing_all ?></span>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-6 col-12">
					<div class="info-box shadow">
						<span class="info-box-icon bg-secondary"><i class="fas fa-shopping-cart"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Total PO</span>
							<span class="info-box-number"><?= $total_po ?></span>
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
				<div class="col-md-6">
					<div class="card card-danger">
						<div class="card-header">
							<h3 class="card-title">Sales Chart</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>