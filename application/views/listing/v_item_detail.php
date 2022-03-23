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
							<table id="example5" class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th width="7%">No</th>
										<th>Nama</th>
										<th width="25%">Action</th>
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
											data-target="#brand_edit<?php echo $p->id; ?>" title="Edit">
											<i class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#brand_del<?php echo $p->id; ?>" title="Delete">
											<i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#brand_add"
									title="Add"><i class="fa fa-plus"></i> Add New Brand</button>
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
							<table id="example3" class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th width="7%">No</th>
										<th>Nama</th>
										<th width="25%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_type');
								foreach ($query->result() as $p) { ?>
								<tr style="text-align:center">
									<td><?php echo $no++ ?></td>
									<td><?php echo strtoupper($p->nama) ?></td>
									<td>
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#type_edit<?php echo $p->id; ?>" title="Edit">
											<i class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#type_del<?php echo $p->id; ?>" title="Delete">
											<i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#type_add"
									title="Add"><i class="fa fa-plus"></i> Add New Type</button>
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
							<table id="example2" class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th width="7%">No</th>
										<th>Nama</th>
										<th width="25%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_size');
								foreach ($query->result() as $p) { ?>
								<tr style="text-align:center">
									<td><?php echo $no++ ?></td>
									<td><?php echo strtoupper($p->nama) ?></td>
									<td>
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#size_edit<?php echo $p->id; ?>" title="Edit">
											<i class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#size_del<?php echo $p->id; ?>" title="Delete">
											<i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#size_add">
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
							<table id="example6" class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th width="7%">No</th>
										<th>Nama</th>
										<th width="25%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_model');
								foreach ($query->result() as $p) { ?>
								<tr style="text-align:center">
									<td><?php echo $no++ ?></td>
									<td><?php echo strtoupper($p->nama) ?></td>
									<td>
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#model_edit<?php echo $p->id; ?>" title="Edit">
											<i class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#model_del<?php echo $p->id; ?>" title="Delete">
											<i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#model_add"
									title="Add">
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
							<table id="example1" class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th width="7%">No</th>
										<th>Nama</th>
										<th width="25%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_od');
								foreach ($query->result() as $p) { ?>
								<tr style="text-align:center">
									<td><?php echo $no++ ?></td>
									<td><?php echo strtoupper($p->nama) ?></td>
									<td>
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#od_edit<?php echo $p->id; ?>" title="Edit">
											<i class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#od_del<?php echo $p->id; ?>" title="Delete">
											<i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#od_add" title="Add">
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
							<table id="example7" class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th width="7%">No</th>
										<th>Nama</th>
										<th width="25%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_category');
								foreach ($query->result() as $p) { ?>
								<tr style="text-align:center">
									<td><?php echo $no++ ?></td>
									<td><?php echo strtoupper($p->nama) ?></td>
									<td>
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#category_edit<?php echo $p->id; ?>" title="Edit">
											<i class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#category_del<?php echo $p->id; ?>" title="Delete">
											<i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#category_add"
									title="Add"><i class="fa fa-plus"></i> Add New Category</button>
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
							<table id="example8" class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th width="7%">No</th>
										<th>Nama</th>
										<th width="25%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_hole');
								foreach ($query->result() as $p) { ?>
								<tr style="text-align:center">
									<td><?php echo $no++ ?></td>
									<td><?php echo strtoupper($p->nama) ?></td>
									<td>
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#hole_edit<?php echo $p->id; ?>" title="Edit"><i
												class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#hole_del<?php echo $p->id; ?>" title="Delete"><i
												class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#hole_add"
									title="Add"><i class="fa fa-plus"></i> Add New Hole</button>
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
							<table id="example9" class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th width="7%">No</th>
										<th>Nama</th>
										<th width="25%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_id');
								foreach ($query->result() as $p) { ?>
								<tr style="text-align:center">
									<td><?php echo $no++ ?></td>
									<td><?php echo strtoupper($p->nama) ?></td>
									<td>
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#id_edit<?php echo $p->id; ?>" title="Edit">
											<i class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#id_del<?php echo $p->id; ?>" title="Delete">
											<i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#id_add" title="Add">
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
							<table id="example10" class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th width="7%">No</th>
										<th>Nama</th>
										<th width="25%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_plat');
								foreach ($query->result() as $p) { ?>
								<tr style="text-align:center">
									<td><?php echo $no++ ?></td>
									<td><?php echo strtoupper($p->nama) ?></td>
									<td>
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#plat_edit<?php echo $p->id; ?>" title="Edit"><i
												class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#plat_del<?php echo $p->id; ?>" title="Delete"><i
												class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#plat_add"
									title="Add"><i class="fa fa-plus"></i> Add New Plat</button>
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
							<table id="example11" class="table table-hover table-sm">
								<thead class="thead-light" style="text-align:center">
									<tr>
										<th width="7%">No</th>
										<th>Nama</th>
										<th width="25%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id)->get('item_thread');
								foreach ($query->result() as $p) { ?>
								<tr style="text-align:center">
									<td><?php echo $no++ ?></td>
									<td><?php echo strtoupper($p->nama) ?></td>
									<td>
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#thread_edit<?php echo $p->id; ?>" title="Edit">
											<i class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#thread_del<?php echo $p->id; ?>" title="Delete">
											<i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#thread_add">
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
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Add Brand
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/add_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Brand</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="jenis" class="form-control" value="item_brand">
						<input type="text" name="nama" class="form-control" placeholder="...." required>
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
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Edit Brand
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="editbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/edit_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Brand</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<input type="hidden" name="id" class="form-control" value="<?php echo $brand->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="jenis" class="form-control" value="item_brand">
						<input type="text" name="nama" class="form-control" value="<?php echo $brand->nama ?>" required>
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
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content bg-danger">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Delete Brand
					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form class="form-horizontal" onsubmit="delbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/del_item') ?>">
				<div class="modal-body">
					<?php foreach ($listitem as $u) : ?>
					<input type="hidden" name="id_item" value="<?php echo $u->id; ?>">
					<?php endforeach ?>
					<input type="hidden" name="jenis" class="form-control" value="item_brand">
					<input type="hidden" name="id" value="<?php echo $brand->id; ?>">
					<span>Are you sure delete <?php echo $brand->nama; ?> ?</span>
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

<!-- modal type -->
<div class="modal fade" id="type_add" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Add Type
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/add_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Type</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="jenis" class="form-control" value="item_type">
						<input type="text" name="nama" class="form-control" placeholder="..." required>
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
<?php foreach ($item_type as $type) : ?>
<div class="modal fade" id="type_edit<?php echo $type->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Edit Type
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="editbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/edit_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Type</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<input type="hidden" name="id" class="form-control" value="<?php echo $type->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="jenis" class="form-control" value="item_type">
						<input type="text" name="nama" class="form-control" value="<?php echo $type->nama ?>" required>
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
<div class="modal fade" id="type_del<?php echo $type->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content bg-danger">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Delete Type
					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form class="form-horizontal" onsubmit="delbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/del_item') ?>">
				<div class="modal-body">
					<?php foreach ($listitem as $u) : ?>
					<input type="hidden" name="id_item" value="<?php echo $u->id; ?>">
					<?php endforeach ?>
					<input type="hidden" name="id" value="<?php echo $type->id; ?>">
					<input type="hidden" name="jenis" class="form-control" value="item_type">
					<span>Are you sure delete <?php echo $type->nama; ?> ?</span>
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
<!-- modal type -->

<!-- modal size -->
<div class="modal fade" id="size_add" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Add Size
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/add_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Size</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="jenis" class="form-control" value="item_size">
						<input type="text" name="nama" class="form-control" placeholder="..." required>
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
<?php foreach ($item_size as $size) : ?>
<div class="modal fade" id="size_edit<?php echo $size->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Edit Size
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="editbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/edit_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Size</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<input type="hidden" name="id" class="form-control" value="<?php echo $size->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="jenis" class="form-control" value="item_size">
						<input type="text" name="nama" class="form-control" value="<?php echo $size->nama ?>" required>
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
<div class="modal fade" id="size_del<?php echo $size->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content bg-danger">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Delete Size
					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form class="form-horizontal" onsubmit="delbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/del_item') ?>">
				<div class="modal-body">
					<?php foreach ($listitem as $u) : ?>
					<input type="hidden" name="id_item" value="<?php echo $u->id; ?>">
					<?php endforeach ?>
					<input type="hidden" name="id" value="<?php echo $size->id; ?>">
					<input type="hidden" name="jenis" class="form-control" value="item_size">
					<span>Are you sure delete <?php echo $size->nama; ?> ?</span>
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
<!-- modal size -->

<!-- modal model -->
<div class="modal fade" id="model_add" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Add Model
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/add_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Model</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="jenis" class="form-control" value="item_model">
						<input type="text" name="nama" class="form-control" placeholder="..." required>
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
<?php foreach ($item_model as $model) : ?>
<div class="modal fade" id="model_edit<?php echo $model->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Edit Model
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="editbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/edit_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Model</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<input type="hidden" name="id" class="form-control" value="<?php echo $model->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="jenis" class="form-control" value="item_model">
						<input type="text" name="nama" class="form-control" value="<?php echo $model->nama ?>" required>
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
<div class="modal fade" id="model_del<?php echo $model->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content bg-danger">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Delete Model
					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form class="form-horizontal" onsubmit="delbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/del_item') ?>">
				<div class="modal-body">
					<?php foreach ($listitem as $u) : ?>
					<input type="hidden" name="id_item" value="<?php echo $u->id; ?>">
					<?php endforeach ?>
					<input type="hidden" name="id" value="<?php echo $model->id; ?>">
					<input type="hidden" name="jenis" class="form-control" value="item_model">
					<span>Are you sure delete <?php echo $model->nama; ?> ?</span>
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
<!-- modal model -->

<!-- modal OD -->
<div class="modal fade" id="od_add" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Add Od
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/add_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Od</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="jenis" class="form-control" value="item_od">
						<input type="text" name="nama" class="form-control" placeholder="..." required>
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
<?php foreach ($item_od as $od) : ?>
<div class="modal fade" id="od_edit<?php echo $od->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Edit Od
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="editbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/edit_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Od</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="id" class="form-control" value="<?php echo $od->id; ?>">
						<input type="hidden" name="jenis" class="form-control" value="item_od">
						<input type="text" name="nama" class="form-control" value="<?php echo $od->nama ?>" required>
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
<div class="modal fade" id="od_del<?php echo $od->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content bg-danger">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Delete Od
					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form class="form-horizontal" onsubmit="delbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/del_item') ?>">
				<div class="modal-body">
					<?php foreach ($listitem as $u) : ?>
					<input type="hidden" name="id_item" value="<?php echo $u->id; ?>">
					<?php endforeach ?>
					<input type="hidden" name="id" value="<?php echo $od->id; ?>">
					<input type="hidden" name="jenis" class="form-control" value="item_model">
					<span>Are you sure delete <?php echo $od->nama; ?> ?</span>
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
<!-- modal Od -->

<!-- modal Category -->
<div class="modal fade" id="category_add" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Add Category
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/add_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Category</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="jenis" class="form-control" value="item_category">
						<input type="text" name="nama" class="form-control" placeholder="..." required>
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
<?php foreach ($item_category as $category) : ?>
<div class="modal fade" id="category_edit<?php echo $category->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Edit Category
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="editbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/edit_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Category</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="id" class="form-control" value="<?php echo $category->id; ?>">
						<input type="hidden" name="jenis" class="form-control" value="item_category">
						<input type="text" name="nama" class="form-control" value="<?php echo $category->nama ?>" required>
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
<div class="modal fade" id="category_del<?php echo $category->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content bg-danger">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Delete Category
					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form class="form-horizontal" onsubmit="delbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/del_item') ?>">
				<div class="modal-body">
					<?php foreach ($listitem as $u) : ?>
					<input type="hidden" name="id_item" value="<?php echo $u->id; ?>">
					<?php endforeach ?>
					<input type="hidden" name="id" value="<?php echo $category->id; ?>">
					<input type="hidden" name="jenis" class="form-control" value="item_category">
					<span>Are you sure delete <?php echo $category->nama; ?> ?</span>
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
<!-- modal Category -->

<!-- modal hole -->
<div class="modal fade" id="hole_add" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Add Hole
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/add_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Hole</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="jenis" class="form-control" value="item_hole">
						<input type="text" name="nama" class="form-control" placeholder="..." required>
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
<?php foreach ($item_hole as $hole) : ?>
<div class="modal fade" id="hole_edit<?php echo $hole->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Edit Hole
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="editbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/edit_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Hole</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="id" class="form-control" value="<?php echo $hole->id; ?>">
						<input type="hidden" name="jenis" class="form-control" value="item_hole">
						<input type="text" name="nama" class="form-control" value="<?php echo $hole->nama ?>" required>
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
<div class="modal fade" id="hole_del<?php echo $hole->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content bg-danger">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Delete Hole
					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form class="form-horizontal" onsubmit="delbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/del_item') ?>">
				<div class="modal-body">
					<?php foreach ($listitem as $u) : ?>
					<input type="hidden" name="id_item" value="<?php echo $u->id; ?>">
					<?php endforeach ?>
					<input type="hidden" name="id" value="<?php echo $hole->id; ?>">
					<input type="hidden" name="jenis" class="form-control" value="item_hole">
					<span>Are you sure delete <?php echo $hole->nama; ?> ?</span>
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
<!-- modal hole -->

<!-- modal Id -->
<div class="modal fade" id="id_add" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Add Id
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/add_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Id</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="jenis" class="form-control" value="item_id">
						<input type="text" name="nama" class="form-control" placeholder="..." required>
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
<?php foreach ($item_id as $id) : ?>
<div class="modal fade" id="id_edit<?php echo $id->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Edit Id
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="editbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/edit_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Id</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="id" class="form-control" value="<?php echo $id->id; ?>">
						<input type="hidden" name="jenis" class="form-control" value="item_id">
						<input type="text" name="nama" class="form-control" value="<?php echo $id->nama ?>" required>
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
<div class="modal fade" id="id_del<?php echo $id->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content bg-danger">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Delete Id
					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form class="form-horizontal" onsubmit="delbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/del_item') ?>">
				<div class="modal-body">
					<?php foreach ($listitem as $u) : ?>
					<input type="hidden" name="id_item" value="<?php echo $u->id; ?>">
					<?php endforeach ?>
					<input type="hidden" name="id" value="<?php echo $id->id; ?>">
					<input type="hidden" name="jenis" class="form-control" value="item_id">
					<span>Are you sure delete <?php echo $id->nama; ?> ?</span>
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
<!-- modal id -->

<!-- modal plat -->
<div class="modal fade" id="plat_add" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Add Plat
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/add_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Plat</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="jenis" class="form-control" value="item_plat">
						<input type="text" name="nama" class="form-control" placeholder="..." required>
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
<?php foreach ($item_plat as $plat) : ?>
<div class="modal fade" id="plat_edit<?php echo $plat->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Edit Plat
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="editbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/edit_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Plat</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="id" class="form-control" value="<?php echo $plat->id; ?>">
						<input type="hidden" name="jenis" class="form-control" value="item_plat">
						<input type="text" name="nama" class="form-control" value="<?php echo $plat->nama ?>" required>
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
<div class="modal fade" id="plat_del<?php echo $plat->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content bg-danger">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Delete Plat
					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form class="form-horizontal" onsubmit="delbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/del_item') ?>">
				<div class="modal-body">
					<?php foreach ($listitem as $u) : ?>
					<input type="hidden" name="id_item" value="<?php echo $u->id; ?>">
					<?php endforeach ?>
					<input type="hidden" name="id" value="<?php echo $plat->id; ?>">
					<input type="hidden" name="jenis" class="form-control" value="item_plat">
					<span>Are you sure delete <?php echo $plat->nama; ?> ?</span>
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
<!-- modal plat -->

<!-- modal thread -->
<div class="modal fade" id="thread_add" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Add Thread
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/add_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Thread</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="jenis" class="form-control" value="item_thread">
						<input type="text" name="nama" class="form-control" placeholder="..." required>
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
<?php foreach ($item_thread as $thread) : ?>
<div class="modal fade" id="thread_edit<?php echo $thread->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Edit Plat
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form onsubmit="editbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/edit_item') ?>">
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Thread</span>
						</div>
						<?php foreach ($listitem as $u) : ?>
						<input type="hidden" name="id_item" class="form-control" value="<?php echo $u->id; ?>">
						<?php endforeach; ?>
						<input type="hidden" name="id" class="form-control" value="<?php echo $thread->id; ?>">
						<input type="hidden" name="jenis" class="form-control" value="item_thread">
						<input type="text" name="nama" class="form-control" value="<?php echo $thread->nama ?>" required>
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
<div class="modal fade" id="thread_del<?php echo $thread->id ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content bg-danger">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Delete Thread
					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form class="form-horizontal" onsubmit="delbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/del_item') ?>">
				<div class="modal-body">
					<?php foreach ($listitem as $u) : ?>
					<input type="hidden" name="id_item" value="<?php echo $u->id; ?>">
					<?php endforeach ?>
					<input type="hidden" name="id" value="<?php echo $thread->id; ?>">
					<input type="hidden" name="jenis" class="form-control" value="item_thread">
					<span>Are you sure delete <?php echo $thread->nama; ?> ?</span>
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
<!-- modal thread -->
