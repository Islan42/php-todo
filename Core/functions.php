<?php
use Core\Authenticator;

function base_path($path){
	return BASE_PATH . $path;
}

function dd($value){
	echo '<pre>';
	var_dump($value);
	echo '</pre>';
	die();
}

function view($path, $params = []){
	extract($params);
	
	return require base_path("views/{$path}");
}

function abort($code = 404){
	http_response_code($code);
	view("{$code}.view.php");
	die();
}

function redirect($path){
	header("location: $path");
	dire();
}

function login($user){
	(new Authenticator) -> login($user);
}

function logout(){
	(new Authenticator) -> logout();
}