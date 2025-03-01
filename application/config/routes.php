<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['login']                         = 'backend/AuthController/login';
$route['logout']                        = 'backend/AuthController/logout';
$route['dash']                          = 'backend/HomeController/index';
// Routing Admin
$route['admin']                         = 'backend/AdminController/index';
$route['admin/create']                  = 'backend/AdminController/create';
$route['admin/update/(:num)']           = 'backend/AdminController/edit/$1';
// Routing Admin
$route['level']                         = 'backend/LevelController/index';
$route['level/create']                  = 'backend/LevelController/create';
$route['level/update/(:num)']           = 'backend/LevelController/edit/$1';
// Routing Produk
$route['product']                         = 'backend/ProductController/index';
$route['product/create']                  = 'backend/ProductController/create';
$route['product/update/(:num)']           = 'backend/ProductController/edit/$1';
// Routing Transcation
$route['transaction']                     = 'backend/TransactionController/index';
$route['transaction/paid']                = 'backend/TransactionController/paid';
$route['transaction-detail']              = 'backend/TransactionController/getById';
$route['transaction-update']              = 'backend/TransactionController/update';
$route['transaction-delete']              = 'backend/TransactionController/drop';

// ----------------------------------------------------------------------------------

// Routing Frontend
$route['home-page']                     = 'frontend/HomeController/index';
$route['about-page']                    = 'frontend/AboutController/index';
$route['visi-page']                     = 'frontend/VisiController/index';

$route['project-page']                  = 'frontend/ProjectController/index';
$route['cart-add']                      = 'frontend/CartController/insert_cart';
$route['cart-delete']                   = 'frontend/CartController/delete_cart';
$route['invoice']                       = 'frontend/CartController/generate_invoice';


$route['checkout-page']                 = 'frontend/CartController/checkout';

$route['do_transaction']                = 'frontend/CartController/transaction';
$route['contact-page']                  = 'frontend/ContactController/index';



$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
