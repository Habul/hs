<!DOCTYPE html>
<html lang="eng" class="scroll-smooth">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>HS | Login</title>
	<link rel='icon' href="<?= base_url(); ?>gambar/website/hs-ico.png" type="image/gif">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
	</script>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/css/login.css">
</head>

<body class='hold-transition login-page'>
	<div class='position-relative'>
		<div class='container h-100'>
			<div class='d-flex justify-content-center h-100'>
				<div class='user_card'>
					<div class='d-flex justify-content-center'>
						<div class='brand_logo_container'>
							<img src='<?= base_url(); ?>gambar/website/hs-logo.png' class='brand_logo' alt='Logo'>
						</div>
					</div>
					<div class='d-flex justify-content-center form_container mt-5'>
						<form action="<?= base_url() . 'login/proses' ?>" onsubmit="logbtn.disabled = true; return true;" id="loginform" method="post">
							<div class="input-group mb-3">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-user">&nbsp;</span>
									</div>
								</div>
								<input type="text" class="form-control" placeholder="Username" id="username" name="username" required="" oninvalid="this.setCustomValidity('Field username belum diisi')" oninput="setCustomValidity('')" autofocus>
							</div>
							<?= form_error('username'); ?>
							<div class="input-group mb-3">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fa fa-fw fa-lock"></span>
									</div>
								</div>
								<input id="password-field" type="password" class="form-control" name="password" placeholder="Password" required="" oninvalid="this.setCustomValidity('Field Password belum diisi')" oninput="setCustomValidity('')">
							</div>
							<?= form_error('password'); ?>
							<div class='form-group'>
								<div class='custom-control custom-checkbox'>
									<input type='checkbox' class='custom-control-input' id='customControlInline'>
									<label class='custom-control-label' for='customControlInline'>Show password</label>
								</div>
							</div>
							<div class="col-12 mb-0">
								<button type="submit" id="logbtn" class="btn btn-danger btn-block">Sign In</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php
			if (isset($_GET['alert'])) {
				if ($_GET['alert'] == "gagal") {
					echo "<div class='alert alert-warning font-weight-bold text-center shadow'><i class='icon fas fa-exclamation-triangle'></i>Login Gagal!</div>";
				} else if ($_GET['alert'] == "belum_login") {
					echo "<div class='alert alert-danger font-weight-bold text-center shadow'><i class='icon fas fa-ban'></i>Anda Harus Login Terlebih Dulu!</div>";
				} else if ($_GET['alert'] == "logout") {
					echo "<div class='alert alert-success font-weight-bold text-center shadow'><i class='icon fas fa-bell'></i>Anda Telah Logout!</div>";
				} else if ($_GET['alert'] == "registered") {
					echo "<div class='alert alert-success font-weight-bold text-center shadow'><i class='icon fas fa-bell'></i>User berhasil di tambah</div>";
				}
			}
			?>
		</div>
	</div>
	<script>
		const password = document.getElementById("password-field");
		const togglePassword = document.getElementById("customControlInline");
		togglePassword.addEventListener("click", toggleClicked);

		function toggleClicked() {
			if (this.checked) {
				password.type = "text";
			} else {
				password.type = "password";
			}
		}
	</script>
</body>

</html>