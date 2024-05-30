<?php

$router = new \Bramus\Router\Router();

require_once __DIR__ . '/client.php';
require_once __DIR__ . '/admin.php';

$router->run();
