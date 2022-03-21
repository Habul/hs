<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<?php foreach ($listitem as $b) { ?>
					<h1 class="m-0">Listing Item <b><?php echo ucfirst($b->nama) ?></b></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url('listing/listing_item') ?>">List Item</a>
						</li>
						<li class="breadcrumb-item active">Listing Item <?php echo ucwords($b->nama) ?>
						</li>
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
				<?php if (($b->nama == 'hose') || ($b->nama == 'fitting') || ($b->nama == 'pipe')) : ?>
				<div class="col-md-6">
					<div class="card card-info">
						<div class="card-header">
							<h4 class="card-title"><i class="fa fa-tools"></i> Brand</h4>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="maximize">
									<i class="fas fa-expand"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th width="7%">No</th>
										<th>Nama</th>
										<th width="16%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_brand');
								foreach ($query->result() as $p) { ?>
								<tr style="text-align:center">
									<td><?php echo $no++ ?></td>
									<td><?php echo strtoupper($p->nama) ?></td>
									<td>
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#brand_edit<?php echo $p->id; ?>" title="Edit Brand"><i
												class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#brand_del<?php echo $p->id; ?>" title="Delete"><i
												class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#brand_add"
									title="Add Brand"><i class="fa fa-plus"></i> Add New Brand</button>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>

				<?php if (($b->nama == 'hose') || ($b->nama == 'fitting')) : ?>
				<div class="col-md-6">
					<div class="card card-info">
						<div class="card-header">
							<h4 class="card-title"><i class="fa fa-tools"></i> Type</h4>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="maximize">
									<i class="fas fa-expand"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th width="16%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_type');
								foreach ($query->result() as $p) { ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td style="text-align:center"><?php echo strtoupper($p->nama) ?></td>
									<td style="text-align:center">
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#history_edit<?php echo $p->no_id; ?>" title="Edit"><i
												class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#history_hapus<?php echo $p->no_id; ?>" title="Delete"><i
												class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#add_history">
									<i class="fa fa-plus"></i> Add New Type</button>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>

				<?php if ($b->nama != 'pipe') : ?>
				<div class="col-md-6">
					<div class="card card-info">
						<div class="card-header">
							<h4 class="card-title"><i class="fa fa-tools"></i> Size</h4>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="maximize">
									<i class="fas fa-expand"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th width="16%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_size');
								foreach ($query->result() as $p) { ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td style="text-align:center"><?php echo strtoupper($p->nama) ?></td>
									<td style="text-align:center">
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#history_edit<?php echo $p->no_id; ?>" title="Edit"><i
												class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#history_hapus<?php echo $p->no_id; ?>" title="Delete"><i
												class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#add_history">
									<i class="fa fa-plus"></i> Add New Size</button>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>

				<?php if (($b->nama == 'fitting') || ($b->nama == 'pipe' )) : ?>
				<div class="col-md-6">
					<div class="card card-info">
						<div class="card-header">
							<h4 class="card-title"><i class="fa fa-tools"></i> Model</h4>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="maximize">
									<i class="fas fa-expand"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th width="16%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_model');
								foreach ($query->result() as $p) { ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td style="text-align:center"><?php echo strtoupper($p->nama) ?></td>
									<td style="text-align:center">
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#history_edit<?php echo $p->no_id; ?>" title="Edit"><i
												class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#history_hapus<?php echo $p->no_id; ?>" title="Delete"><i
												class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#add_history">
									<i class="fa fa-plus"></i> Add New Model</button>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>

				<?php if ($b->nama == 'pipe') : ?>
				<div class="col-md-6">
					<div class="card card-info">
						<div class="card-header">
							<h4 class="card-title"><i class="fa fa-tools"></i> OD</h4>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="maximize">
									<i class="fas fa-expand"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th width="16%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_od');
								foreach ($query->result() as $p) { ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td style="text-align:center"><?php echo strtoupper($p->nama) ?></td>
									<td style="text-align:center">
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#history_edit<?php echo $p->no_id; ?>" title="Edit"><i
												class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#history_hapus<?php echo $p->no_id; ?>" title="Delete"><i
												class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#add_history">
									<i class="fa fa-plus"></i> Add New Od</button>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<?php if (($b->nama == 'hose cover') || ($b->nama == 'fitting')) : ?>
				<div class="col-md-6">
					<div class="card card-info">
						<div class="card-header">
							<h4 class="card-title"><i class="fa fa-tools"></i> Category</h4>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="maximize">
									<i class="fas fa-expand"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th width="16%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_category');
								foreach ($query->result() as $p) { ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td style="text-align:center"><?php echo strtoupper($p->nama) ?></td>
									<td style="text-align:center">
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#history_edit<?php echo $p->no_id; ?>" title="Edit"><i
												class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#history_hapus<?php echo $p->no_id; ?>" title="Delete"><i
												class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#add_history">
									<i class="fa fa-plus"></i> Add New Category</button>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<?php if ($b->nama == 'clamp pipe') : ?>
				<div class="col-md-6">
					<div class="card card-info">
						<div class="card-header">
							<h4 class="card-title"><i class="fa fa-tools"></i> Hole</h4>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="maximize">
									<i class="fas fa-expand"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th width="16%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_hole');
								foreach ($query->result() as $p) { ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td style="text-align:center"><?php echo strtoupper($p->nama) ?></td>
									<td style="text-align:center">
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#history_edit<?php echo $p->no_id; ?>" title="Edit"><i
												class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#history_hapus<?php echo $p->no_id; ?>" title="Delete"><i
												class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#add_history">
									<i class="fa fa-plus"></i> Add New Hole</button>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<?php if ($b->nama == 'pipe') : ?>
				<div class="col-md-6">
					<div class="card card-info">
						<div class="card-header">
							<h4 class="card-title"><i class="fa fa-tools"></i> ID</h4>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="maximize">
									<i class="fas fa-expand"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th width="16%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_id');
								foreach ($query->result() as $p) { ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td style="text-align:center"><?php echo strtoupper($p->nama) ?></td>
									<td style="text-align:center">
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#history_edit<?php echo $p->no_id; ?>" title="Edit"><i
												class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#history_hapus<?php echo $p->no_id; ?>" title="Delete"><i
												class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#add_history">
									<i class="fa fa-plus"></i> Add New ID</button>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>

				<?php if ($b->nama == 'clamp pipe') : ?>
				<div class="col-md-6">
					<div class="card card-info">
						<div class="card-header">
							<h4 class="card-title"><i class="fa fa-tools"></i> Plat</h4>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="maximize">
									<i class="fas fa-expand"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th width="16%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_plat');
								foreach ($query->result() as $p) { ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td style="text-align:center"><?php echo strtoupper($p->nama) ?></td>
									<td style="text-align:center">
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#history_edit<?php echo $p->no_id; ?>" title="Edit"><i
												class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#history_hapus<?php echo $p->no_id; ?>" title="Delete"><i
												class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#add_history">
									<i class="fa fa-plus"></i> Add New Plat</button>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>

				<?php if ($b->nama == 'fitting') : ?>
				<div class="col-md-6">
					<div class="card card-info">
						<div class="card-header">
							<h4 class="card-title"><i class="fa fa-tools"></i> Thread</h4>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="maximize">
									<i class="fas fa-expand"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th width="16%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_thread');
								foreach ($query->result() as $p) { ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td style="text-align:center"><?php echo strtoupper($p->nama) ?></td>
									<td style="text-align:center">
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#history_edit<?php echo $p->no_id; ?>" title="Edit"><i
												class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#history_hapus<?php echo $p->no_id; ?>" title="Delete"><i
												class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#add_history">
									<i class="fa fa-plus"></i> Add New Thread</button>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>
			</div>
		</div>
		<?php } ?>
	</section>
</div>

<!-- modal brand -->
<div class="modal fade" id="brand_add" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Add Brand
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/add_brand') ?>">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-xs-3">Nama</label>
						<div class="col-xs-9">
							<?php foreach ($listitem as $u) : ?>
							<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
							<?php endforeach; ?>
							<input type="text" name="nama" class="form-control" required>
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
<?php foreach ($item_brand as $brand) : ?>
<div class="modal fade" id="brand_edit<?php echo $brand->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Edit Brand
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="editbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/edit_brand') ?>">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-xs-3">Nama</label>
						<div class="col-xs-9">
							<?php foreach ($listitem as $u) : ?>
							<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
							<input type="hidden" name="id" class="form-control" value="<?php echo $brand->id; ?>">
							<?php endforeach; ?>
							<input type="text" name="nama" class="form-control" value="<?php echo $brand->nama ?>" required>
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
<div class="modal fade" id="brand_del<?php echo $brand->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content bg-danger">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Delete Brand
					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form class="form-horizontal" onsubmit="delbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/del_brand') ?>">
				<div class="modal-body">
					<?php foreach ($listitem as $u) : ?>
					<input type="hidden" name="id_item" value="<?php echo $u->id; ?>">
					<?php endforeach ?>
					<input type="hidden" name="id" value="<?php echo $brand->id; ?>">
					<p>Are you sure delete <?php echo $brand->nama; ?> ?</p>
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
<!-- modal brand -->
