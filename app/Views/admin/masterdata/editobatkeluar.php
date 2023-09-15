<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Edit Data Obat Keluar</title>

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
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Form Basic</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Form Edit Data Obat Keluar</h4>
						</div>
					</div>
					<form action="<?= base_url('/edit_obat_keluar_process') ?>" method="POST">
						<input type="hidden" class="form-control" id="id_obatkeluar" name="id_obatkeluar" value="<?= $data_obatkeluar->id_obatkeluar ?>">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">No Faktur</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" id="no_faktur" name="no_faktur" type="text" value="<?= $data_obatkeluar->no_faktur ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
							<div class="col-sm-12 col-md-10">
							    <input class="form-control" id="tanggal" name="tanggal" type="date" value="<?= $data_obatkeluar->tanggal ?>"> 
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">ID Konsumen</label>
							<div class="col-sm-12 col-md-10">
								<select class="form-control" id="id_konsumen" name="id_konsumen">
									<?php foreach ($konsumens as $konsumen) : ?>
										<option value="<?= $konsumen->id_konsumen ?>" class="konsumen-option" title="<?= $konsumen->nama ?>" <?= $data_obatkeluar->id_konsumen == $konsumen->id_konsumen ? 'selected' : '' ?>>
											<span><?= $konsumen->id_konsumen ?> / <?= $konsumen->nama ?></span>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nama Konsumen</label>
							<div class="col-sm-12 col-md-10">
							    <input class="form-control" id="nama_konsumen" name="nama_konsumen" type="type" value="<?= $data_obatkeluar->nama_konsumen ?>" readonly> 
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">No Telepon</label>
							<div class="col-sm-12 col-md-10">
							    <input class="form-control" id="no_telp" name="no_telp" type="number" value="<?= $data_obatkeluar->no_telp ?>" readonly> 
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
							<div class="col-sm-12 col-md-10">
							    <input class="form-control" id="alamat" name="alamat" type="text" value="<?= $data_obatkeluar->alamat ?>" readonly> 
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Pilih Obat</label>
							<div class="col-sm-12 col-md-10">
								<select class="form-control" id="id_obat" name="id_obat">
									<?php foreach ($obats as $obat) : ?>
										<option value="<?= $obat->nama ?>" class="obat-option" title="<?= $obat->nama ?>" <?= $data_obatkeluar->id_obat == $obat->nama ? 'selected' : '' ?>>
											<span><?= $obat->nama ?></span>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Harga</label>
							<div class="col-sm-12 col-md-10">
							    <input class="form-control" id="harga" name="harga" type="text" value="<?= $data_obatkeluar->harga ?>" readonly> 
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Jumlah</label>
							<div class="col-sm-12 col-md-10">
							    <input class="form-control" id="jumlah" name="jumlah" type="number" value="<?= $data_obatkeluar->jumlah ?>"> 
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Sub Total</label>
							<div class="col-sm-12 col-md-10">
							    <input class="form-control" id="sub_total" name="sub_total" type="text" value="<?= $data_obatkeluar->sub_total ?>"> 
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Kadaluarsa</label>
							<div class="col-sm-12 col-md-10">
							    <input class="form-control" id="kadaluarsa" name="kadalursa" type="date" value="<?= $data_obatkeluar->kadaluarsa ?>" readonly> 
							</div>
						</div>
						
						<div class="mb-3">
							<button type="submit" class="btn btn-primary">Edit Data</button>
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
		var konsumens = <?= json_encode($konsumens) ?>;

		document.getElementById("id_konsumen").addEventListener("change", function() {
			var selectedId = this.value;

			var selectedKonsumen = konsumens.find(function(konsumen) {
				return konsumen.id_konsumen == selectedId;
			});

			if (selectedKonsumen) {
				document.getElementById("nama_konsumen").value = selectedKonsumen['nama'];
				document.getElementById("alamat").value = selectedKonsumen['alamat'];
				document.getElementById("no_telp").value = selectedKonsumen['no_telp'];
			} else {
				document.getElementById("nama_konsumen").value = "";
				document.getElementById("alamat").value = "";
				document.getElementById("no_telp").value = "";
			}
		});
	</script>
	<script>
		var konsumens = <?= json_encode($konsumens) ?>;

		// Fungsi untuk mengisi data konsumen saat halaman dimuat
		function populateKonsumenData(selectedId) {
			var selectedKonsumen = konsumens.find(function(konsumen) {
				return konsumen.id_konsumen == selectedId;
			});

			if (selectedKonsumen) {
				document.getElementById("nama_konsumen").value = selectedKonsumen['nama'];
				document.getElementById("alamat").value = selectedKonsumen['alamat'];
				document.getElementById("no_telp").value = selectedKonsumen['no_telp'];
			} else {
				document.getElementById("nama_konsumen").value = "";
				document.getElementById("alamat").value = "";
				document.getElementById("no_telp").value = "";
			}
		}

		document.getElementById("id_konsumen").addEventListener("change", function() {
			var selectedId = this.value;
			populateKonsumenData(selectedId);
		});

		// Panggil fungsi saat halaman dimuat
		var selectedId = document.getElementById("id_konsumen").value;
		populateKonsumenData(selectedId);
	</script>
	<script>
    var obats = <?= json_encode($obats) ?>;

    document.getElementById("id_obat").addEventListener("change", function() {
        var selectedObat = obats.find(function(obat) {
            return obat.nama == this.value;
        }, this);

        if (selectedObat) {
            document.getElementById("harga").value = selectedObat['harga'];
            document.getElementById("kadaluarsa").value = selectedObat['kadaluarsa'];
        } else {
            document.getElementById("harga").value = "";
            document.getElementById("kadaluarsa").value = "";
        }
    });
</script>
</body>
</html>