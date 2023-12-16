<?php

use Core\App;
use Core\Session;

$todoid = $_POST['todoid'];
$userid = Session::get('user')['id'];

$db = App::resolve('Core\Database');

$todo = $db -> query('SELECT * FROM todos WHERE id = :id', [
	'id' => $todoid,
]) -> findOrFail();

authorize($todo['user_id'] === $userid);

$db -> query('DELETE FROM todos WHERE id = :id', [
	'id' => $todoid,
]);

redirect('/todos');