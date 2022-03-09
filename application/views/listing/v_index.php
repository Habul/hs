<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Listing Qoutation</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item active">Listing Qoutation</li>
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
			<div class="row">
				<div class="col-md-12">
					<div class="card card-warning card-outline">
						<div class="card-header">
							<h6 class="card-title"><a class="form-control btn btn-success col-15 shadow" data-toggle="modal"
									data-target="#modal_add">
									<i class="fa fa-plus"></i>&nbsp; Create New List</a></h6>
							<div class="card-tools">
								<button type="button" class="btn btn-xs btn-icon btn-circle btn-warning"
									data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-xs btn-icon btn-circle btn-primary"
									data-card-widget="maximize">
									<i class="fas fa-expand"></i>
								</button>
								<button type="button" class="btn btn-xs btn-icon btn-circle btn-danger"
									data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table id="index1" class="table table-bordered table-hover table-sm">
								<thead class="thead-dark" style="text-align:center">
									<tr>
										<th width="3%">No</th>
										<th width="10%">Id</th>
										<th>Company Name</th>
										<th>Notes</th>
										<th>Status</th>
										<th width="11%">Action</th>
									</tr>
								</thead>
								<?php foreach ($listing as $p) { ?>
								<tr>
									<td style="text-align:center"></td>
									<td><?php echo strtoupper($p->id_hs) ?></td>
									<td style="text-align:center"><?php echo strtoupper($p->company) ?></td>
									<td style="text-align:center"><?php echo $p->notes ?></td>
									<td style="text-align:center">
										<?php if ($p->status == 1) : ?>
										<span class="badge badge-info"><i class="fas fa-exclamation-triangle"></i> SUBMITED</span>
										<?php elseif ($p->status == 2) : ?>
										<span class="badge badge-primary"><i class="fas fa-bell"></i> ACCEPTED</span>
										<?php elseif ($p->status == 3) : ?>
										<span class="badge badge-success"><i class="fas fa-check-circle"></i> CONFRIMED</span>
										<?php else : ?>
										<span class="badge badge-warning"><i class="fas fa-exclamation-circle"></i> ON
											PROSES</span>
										<?php endif; ?>
									</td>
									<td style="text-align:center">
										<?php $encrypturl = urlencode($this->encrypt->encode($p->id)) ?>
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#modal_edit<?php echo $p->id; ?>" title="Edit"><i
												class="fa fa-pencil-alt"></i></a>
										<a href="<?php echo base_url() . 'listing/list_update/?list=' . $encrypturl; ?>"
											class="btn-sm btn-primary" title="Edit, Detail & Print"><i class=" fa
											fa-search"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#modal_hapus<?php echo $p->id; ?>" title="Delete"><i
												class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
	</section>
</div>

<!-- Bootstrap modal add -->
<div class="modal fade" id="modal_add" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="col-12 modal-title text-center">Create New List
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h5>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/post') ?>">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Id</label>
						<div class="col-sm-10">
							<input type="hidden" name="id" readonly class="form-control"
								value="<?php echo $id_add->id + 1; ?>">
							<input type="text" name="id_hs" class="form-control"
								value="<?php echo 'HS', date('Ymd-'), $id_add->id + 1; ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Company*</label>
						<div class="col-sm-10">
							<input type="text" name="company" class="form-control" placeholder="Company Name.." required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Notes*</label>
						<div class="col-sm-10">
							<textarea type="text" name="notes" class="form-control" placeholder="Notes.." required></textarea>
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

<!-- ============ MODAL Edit DATA =============== -->
<?php foreach ($listing as $p) : ?>
<div class="modal fade" id="modal_edit<?php echo $p->id; ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="col-12 modal-title text-center">Edit List
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h5>
			</div>
			<form onsubmit="editbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/edit') ?>">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Id</label>
						<div class="col-sm-10">
							<input type="hidden" name="id" readonly class="form-control" value="<?php echo $p->id; ?>">
							<input type="text" name="id_hs" class="form-control" value="<?php echo $p->id_hs; ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Company*</label>
						<div class="col-sm-10">
							<input type="text" name="company" class="form-control" value="<?php echo $p->company; ?>" readonly
								required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Notes*</label>
						<div class="col-sm-10">
							<textarea type="text" name="notes" class="form-control"
								required><?php echo $p->notes; ?></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
					<button class="btn btn-primary" id="editbtn"><i class="fa fa-check"></i> Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
<!--END MODAL EDIT DATA-->

<!--MODAL HAPUS DESC-->
<?php foreach ($listing as $u) : ?>
<div class="modal fade" id="modal_hapus<?php echo $u->id; ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content bg-danger">
			<div class="modal-header">
				<h5 class="col-12 modal-title text-center">Delete Data
					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h5>
			</div>
			<form onsubmit="delbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/delete') ?>">
				<div class="modal-body">
					<input type="hidden" name="id" value="<?php echo $u->id; ?>">
					<p>Are you sure delete <?php echo $u->id_hs; ?> ?</p>
				</div>
				<div class="modal-footer justify-content-between">
					<button class="btn btn-outline-light" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
					<button class="btn btn-outline-light" id="delbtn"><i class="fa fa-check"></i> Yes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
