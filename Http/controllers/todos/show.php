<?php

use Core\App;
use Core\Session;

$id = $_GET['id'] ?? null;
$userid = Session::userID();

$db = App::resolve('Core\Database');

$todo = $db -> query('SELECT * FROM todos WHERE id = :id', [
	'id' => $id
]) -> findOrFail();

authorize($todo['user_id'] === $userid);

// $todo['body'] = json_decode($todo['body']);

view('todos/show.view.php', [
	'todo' => $todo,
]);