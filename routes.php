<?php

$router -> get('/', 'index.php'); //DONE

$router -> get('/todos', 'todos/index.php'); //DONE
$router -> get('/todos/create', 'todos/create.php');	//DONE
$router -> post('/todos', 'todos/store.php');

$router -> get('/todo', 'todos/show.php'); //DONE
$router -> post('/todo/delete', 'todos/destroy.php');

$router -> get('/register', 'users/create.php'); //DONE
$router -> post('/register', 'users/store.php'); //DONE

$router -> get('/login', 'sessions/create.php'); //DONE
$router -> post('/login', 'sessions/store.php');	//DONE
$router -> post('/logout', 'sessions/destroy.php');	//DONE