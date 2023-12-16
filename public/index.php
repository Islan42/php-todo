<?php

use Core\Router;
use Core\Session;

session_start();

const BASE_PATH = __DIR__ . '/../';
require(BASE_PATH . 'Core/functions.php');

spl_autoload_register(function($class){
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	
	require base_path("{$class}.php");
});

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router;
require base_path('routes.php');

require base_path('bootstrap.php');

$router -> route($uri, $method);

Session::unflash();