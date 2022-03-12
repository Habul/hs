<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Listing Item</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item active">Listing Item</li>
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
				<?php foreach ($brand as $u) { ?>
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
										<th>plat</th>
										<th>size</th>
										<th>thread</th>
										<th>type</th>
										<th width="11%">Action</th>
									</tr>
								</thead>
								<?php
								$query = $this->db->where('id_brand', $u->id)->get('item');
								foreach ($query->result() as $u) { ?>
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
					<a href="<?php echo base_url() . 'listing/listing' ?>" class="btn btn-default"><i
							class="fas fa-undo"></i>
						Back</a>
				</div>
				<?php } ?>
			</div>
	</section>
</div>
