<?php

use Http\Forms\LoginForm;
use Core\Authenticator;
use Core\Session;

//	Armazenar Email e Senha

//	Validar Email e Senha

//	Autenticar:
// 		Encontrar o usuário pelo Email;
//		Comparar as duas Senhas
//			Se forem iguais -> LOGAR
//			Se não -> Retornar para o formulário.

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
redirect('/login');