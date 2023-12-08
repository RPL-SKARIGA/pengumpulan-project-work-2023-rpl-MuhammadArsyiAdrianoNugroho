<?php

use CodeIgniter\Commands\Utilities\Routes;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Home::index');
$routes->get('/more/(:segment)', 'Home::more/$1');
$routes->get('home/checkout', 'Checkout::index');
$routes->get('home/checkout/detail/(:segment)', 'Checkout::detail/$1');
// $routes->view('/user/keranjang', 'user/keranjang');
$routes->get('/user/detail_produk/(:any)', 'Home::detail/$1');
$routes->get('/keranjang/add/(:any)', 'Keranjang::add/$1');
$routes->get('/keranjang/delete/(:any)', 'Keranjang::delete/$1');
$routes->post('/keranjang/checkout', 'Checkout::checkout');
$routes->post('/transaksi/remove', 'Checkout::remove');

$routes->get('admin', 'Admin::index');
$routes->get('/admin/create', 'Admin::create');
$routes->get('/admin/crekat', 'Admin::crekat');
$routes->get('/admin/login', 'Admin::login');
$routes->get('/admin/register', 'Admin::register');
$routes->get('/admin/logout', 'Admin::logout');
$routes->delete('/admin/(:num)', 'Admin::delete/$1');
$routes->get('/admin/detail/(:any)', 'Admin::detail/$1');
$routes->get('/admin/user', 'Admin::user');
$routes->get('/admin/transaksi', 'Admin::transaksi');
$routes->get('/admin/transaksi/detail/(:num)', 'Admin::transaksi_detail/$1');
$routes->post('admin/transaksi/update/(:num)/(:num)', 'Admin::updateTransaksi/$1/$2');
$routes->get('/admin/detail_transaksi', 'Admin::detail_transaksi');
$routes->get('/admin/kategori', 'Admin::kategori');




$routes->get('/home/profile', 'Home::edpro');
$routes->get('/admin/(:segment)', 'Admin::edit/$1');


