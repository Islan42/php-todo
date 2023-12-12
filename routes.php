<?php

$router -> get('/', 'index.php');
$router -> get('/about', 'about.php');

$router -> get('/todos', 'todos/index.php');
$router -> get('/todos/create', 'todos/create.php');
$router -> post('/todos', 'todos/store.php');

$router -> get('/todo', 'todos/show.php');
$router -> post('/todo/delete', 'todos/destroy.php');

$router -> get('/register', 'users/create.php');
$router -> post('/register', 'users/store.php');

$router -> get('/login', 'sessions/create.php');
$router -> post('/login', 'sessions/store.php');
$router -> post('/logout', 'sessions/destroy.php');