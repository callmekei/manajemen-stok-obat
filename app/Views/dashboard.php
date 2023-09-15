<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Dashboard Admin</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>assets/themes/Deskapp/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/themes/Deskapp/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/themes/Deskapp/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/Deskapp/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/Deskapp/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/Deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/Deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/Deskapp/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>

	<!-- Navbar -->
	<?php
        echo $this->include('layout/navbar');
    ?>

	<!-- Sidebar -->
    <?php
        echo $this->include('layout/sidebar_menu');
    ?>

    <!-- Main Content-->
	<div class="mobile-menu-overlay"></div>
	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="<?php echo base_url();?>assets/themes/Deskapp/vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							<div class="weight-600 font-30 text-blue">Selamat Datang di Dashboard Admin!</div>
						</h4>
						<p class="font-18 max-width-600"> Selamat datang di Aplikasi manajemen stok obat.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">Data Obat 	</div>
								<div class="weight-600 font-14">-> 0</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">Konsumen</div>
								<div class="weight-600 font-14">-> 0</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">Suplier</div>
								<div class="weight-600 font-14">-> 0</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">Satuan</div>
								<div class="weight-600 font-14">-> 0</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		<!-- Footer -->
		<?php
        echo $this->include('layout/footer');
        ?>

		</div>
	</div>
	<!-- js -->
	<script src="<?php echo base_url();?>assets/themes/Deskapp/vendors/scripts/core.js"></script>
	<script src="<?php echo base_url();?>assets/themes/Deskapp/vendors/scripts/script.min.js"></script>
	<script src="<?php echo base_url();?>assets/themes/Deskapp/vendors/scripts/process.js"></script>
	<script src="<?php echo base_url();?>assets/themes/Deskapp/vendors/scripts/layout-settings.js"></script>
	<script src="<?php echo base_url();?>assets/themes/Deskapp/src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="<?php echo base_url();?>assets/themes/Deskapp/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assets/themes/Deskapp/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url();?>assets/themes/Deskapp/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url();?>assets/themes/Deskapp/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="<?php echo base_url();?>assets/themes/Deskapp/vendors/scripts/dashboard.js"></script>
</body>
</html>