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
		<div class="container-fluid">
			<div class="row">
				<div class="card-deck">
					<?php foreach ($listitem as $b) { 
					$encrypturl = urlencode($this->encrypt->encode($b->id)) ?>
					<a href="<?php echo base_url() . 'listing/listing_item_detail/?item='. $encrypturl ?>">
						<div class="card mb-3" style="width:17rem;">
							<img src="<?php echo base_url() . 'gambar/brand/'. $b->foto ?>" class="card-img-top rounded"
								onerror="this.style.display='none'">
							<div class="card-body">
								<h5 class="card-title text-center text-muted"><b><?php echo strtoupper($b->nama)?></b></h5>
							</div>
						</div>
					</a>
					<?php } ?>
				</div>
				<div class="col-md-3 mb-3 shadow" style="padding: 0;">
					<a class=" form-control btn btn-info" data-toggle="modal" data-target="#modal_add">
						<i class="fa fa-plus"></i>&nbsp; Add Item</a>
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
				<h5 class="col-12 modal-title text-center">Create New Item
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h5>
			</div>
			<form onsubmit="addbtn.disabled = true; return true;" method="post"
				action="<?php echo base_url('listing/add_list_item') ?>" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-tools nav-icon"></i></span>
							</div>
							<input type="hidden" name="id" class="form-control" value="<?php echo $add_id->id+1 ?>">
							<input type="text" name="nama" class="form-control" placeholder="Input Item.." required>
						</div>
					</div>
					<div class="form-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="customFile" name="foto">
							<label class="custom-file-label" for="customFile">Choose file</label>
							<small>*Max size 1 Mb</small>
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
