<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//Home Page
$routes->get('/', 'Home::index');
//Registrasi dan Login 
$routes->get('/login', 'Auth::index');
$routes->post('/login_process', 'Auth::login_process');
$routes->get('/register', 'Auth::register');
$routes->post('/insert_data', 'Auth::insert_data');
$routes->post('/register_process', 'Auth::register_process');
$routes->get('/forgot_password', 'Auth::forgot_password');
$routes->get('/logout', 'Auth::logout');
//Dashboard Page
$routes->get('/dashboard', 'Dashboard::index');
//Obat
$routes->get('/data_obat', 'Obat::index');
$routes->get('/insert_obat', 'Obat::insert_data');
$routes->post('/insert_obat_process', 'Obat::insert_process');
$routes->get('/edit_obat/(:any)', 'Obat::edit_data/$1');
$routes->post('/edit_obat_process', 'Obat::edit_process');
$routes->get('/delete_obat/(:any)', 'Obat::delete_data/$1');
//Kategori Obat
$routes->get('/kategori_obat', 'Kategori::index');
$routes->get('/insert_kategori', 'Kategori::insert_data');
$routes->post('/insert_kategori_process', 'Kategori::insert_process');
$routes->get('/edit_kategori/(:any)', 'Kategori::edit_data/$1');
$routes->post('/edit_kategori_process', 'Kategori::edit_process');
$routes->get('/delete_kategori/(:any)', 'Kategori::delete_data/$1');
//Jenis Obat
$routes->get('/jenis_obat', 'Jenis::index');
$routes->get('/insert_jenis', 'Jenis::insert_data');
$routes->post('/insert_jenis_process', 'Jenis::insert_process');
$routes->get('/edit_jenis/(:any)', 'Jenis::edit_data/$1');
$routes->post('/edit_jenis_process', 'Jenis::edit_process');
$routes->get('/delete_jenis/(:any)', 'Jenis::delete_data/$1');
//Satuan Obat
$routes->get('/satuan_obat', 'Satuan::index');
$routes->get('/insert_satuan', 'Satuan::insert_data');
$routes->post('/insert_satuan_process', 'Satuan::insert_process');
$routes->get('/edit_satuan/(:any)', 'Satuan::edit_data/$1');
$routes->post('/edit_satuan_process', 'Satuan::edit_process');
$routes->get('/delete_satuan/(:any)', 'Satuan::delete_data/$1');
//Suplier
$routes->get('/data_suplier', 'Suplier::index');
$routes->get('/insert_suplier', 'Suplier::insert_data');
$routes->post('/insert_suplier_process', 'Suplier::insert_process');
$routes->get('/edit_suplier/(:any)', 'Suplier::edit_data/$1');
$routes->post('/edit_suplier_process', 'Suplier::edit_process');
$routes->get('/delete_suplier/(:any)', 'Suplier::delete_data/$1');
//Konsumen
$routes->get('/data_konsumen', 'Konsumen::index');
$routes->get('/insert_konsumen', 'Konsumen::insert_data');
$routes->post('/insert_konsumen_process', 'Konsumen::insert_process');
$routes->get('/edit_konsumen/(:any)', 'Konsumen::edit_data/$1');
$routes->post('/edit_konsumen_process', 'Konsumen::edit_process');
$routes->get('/delete_konsumen/(:any)', 'Konsumen::delete_data/$1');
//Obat Masuk
$routes->get('/data_obat_masuk', 'ObatMasuk::index');
$routes->get('/insert_obat_masuk', 'ObatMasuk::insert_data');
$routes->post('/insert_obat_masuk_process', 'ObatMasuk::insert_process');
$routes->get('/edit_obat_masuk/(:any)', 'ObatMasuk::edit_data/$1');
$routes->post('/edit_obat_masuk_process', 'ObatMasuk::edit_process');
$routes->get('/delete_obat_masuk/(:any)', 'ObatMasuk::delete_data/$1');
$routes->get('/detail_obat_masuk', 'ObatMasuk::detail_data');
//Obat Keluar
$routes->get('/data_obat_keluar', 'ObatKeluar::index');
$routes->get('/insert_obat_keluar', 'ObatKeluar::insert_data');
$routes->post('/insert_obat_keluar_process', 'ObatKeluar::insert_process');
$routes->get('/edit_obat_keluar/(:any)', 'ObatKeluar::edit_data/$1');
$routes->post('/edit_obat_keluar_process', 'ObatKeluar::edit_process');
$routes->get('/delete_obat_keluar/(:any)', 'ObatKeluar::delete_data/$1');
//Laporan Obat
$routes->get('/laporan_obat', 'LapObat::index');


$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
