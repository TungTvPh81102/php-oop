<?php

use Bramus\Router\Router;
use Hi\PhpOop\Controllers\Client\AuthController;
use Hi\PhpOop\Controllers\Client\CartController;
use Hi\PhpOop\Controllers\Client\HomeController as ClientHomeController;
use Hi\PhpOop\Controllers\Client\OrderController;
use Hi\PhpOop\Controllers\Client\ProductController;

$router->get('/', ClientHomeController::class . '@index');

$router->get('product-details/{id}', ProductController::class . '@productDetail');
$router->get('/contact', ClientHomeController::class . '@contact');

$router->get('/login', AuthController::class . '@showFormLogin');
$router->post('/handle-login', AuthController::class . '@handleLogin');
$router->post('/logout', AuthController::class . '@logout');
$router->get('/register', AuthController::class . '@authRegister');
$router->post('/handle-register', AuthController::class . '@handleRegister');
$router->get('/active-account/token/{token}', AuthController::class . '@activeAccount');
$router->get('/forgot-password', AuthController::class . '@showForgotPassword');
$router->post('/handle-forgot-password', AuthController::class . '@handleForgotPassword');
$router->get('/reset/{token}', AuthController::class . '@showFormResetPassword');
$router->post('/handle-reset-password/{token}', AuthController::class . '@handleFormResetPassword');

$router->get('cart/add', CartController::class . '@add');
$router->get('cart/view-cart', CartController::class . '@viewCart');
$router->get('cart/quantityInc', CartController::class . '@quantityInc');
$router->get('cart/quantityDec', CartController::class . '@quantityDec');
$router->get('cart/remove', CartController::class . '@remove');

$router->get('check-out', OrderController::class . '@viewCheckOut');
$router->post('handle-check-out', OrderController::class . '@handleCheckOut');
$router->get('payment-response', OrderController::class . '@handlePaymentResponse');
$router->get('order-result', OrderController::class . '@orderResultPage');
