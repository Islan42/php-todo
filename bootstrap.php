<?php

require(base_path('Core/App.php'));
require(base_path('Core/Container.php'));
require base_path('Core/Database.php');

$container = new Container();

$container -> bind('Core\Database', function(){
	$dsn = 'mysql:host=mysql;port=3306;dbname=app-db;charset=utf8';
	
	return new Database($dsn, 'root', 'password');
});

App::setContainer($container);