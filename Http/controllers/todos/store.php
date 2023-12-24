<?php

use Core\Validator;
use Core\Session;
use Core\App;

$nameTD = $_POST['name'];
$errors = [];

if (! Validator::string($nameTD, 1, 255)){
	$errors['name'] = 'Insira um nome com até 255 caracteres.';
	
	Session::flash('errors', $errors);
	Session::flash('old', [
		'name' => $nameTD,
	]);
	redirect('/todos/create');
}

$db = App::resolve('Core\Database');

$userid = Session::userID();

$db -> query('INSERT INTO todos(name, body, user_id) VALUES(:name, :body, :userid)', [
	'name' => $nameTD,
	'body' => '[]',
	'userid' => $userid,
]);

redirect('/todos'); //REDIRECIONAR PARA A PRÓPRIA NOTA