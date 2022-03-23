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
					<div class="callout callout-info">
						<?php foreach ($listing as $list) : ?>
						<li>ID &emsp;&emsp;&emsp;: <b><?php echo $list->id_hs; ?></b></li>
						<li>Company : <?php echo $list->company; ?></li>
						<li>Notes&emsp;&emsp;: <?php echo $list->notes; ?></li>
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
									<i class="fa fa-plus-square"></i>&nbsp; Add Assembly</a>
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
						<div class="card-body table-responsive">
							<table class="table table-bordered table-hover table-sm" id="example12">
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
								$no=1;
								$query = $this->db->where('id_listing', $list->id)->get('qoutation');
								foreach ($query->result() as $p) {  
									$sum_total[] = $p->price;
									$total_qty = array_sum($sum_total); ?>
								<tr>
									<td style="text-align:center"><?php echo $no++ ?></td>
									<td>
										<?php if ($p->id_assembly != 0) : ?>
										<span class="badge badge-warning"> Assembly</span>
										<?php endif; ?><br />
										<b><?php echo strtoupper($p->category) ?></b><br />
										<small class="badge badge-info"><?php echo $p->brand ?></small>
										<small class="badge badge-info"><?php echo $p->model ?></small>
										<small class="badge badge-info"><?php echo $p->thread ?></small>
										<small class="badge badge-info"><?php echo $p->type ?></small>
									</td>
									<td style="text-align:center"><br /><?php echo $p->size ?></td>
									<td style="text-align:center"><br /><?php echo $p->qty ?></td>
									<td style="text-align:center"><br />
										<?php echo number_format($p->price, 0, '.', '.'); ?> IDR
									</td>
									<td style="text-align:center">
										<a class="btn btn-warning" data-toggle="modal"
											data-target="#modal_edit<?php echo $p->id; ?>" title="Edit"><i
												class="fa fa-pencil-alt"></i></a>
										<a class="btn btn-danger" data-toggle="modal"
											data-target="#modal_hapus<?php echo $p->id; ?>" title="Delete"><i
												class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</table>
							<table class="table table-sm">
								<thead class="thead-light">
									<tr>
										<th width="70%" style="text-align:center"><b>Total<b></th>
										<th style="text-align:center">
											<b><?php echo number_format($total_qty, 0, '.', '.'); ?> IDR<b>
										</th>
									</tr>
								</thead>
								<th></th>
								<th></th>
							</table>
						</div>
						<div class="d-flex justify-content-around mb-3">
							<a class=" btn btn-info col-15 shadow" href="">
								<i class="fas fa-share"></i>&nbsp;Submit</a>
							<a class="btn btn-warning col-15 shadow" href="">
								<i class="fas fa-bullhorn"></i>&nbsp;Notice</a>
							<a class="btn btn-success col-15 shadow" href="">
								<i class="fas fa-lock"></i>&nbsp;Confrim</a>
							<a class="btn btn-primary col-15 shadow" href="">
								<i class="fas fa-print"></i>&nbsp;Print</a>
						</div>
					</div>
				</div>
				<div class="col-12 table-responsive-sm text-center mb-3">
					<a href="<?php echo base_url() . 'listing/listing' ?>" class="btn btn-default"><i
							class="fas fa-undo"></i>
						Back</a>
				</div>
			</div>
		</div>
		<?php endforeach ?>
	</section>
</div>

<!-- Bootstrap modal add -->
<div class="modal fade" id="modal_add_item" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="col-12 modal-title text-center">Add New Item
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h5>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/qoutation_save') ?>">
				<div class="modal-body">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text pr-4">Item&nbsp;</span>
						</div>
						<?php foreach ($listing as $list) : ?>
						<input type="hidden" name="id" readonly class="form-control"
							value="<?php echo $id_qoutation->id + 1; ?>">
						<input type="hidden" name="id_hs" class="form-control" value="<?php echo $list->id_hs ?>">
						<input type="hidden" name="id_listing" class="form-control" value="<?php echo $list->id ?>">
						<?php endforeach ?>
						<select id="item" name="item" class="form-control" onchange="" required>
							<option value="">- Choose Item -</option>
							<option value="hose">HOSE</option>
							<option value="fitting">FITTING</option>
							<option value="pipe">PIPE</option>
							<option value="clamp pipe">CLAIM PIPE</option>
							<option value="hose cover">HOSE COVER</option>
						</select>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text pr-3">Brand</span>
							</div>
							<select name="brand" id="brand" class="form-control">
								<option value="">- Choose Brand -</option>
								<option value="">HOSE</option>
								<option value="">FITTING</option>
								<option value="">PIPE</option>
								<option value="">CLAIM PIPE</option>
								<option value="">HOSE COVER</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text pr-3">Model</span>
							</div>
							<select name="model" id="model" class="form-control">
								<option value="">- Choose Model -</option>
								<option value="">HOSE</option>
								<option value="">FITTING</option>
								<option value="">PIPE</option>
								<option value="">CLAIM PIPE</option>
								<option value="">HOSE COVER</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text pr-4">Od&emsp;</span>
							</div>
							<select name="od" id="od" class="form-control">
								<option value="">- Choose Od -</option>
								<option value="">HOSE</option>
								<option value="">FITTING</option>
								<option value="">PIPE</option>
								<option value="">CLAIM PIPE</option>
								<option value="">HOSE COVER</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text pr-3">Size&emsp;</span>
							</div>
							<select name="size" id="size" class="form-control">
								<option value="">- Choose Size -</option>
								<option value="">HOSE</option>
								<option value="">FITTING</option>
								<option value="">PIPE</option>
								<option value="">CLAIM PIPE</option>
								<option value="">HOSE COVER</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text pr-4">Type</span>
							</div>
							<select name="type" id="type" class="form-control">
								<option value="">- Choose Type -</option>
								<option value="">HOSE</option>
								<option value="">FITTING</option>
								<option value="">PIPE</option>
								<option value="">CLAIM PIPE</option>
								<option value="">HOSE COVER</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text pr-1">Category</span>
							</div>
							<select name="category" id="category" class="form-control">
								<option value="">- Choose Category -</option>
								<option value="">HOSE</option>
								<option value="">FITTING</option>
								<option value="">PIPE</option>
								<option value="">CLAIM PIPE</option>
								<option value="">HOSE COVER</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text pr-4">Hole</span>
							</div>
							<select name="hole" id="hole" class="form-control">
								<option value="">- Choose Hole -</option>
								<option value="">HOSE</option>
								<option value="">FITTING</option>
								<option value="">PIPE</option>
								<option value="">CLAIM PIPE</option>
								<option value="">HOSE COVER</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text pr-4">Id&emsp;</span>
							</div>
							<select name="ID" id="ID" class="form-control">
								<option value="">- Choose Id -</option>
								<option value="">HOSE</option>
								<option value="">FITTING</option>
								<option value="">PIPE</option>
								<option value="">CLAIM PIPE</option>
								<option value="">HOSE COVER</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text pr-3">Plat&emsp;</span>
							</div>
							<select name="plat" id="plat" class="form-control">
								<option value="">- Choose Plat -</option>
								<option value="">HOSE</option>
								<option value="">FITTING</option>
								<option value="">PIPE</option>
								<option value="">CLAIM PIPE</option>
								<option value="">HOSE COVER</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text pr-2">Thread&nbsp;</span>
							</div>
							<select name="thread" id="thread" class="form-control">
								<option value="">- Choose Thread -</option>
								<option value="">HOSE</option>
								<option value="">FITTING</option>
								<option value="">PIPE</option>
								<option value="">CLAIM PIPE</option>
								<option value="">HOSE COVER</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text pr-3">Qty&emsp;</span>
							</div>
							<input type="number" name="company" class="form-control" min="1" placeholder="0" required>
						</div>
					</div>
					<div class="form-group mb-0">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text pr-2">Assembly</span>
							</div>
							<select name="" id="assembly" class="form-control" required>
								<option value="">- Choose Item -</option>
								<option value="">HOSE</option>
								<option value="">FITTING</option>
								<option value="">PIPE</option>
								<option value="">CLAIM PIPE</option>
								<option value="">HOSE COVER</option>
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
