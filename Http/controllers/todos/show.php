<?php

use Core\App;

$id = $_GET['id'] ?? null;

$db = App::resolve('Core\Database');

$todo = $db -> query('SELECT * FROM todos WHERE id = :id', [
	'id' => $id
]) -> findOrFail();

$todo['body'] = json_decode($todo['body']);

view('todos/show.view.php', [
	'todo' => $todo,
]);