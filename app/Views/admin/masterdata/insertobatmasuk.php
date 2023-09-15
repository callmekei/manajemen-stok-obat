<?php
$all_data_obatmasuk = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$no_faktur = $_POST['no_faktur'];
	$nama_suplier = $_POST['nama_suplier'];
	$tanggal = $_POST['tanggal'];
	$nama_obat = $_POST['id_obat'];
	$harga = $_POST['harga'];
	$jumlah = $_POST['jumlah'];
	$kadaluarsa = $_POST['kadaluarsa'];

	$all_data_obatmasuk[] = [
		'no_faktur' => $no_faktur,
		'nama_suplier' => $nama_suplier,
		'tanggal' => $tanggal,
		'nama_obat' => $nama_obat,
		'harga' => $harga,
		'jumlah' => $jumlah,
		'kadaluarsa' => $kadaluarsa,
	];
}
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Insert Data Obat Masuk</title>

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
								<h4>Form Insert Obat Masuk</h4>
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
						</div>
					</div>
					<form action="<?= base_url('/insert_obat_masuk_process') ?>" method="POST">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="no_faktur">No Faktur</label>
										<input class="form-control" id="no_faktur" name="no_faktur" type="text" value="<?= $no_faktur ?>" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="tanggal">Tanggal</label>
										<input class="form-control" id="tanggal" name="tanggal" type="date">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="id_suplier">ID Suplier</label>
										<select class="custom-select2 form-control" id="id_suplier" name="id_suplier">
											<option value="">-- Pilih ID Suplier --</option>
											<?php foreach ($supliers as $suplier) : ?>
												<option value="<?= $suplier->id_suplier ?>"><?= $suplier->id_suplier . ' / ' . $suplier->nama ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>



								<div class="col-md-6">
									<div class="form-group">
										<label for="tanggal">No Telepon</label>
										<input class="form-control" id="no_telp" name="no_telp" type="text" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="nama_suplier">Nama Suplier</label>
										<input class="form-control" id="nama_suplier" name="nama_suplier" type="text" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="alamat">Alamat </label>
										<input class="form-control" id="alamat" name="alamat" type="text" readonly>
									</div>
								</div>

								<div class="garis"></div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="id_obat">Pilih Obat</label>
										<select class="custom-select2 form-control" id="id_obat" name="id_obat" style="width: 100%; height: 38px;">
											<option value="">-- Pilih Obat --</option>
											<?php foreach ($obats as $obat) : ?>
												<option value="<?= $obat->nama ?>"><?= $obat->nama ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="col-md-2">
									<div class="form-group">
										<label for="harga">Harga </label>
										<input class="form-control" id="harga" name="harga" type="number">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="jumlah">Jumlah </label>
										<input class="form-control" id="jumlah" name="jumlah" type="number">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="kadaluarsa">Kadaluarsa </label>
										<input class="form-control" id="kadaluarsa" name="kadaluarsa" type="date">
									</div>
								</div>
								<div class="col-md-1">
									<div class="form-group">
										<label>&nbsp;</label>
										<button type="submit" class="btn btn-primary">+</button>
									</div>
								</div>
								<div class="garis"></div>
								<div class="pd-15 mt-20 mb-30">
									<table class="table table-bordered" id="tabelObat">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Obat</th>
												<th>Harga</th>
												<th>Jumlah</th>
												<th>Kadaluarsa</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<!-- Looping untuk mengisi data obat yang telah diinputkan -->
											<?php foreach ($all_data_obatmasuk as $obatmasuk => $obatmasuk) : ?>
												<tr>
													<td><?= $index + 1 ?></td>
													<td><?= $obatmasuk->id_obat ?></td>
													<td><?= $obatmasuk->harga ?></td>
													<td><?= $obatmasuk->jumlah ?></td>
													<td><?= date('d-m-Y', strtotime($obatmasuk->kadaluarsa)) ?></td>
													<td><button class="btn btn-danger btn-sm" onclick="hapusData(this)">Hapus</button></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
									<div class="mb-3">
										<a href="<?= base_url('/data_obat_masuk'); ?>" class="btn btn-danger ml-1">Cancel</a>
										<button id="submitData" class="btn btn-primary">Input Data</button>
									</div>
								</div>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
	<script>
		$(document).ready(function() {
			// Inisialisasi elemen select2
			$('#id_suplier').select2();
		});
	</script>

	<script>
		$(document).ready(function() {
			$('#id_suplier').on('change', function() {
				var selectedId = $(this).val(); // Mendapatkan nilai yang dipilih

				// Temukan data suplier berdasarkan selectedId
				var selectedSuplier = supliers.find(function(suplier) {
					return suplier.id_suplier == selectedId;
				});

				if (selectedSuplier) {
					// Perbarui nilai pada elemen "Nama Suplier," "Alamat," dan "No Telepon"
					$('#nama_suplier').val(selectedSuplier['nama']);
					$('#alamat').val(selectedSuplier['alamat']);
					$('#no_telp').val(selectedSuplier['no_telp']);
				} else {
					// Kosongkan nilai jika tidak ada yang dipilih
					$('#nama_suplier').val('');
					$('#alamat').val('');
					$('#no_telp').val('');
				}
			});
		});
	</script>
	<script>
		var supliers = <?= json_encode($supliers) ?>;

		document.getElementById("id_suplier").addEventListener("change", function() {
			var selectedId = this.value;

			var selectedSuplier = supliers.find(function(suplier) {
				return suplier.id_suplier == selectedId;
			});

			if (selectedSuplier) {
				document.getElementById("nama_suplier").value = selectedSuplier['nama'];
				document.getElementById("alamat").value = selectedSuplier['alamat'];
				document.getElementById("no_telp").value = selectedSuplier['no_telp'];
			} else {
				document.getElementById("nama_suplier").value = "";
				document.getElementById("alamat").value = "";
				document.getElementById("no_telp").value = "";
			}
		});
	</script>


	<script>
		document.getElementById("jumlah").addEventListener("input", function() {
			var jumlah = parseFloat(this.value);
			var harga = parseFloat(document.getElementById("harga").value);

			if (!isNaN(jumlah) && !isNaN(harga)) {
				var subTotal = jumlah * harga;
				document.getElementById("sub_total").value = subTotal.toFixed(3);
			} else {
				document.getElementById("sub_total").value = "";
			}
		});
	</script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var today = new Date();
			var year = today.getFullYear();
			var month = String(today.getMonth() + 1).padStart(2, '0');
			var day = String(today.getDate()).padStart(2, '0');

			var formattedDate = year + '-' + month + '-' + day;
			document.getElementById("tanggal").value = formattedDate;
		});
	</script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var dataObatMasuk = []; // Inisialisasi array untuk menyimpan data obat masuk

			// Fungsi untuk menampilkan data obat dalam tabel
			function renderTable() {
				var tbody = document.querySelector("#tabelObat tbody");
				tbody.innerHTML = ""; // Hapus konten tbody

				dataObatMasuk.forEach(function(obat, index) {
					var row = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${obat.nama_obat}</td>
                    <td>${obat.harga}</td>
                    <td>${obat.jumlah}</td>
                    <td>${obat.kadaluarsa}</td>
                    <td>
                        <a href="#" onclick="hapusBaris(this)" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            `;
					tbody.insertAdjacentHTML("beforeend", row);
				});
			}

			// Fungsi untuk menghapus baris
			function hapusBaris(button) {
				var row = button.parentNode.parentNode; // Mendapatkan baris yang berisi tombol
				var rowIndex = row.rowIndex - 1; // Mendapatkan indeks baris
				dataObatMasuk.splice(rowIndex, 1); // Hapus data dari array
				renderTable(); // Render ulang tabel setelah menghapus data
			}

			// Tangani penekanan tombol +
			var addButton = document.querySelector(".btn-primary");
			addButton.addEventListener("click", function(event) {
				event.preventDefault(); // Mencegah form submit

				// Ambil nilai input dari formulir
				var namaObat = document.querySelector("#id_obat").value;
				var harga = document.querySelector("#harga").value;
				var jumlah = document.querySelector("#jumlah").value;
				var kadaluarsa = document.querySelector("#kadaluarsa").value;

				// Validasi input
				if (namaObat && harga && jumlah && kadaluarsa) {
					// Tambahkan data obat ke dalam array
					dataObatMasuk.push({
						nama_obat: namaObat,
						harga: harga,
						jumlah: jumlah,
						kadaluarsa: kadaluarsa
					});

					// Tampilkan data obat dalam tabel
					renderTable();

					// Reset nilai input
					document.querySelector("#id_obat").value = "";
					document.querySelector("#harga").value = "";
					document.querySelector("#jumlah").value = "";
					document.querySelector("#kadaluarsa").value = "";
				} else {
					alert("Mohon isi semua field data obat terlebih dahulu.");
				}
			});
		});

		$(document).on('click', '.btn-danger', function() {
			$(this).parents('tr').remove();
		});
	</script>

	<script>
		function formatNumberWithCommas(number) {
			// Handle kasus input kosong atau NaN
			if (isNaN(number)) {
				return "";
			}
			return parseFloat(number).toLocaleString('id-ID');
		}

		document.getElementById("harga").addEventListener("input", function() {
			var hargaInput = this.value.replace(/\./g, ''); // Hapus tanda titik dari input
			var formattedHarga = formatNumberWithCommas(hargaInput);
			this.value = formattedHarga;
		});

		// Contoh penggunaan di dalam tabel
		var harga = 1000000; // Harga dalam format tanpa tanda titik
		var formattedHarga = formatNumberWithCommas(harga);
		document.getElementById("outputHarga").textContent = formattedHarga; // Ganti "outputHarga" dengan id yang sesuai di tabel Anda
	</script>



</body>

</html>