<?php

$id = $_GET['id'] ?? null;

require base_path('Core/Database.php');

$dsn = 'mysql:host=mysql;port=3306;dbname=app-db;charset=utf8';
$db = new Database($dsn, 'root', 'password');

$todo = $db -> query('SELECT * FROM todos WHERE id = :id', [
	'id' => $id
]) -> findOrFail();

$todo['body'] = json_decode($todo['body']);

view('todos/show.view.php', [
	'todo' => $todo,
]);