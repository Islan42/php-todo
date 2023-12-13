<?php

require base_path('Core/Database.php');

$dsn = 'mysql:host=mysql;port=3306;dbname=app-db;charset=utf8';
$db = new Database($dsn, 'root', 'password');

$todos = $db -> query('SELECT * FROM todos') -> fetchAll();

view('todos/index.view.php', ['todos' => $todos]);