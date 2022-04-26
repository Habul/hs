<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<?php foreach ($listitem as $b) : ?>
						<h1 class="m-0"><b><?php echo ucwords($b->nama) ?></b> Price List</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url('listing/listing_price') ?>">Price List</a>
						</li>
						<li class="breadcrumb-item active"><?php echo ucwords($b->nama) ?></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section class="content">
		<div class="container-fluid">
			<?php if ($this->session->flashdata('berhasil')) { ?>
				<div class="alert alert-success alert-dismissible fade show" id="info" role="alert">
					<button type=" button" class="close" data-dismiss="alert">&times;</button>
					<i class="icon fa fa-check"></i>&nbsp;<?= $this->session->flashdata('berhasil') ?>
				</div>
			<?php } ?>
			<?php if ($this->session->flashdata('gagal')) { ?>
				<div class="alert alert-warning alert-dismissible fade show" id="info" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<i class="icon fa fa-warning"></i>&nbsp;<?= $this->session->flashdata('gagal') ?>
				</div>
			<?php } ?>
			<div class="row">
				<div class="col-md-12">
					<div class="card card-success card-outline">
						<div class="card-header">
							<h4 class="card-title"><a class="btn btn-success col-15 shadow" data-toggle="modal" data-target="#modal_add">
									<i class="fa fa-plus"></i>&nbsp; Add New List</a>
								<a class="btn btn-warning col-15 shadow" data-toggle="modal" data-target="#modal_import">
									<i class="fas fa-file-import"></i>&nbsp; Import Data</a>
							</h4>
							<div class="card-tools">
								<button type="button" class="btn btn-xs btn-icon btn-circle btn-warning" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-xs btn-icon btn-circle btn-primary" data-card-widget="maximize">
									<i class="fas fa-expand"></i>
								</button>
								<button type="button" class="btn btn-xs btn-icon btn-circle btn-danger" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table id="index2" class="table table-striped table-sm">
								<thead class="thead-dark text-center">
									<tr>
										<th width="5%">No</th>
										<th>Jenis</th>
										<th width="18%">Part Code</th>
										<th>Desc</th>
										<th>Distributor</th>
										<th>Oem</th>
										<th>Reseller</th>
										<th>User</th>
										<th width="9%">Actions</th>
									</tr>
								</thead>
								<?php foreach ($listprice as $u) { 	?>
									<tr>
										<td class="align-middle text-center"></td>
										<td class="align-middle text-center"><?php echo strtoupper($u->jenis) ?></td>
										<td class="align-middle text-center"><?php echo strtoupper($u->part_code) ?></td>
										<td><?php echo $u->desc; ?></td>
										<td class="align-middle text-center">
											<?php echo number_format($u->distributor, 0, '.', '.'); ?></td>
										<td class="align-middle text-center"><?php echo number_format($u->oem, 0, '.', '.'); ?></td>
										<td class="align-middle text-center"><?php echo number_format($u->reseller, 0, '.', '.'); ?>
										</td>
										<td class="align-middle text-center"><?php echo number_format($u->user, 0, '.', '.'); ?></td>
										<td class="align-middle text-center">
											<a class="btn-sm btn-warning" data-toggle="modal" data-target="#modal_edit<?php echo $u->id; ?>" title="Edit">
												<i class="fa fa-pencil-alt"></i></a>
											<a class="btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $u->id; ?>" title="Delete">
												<i class="fa fa-trash"></i></a>
										</td>
									</tr>
								<?php } ?>
							</table>
						</div>
					</div>
					<div class="col-12 table-responsive-sm text-center mb-3">
						<a href="<?php echo base_url() . 'listing/listing_price' ?>" class="btn btn-default">
							<i class="fas fa-undo"></i> Back</a>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endforeach ?>
</div>

<!-- Bootstrap modal add -->
<div class="modal fade" id="modal_add" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Add New List
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form class="form-horizontal" method="post" onsubmit="addbtn.disabled = true; return true;" action="<?php echo base_url('listing/price_add') ?>">
				<div class="card-body">
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-5">Jenis</label>
							</div>
							<?php foreach ($listitem as $p) : ?>
								<input type="hidden" name="id_item" class="form-control" value="<?php echo $p->id ?>" required>
							<?php endforeach ?>
							<input type="text" name="jenis" class="form-control" placeholder="Input Jenis.." required>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-3">Part Code&nbsp;</label>
							</div>
							<input type="text" name="part_code" class="form-control" placeholder="Input part code.." required>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-5">Desc</label>
							</div>
							<textarea name="desc" class="form-control" placeholder="Input Desc.." required></textarea>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text">Distributor</label>
							</div>
							<input type="number" name="distributor" class="form-control" min="1" placeholder="Rp Distributor.." required>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-5">Oem</label>
							</div>
							<input type="number" name="oem" class="form-control" min="1" placeholder="Rp Oem.." required>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-4">Reseller</label>
							</div>
							<input type="number" name="reseller" class="form-control" min="1" placeholder="Rp Reseller.." required>
						</div>
					</div>
					<div class="form-group mb-0">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-5">User</label>
							</div>
							<input type="number" name="user" class="form-control" min="1" placeholder="Rp User.." required>
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

<!-- modal Edit -->
<?php foreach ($listprice as $u) : ?>
	<div class="modal fade" id="modal_edit<?php echo $u->id; ?>" tabindex="-1" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="col-12 modal-title text-center">Edit List <?php echo ucwords($u->jenis); ?>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</h4>
				</div>
				<form class="form-horizontal" onsubmit="editdesc.disabled = true; return true;" method="post" action="<?php echo base_url('listing/price_edit') ?>">
					<div class="modal-body">
						<div class="form-group mb-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<label class="input-group-text pr-4">Part Code</label>
								</div>
								<input type="hidden" name="id" class="form-control" value="<?php echo $u->id; ?>">
								<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id_item; ?>">
								<input type="hidden" name="jenis" class="form-control" value="<?php echo $u->jenis; ?>">
								<input type="text" name="part_code" class="form-control" readonly value="<?php echo $u->part_code; ?>">
							</div>
						</div>
						<div class="form-group mb-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<label class="input-group-text pr-5">Desc&nbsp;&nbsp;</label>
								</div>
								<textarea name="desc" class="form-control" required><?php echo $u->desc; ?></textarea>
							</div>
						</div>
						<div class="form-group mb-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<label class="input-group-text">Distributor</label>
								</div>
								<input type="number" name="distributor" class="form-control" min="1" value=<?php echo $u->distributor; ?> required>
							</div>
						</div>
						<div class="form-group mb-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<label class="input-group-text pr-5">Oem&nbsp;</label>
								</div>
								<input type="number" name="oem" class="form-control" min="1" value=<?php echo $u->oem; ?> required>
							</div>
						</div>
						<div class="form-group mb-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<label class="input-group-text pr-4">Reseller&nbsp;&nbsp;</label>
								</div>
								<input type="number" name="reseller" class="form-control" min="1" value=<?php echo $u->reseller; ?> required>
							</div>
						</div>
						<div class="form-group mb-0">
							<div class="input-group">
								<div class="input-group-prepend">
									<label class="input-group-text pr-5">User&nbsp;</label>
								</div>
								<input type="number" name="user" class="form-control" min="1" value=<?php echo $u->user; ?> required>
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
						<button class="btn btn-primary" id="editdesc"><i class="fa fa-check"></i> Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<!-- end modal -->

<!--add MODAL import-->
<div class="modal fade" id="modal_import" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Import Price List
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form method="post" onsubmit="importform.disabled = true; return true;" action="<?php echo base_url('listing/price_import') ?>" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="id_item" value="<?php echo $pricerow->id ?>">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="customFile" name="data">
						<label class="custom-file-label" for="customFile">Choose file</label>
					</div>
					<small>* Extensi file xls atau xlsx<br />
						* File yang di import akan me replace data yang sudah ada<br />
						* Format file harus sesuai dengan column price list</small>
				</div>
				<div class="modal-footer">
					<button type="submit" class="form-control btn btn-primary" id="importform">
						<i class="fa fa-check"></i> Import Data</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--END MODAL import MASTER-->

<!--MODAL HAPUS ALL-->
<?php foreach ($listprice as $p) : ?>
	<div class="modal fade" id="modal_hapus<?php echo $p->id; ?>" tabindex="-1" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content bg-danger">
				<div class="modal-header">
					<h4 class="col-12 modal-title text-center">Delete List <?php echo ucwords($p->jenis); ?>
						<button class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</h4>
				</div>
				<form class="form-horizontal" onsubmit="delform.disabled = true; return true;" method="post" action="<?php echo base_url('listing/price_delete') ?>">
					<div class="modal-body">
						<input type="hidden" name="id" value="<?= $p->id; ?>">
						<input type="hidden" name="id_item" value="<?= $p->id_item; ?>">
						<input type="hidden" name="jenis" value="<?= $p->jenis; ?>">
						<input type="hidden" name="part_code" value="<?= $p->part_code; ?>">
						<span>Are you sure delete part code <?= $p->part_code; ?> ?</span>
					</div>
					<div class="modal-footer justify-content-between">
						<button class="btn btn-outline-light" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
						<button class="btn btn-outline-light" id="delform"><i class="fa fa-check"></i> Yes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>