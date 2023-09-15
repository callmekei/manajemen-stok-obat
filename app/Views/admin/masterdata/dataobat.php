<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Data Obat</title>

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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/Deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/Deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/styles/style.css">

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

		
	<div class="mobile-menu-overlay"></div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Data Obat</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Master Data</a></li>
									<li class="breadcrumb-item active" aria-current="page">Data Obat</li>
									<li class="breadcrumb-item active" aria-current="page">Tabel Data Obat</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Tabel Data Obat</h4>
						<a href="<?= base_url('/insert_obat') ?>" class="btn btn-primary" role="button">Insert Data +</a>
					</div>
					<div class="pb-20">
						<table class="data-table table hover multiple-select-row nowrap">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama</th>
								<th scope="col">Suplier</th>
								<th scope="col">Kategori</th>
								<th scope="col">Jenis</th>
								<th scope="col">Satuan</th>
								<th scope="col">Stok</th>
								<th scope="col">Harga</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($all_data_obat as $obat) : ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $obat->nama ?></td>
									<td><?= $obat->suplier ?></td>
									<td><?= $obat->kategori ?></td>
									<td><?= $obat->jenis ?></td>
									<td><?= $obat->satuan ?></td>
									<td><?= $obat->stok ?></td>
									<td><?= $obat->harga ?></td>
									<td><a href="<?= base_url('/edit_obat') . '/' . $obat->id_obat ?>" class="btn btn-warning" role="button"><i class="dw dw-edit2"></i></a>
										<a href="#" onclick="showDeleteConfirmation(<?= $obat->id_obat ?>)" class="btn btn-danger" role="button"><i class="dw dw-delete-3"></i></a>
								</tr>
							<?php endforeach ?>
						</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
				
			</div>
			<?php
			echo $this->include('layout/footer');
			?>
		</div>
	</div>
	<!-- js -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
	<script src="<?php echo base_url(); ?>assets/themes/Deskapp/vendors/scripts/datatable-setting.js"></script></body>
	<script>
		function showDeleteConfirmation(id_obat) {
			Swal.fire({
				title: 'Apakah Anda yakin?',
				text: 'Data obat ini akan dihapus permanen!',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, Hapus!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					// Panggil fungsi untuk menghapus data obat dari database
					deleteObat(id_obat);
				}
			});
		}
		function deleteObat(id_obat) {
			$.ajax({
				url: `<?= base_url('/delete_obat/') ?>${id_obat}`,
				method: 'GET',
				success: function(response) {
					Swal.fire(
						'Terhapus!',
						'Data obat telah dihapus.',
						'success'
					).then(() => {
						// Redirect atau lakukan sesuatu setelah data dihapus
						window.location.href = `<?= base_url('/data_obat') ?>`;
					});
				},
				error: function() {
					Swal.fire(
						'Gagal!',
						'Terjadi kesalahan saat menghapus data obat.',
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

</html>