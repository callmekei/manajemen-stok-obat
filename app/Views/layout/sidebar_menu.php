<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<img src="<?php echo base_url();?>assets/themes/Deskapp/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="<?php echo base_url();?>assets/themes/Deskapp/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
					    <a href="/dashboard" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle <?php echo (isset($menu) && ($menu == "master")? "show" : "");?>">
							<span class="micon dw dw-edit2"></span><span class="mtext">Master Data</span>
						</a>
						<ul class="submenu">
							<li><a class="<?php echo (isset($menu) && ($submenu == "data_obat")? "menu-open" : "");?>" href="/data_obat">Data Obat</a></li>
							<li><a href="/kategori_obat">Data Kategori Obat</a></li>
							<li><a href="/jenis_obat">Data Jenis Obat</a></li>
							<li><a href="/satuan_obat">Data Satuan Obat</a></li>
							<li><a href="/data_suplier">Data Suplier</a></li>
							<li><a href="/data_konsumen">Data Konsumen</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Transaksi</span>
						</a>
						<ul class="submenu">
						    <li><a href="/data_obat_masuk"> Obat Masuk</a></li>
							<li><a href="/data_obat_keluar"> Obat Keluar</a></li>
							<li><a href="basic-table.html"> Obat Retur</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-apartment"></span><span class="mtext"> Laporan </span>
						</a>
						<ul class="submenu">
						    <li><a href="/laporan_obat">Laporan Data Obat </a></li>
							<li><a href="ui-cards.html">Laporan Data Obat Masuk</a></li>
							<li><a href="ui-buttons.html">Laporan Data Obat Keluar</a></li>
							<li><a href="ui-cards.html">Laporan Data Obat Retur</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>