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

<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<script src="<?= base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/dropzone/min/dropzone.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/filterizr/jquery.filterizr.min.js"></script>
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
		$(".toggle-password0").click(function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
		$(".toggle-password1").click(function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
		$(".toggle-password2").click(function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	});

	<?php if ($this->session->flashdata('loginok')) : ?> {
			$(document).Toasts('create', {
				class: 'bg-success',
				title: 'Welcome',
				body: '<?= ucwords($this->session->flashdata('loginok')) ?>'
			})
		};
	<?php endif; ?>

	$(function() {
		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 6000
		});

		<?php if ($this->session->flashdata('ok')) { ?>
			Toast.fire({
				icon: 'success',
				title: '<?= ucwords($this->session->flashdata('ok')) ?>'
			})
		<?php } else if ($this->session->flashdata('nok')) { ?>
			Toast.fire({
				icon: 'error',
				title: '<?= ucwords($this->session->flashdata('nok')) ?>'
			})
		<?php } else if ($this->session->flashdata('repeat')) { ?>
			Toast.fire({
				icon: 'warning',
				title: '<?= ucwords($this->session->flashdata('repeat')) ?>'
			})
		<?php } ?>
	});

	$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
		localStorage.setItem('activeTab', $(e.target).attr('href'));
	});
	var activeTab = localStorage.getItem('activeTab');
	if (activeTab) {
		$('#myTab a[href="' + activeTab + '"]').tab('show');
	}

	$(document).ready(function() {
		let qty = document.getElementById('qty').value;
		let price_unit = document.getElementById('price_unit').value;
		let value = qty * price_unit;
		let min = value - (value * 0.1);
		$('#markdown').validate({
			rules: {
				price: {
					required: true,
					min: min
				},
			},
			messages: {
				price: {
					required: "Please provide a price",
					min: "Max markdown 10%"
				},
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});
	});

	$('#change_pass').validate({
		rules: {
			password_lama: {
				required: true,
				minlength: 6
			},
			password_baru: {
				required: true,
				minlength: 6
			},
			konfirmasi_password: {
				required: true,
				equalTo: '#password_field1'
			},
		},
		messages: {
			password_lama: {
				required: "Please provide a password",
				minlength: "Your password must be at least 6 characters long"
			},
			password_baru: {
				required: "Please provide a password",
				minlength: "Your password must be at least 6 characters long"
			},
			konfirmasi_password: {
				required: "Please provide a password",
				equalTo: "Please enter the same value again"
			},
		},
		errorElement: 'span',
		errorPlacement: function(error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function(element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
			$(element).addClass('is-valid');
		}
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
					url: "<?= site_url('listing/get_list_brand'); ?>",
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
					url: "<?= site_url('listing/get_list_type'); ?>",
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
					url: "<?= site_url('listing/get_list_size'); ?>",
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
					url: "<?= site_url('listing/get_list_model'); ?>",
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
					url: "<?= site_url('listing/get_list_od'); ?>",
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
					url: "<?= site_url('listing/get_list_category'); ?>",
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
					url: "<?= site_url('listing/get_list_hole'); ?>",
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
					url: "<?= site_url('listing/get_list_id'); ?>",
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
					url: "<?= site_url('listing/get_list_plat'); ?>",
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
					url: "<?= site_url('listing/get_list_thread'); ?>",
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
					url: "<?= site_url('listing/get_list_posisi'); ?>",
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
	$(document).ready(function() {
		$('.view_detail').click(function() {
			var id = $(this).attr('relid');
			$.ajax({
				url: "<?= site_url('listing/get_id_listing'); ?>",
				data: {
					id: id
				},
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						var remove = data.filter(function(el) {
							return el != null;
						})
						html += '<tr>' +
							'<td class="align-middle>' +
							'<small class="badge badge-secondary">' + data[i].assembly + '</small>' +
							'<small class="badge badge-danger">' + data[i].type_price + '</small>' +
							'<br>' +
							'<b>' + data[i].id_item + '</b> <br>' +
							'<small class="badge badge-info">' + data[i].brand + '</small>' +
							'<small class="badge badge-info">' + data[i].model + '</small>' +
							'<small class="badge badge-info">' + data[i].od + '</small>' +
							'<small class="badge badge-info">' + data[i].type + '</small>' +
							'<small class="badge badge-info">' + data[i].category + '</small>' +
							'<small class="badge badge-info">' + data[i].hole + '</small>' +
							'<small class="badge badge-info">' + data[i].i_d + '</small>' +
							'<small class="badge badge-info">' + data[i].plat + '</small>' +
							'<small class="badge badge-info">' + data[i].thread + '</small>' +
							'<small class="badge badge-warning">' + data[i].posisi + '</small>' +
							'</td>' +
							'<td class="align-middle text-center">' + data[i].size + '</td>' +
							'<td class="align-middle text-center">' + data[i].qty + '</td>' +
							'<td class="align-middle text-center">' + data[i].price + '<br>' +
							'<small>@' + data[i].price_unit + '</td>' +
							'</tr>';
					}
					$('#modal_view').modal({
						backdrop: 'static',
						keyboard: true,
						show: true
					});
					$('#show_data').html(html);
				}
			});
		});
	});

	$("#info").fadeTo(2000, 500).slideUp(500, function() {
		$("#info").slideUp(1000);
	});
</script>
<script>
	function gethclock() {
		const d = new Date();
		weekdayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
		monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
		var dateString = d.getDate() + ' ' + monthNames[d.getMonth()] + ' ' + d.getFullYear() + ' - ' +
			('00' + d.getHours()).slice(-2) + ':' + ('00' + d.getMinutes()).slice(-2) + ':' + ('00' + d.getSeconds()).slice(-
				2);
		document.getElementById('hclock').innerHTML = dateString;
		setTimeout(gethclock, 1000);
	}
	gethclock();
</script>
</body>

</html>