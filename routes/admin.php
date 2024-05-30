<?php

use Hi\PhpOop\Controllers\Admin\BrandController;
use Hi\PhpOop\Controllers\Admin\CategoryController;
use Hi\PhpOop\Controllers\Admin\DashboardController;
use Hi\PhpOop\Controllers\Admin\ProductController;
use Hi\PhpOop\Controllers\Admin\UserController;

$router->mount('/admin', function () use ($router) {

    $router->get('/', DashboardController::class .  '@index');

    // ROUTER CATEGORY
    $router->mount('/categories', function () use ($router) {
        $router->get('/', CategoryController::class . '@index');
        $router->get('/create', CategoryController::class . '@create');
        $router->post('/store', CategoryController::class . '@store');
        $router->get('/{id}', CategoryController::class . '@show');
        $router->post('/{id}/edit', CategoryController::class . '@edit');
        $router->put('/{id}', CategoryController::class . '@update');
        $router->delete('/{id}', CategoryController::class . '@destroy');
    });

    // ROUTER BRAND
    $router->mount('/brands', function () use ($router) {
        $router->get('/', BrandController::class . '@index');
        $router->get('/create', BrandController::class . '@create');
        $router->post('/store', BrandController::class . '@store');
        $router->get('/{id}', BrandController::class . '@show');
        $router->post('/{id}/edit', BrandController::class . '@edit');
        $router->put('/{id}', BrandController::class . '@update');
        $router->delete('/{id}', BrandController::class . '@destroy');
    });

    // ROUTER PRODUCT
    $router->mount('/products', function () use ($router) {
        $router->get('/', ProductController::class . '@index');
        $router->get('/create', ProductController::class . '@create');
        $router->post('/store', ProductController::class . '@store');
        $router->get('/{id}', ProductController::class . '@show');
        $router->post('/{id}/edit', ProductController::class . '@edit');
        $router->put('/{id}', ProductController::class . '@update');
        $router->delete('/{id}', ProductController::class . '@destroy');
    });

    // ROUTER USER
    $router->mount('/users', function () use ($router) {
        $router->get('/', UserController::class . '@index');
        $router->get('/create', UserController::class . '@create');
        $router->post('/store', UserController::class . '@store');
        $router->get('/{id}', UserController::class . '@show');
        $router->post('/{id}/edit', UserController::class . '@edit');
        $router->put('/{id}', UserController::class . '@update');
        $router->delete('/{id}', UserController::class . '@destroy');
    });
});
