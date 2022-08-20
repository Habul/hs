<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Input List Quotation</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('listing/listing') ?>">Listing</a></li>
						<li class="breadcrumb-item active">Input List Quotation</li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<?php if ($this->session->flashdata('berhasil')) : ?>
				<div class="alert alert-success alert-dismissible fade show" id="info" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<i class="icon fa fa-check"></i>&nbsp;<?= $this->session->flashdata('berhasil') ?>
				</div>
			<?php elseif ($this->session->flashdata('gagal')) : ?>
				<div class="alert alert-warning alert-dismissible fade show" id="info" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<i class="icon fa fa-warning"></i>&nbsp;<?= $this->session->flashdata('gagal') ?>
				</div>
			<?php elseif ($this->session->flashdata('gagal2')) : ?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<i class="icon fa fa-warning"></i>&nbsp;<?= $this->session->flashdata('gagal2') ?>
				</div>
			<?php endif ?>
			<div class="row">
				<div class="col-md-12">
					<div class="callout callout-info">
						<?php foreach ($listing as $list) : ?>
							<li>ID &emsp;&emsp;&emsp;: <b><?= $list->id_hs; ?></b>
								<?php if ($list->status == 1) : ?>
									<span class="badge badge-warning">NOTICE</span>
								<?php elseif ($list->status == 2) : ?>
									<span class="badge badge-info">SUBMITED</span>
								<?php elseif ($list->status == 3) : ?>
									<span class="badge badge-success">CONFRIMED</span>
								<?php else : ?>
									<span class="badge badge-default">OPEN</span>
								<?php endif ?>
								<?php if ($list->status == 0 || $list->status == 1) : ?>
									<a class="btn-sm text-muted" data-toggle="modal" data-target="#edit_header<?= $list->id; ?>" title="Edit Header">
										<i class="fa fa-pencil-alt"></i></a>
								<?php endif ?>
							</li>
							<li>Company : <?= $list->company; ?></li>
							<li>Notes&emsp;&emsp;: <?= $list->notes; ?></li>
					</div>
				</div>
			</div>
			<div class=" row">
				<div class="col-md-12">
					<?php if ($list->status == 1) : ?> <div class="card card-warning">
						<?php elseif ($list->status == 2) : ?> <div class="card card-info">
							<?php elseif ($list->status == 3) : ?> <div class="card card-success">
								<?php else : ?> <div class="card card-default">
									<?php endif; ?>
									<div class="card-header">
										<?php if ($list->status == 0 || $list->status == 1) : ?>
											<h3 class="card-title">
												<a class="btn btn-success col-15 shadow" data-toggle="modal" data-target="#modal_add_item">
													<i class="fa fa-plus"></i>&nbsp; Add Item</a>
												<a class="btn btn-secondary col-15 shadow" data-toggle="modal" data-target="#modal_add_ass">
													<i class="fa fa-plus"></i>&nbsp; Add Assembly</a>
											</h3>
										<?php endif; ?>
										<div class="card-tools">
											<button type="button" class="btn btn-xs btn-icon btn-circle" data-card-widget="maximize">
												<i class="fas fa-expand"></i>
											</button>
											<button type="button" class="btn btn-xs btn-icon btn-circle" data-card-widget="collapse">
												<i class="fas fa-minus"></i>
											</button>
											<button type="button" class="btn btn-xs btn-icon btn-circle" data-card-widget="remove">
												<i class="fas fa-times"></i>
											</button>
										</div>
									</div>
									<div class="card-body table-responsive">
										<table class="table table-hover table-sm" id="example12">
											<thead class="thead-dark" style="text-align:center">
												<tr style="text-align:center">
													<th width="5%">No</th>
													<th>Category Type</th>
													<th>Size</th>
													<th>Qty</th>
													<th>Price</th>
													<th width="11%">Action</th>
												</tr>
											</thead>
											<?php
											$no = 1;
											$query =	$this->db->query("SELECT q.*,l.nama AS item FROM qoutation q INNER JOIN list_item l ON q.id_item=l.id WHERE q.id_listing='$list->id' order by created_at ASC");
											foreach ($query->result() as $p) {
												$sum_total[] = $p->price;
												$total_qty = array_sum($sum_total); ?>
												<tr>
													<td class="align-middle text-center"><?= $no++ ?></td>
													<td>
														<small class="badge badge-secondary" title="Id Assembly"><?= $p->assembly ?></small>
														<small class="badge badge-danger" title="Price Type"><?= strtoupper($p->type_price) ?></small>
														<br />
														<b><?= strtoupper($p->item) ?></b><br />
														<small class="badge badge-info" title="brand"><?= strtoupper($p->brand) ?></small>
														<?php if ($p->model === '45' || $p->model === '90') : ?>
															<small class="badge badge-info" title="Model"><?= strtoupper($p->model) ?>&deg;</small>
														<?php else : ?>
															<small class="badge badge-info" title="Model"><?= strtoupper($p->model) ?></small>
														<?php endif ?>
														<small class="badge badge-info" title="OD"><?= strtoupper($p->od) ?></small>
														<small class="badge badge-info" title="Type"><?= strtoupper($p->type) ?></small>
														<small class="badge badge-info" title="Category"><?= strtoupper($p->category) ?></small>
														<small class="badge badge-info" title="Hole"><?= strtoupper($p->hole) ?></small>
														<small class="badge badge-info" title="ID"><?= strtoupper($p->i_d) ?></small>
														<small class="badge badge-info" title="Plat"><?= strtoupper($p->plat) ?></small>
														<small class="badge badge-info" title="Thread"><?= strtoupper($p->thread) ?></small>
														<small class="badge badge-warning" title="Posisi Fitting"><?= strtoupper($p->posisi) ?></small>
													</td>
													<td class="align-middle text-center"><?= $p->size ?></td>
													<td class="align-middle text-center"><?= $p->qty ?></td>
													<td class="align-middle text-center">
														<?= number_format($p->price, 0, '.', '.'); ?> IDR<br />
														<small>@ <?= number_format($p->price_unit, 0, '.', '.') ?> IDR</small>
													</td>
													<td class="align-middle text-center">
														<?php if ($list->status == 1 || $list->status == 0) : ?>
															<a class="btn btn-warning" data-toggle="modal" data-target="#modal_edit<?= $p->id; ?>" title="Edit">
																<i class="fa fa-pencil-alt"></i></a>
															<a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $p->id; ?>" title="Delete">
																<i class="fa fa-trash"></i></a>
														<?php elseif ($list->status == 3 || $list->status == 2) : ?>
															<button type="button" class="btn btn-danger float-end" title="Lock" disabled>
																<i class="fas fa-lock"></i></button>
														<?php endif ?>
													</td>
												</tr>
											<?php } ?>
										</table>
										<table class="table table-sm">
											<thead class="thead-light">
												<tr>
													<th width="70%" style="text-align:center"><b>Total<b></th>
													<th style="text-align:center">
														<b><?= number_format($total_qty, 0, '.', '.'); ?> IDR<b>
													</th>
												</tr>
											</thead>
											<th></th>
											<th></th>
										</table>
									</div>
									<div class="d-flex justify-content-around mb-3">
										<?php if ($list->status != 3) : ?>
											<?php if ($list->status != 2) : ?>
												<form action="<?= base_url('listing/qoutation_submit') ?>" method="post">
													<input type="hidden" name="id" value="<?= $list->id ?>">
													<input type="hidden" name="status" value="2">
													<input type="hidden" name="ket" value="Submited ID : <?= $list->id_hs ?>">
													<button class="btn btn-info col-15 shadow" type="submit">
														<i class="fas fa-bookmark"></i>&nbsp;Submit List</button>
												</form>
											<?php endif ?>
											<?php if ($list->status == 0 || $list->status == 1) : ?>
												<form action="<?= base_url('listing/qoutation_remove') ?>" method="post">
													<input type="hidden" name="id" value="<?= $list->id ?>">
													<input type="hidden" name="id_hs" value="<?= $list->id_hs ?>">
													<button class="btn btn-danger col-15 shadow" type="submit">
														<i class="fa fa-trash"></i>&nbsp;Remove List</button>
												</form>
											<?php endif ?>
											<?php if ($this->session->userdata('level') == "admin" || $this->session->userdata('level') == "mgr") {  ?>
												<?php if ($list->status != 1) : ?>
													<form action="<?= base_url('listing/qoutation_submit') ?>" method="post">
														<input type="hidden" name="id" value="<?= $list->id ?>">
														<input type="hidden" name="status" value="1">
														<input type="hidden" name="ket" value="Notice ID : <?= $list->id_hs ?>">
														<button class="btn btn-warning col-15 shadow" type="submit">
															<i class="fas fa-bullhorn"></i>&nbsp;Notice</button>
													</form>
												<?php endif ?>
												<?php if ($list->status != 0) : ?>
													<form action="<?= base_url('listing/qoutation_submit') ?>" method="post">
														<input type="hidden" name="id" value="<?= $list->id ?>">
														<input type="hidden" name="status" value="3">
														<input type="hidden" name="ket" value="Confrim ID : <?= $list->id_hs ?>">
														<input type="hidden" name="updated_at" value="<?= mdate('%Y-%m-%d %H:%i:%s') ?>">
														<button class="btn btn-success col-15 shadow" type="submit">
															<i class="fas fa-lock"></i>&nbsp;Confrim</button>
													</form>
												<?php endif ?>
											<?php } ?>
										<?php elseif ($list->status == 3) :  ?>
											<?php $encrypturl = urlencode($this->encrypt->encode($list->id)) ?>
											<a class="btn btn-primary col-15 shadow" href="<?= base_url('listing/qoutation_print/?print=' . $encrypturl) ?>" rel="noopener" target="_blank">
												<i class="fas fa-print"></i>&nbsp;Download Accepted List</a>
											<?php if ($this->session->userdata('level') == "admin" || $this->session->userdata('level') == "mgr") {  ?>
												<form action="<?= base_url('listing/qoutation_submit') ?>" method="post">
													<input type="hidden" name="id" value="<?= $list->id ?>">
													<input type="hidden" name="status" value="1">
													<input type="hidden" name="ket" value="Revoke">
													<button class="btn btn-warning col-15 shadow" type="submit">
														<i class="fas fa-lock-open"></i>&nbsp;Revoke Acceptance</button>
												</form>
											<?php } ?>
										<?php endif ?>
									</div>
									</div>
								</div>
								<div class="col-12 table-responsive-sm text-center mb-3">
									<a href="<?= base_url() . 'listing/listing' ?>" class="btn btn-default"><i class="fas fa-undo"></i>
										Back</a>
								</div>
							</div>
						</div>
					<?php endforeach ?>
	</section>
</div>

<!-- Bootstrap modal add -->
<div class="modal fade" id="modal_add_item" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content bg-light color-palette">
			<div class="modal-header">
				<h5 class="col-12 modal-title text-center">Add New Item
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h5>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post" action="<?= base_url('listing/qoutation_save') ?>">
				<div class="modal-body">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text pr-5">Item&emsp;</label>
						</div>
						<?php foreach ($listing as $list) : ?>
							<input type="hidden" name="id" readonly class="form-control" value="<?= $id_qoutation->id + 1; ?>">
							<input type="hidden" name="id_hs" class="form-control" value="<?= $list->id_hs ?>">
							<input type="hidden" name="id_listing" class="form-control" value="<?= $list->id ?>">
						<?php endforeach ?>
						<select id="item" name="item" class="form-control" required>
							<option value="">- Choose Item -</option>
							<?php foreach ($list_item as $list) : ?>
								<option value="<?= $list->id ?>"><?= strtoupper($list->nama) ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group mb-3" style="display: none;" id="div_brand">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-5">Brand</label>
							</div>
							<select name="brand" id="brand" class="form-control">
								<option value="">- Choose Brand -</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3" style="display: none;" id="div_model">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-5">Model</label>
							</div>
							<select name="model" class="form-control" id="model">
								<option value="">- Choose Model -</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3" style="display: none;" id="div_od">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-5">Od&emsp;&nbsp;&nbsp;</label>
							</div>
							<select name="od" class="form-control" id="od">
								<option value="">- Choose Od -</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3" style="display: none;" id="div_size">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-5">Size&emsp;</label>
							</div>
							<select name="size" class="form-control" id="size">
								<option value="">- Choose Size -</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3" style="display: none;" id="div_type">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-5">Type&emsp;</label>
							</div>
							<select name="type" class="form-control" id="type">
								<option value="">- Choose Type -</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3" style="display: none;" id="div_category">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-4">Category&emsp;</label>
							</div>
							<select name="category" class="form-control" id="category">
								<option value="">- Choose Category -</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3" style="display: none;" id="div_hole">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-5">Hole&emsp;</label>
							</div>
							<select name="hole" class="form-control" id="hole">
								<option value="">- Choose Hole -</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3" style="display: none;" id="div_id">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-5">Id&emsp;&emsp;</label>
							</div>
							<select name="i_d" class="form-control" id="id">
								<option value="">- Choose Id -</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3" style="display: none;" id="div_plat">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-5">Plat&emsp;</label>
							</div>
							<select name="plat" class="form-control" id="plat">
								<option value="">- Choose Plat -</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3" style="display: none;" id="div_thread">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-4">Thread&emsp;&nbsp;&nbsp;</label>
							</div>
							<select name="thread" class="form-control" id="thread">
								<option value="">- Choose Thread -</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-5">Qty&emsp;&nbsp;</label>
							</div>
							<input type="number" name="qty" class="form-control" min="1" placeholder="0" required>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-4">Price Type</label>
							</div>
							<select name="type_price" class="form-control" id="type_price" required>
								<option value="">- Choose Price Type -</option>
								<option value="oem">Oem</option>
								<option value="distributor">Distributor</option>
								<option value="reseller">Reseller</option>
								<option value="user">User</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text pr-4">Assembly&nbsp;&nbsp;&nbsp;</label>
							</div>
							<select name="assembly" class="form-control">
								<option value="">- Choose Assembly -</option>
								<?php foreach ($assembly as $i) : ?>
									<option value="<?= $i->name ?>"><?= strtoupper($i->name) ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="form-group mb-0" style="display: none;" id="div_posisi">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text">Posisi Fitting</label>
							</div>
							<select name="posisi" class="form-control" id="posisi">
								<option value="">- Choose posisi -</option>
							</select>
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

<!-- Bootstrap modal add assembly -->
<div class="modal fade" id="modal_add_ass" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content bg-light color-palette">
			<div class="modal-header">
				<h5 class="col-12 modal-title text-center">Create New Assembly
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h5>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post" action="<?= base_url('listing/add_assembly') ?>">
				<div class="modal-body">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text pr-3">Id Assm</label>
						</div>
						<?php foreach ($listing as $list) : ?>
							<input type="hidden" name="id_listing" class="form-control" value="<?= $list->id ?>">
						<?php endforeach ?>
						<input type="text" name="name" class="form-control" value="<?= 'ASSM', date('md-'), $id_assm->id + 1 ?>" readonly>
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text pr-4">Desc &nbsp;&nbsp;</label>
						</div>
						<textarea name="desc" class="form-control" placeholder="..." required></textarea>
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

<!--Modals edit&delete-->
<?php foreach ($qoutation as $u) : ?>
	<div class="modal fade" id="modal_edit<?= $u->id ?>" tabindex="-1" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content bg-light color-palette">
				<div class="modal-header">
					<h4 class="col-12 modal-title text-center">Update Price
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</h4>
				</div>
				<form onsubmit="editbtn.disabled = true; return true;" method="post" action="<?= base_url('listing/qoutation_update') ?>">
					<div class="modal-body">
						<?php if ($u->id_assembly != 0) : ?>
							<span class="badge badge-secondary"> Assembly</span>
						<?php endif; ?>
						<small class="badge badge-danger" title="Type Price"><?= strtoupper($u->type_price) ?></small>
						<br />
						<?php if ($u->id_item == 1) : ?>
							<b>PIPE</b>
						<?php elseif ($u->id_item == 2) : ?>
							<b>HOSE</b>
						<?php elseif ($u->id_item == 3) : ?>
							<b>FITTING</b>
						<?php elseif ($u->id_item == 4) : ?>
							<b>HOSE COVER</b>
						<?php elseif ($u->id_item == 5) : ?>
							<b>CLAMP PIPE</b>
						<?php endif ?>
						<br />
						<small class="badge badge-info" title="Brand"><?= strtoupper($u->brand) ?></small>
						<?php if ($u->model === '45' || $u->model === '90') : ?>
							<small class="badge badge-info" title="Model"><?= strtoupper($u->model) ?>&deg;</small>
						<?php else : ?>
							<small class="badge badge-info" title="Model"><?= strtoupper($u->model) ?></small>
						<?php endif ?>
						<small class="badge badge-info" title="OD"><?= strtoupper($u->od) ?></small>
						<small class="badge badge-info" title="Type"><?= strtoupper($u->type) ?></small>
						<small class="badge badge-info" title="Category"><?= strtoupper($u->category) ?></small>
						<small class="badge badge-info" title="Hole"><?= strtoupper($u->hole) ?></small>
						<small class="badge badge-info" title="ID"><?= strtoupper($u->i_d) ?></small>
						<small class="badge badge-info" title="Plat"><?= strtoupper($u->plat) ?></small>
						<small class="badge badge-info" title="Thread"><?= strtoupper($u->thread) ?></small>
						<small class="badge badge-warning" title="Posisi Fitting"><?= strtoupper($u->posisi) ?></small>
						<small class="badge badge-warning" title="Size"><?= strtoupper($u->size) ?></small>
						<small class="badge badge-warning" title="Qty"><?= strtoupper($u->qty) ?></small>
						<div class="input-group mt-1 mb-0">
							<div class="input-group-prepend">
								<label class="input-group-text pr-5">Price</label>
							</div>
							<input type="hidden" name="id" class="form-control" value="<?= $u->id; ?>">
							<input type="hidden" name="id_listing" value="<?= $u->id_listing; ?>">
							<input type="hidden" name="price_unit" value="<?= $u->price_unit; ?>">
							<input type="number" name="price" class="form-control" id="price" min="1" value="<?= $u->price ?>" required>
						</div>
						<small><i>Max markdown 10%</i></small>
					</div>
					<div class="modal-footer justify-content-between">
						<button class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
						<button class="btn btn-primary" id="editbtn"><i class="fa fa-check"></i> Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal_hapus<?= $u->id; ?>" tabindex="-1" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content bg-danger">
				<div class="modal-header">
					<h5 class="col-12 modal-title text-center">Delete Data
						<button class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</h5>
				</div>
				<form onsubmit="delbtn.disabled = true; return true;" method="post" action="<?= base_url('listing/qoutation_delete') ?>">
					<div class="modal-body">
						<input type="hidden" name="id" value="<?= $u->id; ?>">
						<input type="hidden" name="id_listing" value="<?= $u->id_listing; ?>">
						<span>Are you sure delete this ?</span>
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


<!-- ============ MODAL EDIT DATA =============== -->
<?php foreach ($listing as $list) : ?>
	<div class="modal fade" id="edit_header<?= $list->id ?>" tabindex="-1" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content bg-light color-palette">
				<div class="modal-header">
					<h4 class="col-12 modal-title text-center">Edit header
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</h4>
				</div>
				<form onsubmit="edithdr.disabled = true; return true;" method="post" action="<?= base_url('listing/edit') ?>">
					<div class="card-body">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text pr-1">Company</label>
							</div>
							<input type="hidden" name="id" value="<?= $list->id ?>"></input>
							<input type="hidden" name="id_hs" value="<?= $list->id_hs ?>"></input>
							<input type="text" name="company" class="form-control" value="<?= $list->company ?>" required></input>
						</div>
						<div class="input-group mb-0">
							<div class="input-group-prepend">
								<label class="input-group-text pr-4">Notes&nbsp;</label>
							</div>
							<textarea name="notes" class="form-control" required><?= $list->notes ?></textarea>
						</div>
					</div>
					<div class="modal-footer justify-content-center">
						<button class="btn btn-primary col-md-6" id="edithdr"><i class="fa fa-check"></i> Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<!--END MODAL EDIT DATA-->