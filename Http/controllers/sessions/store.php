<?php

use Core\Validator;
use Core\Authenticator;

//	Armazenar Email e Senha

//	Validar Email e Senha

//	Autenticar:
// 		Encontrar o usuário pelo Email;
//		Comparar as duas Senhas
//			Se forem iguais -> LOGAR
//			Se não -> Retornar para o formulário.

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::email($email)){
	$errors['email'] = 'Formato de Email incorreto';
}

if (! Validator::string($password, 8, 255)){
	$errors['password'] = 'A senha deve ter pelo menos 8 caracteres';
}

$auth = new Authenticator;

if ($auth -> atempt($email, $password)){
	redirect('/');
} else {
	$errors['email'] = 'Combinação incorreta de Email e Senha.';
}

view('sessions/create.view.php', [
	'errors' => $errors,
]);