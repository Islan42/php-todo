<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container -> bind('Core\Database', function(){
	$dsn = 'mysql:host=mysql;port=3306;dbname=app-db;charset=utf8';
	
	return new Database($dsn, 'root', 'password');
});

App::setContainer($container);