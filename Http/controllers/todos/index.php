<?php
use Core\App;

$db = App::resolve('Core\Database');

$todos = $db -> query('SELECT * FROM todos') -> fetchAll();

view('todos/index.view.php', ['todos' => $todos]);