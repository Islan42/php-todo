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

$user = Session::get('user');	//PRECISA ADICIONAR O AUTH MIDDLEWARE

$db -> query('INSERT INTO todos(name, body, user_id) VALUES(:name, :body, :userid)', [
	'name' => $nameTD,
	'body' => '[]',
	'userid' => $user['id'],
]);

redirect('/todos'); //REDIRECIONAR PARA A PRÓPRIA NOTA