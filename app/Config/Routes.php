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
$routes->get('/', 'Home::index');

//provinsi
$routes->get('/provinsi-data', 'ProvinceController::index');
$routes->post('/p/insert', 'ProvinceController::insert');
$routes->get('/p/delete/(:any)', 'ProvinceController::delete/$1');
$routes->post('/p/update/(:any)', 'ProvinceController::update/$1');

//kabupaten
$routes->get('/kabupaten-data', 'KabupatenController::index');
$routes->post('/kb/insert', 'KabupatenController::insert');
$routes->get('/kb/delete/(:any)', 'KabupatenController::delete/$1');
$routes->post('/kb/update/(:any)', 'KabupatenController::update/$1');

//search prov
$routes->post('/search-prov', 'Home::search_by_province');



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
