<?php

use Http\Forms\RegisterForm;
use Core\App;
use Core\Session;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$form = RegisterForm::validate([
	'name' => $name,
	'email' => $email,
	'password' => $password,
]);

if (! $form -> failed() ){
	$db = App::resolve('Core\Database');
	
	$user = $db -> query('SELECT * FROM users WHERE email = :email', [
		'email' => $email,
	]) -> find();
	
	if ($user){
		Session::flash('old', [
			'email' => $form -> attributes()['email'],
		]);
		redirect('/login');
	} else {
		$db -> query('INSERT INTO users(name, email, password) VALUES(:name, :email, :password)', [
			'name' => $name,
			'email' => $email,
			'password' => $password,
		]);
		
		login([
			'name' => $name,
			'email' => $email,
		]);
		
		redirect('/todos');
	}
}


Session::flash('errors', $form -> errors());
Session::flash('old', $form -> attributes());
redirect('/register');