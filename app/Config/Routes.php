<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Beranda::index');
$routes->get('/PPDB/santri/formulir/(:segment)', 'PPDB\Santri::formulir/$1');
$routes->get('ppdb/', 'PPDB\Login::index');
$routes->delete('/admin/ppdb/(:num)', 'Admin\PPDB::hapus/$1');
$routes->delete('/admin/penggunaan/(:num)', 'Admin\Penggunaan::hapus/$1');
// berita
$routes->delete('/admin/berita/(:num)', 'admin\Berita::hapus/$1');
$routes->get('/admin/berita/ubah/(:segment)', 'admin\Berita::ubah/$1');
// $routes->get('/admin/berita/(:any)', 'admin\Berita::detail/$1');
// $routes->get('/admin/berita/tambah', 'admin\Berita::tambah');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
