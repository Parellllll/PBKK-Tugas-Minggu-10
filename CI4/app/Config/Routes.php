<?php

use CodeIgniter\Router\RouteCollection;

/**
 * Konfigurasi Routes CodeIgniter 4.7.6 — Tugas Minggu 10 PBKK
 * Studi Kasus: ShopEase Fresh / Toko Buah (Router, Controller, View Layout, Route Group, Placeholder, Named Route)
 * Mahasiswa: Farrel Prastita Ramadhan (5025241219)
 *
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(false);

// Halaman utama (Landing Page ShopEase Fresh)
$routes->get('/', 'Home::index', ['as' => 'home']);

// Controller Page: about, contact, faqs, tos
$routes->get('about', 'Page::about', ['as' => 'page.about']);
$routes->get('contact', 'Page::contact', ['as' => 'page.contact']);
$routes->post('contact', 'Page::sendContact', ['as' => 'page.contact.send']);
$routes->get('faqs', 'Page::faqs', ['as' => 'page.faqs']);
$routes->get('tos', 'Page::tos', ['as' => 'page.tos']);

// Route Group: Katalog dengan Placeholder (:segment) dan (:num) + Named Route
$routes->group('katalog', static function ($routes) {
    $routes->get('/', 'CatalogController::index', ['as' => 'catalog.index']);
    $routes->get('(:segment)', 'CatalogController::category/$1', ['as' => 'catalog.category']);
    $routes->get('produk/(:num)/(:segment)', 'CatalogController::detail/$1/$2', ['as' => 'catalog.detail']);
});

// Route Group: Informasi Layanan Toko
$routes->group('info', static function ($routes) {
    $routes->get('pengiriman', 'InfoController::shipping', ['as' => 'info.shipping']);
    $routes->get('garansi', 'InfoController::warranty', ['as' => 'info.warranty']);
});

// Custom 404 Handler
$routes->set404Override(static function () {
    $response = service('response');
    $response->setStatusCode(404);
    return view('errors/custom_404', [
        'title'       => '404 — Halaman Tidak Ditemukan | ShopEase Fresh',
        'activeMenu'  => '',
        'missingPath' => current_url(),
    ]);
});
