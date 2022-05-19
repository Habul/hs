<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Listing</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
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
					<?php echo form_open('listing/search') ?>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search.." name="keyword" value="<?= html_escape($keyword) ?>">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="submit">Search</button>
						</div>
					</div>
					<?php echo form_close() ?>
				</div>
				<div class="card-body pb-0">
					<div class="row row-cols-1 row-cols-md-2 g-4">
						<?php foreach ($listings as $list) { ?>
							<div class="col">
								<?php $encrypturl = urlencode($this->encrypt->encode($list->id)) ?>
								<a href="<?php echo base_url() . 'listing/list_update/?list=' . $encrypturl; ?>" class="text-muted">
									<?php if ($list->status == 1) : ?> <div class="card bg-warning shadow">
										<?php elseif ($list->status == 2) : ?> <div class="card bg-info shadow">
											<?php elseif ($list->status == 3) : ?> <div class="card bg-success shadow">
												<?php else : ?>
													<div class="card bg-default shadow">
													<?php endif; ?>
													<div class="card-body">
														<span class="float-left list-inline-item">
															<?php echo $list->id_hs ?>
														</span>
														<span class="float-right list-inline-item">
															<?php echo strtoupper($list->company) ?>
														</span><br />
														<span class="float-left list-inline-item"><i class='fas fa-user'></i>&nbsp;&nbsp;
															<?php echo ucwords($list->user) ?>
														</span>
														<span class="float-right list-inline-item"><?php echo $list->created_at ?></span>
													</div>
													</div>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
				<?php echo $this->pagination->create_links(); ?>
			</div>
			<div class="col-md-3 mb-3 shadow" style="padding: 0;">
				<a class="form-control btn btn-block btn-outline-success" data-toggle="modal" data-target="#modal_add">
					<i class="fa fa-plus"></i>&nbsp; Create New List</a>
			</div>
		</div>
	</section>
</div>

<!-- Bootstrap modal add -->
<div class="modal fade" id="modal_add" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="col-12 modal-title text-center">Create New List
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h5>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post" action="<?php echo base_url('listing/post') ?>">
				<div class="modal-body">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text pr-5">ID</span>
						</div>
						<input type="hidden" name="id" readonly class="form-control" value="<?php echo $id_add->id + 1; ?>">
						<input type="text" name="id_hs" class="form-control" value="<?php echo 'HS', date('Ymd-'), $id_add->id + 1; ?>" readonly>
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text pr-1">Company</span>
						</div>
						<input type=" text" name="company" class="form-control" placeholder="(ex. PT. XYZ)" required>
					</div>
					<div class="form-group mb-0">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text pr-4">Notes</span>
							</div>
							<textarea type="text" name="notes" class="form-control" placeholder="..." required></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
					<button class="btn btn-primary" id="addbtn"><i class="fa fa-check"></i> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--End Modals Add-->