<?php

require base_path('Core/Validator.php');
require base_path('Core/Authenticator.php');
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

view('sessions/create.view.php', [
	'errors' => $errors,
]);