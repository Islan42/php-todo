<?php

use Core\Validator;
use Core\Session;
use Core\App;

$todoid = $_POST['todoid'];
$body = $_POST['body'];

$userid = Session::userID();

//Validar
if (! Validator::json($body) ){
	redirect("/todo?id={$todoid}");
}

//Autorizar
$db = App::resolve('Core\Database');
$todo = $db -> query('SELECT * FROM todos WHERE id = :id', [
	'id' => $todoid,
]) -> findOrFail();

authorize($todo['user_id'] === $userid);
//Gravar

$db -> query('UPDATE todos SET body = :body WHERE id = :id', [
	'body' => $body,
	'id' => $todoid,
]);

redirect("/todo?id={$todoid}");