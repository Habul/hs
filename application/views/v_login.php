<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>HS | Login</title>
	<link rel='icon' href="<?php echo base_url(); ?>gambar/website/hs-ico.png" type="image/gif">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
		integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
		integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
	</script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/css/login.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/css/all.min.css">
</head>

<body class='container'>
	<div class='row'>
	</div>
	<div class='position-relative'>
		<div style='background-color:lightgray;'>
			<div class='container h-100'>
				<div class='d-flex justify-content-center h-100'>
					<div class='user_card'>
						<div class='d-flex justify-content-center'>
							<div class='brand_logo_container'>
								<img src='<?php echo base_url(); ?>gambar/website/hs-logo.png' class='brand_logo' alt='Logo'>
							</div>
						</div>
						<div class='d-flex justify-content-center form_container'>
							<form action='' method='POST'>
								<div class='input-group mb-3'>
									<div class='input-group-append'>
										<span class='input-group-text'><i class='fas fa-user'></i></span>
									</div>
									<input type='text' name='hs_user' class='form-control input_user' value=''
										placeholder='username' required>
								</div>
								<div class='input-group mb-2'>
									<div class='input-group-append'>
										<span class='input-group-text'><i class='fas fa-key'></i></span>
									</div>
									<input type='password' name='hs_pass' class='form-control input_pass' value=''
										placeholder='password' required>
								</div>
								<div class='form-group'>
									<div class='custom-control custom-checkbox'>
										<input type='checkbox' class='custom-control-input' id='customControlInline'>
										<label class='custom-control-label' for='customControlInline'>Remember me</label>
									</div>
								</div>
								<div class='d-flex justify-content-center mt-3 login_container'>
									<input type='hidden' name='route' value='route_login'>
									<input type='submit' name='lsubmit' class='btn login_btn' value='Login'>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<br>
<br>
<br>
<footer>
	<br>
	<div class='container'>
		<div style='font-size:10px;height:100px;overflow:auto;'></div>
	</div>
	<script type='text/javascript'>
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href);
			$(function () {
				$('[data-toggle="tooltip"]').tooltip()
			})
		}

	</script>
</footer>

</html>
