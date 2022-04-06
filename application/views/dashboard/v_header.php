<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HS | <?php echo $title; ?></title>
	<link rel='icon' href="<?php echo base_url(); ?>gambar/website/hs-ico.png" type="image/gif">
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/ekko-lightbox/ekko-lightbox.css">
	<link rel="stylesheet"
		href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet"
		href="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
	<link rel="stylesheet"
		href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet"
		href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<link rel="stylesheet"
		href="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bs-stepper/css/bs-stepper.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/dropzone/min/dropzone.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
	<link rel="stylesheet"
		href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet"
		href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet"
		href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet"
		href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/docs.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/style_games.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">
	<div class="wrapper">
		<div class="preloader flex-column justify-content-center align-items-center">
			<img src="<?php echo base_url(); ?>assets/dist/img/loading.gif" alt="Untitled-1-02.png" height="100"
				width="100">
		</div>

		<nav class="main-header navbar navbar-expand navbar-light navbar-light">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?php echo base_url() . 'dashboard' ?>" <?= $this->uri->uri_string() == 'dashboard'
                  || $this->uri->uri_string() == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>Dashboard</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?php echo base_url() . 'dashboard/profil' ?>" <?= $this->uri->uri_string() == 'dashboard/profil'
                  || $this->uri->uri_string() == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>Profile</a>
				</li>
			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<div class="theme-switch-wrapper nav-link">
						<label class="theme-switch" for="checkbox">
							<input type="checkbox" id="checkbox" title="Dark Mode" />
							<span class="slider round"></span>
						</label>
					</div>
				</li>

				<li class="nav-item dropdown user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url() . 'gambar/profile/' . $this->session->userdata('foto'); ?>"
							class="user-image img-circle elevation-2" alt="User Image">
						<span class="d-none d-md-inline"><?php echo $this->session->userdata('nama'); ?>&nbsp;<i
								class="fas fa-angle-down right"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<li class="user-header">
							<img src="<?php echo base_url() . 'gambar/profile/' . $this->session->userdata('foto'); ?>"
								class="img-circle elevation-2" alt="User Image">
							<p>
								<?php echo $this->session->userdata('nama');  ?>
								<small><?php echo $this->session->userdata('level');  ?></small>
								<small id='hclock'><?php mdate('%Y-%m-%d %H:%i:%s') ?></small>
							</p>
						</li>
						<li class="user-footer">
							<a href="<?php echo base_url() . 'dashboard/profil' ?>" class="btn btn-default border-0"
								title="Profile"><i class="fas fa-user-tie"></i> Profile</a>
							<a data-toggle="modal" data-target="#logoutModal" class="btn btn-default float-right border-0"
								title="Sign out"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>

		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<a href="#" class="brand-link">
				<img src="<?php echo base_url(); ?>gambar/website/hs-logo.png" alt="AdminLTE Logo"
					class="brand-image img-circle elevation-2">
				<span class="brand-text font-weight-green">Hydraulic System</span>
			</a>

			<div class="sidebar">
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?php echo base_url() . 'gambar/profile/' . $this->session->userdata('foto');  ?>"
							class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="<?php echo base_url() . 'dashboard/profil' ?>"
							class="d-block"><?php echo $this->session->userdata('nama');  ?></a>
					</div>
				</div>

				<div class="form-inline">
					<div class="input-group" data-widget="sidebar-search">
						<input class="form-control form-control-sidebar" type="search" placeholder="Search"
							aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-sidebar">
								<i class="fas fa-search fa-fw"></i>
							</button>
						</div>
					</div>
				</div>

				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar nav-child-indent nav-compact flex-column" data-widget="treeview"
						role="menu" data-accordion="false">
						<li class="nav-item">
							<a href="<?php echo base_url() . 'dashboard' ?>"
								<?= $this->uri->uri_string() == 'dashboard' || $this->uri->uri_string() == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>Dashboard</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?php echo base_url() . 'dashboard/pengguna' ?>"
								<?= $this->uri->uri_string() == 'dashboard/pengguna' || $this->uri->uri_string() == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
								<i class="nav-icon fas fa-users"></i>
								<p>User & User Access</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() . 'sj/sj' ?>"
								<?= $this->uri->uri_string() == 'sj/sj' || 
								$this->uri->segment(2) == 'sj_view' || $this->uri->uri_string() == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
								<i class="nav-icon fas fa-mail-bulk"></i>
								<p>Delivery Orders</p>
							</a>
						</li>
						<li <?= $this->uri->segment(2) == 'listing' ||
                  $this->uri->segment(2) == 'list_update' ||
						$this->uri->segment(2) == 'new_list' ||
                  $this->uri->segment(2) == 'listing_item' ||
						$this->uri->segment(2) == 'listing_item_detail' ||
                  $this->uri->segment(2) == 'listing_detail' ||                  
                  $this->uri->segment(2) == 'search' ||                  
                  $this->uri->uri_string() == '' ? 'class="nav-item menu-open"' : 'class="nav-item"' ?>>
							<a href="#" <?= $this->uri->segment(2) == 'listing' ||
                            $this->uri->segment(2) == 'list_update' ||
									 $this->uri->segment(2) == 'new_list' ||
                            $this->uri->segment(2) == 'listing_item' ||
									 $this->uri->segment(2) == 'listing_item_detail' ||
                            $this->uri->segment(2) == 'listing_detail' ||
									 $this->uri->segment(2) == 'search' ||                             
                            $this->uri->uri_string() == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
								<i class="nav-icon fas fa-briefcase"></i>
								<?php $total = $this->db->where('status!=', '3')->get('listing')->num_rows(); ?>
								<?php if ($total != 0) : ?>
								<span class="badge badge-warning right"><?php echo $total; ?></span>
								<?php endif; ?>
								<p>Listing Qoutation
									<i class=" fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?php echo base_url() . 'listing/listing_item' ?>" <?= $this->uri->segment(2) == 'listing_item' ||
										 $this->uri->segment(2) == 'listing_item_detail' ||
                               $this->uri->uri_string() == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
										<i class="fas fa-tools nav-icon"></i>
										<p>Item</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url() . 'listing/listing' ?>" <?= $this->uri->segment(2) == 'listing' ||
									 $this->uri->segment(2) == 'list_update' ||
									 $this->uri->segment(2) == 'new_list' ||
									 $this->uri->segment(2) == 'search' || 
                               $this->uri->uri_string() == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
										<i class="fas fa-drafting-compass nav-icon"></i>
										<?php if ($total != 0) : ?>
										<span class="badge badge-warning right"><?php echo $total; ?></span>
										<?php endif; ?>
										<p>Listing Qoutation</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() . 'dashboard/contact' ?>"
								<?= $this->uri->uri_string() == 'dashboard/contact' || $this->uri->uri_string() == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
								<i class="nav-icon fas fa-rss-square"></i>
								<p>Contact</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="modal" data-target="#logoutModal" class="nav-link">
								<i class="nav-icon fas fa-sign-out-alt"></i>
								<p>Sign out</p>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</aside>
