<div class="modal fade" id="logoutModal" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content bg-primary">
			<div class="modal-header">
				<h5 class="col-12 modal-title text-center">Ready to Leave?
					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h5>
			</div>
			<div class="modal-body">Select "Sign Out" below if you are ready to end your current session.</div>
			<div class="modal-footer justify-content-between">
				<button class="btn btn-outline-light" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
				<a class="btn btn-outline-light" href="<?= base_url('dashboard/keluar'); ?>">Sign Out <i class="fas fa-sign-out-alt"></i></a>
			</div>
		</div>
	</div>
</div>

<footer class="main-footer text-sm">
	<strong>Copyright &copy; <?= date('Y'); ?><a href="https://github.com/Habul"> Habul</a></strong> . All rights
	reserved.
	<div class="float-right d-none d-sm-inline-block">
		<b>Hydraulic System</b>
	</div>
</footer>

<aside class="control-sidebar control-sidebar-dark"></aside>

</div>

<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/dropzone/min/dropzone.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/filterizr/jquery.filterizr.min.js"></script>
<?php include './assets/plugins/ajax.php'; ?>
<script>
	$(document).ready(function() {
		$(".toggle-password").click(function() {
			$(this).toggleClass("fa-lock fa-lock-open");
			let input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	});
</script>
<script>
	$(function() {
		$('#item').change(function() {
			var id = $(this).val();
			$('#div_brand')[(id == 1) || (id == 2) || (id == 3) ? "show" : "hide"]();
			$('#div_type')[(id == 2) || (id == 3) ? "show" : "hide"]();
			$('#div_size')[(id == 2) || (id == 3) || (id == 4) || (id == 5) ? "show" : "hide"]();
			$('#div_model')[(id == 1) || (id == 3) ? "show" : "hide"]();
			$('#div_od')[(id == 1) ? "show" : "hide"]();
			$('#div_id')[(id == 1) ? "show" : "hide"]();
			$('#div_hole')[(id == 5) ? "show" : "hide"]();
			$('#div_category')[(id == 3) || (id == 4) ? "show" : "hide"]();
			$('#div_plat')[(id == 5) ? "show" : "hide"]();
			$('#div_thread')[(id == 3) ? "show" : "hide"]();
			$('#div_posisi')[(id == 3) ? "show" : "hide"]();
			if (id == 1 || id == 2 || id == 3) {
				$.ajax({
					url: "<?php echo site_url('listing/get_list_brand'); ?>",
					method: "POST",
					data: {
						id: id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].nama + '>' + data[i]
								.nama.toUpperCase() + '</option>';
						}
						$('#brand').html(html);
					}
				});
			} else {
				$('#brand').html('');
			}
			if (id == 2 || id == 3) {
				$.ajax({
					url: "<?php echo site_url('listing/get_list_type'); ?>",
					method: "POST",
					data: {
						id: id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].nama.replaceAll(' ', '') + '>' + data[i]
								.nama.toUpperCase() + '</option>';
						}
						$('#type').html(html);
					}
				});
			} else {
				$('#type').html('');
			}
			if (id == 2 || id == 3 || id == 4 || id == 5) {
				$.ajax({
					url: "<?php echo site_url('listing/get_list_size'); ?>",
					method: "POST",
					data: {
						id: id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].nama + '>' + data[i]
								.nama.toUpperCase() + '</option>';
						}
						$('#size').html(html);
					}
				});
			} else {
				$('#size').html('');
			}
			if (id == 1 || id == 3) {
				$.ajax({
					url: "<?php echo site_url('listing/get_list_model'); ?>",
					method: "POST",
					data: {
						id: id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].nama.replaceAll(' ', '') + '>' + data[i]
								.nama.toUpperCase() + '</option>';
						}
						$('#model').html(html);
					}
				});
			} else {
				$('#model').html('');
			}
			if (id == 1) {
				$.ajax({
					url: "<?php echo site_url('listing/get_list_od'); ?>",
					method: "POST",
					data: {
						id: id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].nama + '>' + data[i]
								.nama.toUpperCase() + '</option>';
						}
						$('#od').html(html);
					}
				});
			} else {
				$('#od').html('');
			}
			if (id == 3 || id == 4) {
				$.ajax({
					url: "<?php echo site_url('listing/get_list_category'); ?>",
					method: "POST",
					data: {
						id: id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].nama.replaceAll(' ', '') + '>' + data[i]
								.nama.toUpperCase() + '</option>';
						}
						$('#category').html(html);
					}
				});
			} else {
				$('#category').html('');
			}
			if (id == 5) {
				$.ajax({
					url: "<?php echo site_url('listing/get_list_hole'); ?>",
					method: "POST",
					data: {
						id: id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].nama + '>' + data[i]
								.nama.toUpperCase() + '</option>';
						}
						$('#hole').html(html);
					}
				});
			} else {
				$('#hole').html('');
			}
			if (id == 1) {
				$.ajax({
					url: "<?php echo site_url('listing/get_list_id'); ?>",
					method: "POST",
					data: {
						id: id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].nama + '>' + data[i]
								.nama.toUpperCase() + '</option>';
						}
						$('#id').html(html);
					}
				});
			} else {
				$('#id').html('');
			}
			if (id == 5) {
				$.ajax({
					url: "<?php echo site_url('listing/get_list_plat'); ?>",
					method: "POST",
					data: {
						id: id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].nama + '>' + data[i]
								.nama.toUpperCase() + '</option>';
						}
						$('#plat').html(html);
					}
				});
			} else {
				$('#plat').html('');
			}
			if (id == 3) {
				$.ajax({
					url: "<?php echo site_url('listing/get_list_thread'); ?>",
					method: "POST",
					data: {
						id: id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].nama + '>' + data[i]
								.nama.toUpperCase() + '</option>';
						}
						$('#thread').html(html);
					}
				});
			} else {
				$('#thread').html('');
			}
			if (id == 3) {
				$.ajax({
					url: "<?php echo site_url('listing/get_list_posisi'); ?>",
					method: "POST",
					data: {
						id: id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '<option value="">- Choose posisi -</option>';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].nama + '>' + data[i]
								.nama.toUpperCase() + '</option>';
						}
						$('#posisi').html(html);
					}
				});
			} else {
				$('#posisi').html('');
			}
			return false;
		});
	});
</script>
<script>
	var toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
	var currentTheme = localStorage.getItem('theme');
	var mainHeader = document.querySelector('.main-header');

	if (currentTheme) {
		if (currentTheme === 'dark') {
			if (!document.body.classList.contains('dark-mode')) {
				document.body.classList.add("dark-mode");
			}
			if (mainHeader.classList.contains('navbar-light')) {
				mainHeader.classList.add('navbar-dark');
				mainHeader.classList.remove('navbar-light');
			}
			toggleSwitch.checked = true;
		}
	}

	function switchTheme(e) {
		if (e.target.checked) {
			if (!document.body.classList.contains('dark-mode')) {
				document.body.classList.add("dark-mode");
			}
			if (mainHeader.classList.contains('navbar-light')) {
				mainHeader.classList.add('navbar-dark');
				mainHeader.classList.remove('navbar-light');
			}
			localStorage.setItem('theme', 'dark');
		} else {
			if (document.body.classList.contains('dark-mode')) {
				document.body.classList.remove("dark-mode");
			}
			if (mainHeader.classList.contains('navbar-dark')) {
				mainHeader.classList.add('navbar-light');
				mainHeader.classList.remove('navbar-dark');
			}
			localStorage.setItem('theme', 'light');
		}
	}

	toggleSwitch.addEventListener('change', switchTheme, false);
</script>
<script>
	$("#info").fadeTo(2000, 500).slideUp(500, function() {
		$("#info").slideUp(1000);
	});
</script>
<script>
	function gethclock() {
		const d = new Date();
		weekdayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
		monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
		var dateString = d.getFullYear() + ' ' + monthNames[d.getMonth()] + ' ' + d.getDate() + ' - ' +
			('00' + d.getHours()).slice(-2) + ':' + ('00' + d.getMinutes()).slice(-2) + ':' + ('00' + d.getSeconds()).slice(-
				2);
		document.getElementById('hclock').innerHTML = dateString;
		setTimeout(gethclock, 1000);
	}
	gethclock();
</script>
</body>

</html>