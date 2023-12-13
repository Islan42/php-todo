<?php

# Inicializar Database;
require base_path('Core/Database.php');

$dsn = 'mysql:host=mysql;port=3306;dbname=app-db;charset=utf8';
$db = new Database($dsn, 'root', 'password');
#

// $notes = $db -> query('SELECT * FROM todos') -> fetchAll();
// dd($notes);
