<?php

const BASE_PATH = __DIR__ . '/../';
require(BASE_PATH . 'Core/functions.php');
require base_path('Core/Router.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router;
require base_path('routes.php');

require base_path('bootstrap.php');

$router -> route($uri, $method);