<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<?php foreach ($listbrand as $b) { ?>
					<h1 class="m-0">Listing Item <?php echo ucfirst($b->brand) ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url('listing/listing_item') ?>">List Item</a>
						</li>
						<li class="breadcrumb-item active">Listing Item <?php echo ucwords($b->brand) ?>
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
				<div class="col-md-12">
					<div class="card card-success card-outline">
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
							<table id="index1" class="table table-hover table-sm">
								<thead class="thead-dark" style="text-align:center">
									<tr>
										<th width="3%">No</th>
										<th width="10%">Brand</th>
										<th>Category</th>
										<th>hole</th>
										<th>ID</th>
										<th>Model</th>
										<th>OD</th>
										<th>Plat</th>
										<th>Size</th>
										<th>Thread</th>
										<th>Type</th>
										<th width="11%">Action</th>
									</tr>
								</thead>
								<?php
								$query = $this->db->where('id_brand', $b->id)->get('item');
								foreach ($query->result() as $p) { ?>
								<tr>
									<td style="text-align:center"></td>
									<td><?php echo strtoupper($p->brand) ?></td>
									<td style="text-align:center"><?php echo strtoupper($p->category) ?></td>
									<td style="text-align:center"><?php echo $p->hole ?></td>
									<td style="text-align:center"><?php echo $p->i_d ?></td>
									<td style="text-align:center"><?php echo $p->model ?></td>
									<td style="text-align:center"><?php echo $p->od ?></td>
									<td style="text-align:center"><?php echo $p->plat ?></td>
									<td style="text-align:center"><?php echo $p->size ?></td>
									<td style="text-align:center"><?php echo $p->thread ?></td>
									<td style="text-align:center"><?php echo $p->type ?></td>
									<td style="text-align:center">
										<?php $encrypturl = urlencode($this->encrypt->encode($p->id)) ?>
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#modal_edit<?php echo $p->id; ?>" title="Edit"><i
												class="fa fa-pencil-alt"></i></a>
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
				<div class="col-12 table-responsive-sm text-center mb-3">
					<a href="<?php echo base_url() . 'listing/listing_item' ?>" class="btn btn-default"><i
							class="fas fa-undo"></i>
						Back</a>
				</div>
				<?php } ?>
			</div>
	</section>
</div>

<!-- Bootstrap modal add -->
<div class="modal fade" id="modal_add" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="col-12 modal-title text-center">Create New Item
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h5>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/add_list_item_detail') ?>">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Brand</label>
						<div class="col-sm-10">
							<?php foreach ($listbrand as $b) { ?>
							<input type="text" name="brand" class="form-control" value="<?php echo $b->brand ?>" required>
							<?php } ?>
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
