<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Laporan Data Obat</title>

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
            <div class="min-height-250px">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                        </div>
                    </div>
                </div>

                <!-- Bordered table  start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="title">
                            <h4>Laporan Data Obat</h4>
                        </div>
                        <div class="pull-right">
                        <button onclick="printTabel()" class="btn btn-warning"><i class="fa fa-print"></i> Print</button>
</div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Master Data</li>
                                <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                                <li class="breadcrumb-item active" aria-current="page">Laporan Data Obat</li>
                            </ol>
                        </nav>
                        <table id="tabel-data" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Kadaluarsa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($all_data_obat as $obat) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $obat->nama ?></td>
                                    <td><?= $obat->kategori ?></td>
                                    <td><?= $obat->jenis ?></td>
                                    <td><?= $obat->satuan ?></td>
                                    <td><?= $obat->jumlah ?></td>
                                    <td><?= $obat->harga ?></td>
                                    <td><?= $obat->kadaluarsa ?></td>
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
    function printTabel() {
        // Simpan tampilan halaman sekarang
        var originalContents = document.body.innerHTML;

        // Buat judul laporan
        var judulLaporan = "<div><h4>Laporan Data Obat</h4></div>";

        // Ambil isi tabel
        var tabelData = document.getElementById("tabel-data").outerHTML;

        // Gabungkan judul laporan dengan tabel data
        var cetakContents = judulLaporan + tabelData;

        // Ubah tampilan halaman hanya menjadi judul laporan dan tabel data
        document.body.innerHTML = cetakContents;

        // Cetak halaman
        window.print();

        // Kembalikan tampilan halaman seperti semula
        document.body.innerHTML = originalContents;
    }
</script>
</body>

</html>