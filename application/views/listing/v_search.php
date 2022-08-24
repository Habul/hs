<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Listing Quotation</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item active">Listing Quotation</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section class="content">
		<div class="container-fluid">
			<?php if ($this->session->flashdata('berhasil')) { ?>
				<div class="alert alert-success alert-dismissible fade show" id="info" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<i class="icon fa fa-check"></i>&nbsp;<?= $this->session->flashdata('berhasil') ?>
				</div>
			<?php } ?>
			<?php if ($this->session->flashdata('gagal')) { ?>
				<div class="alert alert-warning alert-dismissible fade show" id="info" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<i class="icon fa fa-warning"></i>&nbsp;<?= $this->session->flashdata('gagal') ?>
				</div>
			<?php } ?>
			<div class="card card-solid">
				<div class="card-header d-flex justify-content-end">
					<?= form_open('listing/search') ?>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search.." name="keyword" value="<?= $words ?>">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="submit">Search</button>
						</div>
						<?= form_close() ?>
					</div>
				</div>
				<div class="card-body pb-0">
					<div class="row row-cols-1 row-cols-md-2 g-4">
						<?php foreach ($listing as $list) { ?>
							<div class="col">
								<?php $encrypturl = urlencode($this->encrypt->encode($list->id)) ?>
								<a href="<?= base_url() . 'listing/list_update/?list=' . $encrypturl; ?>" class="text-muted">
									<?php if ($list->status == 1) : ?> <div class="card bg-warning shadow">
										<?php elseif ($list->status == 2) : ?> <div class="card bg-info shadow">
											<?php elseif ($list->status == 3) : ?> <div class="card bg-success shadow">
												<?php else : ?> <div class="card bg-default shadow">
													<?php endif; ?>
													<div class="card-body">
														<span class="float-left list-inline-item"><?= $list->id_hs ?></span>
														<span class="float-right list-inline-item"><?= strtoupper($list->company) ?></span><br />
														<span class="float-left list-inline-item">
															<i class='fas fa-user'></i>&nbsp;&nbsp;<?= ucwords($list->pengguna_nama) ?>
														</span>
														<span class="float-right list-inline-item"><?= $list->created_at ?></span>
													</div>
													</div>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>