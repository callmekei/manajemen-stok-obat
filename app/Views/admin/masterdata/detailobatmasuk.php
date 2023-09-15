<?php
// Ubah format tanggal menjadi d-m-Y
$formatted_tanggal = date('d-m-Y', strtotime($tanggal));
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/Deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/Deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
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

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Detail Obat Masuk</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Transaksi</li>
									<li class="breadcrumb-item active" aria-current="page">Obat Masuk</li>
									<li class="breadcrumb-item active" aria-current="page">Detail Obat Masuk</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
							</div>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="pd-20 card-box mb-30">
					<div class="pb-20">
						<div class="row">
							<div class="col-md-12">
								<a href="<?= base_url('/data_obat_masuk'); ?>" class="btn btn-danger ml-1 mt-1 mb-4"> < Kembali</a>
										<table class="table table-striped">
											<tr>
												<th style="width: 160px;">No Faktur</th>
												<th style="width: 50px;">:</th>
												<th><?= $no_faktur ?></th>
											</tr>
											<tr>
												<th>Tanggal Masuk</th>
												<th>:</th>
												<th><?= $formatted_tanggal ?></th>
											</tr>
											<tr>
												<th>Suplier</th>
												<th>:</th>
												<th><?= $nama_suplier ?></th>
											</tr>
										</table>
										<table class="table table-bordered">
											<thead>
												<tr>
													<th scope="col">No</th>
													<th scope="col">Nama Obat</th>
													<th scope="col">Harga</th>
													<th scope="col">Jumlah</th>
													<th scope="col">Kadaluarsa</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($detail_obat_masuk as $index => $obat) : ?>
													<tr>
														<td><?= $index + 1 ?></td>
														<td><?= $obat->id_obat ?></td>
														<td><?= $obat->harga ?></td>
														<td><?= $obat->jumlah ?></td>
														<td><?= $obat->kadaluarsa ?></td>
													</tr>
												<?php endforeach ?>
											</tbody>

										</table>
							</div>
						</div>


					</div>
				</div>
				<!-- Simple Datatable End -->
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/scripts/core.js"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/scripts/script.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/scripts/process.js"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/scripts/layout-settings.js"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/scripts/datatable-setting.js"></script>
</body>

</html>