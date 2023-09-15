<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Insert Data Obat</title>

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

	<!-- Main Content -->
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Form Input Data Obat</h4>
						</div>
					</div>
					<form action="<?= base_url('/insert_obat_process') ?>" method="POST">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label for="nama">Nama Obat</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control <?php if (session('errors.nama')) echo 'is-invalid'; ?>" id="nama" name="nama" type="text" value="<?= old('nama'); ?>">
										<?php if (session('errors.nama')) : ?>
											<div class="invalid-feedback"><?= session('errors.nama') ?></div>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									<label for="suplier">Suplier</label>
									<div class="col-sm-12 col-md-10">
										<select class="custom-select2 form-control <?php if (session('errors.kategori')) echo 'is-invalid'; ?>" name="suplier" id="suplier" style="width: 100%; height: 38px;">
											<option value="">Pilih Suplier</option>
											<?php foreach ($nama_suplier as $suplier) : ?>
												<?php
												$selected = ($suplier->nama == old('suplier')) ? 'selected' : '';
												?>
												<option value="<?= $suplier->nama ?>" <?= $selected ?>><?= $suplier->nama ?></option>
											<?php endforeach; ?>
										</select>
										<?php if (session('errors.suplier')) : ?>
											<div class="invalid-feedback"><?= session('errors.suplier') ?></div>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label for="kategori">Kategori</label>
									<div class="col-sm-12 col-md-10">
										<select class="custom-select2 form-control <?php if (session('errors.kategori')) echo 'is-invalid'; ?>" name="kategori" id="kategori" style="width: 100%; height: 38px;">
											<option value="">Pilih Kategori Obat</option>
											<?php foreach ($kategori_obat as $kategori) : ?>
												<?php
												$selected = ($kategori->kategori == old('kategori')) ? 'selected' : '';
												?>
												<option value="<?= $kategori->kategori ?>" <?= $selected ?>><?= $kategori->kategori ?></option>
											<?php endforeach; ?>
										</select>
										<?php if (session('errors.kategori')) : ?>
											<div class="invalid-feedback"><?= session('errors.kategori') ?></div>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									<label for="nama">Stok</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control <?php if (session('errors.stok')) echo 'is-invalid'; ?>" id="stok" name="stok" type="number" value="<?= old('stok'); ?>">
										<?php if (session('errors.stok')) : ?>
											<div class="invalid-feedback"><?= session('errors.stok') ?></div>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									<label for="jenis">Jenis</label>
									<div class="col-sm-12 col-md-10">
										<select class="custom-select2 form-control <?php if (session('errors.jenis')) echo 'is-invalid'; ?>" name="jenis" id="jenis" style="width: 100%; height: 38px;">
											<option value="">Pilih Jenis Obat</option>
											<?php foreach ($jenis_obat as $jenis) : ?>
												<?php
												$selected = ($jenis->jenis == old('jenis')) ? 'selected' : '';
												?>
												<option value="<?= $jenis->jenis ?>" <?= $selected ?>><?= $jenis->jenis ?></option>
											<?php endforeach; ?>
										</select>
										<?php if (session('errors.jenis')) : ?>
											<div class="invalid-feedback"><?= session('errors.jenis') ?></div>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									<label for="nama">Harga</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control <?php if (session('errors.harga')) echo 'is-invalid'; ?>" id="harga" name="harga" type="number" value="<?= old('harga'); ?>">
										<?php if (session('errors.harga')) : ?>
											<div class="invalid-feedback"><?= session('errors.harga') ?></div>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									<label for="satuan">Satuan</label>
									<div class="col-sm-12 col-md-10">
										<select class="custom-select2 form-control <?php if (session('errors.satuan')) echo 'is-invalid'; ?>" name="satuan" id="satuan" style="width: 100%; height: 38px;">
											<option value="">Pilih Satuan Obat</option>
											<?php foreach ($satuan_obat as $satuan) : ?>
												<?php
												$selected = ($satuan->satuan == old('satuan')) ? 'selected' : '';
												?>
												<option value="<?= $satuan->satuan ?>" <?= $selected ?>><?= $satuan->satuan ?></option>
											<?php endforeach; ?>
										</select>
										<?php if (session('errors.satuan')) : ?>
											<div class="invalid-feedback"><?= session('errors.satuan') ?></div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<a href="<?= base_url('/data_obat'); ?>" class="btn btn-danger ml-3">Cancel</a>
							<button type="submit" class="btn btn-primary ml-1">Input Data</button>
						</div>
					</form>

				</div>
			</div>
			<!-- Default Basic Forms End -->


		</div>
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
	<script>
		document.getElementById("harga").addEventListener("input", function() {
			var hargaInput = this.value.replace(/\./g, ''); // Hapus tanda titik dari input
			var formattedHarga = formatNumberWithCommas(hargaInput);
			this.value = formattedHarga;
		});

		function formatNumberWithCommas(number) {
			return parseFloat(number).toLocaleString('id-ID');
		}
	</script>
	<script>
		document.getElementById("stok").addEventListener("input", function() {
			var stokInput = this.value.replace(/\./g, ''); // Hapus tanda titik dari input
			var formattedStok = formatNumberWithCommas(stokInput);
			this.value = formattedStok;
		});

		function formatNumberWithCommas(number) {
			return parseFloat(number).toLocaleString('id-ID');
		}
	</script>


</body>

</html>