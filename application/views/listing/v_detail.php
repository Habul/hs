<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Input List Qoutation</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url('listing/listing') ?>">Listing</a></li>
						<li class="breadcrumb-item active">Input List Qoutation</li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<?php if ($this->session->flashdata('berhasil')) { ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<i class="icon fa fa-check"></i>&nbsp;<?= $this->session->flashdata('berhasil') ?>
			</div>
			<?php } ?>
			<?php if ($this->session->flashdata('gagal')) { ?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<i class="icon fa fa-warning"></i>&nbsp;<?= $this->session->flashdata('gagal') ?>
			</div>
			<?php } ?>
			<div class="row">
				<div class="col-md-12">
					<div class="callout callout-info">
						<ul>
							<li>ID : </li>
							<li>Company Name : </li>
							<li>Notes : </li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card card-warning card-outline">
						<div class="card-header">
							<h3 class="card-title">
								<a class="btn btn-success col-15 shadow" data-toggle="modal" data-target="#modal_add_item">
									<i class="fa fa-plus"></i>&nbsp; Add Item</a>
								<a class="btn btn-warning col-15 shadow" data-toggle="modal" data-target="#modal_add_ass">
									<i class="fa fa-plus"></i>&nbsp; Add Assembly</a>
							</h3>
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
							<table id="index1" class="table table-bordered table-hover">
								<thead class="thead-dark" style="text-align:center">
									<tr>
										<th width="3%">No</th>
										<th>Category Type</th>
										<th>Size</th>
										<th>Qty</th>
										<th>Price</th>
										<th width="11%">Action</th>
									</tr>
								</thead>
								<?php foreach ($qoutation as $p) { ?>
								<tr>
									<td style="text-align:center"></td>
									<td><small class="badge badge-warning"><?php echo $p->id_assembly ?></small><br />
										<?php echo $p->category ?><br />
										<small class="badge badge-info"><?php echo $p->brand ?>&nbsp;
											<?php echo $p->model ?>&nbsp;<?php echo $p->thread ?></small>
									</td>
									<td style="text-align:center"><?php echo $p->size ?></td>
									<td style="text-align:center"><?php echo $p->qty ?></td>
									<td style="text-align:center"><?php echo $p->price ?></td>
									<td style="text-align:center">
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
			</div>
	</section>
</div>


<!-- Bootstrap modal add -->
<div class="modal fade" id="modal_add_item" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="col-12 modal-title text-center">Add Data
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h5>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/create') ?>">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Id</label>
						<div class="col-sm-10">
							<input type="hidden" name="id" readonly class="form-control" value="<?php echo $cek->id + 1; ?>">
							<input type="text" name="id_hs" class="form-control"
								value="<?php echo 'HS', date('Ymd-'), $cek->id + 1; ?>" readonly>
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
