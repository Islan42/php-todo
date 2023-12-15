<?php

use Core\Session;

$errors = Session::get('errors');
$old = Session::get('old');

view('sessions/create.view.php', [
	'errors' => $errors,
	'old' => $old,
]);