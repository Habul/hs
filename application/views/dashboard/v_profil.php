<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Profile</h1>
					<small>Profile Pengguna</small>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
						<li class="breadcrumb-item active">Profile</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<div class="card card-success card-outline">
						<div class="card-body box-profile shadow">
							<div class="text-center">
								<img class="profile-user-img img-fluid img-circle" src="<?= base_url() . 'gambar/profile/' . $this->session->userdata('foto'); ?>" alt="User profile picture" id="blah">
							</div>
							<h3 class="profile-username text-center"><?= $this->session->userdata('nama'); ?></h3>
							<p class="text-muted text-center"><?= $this->session->userdata('level'); ?></p>
							<ul class="list-group list-group-unbordered mb-3">
								<li class="list-group-item">
									<b>Name</b><a class="float-right"><?= strtoupper($this->session->userdata('nama')) ?></a>
								</li>
								<li class="list-group-item">
									<b>Username</b><a class="float-right"><?= ucwords($this->session->userdata('username')) ?></a>
								</li>
								<li class="list-group-item">
									<b>Email</b><a class="float-right"><?= $this->session->userdata('email'); ?></a>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-9">
					<?php
					if (isset($_GET['alert'])) {
						if ($_GET['alert'] == "sukses") {
							echo "<div class='alert alert-success alert-dismissible' id='info'><i class='icon fas fa-check'></i>Profil telah diupdate!</div>";
						}
					}
					if (isset($_GET['alert'])) {
						if ($_GET['alert'] == "ok") {
							echo "<div class='alert alert-success' id='info'><i class='icon fas fa-check'></i>Password telah diubah!</div>";
						} else if ($_GET['alert'] == "gagal") {
							echo "<div class='alert alert-danger' id='info'><i class='icon fas fa-exclamation-triangle'></i>Maaf, password lama yang anda masukkan salah!</div>";
						} else if ($_GET['alert'] == "kurang") {
							echo "<div class='alert alert-warning' id='info'><i class='icon fas fa-ban'></i>Maaf, password baru min 6 character / konfirmasi password tidak sama!</div>";
						}
					}
					?>
					<div class="card card-success card-outline card-outline-tabs">
						<div class="card-header p-0 border-bottom-0">
							<ul class="nav nav-tabs" role="tablist" id="myTab">
								<li class="nav-item">
									<a class="nav-link active" id="set_user" data-toggle="tab" href="#profile-settiing" role="tab" aria-controls="profile-settiing" aria-selected="true">Profile</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="set_pass" data-toggle="tab" href="#pass-setting" role="tab" aria-controls="pass-setting" aria-selected="false">Password</a>
								</li>
							</ul>
						</div>

						<div class="card-body">
							<div class="tab-content">
								<div class="tab-pane fade show active" id="profile-settiing" role="tabpanel" aria-labelledby="profile-settiing-tab">
									<?php foreach ($profil as $p) { ?>
										<form onsubmit="profil.disabled = true; return true;" method="post" action="<?= base_url('dashboard/profil_update') ?>" enctype="multipart/form-data">
											<div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Nama *</label>
												<div class="col-sm-10">
													<input type="text" name="nama" id="inputName" class="form-control" placeholder="Masukkan nama .." value="<?= $p->pengguna_nama; ?>" required>
													<?= form_error('nama'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="inputEmail" class="col-sm-2 col-form-label">Email *</label>
												<div class="col-sm-10">
													<input type="text" name="email" id="inputEmail" class="form-control" placeholder="Masukkan email .." value="<?= $p->pengguna_email; ?>" required>
													<?= form_error('email'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-2">Foto </label>
												<div class="col-sm-10">
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="image" name="foto" onchange="priviewImage()">
														<label class="custom-file-label" for="image">Choose file</label>
													</div>
													<img class="img-priview img-fluid col-sm-5 mt-3">
													<?= form_error('foto'); ?>
												</div>
											</div>
											<div class="text-center mb-3">
												<button type="submit" class="btn btn-outline-success col-3"><i class="fa fa-check"></i> Update</button>
											</div>
										</form>
									<?php } ?>
								</div>
								<div class="tab-pane fade" id="pass-setting" role="tabpanel" aria-labelledby="pass-setting-tab">
									<form method="post" action="<?= base_url('dashboard/ganti_password_aksi') ?>" id="change_pass">
										<div class="card-body">
											<div class="form-group">
												<label>Old Password *</label>
												<div class="input-group">
													<input type="password" name="password_lama" class="form-control" placeholder="Masukkan Password Lama Anda .." id="password_field0">
													<div class="input-group-append">
														<span class="input-group-text"><i toggle="#password_field0" class="fas fa-fw fa-eye field-icon toggle-password0"></i></span>
													</div>
												</div>
											</div>
											<hr>
											<div class="form-group">
												<label>New Password *</label>
												<div class="input-group">
													<input type="password" name="password_baru" class="form-control" placeholder="Masukkan Password Baru .." id="password_field1">
													<div class="input-group-append">
														<span class="input-group-text"><i toggle="#password_field1" class="fas fa-fw fa-eye field-icon toggle-password1"></i></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label>Confirm New Password *</label>
												<div class="input-group">
													<input type="password" name="konfirmasi_password" class="form-control" placeholder="Ulangi Password Baru .." id="password_field2">
													<div class="input-group-append">
														<span class="input-group-text"><i toggle="#password_field2" class="fas fa-fw fa-eye field-icon toggle-password2"></i></span>
													</div>
												</div>
											</div>
										</div>
										<div class="text-center mb-3">
											<button type="submit" class="btn btn-outline-success col-3"><i class="fa fa-check"></i> Update</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
	</section>
</div>
<script>
	function priviewImage() {
		const image = document.querySelector('#image');
		const imgPreview = document.querySelector('.img-priview');

		imgPreview.style.display = 'block';

		const oFReader = new FileReader();
		oFReader.readAsDataURL(image.files[0]);

		oFReader.onload = function(oFREvent) {
			imgPreview.src = oFREvent.target.result;
		}
	}
</script>