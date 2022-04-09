<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Price list</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item active">Price List</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="card-body pb-10">
					<div class="card-deck text-center">
						<?php foreach ($listitem as $b) { 
						$encrypturl = urlencode($this->encrypt->encode($b->id)) ?>
						<a href="<?php echo base_url() . 'listing/listing_price_detail/?price='. $encrypturl ?>">
							<div class="card mb-3" style="width:17rem;">
								<img src="<?php echo base_url() . 'gambar/brand/'. $b->foto ?>" class="card-img-top rounded"
									height="200" width="200" onerror="this.style.display='none'">
								<div class="card-body">
									<h5 class="card-title text-center text-muted"><b><?php echo strtoupper($b->nama)?></b></h5>
								</div>
							</div>
						</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
