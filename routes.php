<?php

$router -> get('/', 'index.php'); //DONE

$router -> get('/todos', 'todos/index.php') -> only('auth'); //DONE
$router -> get('/todos/create', 'todos/create.php') -> only('auth');	//DONE
$router -> post('/todos', 'todos/store.php') -> only('auth');	//DONE 

$router -> get('/todo', 'todos/show.php') -> only('auth'); //DONE
$router -> post('/todo/delete', 'todos/destroy.php') -> only('auth');	//DONE
$router -> get('/todo/update', 'todos/edit.php') -> only('auth');	//DONE
$router -> post('/todo/update', 'todos/update.php') -> only('auth');	//DONE

$router -> get('/register', 'users/create.php') -> only('guest'); //DONE
$router -> post('/register', 'users/store.php') -> only('guest'); //DONE

$router -> get('/login', 'sessions/create.php') -> only('guest'); //DONE
$router -> post('/login', 'sessions/store.php') -> only('guest');	//DONE
$router -> post('/logout', 'sessions/destroy.php') -> only('auth');	//DONE