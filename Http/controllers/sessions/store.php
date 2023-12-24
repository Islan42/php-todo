<?php

use Http\Forms\LoginForm;
use Core\Authenticator;
use Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$form = LoginForm::validate([
	'email' => $email,
	'password' => $password,
]);

if (! $form -> failed()){

	$auth = new Authenticator;

	if ($auth -> atempt($email, $password)){
		redirect('/');
	} else {
		$form -> error('auth', 'Combinação incorreta de Email e Senha. Tente novamente.');
	}
}

Session::flash('errors', $form -> errors());
Session::flash('old', $form -> attributes());
redirect('/');