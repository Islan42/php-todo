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
	
	$user = $db -> findUser($email);
	
	if ($user){
		Session::flash('old', [
			'email' => $form -> attributes()['email'],
		]);
		Session::flash('errors', [
			'auth' => 'Você já possui um cadastro, por isso você foi redirecionado para a página de Login.',
		]);
		redirect('/login');
	} else {
		$db -> query('INSERT INTO users(name, email, password) VALUES(:name, :email, :password)', [
			'name' => $name,
			'email' => $email,
			'password' => $password,
		]);
		
		$user = $db -> findUser($email);
				
		login([
			'name' => $name,
			'email' => $email,
			'id' => $user['id'],
		]);
		
		redirect('/todos');
	}
}


Session::flash('errors', $form -> errors());
Session::flash('old', $form -> attributes());
redirect('/register');