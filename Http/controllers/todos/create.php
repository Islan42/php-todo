<?php
use Core\Session;

$errors = Session::get('errors');
$old = Session::get('old');

view('todos/create.view.php', [
	'errors' => $errors,
	'old' => $old,
]);