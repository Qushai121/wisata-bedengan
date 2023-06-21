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

// RENDER ROUTES

$routes->get('/',static function(){
    return redirect()->to(site_url('home'));
});

// CONTROLLER STATIC PAGES RENDER
$routes->get('home', 'Pages\StaticPages::homeRender');
$routes->get('info-lokasi', 'Pages\StaticPages::infoLokasiRender');
// CONTROLLER STATIC PAGES

// CONTROLLER JENIS WISATA RENDER
$routes->get('jenis-wisata', 'Pages\JenisWisata::jenisWisataRender');
$routes->get('jenis-wisata/detail/(:num)', 'Pages\JenisWisata::jenisWisataDetailRender/$1');
$routes->get('fasilitas-penyewaaan', 'Pages\Penyewaan::penyewaanRender');
$routes->get('fasilitas-umum', 'Pages\FasilitasUmum::fasilitasumumRender');
// CONTROLLER JENIS WISATA RENDER

// ADMIN PRIVATE RENDER
$routes->group('admin',static function($routes){
    $routes->get('dashboard','admin\Dashboard::dashboardMenuRender');
    $routes->get('jenis-wisata','admin\JenisWisata::jenisWisataRender');
    $routes->get('tiket','admin\Tiket::tiketRender');
    $routes->get('tiket/(:num)/(:alpha)','admin\TiketJenisWisataBridge::index/$1/$2');
    $routes->get('wisata-section','admin\WisataSection::wisataSectionRender');
    $routes->get('fasilitas-umum','admin\FasilitasUmum::FasilitasUmumRender');
    $routes->get('fasilitas-penyewaan','admin\Penyewaan::PenyewaanRender');
    $routes->get('status','admin\Status::statusRender');
});
// ADMIN PRIVATE RENDER

// RENDER ROUTES


// ADMIN PRIVATE API
$routes->group('api/admin',static function($routes){
    
    // JENIS WISATA API
    $routes->put('jenis-wisata/(:num)','admin\JenisWisata::editJenisWisata/$1');
    $routes->delete('jenis-wisata/delete/(:num)','admin\JenisWisata::deleteJenisWisata/$1');
    $routes->post('jenis-wisata/add','admin\JenisWisata::addJenisWisata');
    // JENIS WISATA API
    
    // JENIS WISATA API
    $routes->put('wisatasection/(:num)','admin\WisataSection::editWisataSection/$1');
    $routes->delete('wisatasection/delete/(:num)','admin\WisataSection::deleteWisataSection/$1');
    $routes->post('wisatasection/add','admin\WisataSection::addWisataSection');
    // JENIS WISATA API

    // TIKET API 
    $routes->put('tiket/(:num)','admin\Tiket::editTiket/$1');
    $routes->delete('tiket/delete/(:num)','admin\Tiket::deleteTiket/$1');
    $routes->post('tiket/add','admin\Tiket::addTiket');
    // TIKET API 

    // STATUS 
    $routes->put('status/(:num)','admin\Status::editStatus/$1');
    $routes->delete('status/delete/(:num)','admin\Status::deleteStatus/$1');
    $routes->post('status/add','admin\Status::addStatus');
    // STATUS 

    // FASILITAS UMUM 
    $routes->put('fasilitasumum/(:num)','admin\FasilitasUmum::editFasilitasUmum/$1');
    $routes->delete('fasilitasumum/delete/(:num)','admin\FasilitasUmum::deleteFasilitasUmum/$1');
    $routes->post('fasilitasumum/add','admin\FasilitasUmum::addFasilitasUmum');
    // FASILITAS UMUM 

    // PENYEWAAN 
    $routes->put('penyewaan/(:num)','admin\Penyewaan::editPenyewaan/$1');
    $routes->delete('penyewaan/delete/(:num)','admin\Penyewaan::deletePenyewaan/$1');
    $routes->post('penyewaan/add','admin\Penyewaan::addPenyewaan');
    // PENYEWAAN 
    
    // penyewaantiketbridge 
    $routes->put('jeniswisatatiketbridge/(:num)','admin\TiketJenisWisataBridge::editTiketJenisWisataBridge/$1');
    $routes->delete('jeniswisatatiketbridge/delete/(:num)','admin\TiketJenisWisataBridge::deleteTiketJenisWisataBridge/$1');
    $routes->post('jeniswisatatiketbridge/add','admin\TiketJenisWisataBridge::addTiketJenisWisataBridge');
    // penyewaantiketbridge 
});
// ADMIN PRIVATE API




// AUTH PROCESS
$routes->post('api/register', 'Auth::register');
$routes->post('api/login', 'Auth::login');
$routes->delete('api/logout', 'Auth::logout');
$routes->post('api/sendemail', 'ForgetPassword::sendEmail');
$routes->post('api/verifikasitoken', 'ForgetPassword::verifikasiToken');
// AUTH PROCESS

// AUTH RENDER
$routes->get('login', 'Auth::loginRender');
$routes->get('register', 'Auth::registerRender');
$routes->get('forgetpass', 'ForgetPassword::indexRender');
// AUTH RENDER




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
