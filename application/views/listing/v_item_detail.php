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
				<div class="col-md-6">
					<div class="card card-success">
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
							<table id="example9" class="table table-hover table-sm">
								<thead class="thead-dark" style="text-align:center">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th width="16%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $b->id_item)->get('item_brand');
								foreach ($query->result() as $p) { ?>
								<tr id="example9" style="text-align:center">
									<td><?php echo $no++ ?></td>
									<td><?php echo strtoupper($p->nama) ?></td>
									<td style="text-align:center">
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#modal_edit<?php echo $p->no_id; ?>" title="Edit"><i
												class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#modal_hapus<?php echo $p->no_id; ?>" title="Delete"><i
												class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div class="card-body row">
							<div class="col-md-4">
								<button class="btn btn-success btn-block" data-toggle="modal" data-target="#modal_add">
									<i class="fa fa-plus"></i> Add New Brand</button>
							</div>
						</div>
					</div>
				</div>

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
							<table id="example10" class="table table-hover table-sm">
								<thead class="thead-dark" style="text-align:center">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th width="16%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $u->no_id)->get('item_type');
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
								<button class="btn btn-info btn-block" data-toggle="modal" data-target="#add_history">
									<i class="fa fa-plus"></i> Add New Type</button>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="card card-warning">
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
							<table id="example10" class="table table-hover table-sm">
								<thead class="thead-dark" style="text-align:center">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th width="16%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('id_item', $u->no_id)->get('item_size');
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
								<button class="btn btn-info btn-block" data-toggle="modal" data-target="#add_history">
									<i class="fa fa-plus"></i> Add New Size</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</section>
</div>
