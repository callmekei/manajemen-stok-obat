<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Data Konsumen</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>assets/themes/Deskapp/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/themes/Deskapp/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/themes/Deskapp/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/Deskapp/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/Deskapp/vendors/styles/icon-font.min.css">
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
    
    <!--Main Content-->
	<div class="mobile-menu-overlay"></div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Data Konsumen</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Master Data</li>
									<li class="breadcrumb-item active" aria-current="page">Data Konsumen</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

						<!-- Bordered table  start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Tabel Data Konsumen</h4>
                            <a href="<?= base_url('/insert_konsumen') ?>" class="btn btn-primary" role="button">Insert Data +</a>
						</div>	
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama</th>
								<th scope="col">Alamat</th>
								<th scope="col">No Telepon</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							foreach($all_data_konsumen as $konsumen) : ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $konsumen->nama ?></td>
								<td><?= $konsumen->alamat ?></td>
								<td><?= $konsumen->no_telp ?></td>
								<td><a href="<?= base_url('/edit_konsumen'). '/' .$konsumen->id_konsumen ?>" class="btn btn-warning" role="button">Edit</a>
								<a href="#" onclick="showDeleteConfirmation(<?= $konsumen->id_konsumen ?>)" class="btn btn-danger" role="button">Delete</a>
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
	<script src="<?php echo base_url();?>assets/themes/Deskapp/vendors/scripts/core.js"></script>
	<script src="<?php echo base_url();?>assets/themes/Deskapp/vendors/scripts/script.min.js"></script>
	<script src="<?php echo base_url();?>assets/themes/Deskapp/vendors/scripts/process.js"></script>
	<script src="<?php echo base_url();?>assets/themes/Deskapp/vendors/scripts/layout-settings.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
	<script>
		function showDeleteConfirmation(id_konsumen) {
			Swal.fire({
				title: 'Apakah Anda yakin?',
				text: 'Data konsumen obat ini akan dihapus permanen!',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, Hapus!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					// Panggil fungsi untuk menghapus data jeis dari database
					deleteKonsumen(id_konsumen);
				}
			});
		}
		function deleteKonsumen(id_konsumen) {
			$.ajax({
				url: `<?= base_url('/delete_konsumen/') ?>${id_konsumen}`,
				method: 'GET',
				success: function(response) {
					Swal.fire(
						'Terhapus!',
						'Data konsumen telah dihapus.',
						'success'
					).then(() => {
						// Redirect atau lakukan sesuatu setelah data dihapus
						window.location.href = `<?= base_url('/data_konsumen') ?>`;
					});
				},
				error: function() {
					Swal.fire(
						'Gagal!',
						'Terjadi kesalahan saat menghapus data konsumen.',
						'error'
					);
				}
			});
		}
	</script>
</body>
</html>