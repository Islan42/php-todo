<?php
use Core\App;
use Core\Session;

$userid = Session::get('user')['id'];
$db = App::resolve('Core\Database');

$todos = $db -> query('SELECT * FROM todos WHERE user_id = :userid', [
	'userid' => $userid,
]) -> fetchAll();

view('todos/index.view.php', ['todos' => $todos]);