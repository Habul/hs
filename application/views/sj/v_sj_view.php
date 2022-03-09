<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Surat Jalan Detail</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url('sj/sj') ?>">Surat Jalan HS</a></li>
						<li class="breadcrumb-item active">Surat Jalan Desc</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="callout callout-info">
						<?php foreach ($sj_user as $p) : ?>
						<li>No Do&emsp;&emsp;: <b><?php echo $p->no_delivery; ?></b></li>
						<li>No Po&emsp;&emsp;: <b><?php echo $p->no_po; ?></b></li>
						<li>Customer : <?php echo $p->cust_name; ?></li>
						<li>Address &emsp;: <?php echo $p->address; ?></li>
					</div>
				</div>
			</div>
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
					<div class="card card-warning card-outline">
						<div class="card-header">
							<h4 class="card-title">
								<a class="btn btn-success shadow" data-toggle="modal" data-target="#modal_add">
									<i class="fa fa-plus"></i>&nbsp; Add Order Delivery</a>
								<?php $encrypturl = urlencode($this->encrypt->encode($p->no_po)) ?>
								<a href="<?php echo base_url() . 'sj/sj_print/?p=' . $encrypturl ?>" rel="noopener"
									target="_blank" class="btn btn-primary shadow"><i class="fas fa-print"></i> Print
									Surat Jalan</a>
							</h4>
							<div class="card-tools">
								<button type="button" class="btn btn-xs btn-icon btn-circle btn-warning"
									data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-xs btn-icon btn-circle btn-danger"
									data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped table-sm">
								<thead class="thead-dark" style="text-align:center">
									<tr>
										<th width="3%">No</th>
										<th width="50%">Description</th>
										<th width="5%">Qty</th>
										<th width="5%">Action</th>
									</tr>
								</thead>
								<?php
								$no = 1;
								$query = $this->db->where('no_po', $p->no_po)->get('sj_hs');
								foreach ($query->result() as $u) { 
								$sum_total[] = $u->qty;
								$total_qty = array_sum($sum_total); ?>
								<tr>
									<td style="text-align:center"><?php echo $no++; ?></td>
									<td><?php echo $u->descript; ?></td>
									<td style="text-align:center"><?php echo $u->qty; ?></td>
									<td style="text-align:center">
										<a class="btn-sm btn-warning" data-toggle="modal"
											data-target="#modal_edit_desc<?php echo $u->no_id; ?>" title="Edit Desc SJ"><i
												class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" data-toggle="modal"
											data-target="#modal_del_desc<?php echo $u->no_id; ?>" title="Delete Desc SJ"><i
												class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
								<tr>
									<td colspan="2" style="text-align:center"><b>Total<b></td>
									<td style="text-align:center"><b><?php echo $total_qty; ?><b></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="col-12 table-responsive-sm text-center mb-3">
					<a href="<?php echo base_url() . 'sj/sj/' ?>" class="btn btn-default"><i class="fas fa-undo"></i>
						Back</a>
				</div>
			</div>
			<?php endforeach; ?>
	</section>
</div>

<!-- modal add Desc SJ -->
<?php foreach ($sj_user as $p) : ?>
<div class="modal fade" id="modal_add" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Surat Jalan (No Po : <?php echo $p->no_po; ?>)
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form class="form-horizontal" onsubmit="addesc.disabled = true; return true;" method="post"
				action="<?php echo base_url('sj/sj_update') ?>">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-xs-3">Description *</label>
						<div class="col-xs-9">
							<input type="hidden" name="no_po" readonly class="form-control" value="<?php echo $p->no_po; ?>">
							<textarea name="descript" class="form-control" maxlength="200" placeholder="Input Desc.."
								required></textarea>
							<?php echo form_error('descript'); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3">Qty *</label>
						<div class="col-xs-9">
							<input type="number" name="qty" class="form-control" min="1" placeholder="Input Qty.." required>
							<?php echo form_error('qty'); ?>
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
					<button class="btn btn-primary" id="addesc"><i class="fa fa-check"></i> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
<!-- end modal add Desc SJ -->

<!-- modal Edit Desc SJ -->
<?php foreach ($sj_hs as $u) : ?>
<div class="modal fade" id="modal_edit_desc<?php echo $u->no_id; ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Surat Jalan (No Po : <?php echo $u->no_po; ?>)
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form class="form-horizontal" onsubmit="editdesc.disabled = true; return true;" method="post"
				action="<?php echo base_url('sj/sj_update_edit') ?>">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-xs-3">Description *</label>
						<div class="col-xs-9">
							<input type="hidden" name="id" class="form-control" value="<?php echo $u->no_id; ?>">
							<input type="hidden" name="no_po" class="form-control" value="<?php echo $u->no_po; ?>">
							<textarea name="descript" class="form-control" maxlength="200"
								required><?php echo $u->descript; ?></textarea>
							<?php echo form_error('descript'); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3">Qty *</label>
						<div class="col-xs-9">
							<input type="number" name="qty" class="form-control" min="1" value=<?php echo $u->qty; ?> required>
							<?php echo form_error('qty'); ?>
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
<!-- end modal Edit Desc SJ -->

<!--MODAL HAPUS DESC-->
<?php foreach ($sj_hs as $u) : ?>
<div class="modal fade" id="modal_del_desc<?php echo $u->no_id; ?>" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content bg-danger">
			<div class="modal-header">
				<h4 class="col-12 modal-title text-center">Delete Desc SJ
					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<form class="form-horizontal" onsubmit="deldesc.disabled = true; return true;" method="post"
				action="<?php echo base_url('sj/sj_desc_hapus') ?>">
				<div class="modal-body">
					<input type="hidden" name="id" value="<?php echo $u->no_id; ?>">
					<input type="hidden" name="no_po" value="<?php echo $u->no_po; ?>">
					<p>Are you sure delete this ?</p>
				</div>
				<div class="modal-footer justify-content-between">
					<button class="btn btn-outline-light" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
					<button class="btn btn-outline-light" id="deldesc"><i class="fa fa-check"></i> Yes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
