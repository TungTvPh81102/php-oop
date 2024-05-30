<?php

use Hi\PhpOop\Controllers\Client\AuthController;
use Hi\PhpOop\Controllers\Client\CartController;
use Hi\PhpOop\Controllers\Client\HomeController as ClientHomeController;
use Hi\PhpOop\Controllers\Client\OrderController;
use Hi\PhpOop\Controllers\Client\ProductController;

$router->get('/', ClientHomeController::class . '@index');

$router->get('/product-detail', ProductController::class . '@productDetail');

$router->get('/login', AuthController::class . '@authLogin');

$router->get('/register', AuthController::class . '@authRegister');

$router->get('/view-cart', CartController::class . '@viewCart');

$router->get('/check-out', OrderController::class . '@viewCheckOut');

$router->get('/contact', ClientHomeController::class . '@contact');
