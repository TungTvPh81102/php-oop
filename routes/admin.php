<?php

use Hi\PhpOop\Controllers\Admin\BrandController;
use Hi\PhpOop\Controllers\Admin\CategoryController;
use Hi\PhpOop\Controllers\Admin\DashboardController;
use Hi\PhpOop\Controllers\Admin\ProductController;
use Hi\PhpOop\Controllers\Admin\UserController;

$router->before('GET|POST', '/admin/*.*', function () {
    if (!is_logged()) {
        header('Location: ' . url('login'));
        exit();
    }

    if (!is_admin()) {
        header('Location: ' . url());
        exit();
    }
});

$router->mount('/admin', function () use ($router) {

    $router->get('/', DashboardController::class .  '@index');

    // ROUTER CATEGORY
    $router->mount('/categories', function () use ($router) {
        $router->get('/', CategoryController::class . '@index');
        $router->get('/create', CategoryController::class . '@create');
        $router->post('/store', CategoryController::class . '@store');
        $router->get('/{id}/show', CategoryController::class . '@show');
        $router->get('/{id}/edit', CategoryController::class . '@edit');
        $router->post('/{id}/update', CategoryController::class . '@update');
        $router->post('/{id}/destroy', CategoryController::class . '@destroy');
    });

    // ROUTER BRAND
    $router->mount('/brands', function () use ($router) {
        $router->get('/', BrandController::class . '@index');
        $router->get('/create', BrandController::class . '@create');
        $router->post('/store', BrandController::class . '@store');
        $router->get('/{id}', BrandController::class . '@show');
        $router->get('/{id}/edit', BrandController::class . '@edit');
        $router->post('/{id}', BrandController::class . '@update');
        $router->get('/{id}', BrandController::class . '@destroy');
    });

    // ROUTER PRODUCT
    $router->mount('/products', function () use ($router) {
        $router->get('/', ProductController::class . '@index');
        $router->get('/create', ProductController::class . '@create');
        $router->post('/store', ProductController::class . '@store');
        $router->get('/{id}/show', ProductController::class . '@show');
        $router->get('/{id}/edit', ProductController::class . '@edit');
        $router->post('/{id}/update', ProductController::class . '@update');
        $router->post('/{id}/destroy', ProductController::class . '@destroy');
    });

    // ROUTER USER
    $router->mount('/users', function () use ($router) {
        $router->get('/', UserController::class . '@index');
        $router->get('/create', UserController::class . '@create');
        $router->post('/store', UserController::class . '@store');
        $router->get('/{id}/show', UserController::class . '@show');
        $router->get('/{id}/edit', UserController::class . '@edit');
        $router->post('/{id}/update', UserController::class . '@update');
        $router->post('/{id}/destroy', UserController::class . '@destroy');
    });
});
