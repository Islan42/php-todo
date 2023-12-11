<?php

function base_dir($path){
	return BASE_DIR . $path;
}

function dd($value){
	echo '<pre>';
	var_dump($value);
	echo '</pre>';
	die();
}

function view($path){
	return require base_dir("views/{$path}");
}

function abort($code = 404){
	http_response_code($code);
	view("{$code}.view.php");
}