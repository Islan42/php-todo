<?php

use Core\App;

$todoid = $_GET['todoid'];

$db = App::resolve('Core\Database');
$todo = $db -> query('SELECT * FROM todos WHERE id = :id', [
	'id' => $todoid,
]) -> findOrFail();

view('todos/edit.view.php', [
	'todo' => $todo,
]);