<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Data Obat Masuk</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/styles/icon-font.min.css">
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

	<!--Main Content-->
	<div class="mobile-menu-overlay"></div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Data Obat Masuk</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Transaksi</li>
									<li class="breadcrumb-item active" aria-current="page">Data Obat Masuk</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<!-- Bordered table  start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Tabel Data Obat Masuk</h4>
							<a href="<?= base_url('/insert_obat_masuk') ?>" class="btn btn-primary" role="button">Insert Data +</a>
						</div>
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">No Faktur</th>
								<th scope="col"> Suplier</th>
								<th scope="col">Tanggal Masuk</th>
								<th scope="col">Total Belanja</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($all_data_obatmasuk as $obatmasuk) : ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $obatmasuk->no_faktur ?></td>
									<td><?= $obatmasuk->nama_suplier ?></td>
									<td><?= date('d-m-Y', strtotime($obatmasuk->tanggal)) ?></td>
									<td></td>
									<td>
										<a href="<?= base_url('/detail_obat_masuk') ?>?no_faktur=<?= $obatmasuk->no_faktur ?>&nama_suplier=<?= $obatmasuk->nama_suplier ?>&tanggal=<?= $obatmasuk->tanggal ?>" class="btn btn-primary" role="button"><i class="icon-copy dw dw-file-210"></i></a>
										<a href="#" onclick="showDeleteConfirmation(<?= $obatmasuk->id_obatmasuk ?>)" class="btn btn-danger" role="button"><i class="icon-copy dw dw-delete-3"></i></a>
										<a href="#" onclick="showDeleteConfirmation(<?= $obatmasuk->id_obatmasuk ?>)" class="btn btn-success" role="button"><i class="icon-copy dw dw-diskette2"></i></a>
							        </td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<!-- Bordered table End -->
			</div>
			<!-- Footer -->
			<?php
			echo $this->include('layout/footer');
			?>
		</div>
	</div>
	<!-- js -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/scripts/core.js"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/scripts/script.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/scripts/process.js"></script>
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/scripts/layout-settings.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		function showDeleteConfirmation(id_obatmasuk) {
			Swal.fire({
				title: 'Apakah Anda yakin?',
				text: 'Data obat masuk ini akan dihapus permanen!',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, Hapus!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					// Panggil fungsi untuk menghapus data obat  masuk dari database
					deleteObatMasuk(id_obatmasuk);
				}
			});
		}

		function deleteObatMasuk(id_obatmasuk) {
			$.ajax({
				url: `<?= base_url('/delete_obat_masuk/') ?>${id_obatmasuk}`,
				method: 'GET',
				success: function(response) {
					Swal.fire(
						'Terhapus!',
						'Data obat masuk telah dihapus.',
						'success'
					).then(() => {
						// Redirect atau lakukan sesuatu setelah data dihapus
						window.location.href = `<?= base_url('/data_obat_masuk') ?>`;
					});
				},
				error: function() {
					Swal.fire(
						'Gagal!',
						'Terjadi kesalahan saat menghapus data obat masuk.',
						'error'
					);
				}
			});
		}
	</script>
	<script>
		// Mengecek apakah ada pesan success dari redirect
		const successMessage = '<?= session('success') ?>';
		if (successMessage) {
			Swal.fire({
				icon: 'success',
				title: 'Berhasil!',
				text: successMessage,
				timer: 3000, // Menampilkan alert selama 3 detik
				timerProgressBar: true,
				showConfirmButton: false
			});
		}
	</script>
</body>

</html>