<?php

const BASE_DIR = __DIR__ . '/../';
require(BASE_DIR . 'Core/functions.php');
require base_dir('Core/Router.php');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router;
require base_dir('routes.php');
$router -> route($uri, $method);